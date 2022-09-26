@extends('layouts.front')
@section('title', 'Payment Succeed')


@section('content')

@include('front.components.pages_banner', ['heading' => '', 'description' => ''])

<!--MAIN CONTENT SECTION-->

<section class="content">
    <div class="container text-center py-3">
        <i class="fas fa-check-circle fa-5x text-success"></i>
        <h1>Thanks for subscribing</h1>
        <h4 class="text-secondary">A payment regarding subscription will appear on your statement.</h4>
        <a href="{{ route('redirect.dashboard') }}"><i class="fas fa-thumbs-up fa-3x"></i></a>
    </div>
</section>


@endsection



@section('js')

@endsection
