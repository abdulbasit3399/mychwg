@if(isset($req->p) && $req->p == 'resources')
	
	<div class="row res-card-row">
		@foreach($posts as $post)
			
			@if($post->file != null)
			<div class="col-md-4 text-center ">				
	        	@include('vendor.social-network.pages.resources.resource_card')
		    </div>
		    @endif
		@endforeach
	</div>

@else
	@foreach($posts as $post)

		@if($loop->first)<div class="row res-card-row">@endif
			<div class="col-md-12">
				@if($post->post_type == 'Resources')
				    @include('vendor.social-network.ajax.load_social_resource')

				@else($post->post_type == 'News')
				    @include('vendor.social-network.ajax.load_social_post')
				@endif
		    </div>
		@if($loop->last)</div>@endif

	@endforeach

@endif


