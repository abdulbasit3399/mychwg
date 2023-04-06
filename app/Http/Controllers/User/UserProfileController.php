<?php

namespace App\Http\Controllers\User;

use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\PasswordExistRule;
use App\Models\User;
use App\Models\Profile;
use App\Models\AdsSetting;


class UserProfileController extends Controller
{

    public function dashboard()
    {
        $data=AdsSetting::where('user','user')->wherestatus(1)->orderBy('id','desc')->get();

        return view('user.dashboard', get_defined_vars());
    }


    public function profile()
    {
        return view('user.profile');
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
          'zip_code' => 'required|string|regex:/^[A-Z0-9][\[A-Z\-0-9\]]*$/u',
        ]);
        // dd($request->all());

        if ($request->email != $user->email) {
            $request->validate([
              'email' =>'required|email|unique:users',
            ]);
        }
        $user->name      = $request->name;
        $user->phone     = $request->phone;
        $user->zip_code  = $request->zip_code;

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
    public function upgrade_advocate($id)
    {
        $user = User::find(Auth::id());
        $data = array(
           'given_name' => $user->name,
           'email_address' => $user->email
        );

        $url = env('SQUARE_API_URL')."/v2/customers";
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer '.env('SQUARE_ACCESS_TOKEN')],
            'body'    => json_encode($data)
        ]);

        $customer_result = json_decode($response->getBody(), true);
        $customer_id = $customer_result['customer']['id'];

        $user->stripe_id = $customer_id;
        $user->role = 'advocate';
        $user->save();

        Profile::create([
            'user_id'    => $user->id,
            'state'      => $user->state,
            'country'    => $user->country,
            'zip_code'   => $user->zip_code,
        ]);

        return redirect()->route('create.subscription',$id);
    }




}
