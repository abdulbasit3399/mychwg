@forelse($posts as $item)
        @if($loop->first)<div class="row res-card-row">@endif
            <div class="col-md-4">
                <div class="card">
                                <div class="card-header post-timeline-card-header">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="avatar mr-1">
                        <a href="{{ route('social.connection.profile', $item->post->user->user_name ?? '' ) }}"><img class="profile-avatar-small1" src="{{ asset($item->post->user->avatar) }}" alt="{{ $item->post->user->name }}"></a>
                    </div>

                    <div class="user-page-info">
                        <strong class="mb-0 d-block">
                            <a class="post-user-name" href="{{ route('social.connection.profile', $item->post->user->user_name ?? '' ) }}">{{$item->post->user->name ?? 'N/A'}}</a>

                                @if($item->post->user_social_group_id != "")
                                    &#62;
                                    <a href="{{ route('social.group.detail', Crypt::encrypt($item->post->socialGroup->id)) }}" class="text-dark"> {{ $item->post->socialGroup->title ?? '' }}</a>
                                @endif
                        </strong>
                        <span class="font-small-2"><span class="font-weight-bold">{{$item->post->user->role }}</span> | {{\Carbon\Carbon::createFromTimeStamp(strtotime($item->post->created_at))->diffForHumans()}}</span>
                        <br>
                    </div>
                </div>

                @if(Auth::id() == $item->post->user_id)
                    <div class="ellips ml-auto p-0">
                        <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 800;"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item post_delete_btn" data-url="{{route('social.post.delete',$item->post->id)}}" type="button"><i class="fa fa-trash mr-1"></i>Delete</button>
                            <button class="dropdown-item post_edit_btn" data-url="{{route('social.post.edit',$item->post->id)}}" type="button"><i class="fa fa-edit mr-1"></i>Edit</button>

                            <button  class="dropdown-item post_status_change_btn" data-url="{{route('social.post.change.status',$item->post->id)}}" data-status="@if($item->post->status=='Public') Private @else Public @endif" type="button"><i class="fa fa-check mr-1"></i>
                                    @if($item->post->status=='Public') Private @else Public @endif
                            </button>
                        </div>
                    </div>
                @endif



            </div>

                        <hr class="m-0">
            <div class="card-body">
                <h4 class="caption-paragraph">{{$item->post->caption}}</h4>
                <small>{{\Carbon\Carbon::parse($item->post->created_at)->format('j F, Y')}}</small>
                @if($item->post->media_type != '')

                    @if($item->post->media_type=='video')

                        <div class="main-video-post-div showable-video">
                            <video data-type="video" class="video-preview post-timeline-video" controls="" src="{{asset($item->post->file)}}"  />
                        </div>


                    @else
                        <img data-type="image" class="post-timeline-img media-popup showable-img" src="{{asset($item->post->file)}}" alt="">
                    @endif

                @endif
                <p>{!! $item->post->desc??'' !!}</p>

            </div>

                </div>
            </div>
        @if($loop->last)</div>@endif

    @empty
        <h3 class="alert alert-warning text-center">No saved post in this folder available right now.</h3>
    @endforelse
