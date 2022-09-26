<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\SocialPost;
use App\Models\User;
use App\Models\UserSocialGroup;
use App\Models\Following;
use App\Models\SocialPostTag;
use App\Models\HomeopathImage;
use App\Models\UserFolder;
use App\Models\SavedPost;
use Auth;
use Crypt;

class SavedPostController extends Controller
{
    public function createCategoryFolder(Request $req)
    {
        $req->validate([
            'title' => 'required'
        ]);

        Auth::user()->folders()->create(['title' => $req->title]);
        return back()->with('p', 'articles');


    }

    public function saveCategoryPost(Request $req)
    {
        $req->validate([
            'social_post_id' => 'required',
            'user_folder_id' => 'required'
        ]);

        $saved = SavedPost::whereSocialPostId($req->social_post_id)->whereUserFolderId($req->user_folder_id)->count();
        if($saved < 1)
        {
            SavedPost::create([
                'user_id' => Auth::id(),
                'user_folder_id' => $req->user_folder_id,
                'social_post_id' => $req->social_post_id,
            ]);
        }
        return back()->withMessage('Post has been saved to folder.');

    }

    public function getSavedPosts($id)
    {
        $posts = SavedPost::with('post')->whereUserId(Auth::id())->whereUserFolderId(Crypt::decrypt($id))->orderBy('id', 'DESC')->get();
        return view('vendor.social-network.pages.saved_posts.index', get_defined_vars());
    }


}
