<?php

namespace App\Http\Controllers\Advocate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use App\Rules\PasswordExistRule;
use Hash;
use App\Models\User;
use App\Models\EventRequest;
use App\Models\Profile;
use App\Models\AdsSetting;
use App\Models\UserPayment;


class AdvocateProfileController extends Controller
{
    public function dashboard()
    {

        $events = Auth::user()->events->pluck('id');

        $pending = EventRequest::where('status', 'pending')->whereHas('eventTiming', function($q) use ($events) {
                $q->whereIn('event_id', $events);
        })->count();
        $data=AdsSetting::where('advocate','advocate')->wherestatus(1)->orderBy('id','desc')->get();

        return view('advocate.dashboard', get_defined_vars());
    }


    public function profile()
    {
        $id = auth()->user()->id;
        $payments = UserPayment::where('user_id',$id)->get();
        $subscription = Subscription::where('user_id', $id)->latest('id')->first();

        return view('advocate.profile',get_defined_vars());
    }

    public function crop(Request $request){

        $dest = $request->file('uploads/users/');

        $file = $request->file('image');
        $new_image_name = 'PFP_'.date('dmY').uniqid().'.jpg';
        $move = $file->move(public_path($dest), $new_image_name);

        $userInfo = User::find(auth()->user()->id);
        $userPhoto = $userInfo->avatar;
        if($userPhoto != '')
        {
            unlink($dest.$userPhoto);
        }
        $userInfo = User::find(auth()->user()->id)->update(['avatar'=>$new_image_name]);
        return response()->json(['status' => 1, 'message'=> 'profile has been updated Successfully!']);

    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::User()->id);

        $request->validate([
          'name'=>'required',
          'email'=>'required',
        ]);
        if ($request->email != $user->email) {
            $request->validate([
              'email' =>'required|email|unique:users',
            ]);
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = $request->password;
        }
        if($request->hasfile('image')){

                           $request->validate([
                  'image'=>'required|image|mimes:jpg,png,PNG,jpeg,gif,svg'
            ]);

          $image = $request->file('image');
          $filename = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
          $movedFile = $image->move('uploads/users/', $filename);
          $user->avatar = $filename;
          $user->save();
        }else {
            $user->save();
        }
        return redirect()->back()->with('message', 'profile has been updated.');
    }

    public function updatePassword(Request $req)
    {
        $messages = [
            'old_password.required' => 'Enter your old password',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter a stronger password',
        ];

        $rules = [
            'old_password' => ['required',new PasswordExistRule()],
            'password' => ['required','min:6','confirmed'],
        ];

        $this->validate($req,$rules,$messages);
        $user=Auth::user();
        $user->password=Hash::make($req->password);
        $user->save();

        return back()->with('message', 'Password has been updated.');
    }


    public function updateOtherProfile(Request $req)
    {



        $req->validate([
            'store_name' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);



        $file = null;

        if($req->acheivement)
        {

            request()->validate([
                'acheivement' => 'required|mimetypes:application/pdf|max:20000',
            ]);

            $file = uploadImage($req->acheivement, 'uploads/users/acheivement');
        }

        $profile = Profile::find($req->profile_id);
        $profile->update($req->except(['profile_id', 'acheivement']));
        $profile->update(['acheivement' => $file]);

        return back()->with('message', 'Profile has been updated.');

    }



}
