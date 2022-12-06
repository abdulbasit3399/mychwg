@extends('layouts.front')
@section('title', 'Explore Homeopathy')
@section('content')

@include('front.components.pages_banner', ['heading' => 'Explore Homeopathy', 'description' => 'Explore our resource library and find out about Homeopathy'])








<!--MAIN CONTENT SECTION-->
<section class="content">
    <div id="custom_single_page">

        <!-- Tab panes -->
{{--         <div class="tab-content mt-3">
            @foreach($homeopath_categories as $category)
                <div class="tab-pane container @if($loop->first) active @endif" id="catalog-{{ $category->id }}">
                <div class="container-fluid">
                    <div class="navbar">
                        <ul class="nav nav-tabs tabs2 child-catalog-sections">
                            @foreach($category->homeopathLibraries as $item)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first)  @endif" data-toggle="tab" href="#child-catalog-{{ $item->id }}">{{ $item->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                     </div>
                </div>
                <p>{{ $category->title }}</p>
            </div>
            @endforeach


        </div> --}}
        <div class="container-fluid px-0">
            <div class="row">

                    <div class="col-sm-3">
                        <div class="explore-bar">
                            <div class="sidebar left">


                                    <ul class="list-sidebar bg-defoult">

                                        @foreach($homeopath_categories as $category)
                                            <li style="border-bottom:1px solid;font-size: 15px;">
                                                <a href="#" data-toggle="collapse" data-target="#{{ $category->id }}" area-expanded="true" class="collapsed" >
                                                    <span class="nav-label"> {{ $category->title }} </span>
                                                </a>

                                                <ul class="sub-menu collapse show" id="{{ $category->id }}">
                                                    @foreach($category->homeopathLibraries as $item)
                                                      <li><a href="#" class="btn__library" data-id="{{ $item->id }}">{{ $item->title }}</a></li>
                                                    @endforeach
                                                </ul>

                                            </li>
                                        @endforeach


                                    </ul>
                            </div>

                        </div>
                    </div>

                <div class="col-sm-9">
                    <div class="p-4 append__result"></div>
                </div>


            </div>
        </div>
        <div class="banner-bottom  text-center bg-light">
            <div class="inner">
                <h2>Looking for more information? Join Materia.</h2>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', '.main-catalog a', function(){
            $('.child-catalog-sections').find('.tab-pane').removeClass('active');
            $('.child-catalog-sections').find('.nav-link ').removeClass('active');
        })

        $(document).on('click', '.btn__library', function(e){
               e.preventDefault();
            $id = $(this).data('id');
            $.get("{{ route('explore.homeopathy.detail') }}?id="+$id, function(response){

                $('.append__result').html(response);
            });
        })

        $(document).ready(function(){
            $(".btn__library").first().click();
        })

    </script>
@endsection
