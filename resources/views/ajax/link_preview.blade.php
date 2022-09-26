<a href="{{ $req->url }}" target="_blank">
    <div class="card" style="background-color: #F0F2F5;border:1px solid #ccc;box-shadow: none;">
        <div class="card-body p-1">
            <div class="media">
                @if($meta['img'] != '')
                    <img class="mr-1" style="width: 100px;height: 100px; object-fit:cover;" src="{{ $meta['img'] }}" alt="{{ $meta['title'] }}">
                @endif
                <div class="media-body text-dark">
                    <h5 class="mt-0 font-weight-bold">{{ $meta['title'] }}</h5>
                    {{ $meta['description'] }}
                </div>
            </div>
        </div>
    </div>
    
</a>