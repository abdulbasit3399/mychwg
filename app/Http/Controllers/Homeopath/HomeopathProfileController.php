<?php

namespace App\Http\Controllers\Homeopath;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\PasswordExistRule;
use Hash;
use App\Models\User;
use App\Models\Profile;
use Square\SquareClient;
use Square\Environment;
use Crypt;
use App\Models\HomeopathProfile;
use App\Models\ServiceBooking;
use App\Models\UserPayment;
use App\Models\HomeopathService;
use App\Models\AdsSetting;
use App\Models\ShopOrder;
use MacsiDigital\Zoom\Facades\Zoom;


class HomeopathProfileController extends Controller
{
    protected $client;

    function __construct($foo = null)
    {
        $this->client = new SquareClient([
            'accessToken' => env('SQUARE_ACCESS_TOKEN'),
            'environment' => Environment::SANDBOX,
        ]);
    }
    public function dashboard()
    {

        $is_zoom_active = false;

        if(Auth::user()->zoom_email != null)
        {

            $user = Zoom::user()->find(Auth::user()->zoom_email);

            if($user && $user->status == 'active')
            {
                $is_zoom_active = true;
            }
        }


        $services = Auth::user()->HomeopathServices->pluck('id');
        $income = ServiceBooking::whereIn('homeopath_service_id', $services)->where('status','completed')->sum('price');
        $total_appointments = ServiceBooking::whereIn('homeopath_service_id',  $services)->count();
        $active_appointments = ServiceBooking::whereIn('homeopath_service_id', $services)->where('status', 'active')->get();
        $today_appointments = ServiceBooking::whereIn('homeopath_service_id', $services)->where('date', now()->format('Y-m-d'))->where('status', 'active')->count();
        $data=AdsSetting::where('homeopath','homeopath')->wherestatus(1)->orderBy('id','desc')->get();

        return view('homeopath.dashboard', get_defined_vars());
    }


    public function profile()
    {
        $id = auth()->user()->id;

        // $api_response = $this->client->getCustomersApi()->retrieveCustomer(auth()->user()->stripe_id);

        // if ($api_response->isSuccess()) {
        //     $result = $api_response->getResult();
        // } else {
        //     $result = $api_response->getErrors();
        // }

        // dd($result);
        $payments = UserPayment::where('user_id',$id)->get();
        $subscription = Subscription::where('user_id', $id)->latest('id')->first();
        
        return view('homeopath.profile',get_defined_vars());
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


    public function completeProfile(Request $req)
    {


        $req->validate([
            'designation'           => 'required|string|max:255',
            'registration_number'   => 'required',
            'caption'               => 'required|string',
            'specializations'       => 'required',
            'location'              => 'required',
            'affiliations'          => 'required',
            'latitude'              => 'required',
            'longitude'             => 'required',
        ]);



     $doc1=array();
     $doc2=array();
     if ($req->edu_designation) {
         foreach ($req->edu_designation as $key => $value) {
            $file=uploadImage($value,'uploads/homeopathProfile/aprovalDocument');
            array_push($doc1, $file);
         }
     }

     if ($req->certifications) {
         foreach ($req->certifications as $key => $value) {
            $file=uploadImage($value,'uploads/homeopathProfile/certifications');
            array_push($doc2, $file);
         }
     }




        HomeopathProfile::create([
            'user_id'=>Auth::Id(),
            'registration_number'=>$req->registration_number,
            'designation'=>$req->designation,
            'edu_designation'=>json_encode($doc1),
            'specializations'=>$req->specializations,
            'location'=>$req->location,
            'latitude'=>$req->latitude,
            'longitude'=>$req->longitude,
            'caption'=>$req->caption,
            'certifications'=> json_encode($doc2) ?? '',
            'certifications_info'=>$req->certifications_info ?? '',
            'affiliations'=>$req->affiliations,
            'educational_information'=>$req->educational_information ?? '',
        ]);

        Auth::user()->update(['status' => 'pending']);


        return redirect()->route('homeopath.dashboard')->withMessage('Welcome to your dashboard.');

    }


    public function completeProfileUpdate(Request $req)
    {

        $req->validate([
            'designation'       => 'required|string|max:255',
            'caption'           => 'required|string',
            'specializations'   => 'required',
            'location'          => 'required',
            'affiliations'      => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
        ]);


        HomeopathProfile::find(Crypt::decrypt($req->profile_id))->update($req->except('profile_id'));

        return back()->withMessage('Profile has been updated.');

    }


    public function homeopathBadgeStatusUpdate(Request $req)
    {

      return setHomeopathBadge(Auth::user()->HomeopathProfile->id,$req->badge,$req->status);
    }







}
