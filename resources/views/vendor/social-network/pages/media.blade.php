@include('vendor.social-network.components.social_network_navbar')



<div class="card">

    <div class="card-body">

        <div>

            <h3 class="p-0 m-0  float-left">Media</h3>



            <a href="#" class="float-right p-0 m-0 upload-photo-in-album"><i class="fa fa-upload"></i><span class="font-weight-bold"> Upload</span></a>

            <a href="#" class="float-right p-0 mr-1" data-toggle="modal" data-target="#createNewalbumModal"><i class="fa fa-plus"></i><span class="font-weight-bold"> Create New Album</span></a>

        </div>

    </div>

</div>

<div class="">

    <div class="row">

        @foreach(Auth::user()->userSocialAlbums->sortByDesc('id') as $item)

            <div class="col-md-3">

                <div class="card p-1 text-center">

                    @if($item->albumPhotos->count()>0)

                    <div class="media-album-popup" data-name="{{$item->name}}" data-id="{{$item->id}}">

                        <div style="height:90px;">

                            <img src="{{ asset($item->albumPhotos[0]->image) }}"

                                 class="media-album-popup w-100 cursor-pointer "

                                 style="height:80px;object-fit: cover;"

                                 data-src="{{ asset($item->file) }}"

                                 data-name="{{$item->name}}"

                                 data-id="{{$item->id}}">

                        </div>

                          <h3 class="font-weight-bold">{{$item->name??''}}</h3>



                    </div>

                    @else

                        <span class="" data-name="{{$item->name}}" data-id="{{$item->id}}">

                            <div style="height:90px;">

                                <i class="fa fa-folder" aria-hidden="true"></i>

                            </div>

                            <h3 class="font-weight-bold">{{$item->name??''}}</h3></span>



                    @endif





                </div>

                <div class="row p-0 m-0">

                    <div class="col-md-6 p-0">

                        <button type="button" href="{{route('social.album.delete',$item->id)}}" class="btn btn-danger delete-album-btn btn-block float-left" data-id="{{$item->id}}"><i class="fa fa-trash text-white"></i>

                        </button>



                    </div>

                    <div class="col-md-6 p-0">



                        <button type="button" href="#" class="btn btn-primary btn-block float-rightss edit-album-btn" data-name="{{$item->name}}" data-id="{{$item->id}}"><i class="fa fa-edit text-white"></i>

                        </button>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

