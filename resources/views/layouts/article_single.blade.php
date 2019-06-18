@extends('base.app')

@section('meta')
    <meta name="description" content="article {{ $product->name }} ">
    <meta name="keywords" content="">
@show

@section('title')
    {{ $product->name }}
@endsection

@section('content')


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Article Details </h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{route('home')}}">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{route('articles')}}">Liste<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#"> {{ ($product->name) }} </a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{asset('img/category/s-p1.jpg')}}" alt="" />
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{asset('img/category/s-p1.jpg')}}" alt="" />
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{asset('img/category/s-p1.jpg')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3> {{ $product->name }} </h3>

                        <h2>  {{ $product->reference }}</h2>

                        <ul class="list">
                            <li><a class="active" href="#"><span>Categorie</span> : {{ $product->category_title }} </a></li>
                            <li><a href="#"><span>Disponibilité : </span> {{ $product->availability }}
                                </a>
                            </li>
                        </ul>

                        <p>
                            {{ str_limit($product->description,280, '...') }}
                        </p>
                        <div class="product_count">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Spécification du produit </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                       aria-selected="false">Dévis spécifique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Mode de payement</a>
                </li>
            </ul>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>
                        {{ $product->description }}
                    </p>
                </div>


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <h5>État du produit</h5>
                                </td>
                                <td>
                                    <h5> {{ $product->state }} </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Largeur</h5>
                                </td>
                                <td>
                                    <h5>{{ $product->width }} cm </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Hauteur</h5>
                                </td>
                                <td>
                                    <h5> {{ $product->heigth }} cm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5> surface </h5>
                                </td>
                                <td>
                                    <h5> {{ $product->surface }} m2</h5>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="review_box" id="devis_form" data-namepb="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="order_box">
                                <h2> Nos moyens de payements </h2>

                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" name="selector"/>
                                        <label for="f-option5">Check payments</label>
                                        <div class="check"></div>
                                    </div>
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                        Store Postcode.</p>
                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="selector"/>
                                        <label for="f-option6">Paypal </label>
                                        <img src="{{asset('img/product/card.jpg')}}" alt=""/>
                                        <div class="check"></div>
                                    </div>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                </div>
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector"/>
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
