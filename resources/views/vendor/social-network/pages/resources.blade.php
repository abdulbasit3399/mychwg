<div class="row">
    <div class="col-lg-12 col-12">
        @include('vendor.social-network.components.social_network_navbar')
            <div class="results" id="results">
                @include('vendor.social-network.ajax.load_posts')
            </div>
    </div>
</div>
