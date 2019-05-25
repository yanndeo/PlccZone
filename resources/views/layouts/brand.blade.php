@extends('base.app')


@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@show

@section('title')
   Tous les fabricants
@endsection

@section('content')





    <div id="">

        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Liste de fabricants .</h1>
                        <nav class="d-flex align-items-center">
                            <a href="{{route('home')}}">Accueil<span class="lnr lnr-arrow-right"></span></a>

                            <a href="#">/  fabricants</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Banner Area -->
        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="blog_details">
                    <a href="#">
                        <h2 class="text-center" style="text-align: justify">PLUS DE {{ $brands->total() }} MARQUES PARTENAIRE <br/>
                            TRIEES SUR LE VOLET</h2>
                    </a>
                    <p>
                        Chez PlccZone, nous fournissons une large gamme de marque de fabricants.
                        Nous sommes specialisé dans la vente et réparation d'articles obsolètes Siemens (S5, S7...), Control Techniques (Altivar, Rectivar ...), Mitsubishi (Freqrol.) mais aussi touts articles courant neuf de chez Allen Bradley, Schneider, Heidenhain, Baumuller, Sick, Hengstler, Euchner, Indramat, et beaucoup plus. Que vous soyez à la recherche de pièces neuves, reconditionnés, d'occasions, réparations ou de support technique, nous sommes là pour vous. Si vous n'êtes pas sûr de la marque de produit dont vous avez besoin ou si vous recherchez une alternative, veuillez nous contacter en fonction de vos besoins et nous serons en mesure d'offrir des produits adaptés à vos spécifications.
                        Tous nos produits et services sont livrés avec une garantie (indiqué sur le devis).
                        N'hésitez pas à nous contacter pour toutes vos demandes ou questions.
                    </p>
                    <a href="#" class="white_bg_btn">Demander votre devis gratuitement </a>
                </div>

                        <div class="row" style="margin-top: 70px">


                            @foreach ($brands as $brand)

                            <div class="col-lg-4" style="margin-bottom: 45px">
                                <div class="categories_post">
                                    <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                                    <div class="categories_details">
                                        <div class="categories_text">
                                            <a href="/fabrican/slug-id">
                                                <h5>{{ $brand->name }}</h5>
                                            </a>
                                            <div class="border_line"></div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach




                        </div>


                {{--paginataion--}}
                <div class="text-center" style="margin-top: 74px">
                    {{ $brands->links() }}

                </div>

            </div>

        </section>


    <!--================Blog Categorie Area =================-->

        <!-- Start related-product Area -->
        <section style="margin-bottom: 100px">
            <div class="container">

            </div>
        </section>

    </div>

@endsection

