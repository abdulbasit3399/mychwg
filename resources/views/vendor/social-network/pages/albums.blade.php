@php($albums = Auth::user()->userSocialAlbums->sortByDesc('id'))
@php($albums_count = count($albums))
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    {{-- @if($albums_count>1)
        <ul class="carousel-indicators">
            @foreach ($albums as $key=>$item)
                 <li data-target="#demo" data-slide-to="{{$key}}" class="<?= ($key == 0) ? 'active' : '' ?>"></li>
            @endforeach
        </ul>
    @endif --}}

    <!-- The slideshow -->
    <div class="carousel-inner">
        @foreach($albums as $key=>$item)
        @if(count($item->albumPhotos) >0)
        <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
            <img  src="{{ asset($item->albumPhotos[0]->image) }}"
                 class="media-album-popup w-100 cursor-pointer mb-1"
                 style="object-fit: cover;max-height: 270px;"
                 data-id="{{$item->id}}">
        </div>
        @endif
        @endforeach
    </div>
    
    @if($albums_count>1)
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    @endif

</div>

<script>
    var photo_count = '{{$albums_count}}';
    if(photo_count==0){
        $('.photo-aslbum .card').first().addClass('d-none')
    }
</script>
{{--@foreach(Auth::user()->userSocialAlbums->sortByDesc('id') as $item)--}}
{{--<div class="col-md-12 p-0">--}}
{{--    @if($item->albumPhotos->count()>0)--}}



{{--    <div>--}}
{{--        <img src="{{ asset($item->albumPhotos[0]->image) }}"--}}
{{--            class="media-album-popup w-100 cursor-pointer mb-1"--}}
{{--            style="height:70px;object-fit: cover;"--}}
{{--            data-name="{{$item->name}}"--}}
{{--            data-id="{{$item->id}}">--}}
{{--    </div>--}}
{{--    @endif--}}
{{--</div>--}}
{{--@if($loop->iteration > 3)--}}
{{--<div class="col-md-12 main-clickable-links">--}}
{{--    <a data-page="media" class=" btn-social-dark">View more albums</a>--}}
{{--</div>--}}
{{--@break--}}
{{--@endif--}}
{{--@endforeach--}}
