<div class="card resource_card rounded-0 mb-1">
    <img src="{{ asset($post->file) }}">
    <div class="card-body text-center">
        <h3 class="font-weight-bold" style="height:70px;overflow:hidden;">{{ $post->caption }}</h3>
        <p class="font-weight-bold">By {{ $post->author }}</p>
        <a href="{{ asset($post->attachement) }}" target="_blank" class="btn__open_resource">
            Open Resource
        </a>

        @if(Auth::id() == $post->user_id)
            @if($post->is_shared == true)
                <a href="{{ route('social.share.resource', base64_encode($post->id)) }}" class="text-danger font-weight-bold"><i class="fas fa-share"></i> Hold the Resource</a>
            @else
                <a href="{{ route('social.share.resource', base64_encode($post->id)) }}" class="text-dark font-weight-bold"><i class="fas fa-share"></i> Share the Resource</a>
            @endif
        @endif
    </div>
</div>
<p class="mt-0 pt-0 font-weight-bold">Pinned from <u>{{ $post->user->name }}</u></p>