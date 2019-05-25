@extends('base.app')


@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@show

@section('title')
    Nous contacter
@endsection

@section('content')

    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Nous contacter ?</h1>
                    <nav class="d-flex align-items-center">
                        <a href="#">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!--================Contact Area =================-->
         @include('partials.contact._contactForm')

    <!--================Contact Area =================-->

@endsection
