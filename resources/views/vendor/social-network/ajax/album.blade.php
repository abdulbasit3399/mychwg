{{--<div class="row">--}}
{{--    @foreach($photos as $item)--}}
{{--        <div class="col-lg-4 mb-3">--}}
{{--            <img src="{{ asset($item->image) }}" class="media-popup w-100">--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}


<div id="demo1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    @if(count($photos)>1)
        <ul class="carousel-indicators">
            @foreach($photos as $key=>$item)
                    <li data-target="#demo1" data-slide-to="{{$key}}" class=" <?= ($key == 0) ? 'active' : '' ?>"></li>
             @endforeach

        </ul>
    @endif


    <!-- The slideshow -->
    <div class="carousel-inner">
        @foreach($photos as $key=>$item)
            <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
                <img  src="{{ asset($item->image) }}"
                      class="w-100 cursor-pointer mb-1"
                      style="object-fit: cover;"
                      data-id="{{$item->id}}">
            </div>
        @endforeach
    </div>
    @if(count($photos)>1)
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo1" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo1" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    @endif

</div>
