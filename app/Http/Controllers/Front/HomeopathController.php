<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HomeopathProfile;
use App\Models\UserSocialGroup;

use DB;
use Session;
use Auth;

class HomeopathController extends Controller
{
    public function findHomeopath(Request $req)
    {

        $data = $req->all();


        $specializations = str_replace(' ', '', implode("," , HomeopathProfile::pluck('specializations')->toArray()));
        $specializations = array_unique(explode(',', $specializations));


        $homeopaths = User::with('HomeopathProfile')
                      ->whereRole('homeopath')
                      ->whereStatus('active');


        if(isset($req->latitude) && isset($req->longitude))
        {

            $pluck_ids = [];




            // $locations = DB::select("select * from(select *,( 6371 * acos( cos( radians(".$req->latitude.") ) * cos( radians(homeopath_profiles.latitude ) ) * cos( radians( homeopath_profiles.longitude ) - radians(".$req->longitude.")) + sin( radians(".$req->latitude.") ) * sin( radians( homeopath_profiles.latitude ) ) ) ) AS distance from homeopath_profiles) as innertable where distance<'".$req->radius."'");

            $locations = HomeopathProfile::GetByDistance($req->latitude,$req->longitude,40)->get();

            foreach($locations as $loc)
            {
                $pluck_ids[] = $loc->user_id;
            }


            $homeopaths = $homeopaths->whereIn('id', $pluck_ids);


        }


        if($req->q)
        {
            $homeopaths = $homeopaths->where('name', 'LIKE', '%'.$req->q.'%');
        }


        if($req->specialization)
        {

            $homeopaths = $homeopaths->whereHas('HomeopathProfile', function($q) use ($req){
                          $q->where('specializations', 'LIKE', '%'.$req->specialization.'%');
                      })->paginate(12);

                    return view('front.homeopath.browse_homeopath', get_defined_vars());

        }


        $homeopaths = $homeopaths->whereHas('HomeopathProfile')->paginate(12);

        return view('front.homeopath.browse_homeopath', get_defined_vars());

    }

    public function profileHomeopath($user_name)
    {


        if(!Auth::check())
        {
            Session::put('homeopath_profile', url()->full());
        }

        $homeopath = User::with('HomeopathProfile', 'HomeopathServices', 'HomeopathImages')
                        ->whereHas('HomeopathProfile')
                        ->whereUserName($user_name)
                        ->whereStatus('active')
                        ->first();
        $gr = UserSocialGroup::where('user_id', $homeopath->id)->get();

        return view('front.homeopath.profile_homeopath', get_defined_vars());
    }


}
