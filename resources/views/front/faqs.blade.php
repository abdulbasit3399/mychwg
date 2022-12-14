@extends('layouts.front')

@section('title', 'Faqs')



@section('meta')

    <meta name="keywords" content="Faqs">

    <meta name="description" content="Go below if you have any query or an issues with CHWG.">

@endsection



@section('content')





@include('front.components.pages_banner', ['heading' => 'FAQ', 'description' => 'Frequently Asked Questions'])







<section class="section-padding">

    <div class="container">

        <div id="accordion">

            @foreach($faqs as $faq)

            <div class="card card-site mb-3 mt-3">

                <div class="card-header bg-dark" id="headingTwo">

                    <h5 class="mb-0 text-white" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseOne">

                        {{ $faq->question }}

                    </h5>

                </div>



                <div id="collapse-{{ $loop->iteration }}" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">

                    <div class="card-body">

                       {!! $faq->answer !!}

                   </div>

               </div>

           </div>

           @endforeach

   </div>

</div>

</section>







@endsection







@section('js')



@endsection

