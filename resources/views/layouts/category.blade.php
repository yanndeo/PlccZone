@extends('base.app')


@section('meta')
    <meta name="description" content="liste des fabricants de la categorie"  >
    <meta name="keywords" content="liste ,fabricants , de la , categories, manufacure , maroc , leader ">
@show

@section('title')
    {{ $category->title }}
@endsection

@section('content')





    <div id="">

        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1> {{$category->title }}.</h1>
                        <nav class="d-flex align-items-center">
                            <a href="#">Categorie<span class="lnr lnr-arrow-right"></span></a>

                            <a href="#">/  Liste de fabricants</a>
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
                        <h2 class="text-center" style="text-align: justify"> @if($brands->count() > 0) Environ {{ $brands->count() }} fabricants différents @else Aucun fabricant rattaché , pour l'heure. @endif   <br/>
                            associés</h2>
                    </a>
                    <p>
                        {{ $category->description }}
                    </p>
                    <a href="#" class="white_bg_btn">Je voudrais un devis .. </a>
                </div>

                <div class="row" style="margin-top: 70px">

                @if($brands->count() > 0)
                    @foreach ($brands as $brand)

                        <div class="col-lg-4" style="margin-bottom: 45px">
                            <div class="categories_post">
                                <img src="/img/blog/cat-post/cat-post-3.jpg" alt="post">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <a href="#">
                                            <h5>{{ $brand->name }}</h5>
                                        </a>
                                        <div class="border_line"></div>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif




                </div>


                {{--paginataion--}}
                <div class="text-center" style="margin-top: 74px">
{{--
                    {{ $brands->links() }}
--}}

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

