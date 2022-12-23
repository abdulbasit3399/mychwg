<div class="card card_feed_posts">

            <div class="card-header post-timeline-card-header">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="avatar mr-1">
                        <a href="{{ route('social.connection.profile', $post->user->user_name ?? '' ) }}"><img class="profile-avatar-small1" src="{{ asset($post->user->avatar) }}" alt="{{ $post->user->name }}"></a>
                    </div>

                    <div class="user-page-info">
                        <strong class="mb-0 d-block">
                            <a class="post-user-name post-feed-title" href="{{ route('social.connection.profile', $post->user->user_name ?? '' ) }}">{{$post->user->name ?? 'N/A'}}</a>
                                @if($post->user_social_group_id != "")
                                    &#62;
                                    <a href="{{ route('social.group.detail', Crypt::encrypt($post->socialGroup->id)) }}" class="text-dark"> {{ $post->socialGroup->title ?? '' }}</a>
                                @endif
                                @php
                                if($post->shared_from && $post->is_shared):
                                    $orignal_post = \App\Models\SocialPost::find($post->shared_from);
                                @endphp
                                    <span>&nbsp;Shared</span>
                                    <a class="post-user-name post-feed-title" href="{{ route('social.connection.profile', $orignal_post->user->user_name ?? '' ) }}" style="font-size:15px!important">{{$orignal_post->user->name ?? 'N/A'}}</a>
                                    <span>Post</span>
                                @endif
                        </strong>
                        <strong>{{ $post->user->role }}</strong>
                    </div>
                </div>

                    <div class="ellips ml-auto p-0">
                        <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 800;"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if($post->is_shared == true)
                                <a href="{{ route('social.share.resource', base64_encode($post->id)) }}"
                                   class="dropdown-item">
                                   <i class="fas fa-share"></i> Share post
                                </a>
                            @else
                                <a href="{{ route('social.share.resource', base64_encode($post->id)) }}"
                                    class="dropdown-item"><i class="fas fa-share"></i> Share post
                                </a>
                            @endif
                            @if(auth()->user()->id == $post->user_id)
                            <button class="dropdown-item post_delete_btn"
                                    data-url="{{route('social.post.delete',$post->id)}}"
                                    type="button">
                                    <i class="fa fa-trash"></i> Delete
                            </button>
                            @endif
                        </div>
                    </div>
            </div>

            <hr class="m-0">

            <div class="card-body">
                {!! $post->caption !!}
                @if($post->media_type != '')
                    @if($post->media_type=='video')
                        <div class="main-video-post-div showable-video">
                            <video data-type="video" class="video-preview post-timeline-video" controls="" src="{{asset($post->file)}}"  />
                        </div>
                    @else
                        <img data-type="image" class="post-timeline-img media-popup showable-img" src="{{asset($post->file)}}" alt="">
                    @endif
                @endif
                <p>{!! $post->desc??'' !!}</p>
            </div>

            @include('vendor.social-network.ajax.post_reaction')

</div>
