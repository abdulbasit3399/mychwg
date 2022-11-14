<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile');
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
        $user = User::find(Auth::user()->id);
// dd($user);
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
        return redirect()->back()->with('message', 'profile has been updated Successfully!');
    }

}
