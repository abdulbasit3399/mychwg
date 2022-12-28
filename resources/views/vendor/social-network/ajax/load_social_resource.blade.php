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
                <span>Resource</span>
            @endif
        </strong>
        <strong>{{ $post->user->role }}</strong>
      </div>
    </div>

    @if(Auth::id() == $post->user_id)
    <div class="ellips ml-auto p-0">
      <i class="fa fa-ellipsis-v fa-1x"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 800;"></i>
      <div class="dropdown-menu dropdown-menu-right">
        @if($post->is_shared == true)
            <a href="{{ route('social.share.resource', base64_encode($post->id)) }}"
                class="dropdown-item">
                <i class="fas fa-share"></i> Share
            </a>
        @else
            <a href="{{ route('social.share.resource', base64_encode($post->id)) }}"
                class="dropdown-item"><i class="fas fa-share"></i> Share
            </a>
        @endif

        <button class="dropdown-item " id="pdf" class="cpy" href="@if(isset($post->attachement)) {{asset($post->attachement)}} @endif" type="button" data-pdf="@if(isset($post->attachement)) {{asset($post->attachement)}} @endif" onclick="copyToClipboard(this)">
          <i class="fa fa-copy mr-1"></i>Copy
        </button>

        <button class="dropdown-item post_delete_btn" data-url="{{route('social.post.delete',$post->id)}}" type="button"><i class="fa fa-trash mr-1"></i>Delete</button>
      </div>
    </div>
    @endif



  </div>

  <hr class="m-0">
  <div class="card-body">
    {!! $post->caption !!}

    <div class="card" style="background-color: #F0F2F5;border:1px solid #ccc;box-shadow: none;">
      <div class="card-body p-1">
        <div class="media">
          <img class="mr-1" style="width: 100px;height: 100px; object-fit:cover;" src="{{ asset($post->file) }}">
          <div class="media-body text-dark">
            <h5 class="mt-0 font-weight-bold">{{ $post->caption }}</h5>
              {{-- <a href="{{ asset($post->attachement) }}" target="_blank" class="btn__open_resource w-50 text-center">
                  Open Resource
                </a> --}}
            <button type="button" class="btn__open_resource btn-read w-50 text-center" style="border: none;"
              data-title="{{ $post->caption }}"
              data-author="{{ $post->user->name }}"
              data-author_image="{{ $post->user->avatar }}"
              data-src="{{ $post->file ?  asset($post->file) : asset('uploads/img/resource.png') }}"
              data-description="{{ $post->desc }}"
              data-pdf="@if(isset($post->attachement)) {{asset($post->attachement)}} @endif"
              >
                  Open Resource
                </button>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>


