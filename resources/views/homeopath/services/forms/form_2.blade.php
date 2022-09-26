<div class="col-lg-6 mb-3">

    <div class="card mt-5">

        <h5 class="m-0"><span class="text-white bg-info p-1 d-block">Form # 2</span></h5>

        <div class="card-body">

            

            @if($service->child_service_document != null)

            <a href="{{ asset($service->child_service_document ?? '') }}" target="_blank" class="btn btn-dark btn-block">View Uploaded Form</a>

            <a

                href="{{ route('homeopath.settings.service.document.remove',

                ['form' => 2 ,'service' => base64_encode($service->id) ]) }}"

                class="btn btn-danger btn-block mt-2 alert-confirm">

                Remove this Document

            </a>

            @else

                <form method="POST" action="{{ route('homeopath.settings.update.images') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row main-item-images">



                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 mb-2">



                            <input type="file" name="pdf" class="form-control mt-2" data-default-file="" data-allowed-file-extensions="pdf">

                            <input type="hidden" name="age_type" value="inner_doc">

                            <input type="hidden" name="service_id" value="{{$service->id}}">

                            <label class="mt-2">Title of Document</label>

                            <input type="text" class="form-control" name="service_document_inner_heading" value="{{ $service->service_document_inner_heading ?? '' }}" >



                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-right">



                            <button type="submit" class="btn btn-success" href="#">Update Document</button>

                        </div>





                    </div>



                </form>

            @endif

            

        </div>

    </div>

</div>



