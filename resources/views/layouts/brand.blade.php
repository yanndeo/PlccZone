@extends('base.app')


@section('meta')
    <meta name="description" content=" Liste de categories dont les le fabricant est ">
    <meta name="keywords" content=" liste , categories, fabricant , manifactures ">
@show

@section('title')
    {{ $brand->name }}
@endsection

@section('content')




    <div id="{{ $brand->id }}">

        <section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>{{ $brand->name }} .</h1>
                        <nav class="d-flex align-items-center">
                            <a href="#">  Fabricant <span class="lnr lnr-arrow-right"></span></a>

                            <a href="#">/  Categories associées </a>
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
                        <h2 class="text-center" style="text-align: justify">PLUS D'UNE CENTAINES D'ARTICLE DE CHOIX   <br/>
                            GROUPÉS DANS {{ $categories->count() }} CATEGORIES</h2>
                    </a><br/><br/>
                    <p>
                        {{ $brand->comment }}
                    </p>
                    <a href="#" class="white_bg_btn">Je demande un devis immediatement </a>
                </div>



                <div class="row" style="margin-top: 70px">

                    @foreach ($categories as $category)

                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="/img/product/p3.jpg">
                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">{{ $category->title }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach


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

