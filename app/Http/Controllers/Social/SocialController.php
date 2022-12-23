<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\SocialPostComment;
use App\Models\SocialPostLike;
use App\Models\SocialPostTag;
use App\Models\SocialPost;
use App\Models\UserSocialProfile;
use App\Models\UserSocialGroup;
use App\Models\User;
use App\Models\UserSocialAlbums;
use App\Models\AlbumPhoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Crypt;

class SocialController extends Controller
{

    public function index(Request $request)
    {

        if(Auth::user()->role == 'user')
        {
            abort(403);
        }
        $start_cov=null;
        $notif=Notification::where('user_id',Auth::id())->get();
        $notif_count=Notification::where('user_id',Auth::id())->where('is_read',0)->get();
        return view('vendor.social-network.index', get_defined_vars());


    }
    public function jqueryLoadMore(Request $request)
    {
        $posts=SocialPost::with('likes','user','comments', 'socialGroup')
                           ->orderBy('id','desc')
                           ->paginate(4);

        if ($request->ajax()) {
            return view('vendor.social-network.ajax.load_posts', get_defined_vars());
        }
        return view('vendor.social-network.index', get_defined_vars());
    }

    public function savePost(Request $request)
    {
        if($request->media_type == null)
        {
            $request->validate([
               'caption'=>'required',
            ]);
        }
        if($request->post_type == 'Resources')
        {
            $request->validate([
               'author'      =>'required',
               'file'        =>'required|mimes:jpeg,png,jpg|max:8192',
               'attachement' =>'required|mimetypes:application/pdf|max:20000',
               'tags'        =>'required',
            ]);
        }
        


        if ($request->hasFile('file'))
        {
           $file = uploadImage($request->file, 'uploads/posts/'.Auth::user()->user_name);
        }

        if ($request->hasFile('attachement'))
        {
           $attachement = uploadImage($request->attachement, 'uploads/posts/pdf/'.Auth::user()->user_name);
        }

        if($request->group_id)
        {
            $get_group_owner = UserSocialGroup::whereId(Crypt::decrypt($request->group_id))->whereUserId(Auth::id())->count();
        }


        if($request->linkPreview)
        {
            $request['caption'] = $request->caption.$request->linkPreview;
        }


        if (isset($request->id))
        {

            $post = SocialPost::findOrFail($request->id);

            $post->update([
                    'caption'           => $request->caption,
                    'file'              => $file ?? $post->file,
                    'media_type'        => $request->media_type,
                    'desc'              => $request->desc,
                    'status'            => $request->post_status ?? 'Public',

                ]);

        }
        else
        {
            $post = SocialPost::create([
                'uuid'                  => uniqid(),
                'caption'               => $request->caption,
                'file'                  => $file ?? NULL,
                'attachement'           => $attachement ?? NULL,
                'user_id'               => Auth::id(),
                'media_type'            => $request->media_type,
                'post_type'             => $request->post_type,
                'desc'                  => $request->desc ?? NULL,
                'author'                => $request->author ?? NULL,
                'status'                => $request->post_status ?? 'Public',
                'user_social_group_id'  => $request->group_id ? Crypt::decrypt($request->group_id) : NULL,
                'is_approved'          => $get_group_owner ?? 0
            ]);
        }


        if($request->tags)
        {

            $mytags = explode(',', $request->tags);

            foreach($mytags as $item)
            {
                SocialPostTag::create([
                    'social_post_id' => $post->id,
                    'title' => $item
                ]);
            }

        }



        #GET TAGS FROM CAPTION OF POST
        preg_match_all('/(?<!\w)#\S+/', $request->caption, $hashtags);

        if($hashtags[0] != null)
        {

            $post->socialPostTags()->delete();

            foreach($hashtags as $tag)
            {
                foreach($tag as $item)
                {
                    SocialPostTag::create([
                        'social_post_id' => $post->id,
                        'title' => $item
                    ]);
                }
            }
        }



        if ($request->id) {
            return redirect()->back()->with('message',$post->post_type.' has been Updated.');

        }else
        {
            return redirect()->back()->with('message',$post->post_type.' has been Saved.');

        }

    }
    public function reaction($id)
    {

        $reaction = SocialPostLike::where('user_id',Auth::id())->where('social_post_id',$id)->first();


        if($reaction)
        {
            $reaction->delete();
        }
        else
        {

            SocialPostLike::create(['user_id' => Auth::Id(),'social_post_id' =>$id]);
        }

        $total_likes = SocialPostLike::where('social_post_id',$id)->get();
        $total_likes=count($total_likes);
        return response()->json(['likes' => $total_likes]);

    }
    public function deltePost($id)
    {
        SocialPost::find($id)->delete();
        return response()->json('delete post');
    }



    public function showSocialPost($id)
    {

        $post = SocialPost::with('likes','user','comments', 'socialGroup')->whereUuid($id)->first();

        if(!$post)
        {
            abort(404);
        }

        return view('vendor.social-network.posts.post_detail', get_defined_vars());

    }



    public function editPost($id)
    {
        $post=SocialPost::with('likes','user','comments')->find($id);
        $post->media_path=asset($post->file);
        return response()->json($post);
    }


    public function changePostStatus(Request $request,$id)
    {
        $post=SocialPost::find($id)->update([
            'status'=>$request->status,
        ]);
        return response()->json($request->status);
    }
    public function createNewAlbum(Request $request)
    {

        if ($request->id) {

            UserSocialAlbums::findOrFail($request->id)->update([
                'user_id'   =>Auth::id(),
                'name'      =>$request->name,
            ]);

        }
        else
        {
            UserSocialAlbums::create([
                'user_id'   =>Auth::id(),
                'name'      =>$request->name,
            ]);
        }

        return response()->json(200);
    }
    public function uploadAlbumPhoto(Request $request)
    {
       if ($request->hasFile('image')) {
            $img=$request->image;

           $val=uploadImage($img,'uploads/img');
       }

        AlbumPhoto::create([
            'album_id'   =>$request->album_id,
            'image'      =>$val??'',
        ]);

        return response()->json(200);
    }
    public function deleteAlbum($id)
    {


        UserSocialAlbums::findOrFail($id)->delete();

        return response()->json(200);
    }
    public function getModelBody()
    {
       return view('vendor.social-network.pages.album_model_body');
    }


}
