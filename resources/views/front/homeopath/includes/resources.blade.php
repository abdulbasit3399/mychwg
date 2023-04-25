<a href="#" class="float-right btn-view-all" data-toggle="modal" data-target="#viewAllResources">View all ></a>
<h4>Resource Materials</h4>

<div class="row text-center mt-4">

     @foreach($homeopath->HomeopathResources->sortByDesc('id') as $item)
      @if($loop->iteration<3)
        <div class="col-md-6 text-center mb-3">
          <div class="card resource_card rounded-0 mb-1">
            <img src="{{ $item->image ?  asset($item->image) : asset('uploads/img/resource.png') }}">
            <div class="card-body text-center">
              <h5 class="font-weight-bold" style="height:60px">{{ Str::limit($item->title, 70) }}</h5>
              <small class="font-weight-bold">By {{ $item->author }}</small>
                {{-- <a href="{{ asset($item->attachment) }}" target="_blank" class="btn__open_resource">
                    Open Resource
                </a> --}}
                @if(isset($item->attachment))
                <a href="{{asset($item->attachment)}}" class="btn-read btn__open_resource">Open Resource</a>
                @endif

                <button type="button" 
                  data-title="{{ $item->title }}" 
                  data-author="{{ $item->author }}" 
                  data-src="{{ $item->image ?  asset($item->image) : asset('uploads/img/resource.png') }}" 
                  data-description="{!! $item->description!!}" 
                  data-pdf="@if(isset($item->attachment)) {{asset($item->attachment)}} @endif"  class="btn-read btn__open_resource d-none">Open Resource
                </button>
                
            </div>
          </div>
        </div>
      @endif
    @endforeach




</div>





<!-- Modal Resource Singal -->
<div class="modal fade bg-dark1" id="viewsingleResource" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-zoom" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-body p-0" style="overflow: auto;overflow-x: hidden;background-color: #F6F6F6;">
            <div class="row p-3" style="background-color: #254A51;color: #fff;">
              <div class="col-sm-9">
                  <div class="media">
                    <img class="mr-4" src="{{ asset($homeopath->avatar) }}" style="width:40px;border-radius: 100px;">
                    <div class="media-body">
                      <h5 class="my-0">{{ $homeopath->name ?? '' }}</h5>
                      <small>Practitioner</small>
                    </div>
                  </div>
              </div>
              <div class="col-sm-3 text-right m-auto">
                <a data-dismiss="modal" aria-label="Close" style="color:#fff;opacity: 0.7;font-weight: bold;cursor: pointer;">View Profile</a>
              </div>
            </div>

            <div class="row p-3" style="height:420px">
              <div class="col-sm-9">
                    <div style="font-weight: 900;font-size: 2.6vw;">"<span id="resource-title"></span>"</div>
                    <div style="opacity: 0.7;font-weight: bold;font-size: 16px;">By <span id="resource-author"></span></div>
                      <div class="mt-3" id="resource-description"></div>
                      <a href="" id="pdf" target="_blank" class="btn rounded-0 px-3 py-2" style="position:absolute;bottom: 0;background-color: #E5BCB3;color: #fff;">Read Now</a>
              </div>

              <div class="col-sm-3 px-4 m-auto">
                  <img id="resource_image" src="" style="width:100%;object-fit: cover;box-shadow: 15px 0px 0px -9px rgba(115,115,115,1);-webkit-box-shadow: 15px 0px 0px -9px rgba(115,115,115,1);-moz-box-shadow: 15px 0px 0px -9px rgba(115,115,115,1);">
              </div>

            </div>
              
        </div>
      </div>
    </div>
  </div>



  <!-- Modal All Resources -->
<div class="modal fade" id="viewAllResources" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-zoom" role="document">
      <div class="modal-content">
        <div class="modal-header p-2">
          <h5 class="modal-title" id="exampleModalLongTitle">Resource Materials</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="row text-center profile-services">
                      @foreach($homeopath->HomeopathResources->sortByDesc('id') as $item)
                          <div class="col-sm-3 mb-4">
                              <div class="position-relative mb-4">
                                  @if($item->image)
                                    <img src="{{ asset($item->image) }}" style="width: 100%;height: 230px;object-fit: cover;border-radius: 5px;" title="{{ Str::limit($item->title,30)}}">
                                  @else
                                    <img src="{{ asset('uploads/img/resource.png') }}" style="width: 100%;height: 230px;object-fit: cover;border-radius: 5px;">

                                  @endif
                              </div>
                              @if(isset($item->attachment))
                              <a href="{{asset($item->attachment)}}" target="_blank" class="btn rounded-0 px-3 py-2" style="bottom: 0;background-color: #E5BCB3;color: #fff;">Open Resource</a>
                              @endif
                              {{-- <button type="button" data-title="{{ $item->title }}" 
                              data-src="{{ $item->image ?  asset($item->image) : asset('uploads/img/resource.png') }}"
                              data-pdf="@if(isset($item->attachment)) {{asset($item->attachment)}} @endif" 
                              data-description="{{ $item->description }}" class="btn-read">Open Resource</button> --}}
                          </div>
                      @endforeach
              </div>
        </div>
      </div>
    </div>
  </div>

