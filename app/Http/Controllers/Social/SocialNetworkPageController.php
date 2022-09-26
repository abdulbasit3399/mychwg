<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\SocialPost;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSocialGroup;
use App\Models\Following;
use App\Models\SocialPostTag;
use App\Models\HomeopathImage;
use Auth;
use Crypt;

class SocialNetworkPageController extends Controller
{
    public function renderPage(Request $req)
    {

        $notif=Notification::where('user_id', Auth::id())->where('is_read',0)->orderBy('id','desc')->get();
        $notif_count=Notification::where('user_id', Auth::id())->where('is_read',0)->get();
        $user=User::where('id','!=',auth()->id())->get();
        $conversations=Conversation::where('sender_id',auth()->id())->orWhere('receiver_id',auth()->id())->orderBy('updated_at','desc')->get();

        $posts = SocialPost::with('socialPostTags')->where('user_id', Auth::id())->orWhereIn('user_id',Auth::user()->userFollowers->pluck('id'))->orderBy('id', 'DESC');
        
        // $posts = SocialPost::with('socialPostTags')->where('user_id', Auth::id())->orWhereIn('user_id',Auth::user()->userFollowers->pluck('id'))->orderBy('id', 'DESC');

        if ($req->p=='resources')
        {
            $posts = $posts->where('post_type', 'Resources')->paginate(100);
        }
        elseif ($req->p=='news_feed')
        {
            $posts = $posts->where([['post_type', 'News'],['status','Public']])->paginate(100);
        }
        else
        {
            $posts = $posts->where('user_id', Auth::id())->paginate(5);
        }
        $start_cov=null;

        if(isset($req->page))
        {
            return view('vendor.social-network.ajax.load_posts', get_defined_vars());
        }

        return view('vendor.social-network.pages.'.$req->p, get_defined_vars());

    }

    public function aboutUpdate(Request $req)
    {
        Auth::user()->userSocialProfile->update($req->all());
        return response()->json('Data has been updated.');
    }

    public function coverUpdate(Request $req)
    {

        $req->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $cover = uploadImage($req->cover,'uploads/users/social/'.Auth::user()->user_name);


        Auth::user()->userSocialProfile->update(['cover' => $cover]);

        return response()->json(['url' => asset($cover), 'message' => 'Cover has been updated.']);;

    }



    public function connectDisconnect(Request $req)
    {

        #GET CONNECTED USER
        $connect_user = User::findOrFail(Crypt::decrypt($req->id));

        #GET AUTHENTICATED USER
        $user = Auth::user();


        if(checkUserFollowing(Auth::id(), $connect_user->id) > 0)
        {
            $connect_user->userFollowings()->detach($user);
            $message = 'unfollowed';
        }
        else
        {
            $connect_user->userFollowings()->syncWithoutDetaching($user);
            $message = 'followed';
        }
        $notification_send=$this->notificationForFollowUnfollow($req,$connect_user,$message);

        $notification_send->message=$message;
//        $message=$notification_send->id;

        return response()->json($message);

    }


    public function groupFollowUnfollow(Request $req)
    {

        #GET CONNECTED GROUP
        $group = UserSocialGroup::findOrFail(Crypt::decrypt($req->id));

        #GET AUTHENTICATED USER
        $user = Auth::user();


        if(checkGroupFollowing(Auth::id(), $group->id) > 0)
        {
            $group->userFollowers()->detach($user);


            $message = 'unfollowed';

        }
        else
        {
            $group->userFollowers()->syncWithoutDetaching($user);
            $message = 'followed';
        }



        return response()->json($message);

    }

    public function groupRequestAction($action, $group_id, $user_id)
    {


        $record = Following::whereUserId(base64_decode($user_id))->whereFollowingId(base64_decode($group_id))->first();

        if(!$record)
        {
            abort(404);
        }

        if($action == 'accept')
        {
            $record->status = 'active';
            $record->save();
            return back()->withMessage('Request has been accepted.');
        }

        $record->delete();
        return back()->withMessage('Request has been cancelled.');


    }


    public function groupRequestActionPost($action, $post_id)
    {


        $post = SocialPost::findOrFail(base64_decode($post_id));


        if($action == 'accept')
        {
            $post->is_approved = true;
            $post->save();
            return back()->withMessage('Post has been approved.');
        }

        $post->delete();
        return back()->withMessage('Post has been removed.');


    }





    public function notificationForFollowUnfollow($req,$connected_user,$message){

        $id=Crypt::decrypt($req->id);
        $notification=Notification::where('user_id',$id)->where('notification_from',User::find(\Illuminate\Support\Facades\Auth::id())->name)->where('notification_to',User::find($id)->name)->where('type','!=','message')->where('is_read',0)->first();

        if ($notification && $message=='unfollowed')
        {
            $notification->type='unfollowed';
            $notification->notification_text=User::find(Auth::id())->name.' UnFollow You';
            $notification->save();
        }elseif ($notification && $message=='followed'){
            $notification->type='followed';
            $notification->notification_text=User::find(Auth::id())->name.' Follow You';
            $notification->save();
        }
        elseif($message=='unfollowed'){
            $notification=new Notification();
            $notification->user_id=$connected_user->id ??'';
            $notification->sender_id=\Illuminate\Support\Facades\Auth::id() ??'';
            $notification->notification_from=User::find(\Illuminate\Support\Facades\Auth::id())->name??'';
            $notification->notification_to=User::find($connected_user->id)->name;
            $notification->notification_text=User::find(Auth::id())->name.' UnFollow You';
            $notification->type='unfollowed';
            $notification->save();
        }elseif($message=='followed'){
            $notification=new Notification();
            $notification->user_id=$connected_user->id ??'';
            $notification->sender_id=\Illuminate\Support\Facades\Auth::id() ??'';
            $notification->notification_from=User::find(\Illuminate\Support\Facades\Auth::id())->name??'';
            $notification->notification_to=User::find($connected_user->id)->name;
            $notification->notification_text=User::find(Auth::id())->name.' Follow You';
            $notification->type='followed';
            $notification->save();
        }

        return $notification;

    }



    public function searchName(Request $req)
    {
        $users = User::where('name', 'LIKE', '%'.$req->q.'%')
                       ->whereIsSociallyCompleted(true)
                       ->where('role', '!=', 'user')
                       ->take(5)
                       ->get();

        $groups = UserSocialGroup::where('title', 'LIKE', '%'.$req->q.'%')
                                   ->take(5)
                                   ->get();


        return view('vendor.social-network.ajax.load_username', get_defined_vars());





    }


    public function connectionProfile(Request $req, $id)
    {

        $user = User::whereUserName($id)->first();
        if(!$user)
        {
            abort(404);
        }

        $start_cov=null;
        $notif=Notification::where('user_id',Auth::id())->where('is_read',0)->orderBy('id','desc')->get();
        $notif_count=Notification::where('user_id', Auth::id())->where('is_read',0)->get();


        if($user->id == Auth::id())
        {

            $resources = $user->socialPosts()
                          ->where('post_type','Resources')
                          ->orderBy('id', 'DESC')
                          ->where('user_id',Auth::id())
                          ->get();

            $posts =    $user->socialPosts()
                          ->where('post_type','News')
                          ->where('user_id',Auth::id())
                          ->orderBy('id', 'DESC')
                          ->get();
        }
        else{
            $resources = $user->socialPosts()
                          ->where('status','Public')
                          ->where('post_type','Resources')
                          ->orderBy('id', 'DESC')
                          ->where('user_id',$user->id)
                          ->get();

            $posts =    $user->socialPosts()
                          ->where('status','Public')
                          ->where('post_type','News')
                          ->where('user_id',$user->id)
                          ->orderBy('id', 'DESC')
                          ->get();
        }
        return view('vendor.social-network.connection.user_profile', get_defined_vars());

    }


    public function groupDetail(Request $req, $id)
    {

        $notif=Notification::where('user_id', Auth::id())->where('is_read',0)->get();
        $notif_count=Notification::where('user_id', Auth::id())->where('is_read',0)->get();


        $group = UserSocialGroup::with('userGroupPosts')->findOrFail(Crypt::decrypt($id));
        // dd($group);
        $data_group = $group;

          if($req->ajax())
          {
            $posts = $group->userGroupPosts()->orderBy('id', 'DESC')->where('is_approved', true)->paginate(3);
            return view('vendor.social-network.ajax.load_posts', get_defined_vars());
          }


        return view('vendor.social-network.group.group_detail', get_defined_vars());

    }


    public function shareResource($id)
    {

        $post = SocialPost::findOrFail(base64_decode($id));

        $newPost = $post->replicate();
        $newPost->user_id = Auth::id();
        $newPost->is_shared = 1;
        $newPost->shared_from = $post->id;
        $newPost->save();

        // $status = $post->is_shared == true ? false : true;

        // $post->update(['is_shared' => $status]);

        return back()->withMessage('Status has been updated.');


    }



}
