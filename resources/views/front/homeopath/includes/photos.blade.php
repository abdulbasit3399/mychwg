@if(count($homeopath->HomeopathImages)>0)
<div class="clearfix">
       <div class="float-left">
             <h4 class="mt-4">Photos</h4>
       </div>
       {{-- <div class="float-right">
           <a class="float-right btn-view-all mt-4"  data-toggle="modal" data-target="#viewAllPhotos">View all ></a>
       </div> --}}
   </div>

       <div class="row mt-2 slick_autoplay ml-4 mr-4">
           @foreach($homeopath->HomeopathImages as $image)
               <div class="col-sm-3 showImage p-0 mx-1 "  data-count="{{$loop->iteration}}" data-toggle="modal" data-target="#viewOnePhoto">
                   <img data-toggle="" src="{{ asset($image->image) }}" >
               </div>
           @endforeach
       </div>

@endif
{{-- MODAL PHOTOS --}}
<div class="modal fade" id="viewAllPhotos" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header p-2">
         <h5 class="modal-title" id="exampleModalLongTitle">Photos</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

           <div class="row">
               @foreach($homeopath->HomeopathImages as $image)
                 <div class="col-sm-3 mb-3 mag">
                    <img data-toggle=""  src="{{ asset($image->image) }}">
                 </div>
               @endforeach
           </div>

       </div>
     </div>
   </div>
 </div>

 {{-- MODAL PHOTOS --}}




<!-- Modal Resource Singal -->
<div class="modal fade" id="viewOnePhoto" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-zoom" role="document">
     <div class="modal-content">
       <div class="modal-body" >

           {{-- <div class="row p-3" style="background-color: #254A51;color: #fff;">
             <div class="col-sm-9">
                 <div class="media">
                   <img class="mr-4" src="{{ asset($homeopath->avatar) }}" style="width:40px;border-radius: 100px;height: 40px;">
                   <div class="media-body">
                     <h5 class="my-0">{{ $homeopath->name ?? '' }}</h5>
                     <small>Practitioner</small>
                   </div>
                 </div>
             </div>
             <div class="col-sm-3 text-right m-auto">
               <a data-dismiss="modal" aria-label="Close" style="color:#fff;opacity: 0.7;font-weight: bold;cursor: pointer;">View Profile</a>
             </div>
           </div> --}}

            <div id="carouselExampleControls" class="carousel slide w-100" style="box-shadow: none !important;background: #ddd;" data-ride="carousel">
               <div class="carousel-inner py-2">
                   @foreach($homeopath->HomeopathImages as $image)
                   <div class="carousel-item {{$loop->iteration}} mag" >
                       <img class="d-block w-100 " data-toggle="" src="{{ asset($image->image) }}" style="object-fit:contain">
                   </div>
                   @endforeach


               </div>
               <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
               </a>
           </div>

       </div>
     </div>
   </div>
 </div>



