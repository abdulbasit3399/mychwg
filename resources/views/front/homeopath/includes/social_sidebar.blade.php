<div class="p-0 m-0" style="border:2px solid #ccc;">
    <div class="row mb-4 mt-5">
             <div class="col-md-12 text-center">
                 <img src="{{ asset($homeopath->avatar??'') }}"  class="profile-avatar mb-1">

                 <h6>{{ $homeopath->name??'' }}</h3>
                 <p class="text-primary">{{ $homeopath->HomeopathProfile->designation??'' }}</p>
             </div>
         </div>
         <hr>
         <div class="row px-3">
             <div class="col-md-3 col-4 p-0 text-center">
                 <p class="font-weight-bold mb-1" style="font-size:18px;">{{$homeopath->socialPosts()->count()}}</p>
                 <p style="font-size: 12px; font-weight:bold">Posts</p>
             </div>
             <div class="col-md-5 col-4 p-0 text-center">
                 <p class="font-weight-bold mb-1" style="font-size:18px;">{{$homeopath->userFollowings()->count()}}</p>
                 <p style="font-size: 12px; font-weight:bold;text-align: center;">Connections</p>
             </div>
             <div class="col-md-3 col-4 p-0 text-center">
                 <p class="font-weight-bold mb-1" style="font-size:18px;">{{$gr->count()}}</p>
                 <p style="font-size: 12px; font-weight:bold">Groups</p>
             </div>
         </div>
     <br><br>
         <div class="row text-center mt-5">
             <div class="col-md-12">
                 <!-- <button class="btn btn-sm text-center btn-primary">connect</button> -->
             </div>
         </div>
</div>
