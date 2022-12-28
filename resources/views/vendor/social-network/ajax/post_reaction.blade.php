<div class="card-footer bg-white post-actions">
    <div class="row text-center">
        <input type="hidden" class="social_post_id" value="{{$post->id}}">
        <div class="col-sm-6 col-md-4 col-lg-4 col-4 post-action-btns">
            @if(count($post->likes)>0)
                <a class="text-dark like-btn"><i class="fas fa-heart text-danger"></i> Like <span class="total-likes">{{count($post->likes)}}</span></a></a>
            @else
                <a class="text-dark like-btn"><i class="fas fa-heart"></i> Like <span class="total-likes">{{count($post->likes)}}</span></a></a>
            @endif
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-4 post-action-btns">
            <a href="##" class="text-dark comment-btn"><i class="far fa-comments"></i> Comment</a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-4">
            {{--  <a href="##" class="text-dark comment-btn">  --}}
            <i class="fas fa-save fa-1x btnSavePostInFolder" data-post-id="{{ $post->id }}" title="Save post">
            </i>
            <small>Save</small>

            {{--  </a>  --}}
        </div>

        <div class="col-md-12 comments-div border-top mt-2">

            <div class="card pt-0 mb-0">
                <div class="card-body pt-0">
                    <div class="row comments-row text-left">
                        @include('vendor.social-network.ajax.comments',['comments'=>$post->comments,'post_id'=>$post->id])
                    </div>

                </div>

            </div>


            <!---=============================================-->
                            <!--COMMENT FORM-->
            <!---=============================================-->

            <form action="{{route('social.save.comment')}}" class="comment-form" method="post" enctype="multipart/form-data">
                @csrf
                <input class="parent_post_id" type="hidden" value="{{$post->id}}" name="parent_post_id">
                <input class="comment_id" type="hidden" value="" name="parent_comment_id">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="media px-2">
                            <img class="m-auto profile-avatar-extra-small" src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                            <div class="media-body">
                                <input type="text" class="form-control comment-input" name="comment" required="" placeholder="Write here comment...">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!---=============================================-->
                            <!--END COMMENT FORM-->
            <!---=============================================-->


        </div>

    </div>
</div>
