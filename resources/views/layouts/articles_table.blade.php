@extends('base.app')



@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@show

@section('title')
    Nos Produits
@endsection
@section('addLinksheet')
    <link rel="stylesheet" href="https://npmcdn.com/react-bootstrap-table/dist/react-bootstrap-table-all.min.css">

@endsection
@section('content')

<div id="category">

    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1> Liste  </h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{route('home')}}">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Articles</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div id="table">
        </div>
    </div>

    <!-- Start related-product Area -->
    <section style="margin-bottom: 100px">
        <div class="container">

        </div>
    </section>

</div>

@endsection




@section('addScript')

@endsection
