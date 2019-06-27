@extends('base.app')



@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="">
@show

@section('title')
    Nos Categories
@endsection

@section('content')

<div id="category">


    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1> Trie Par Categorie . </h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{route('home')}}">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">liste de categories</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Filtre par fabricants</div>

                    <ul class="main-categories">
                        @foreach($catSidebar as $cat)
                        <li class="main-nav-list"><a data-toggle="collapse" href="#category{{$cat->id}}" aria-expanded="false" aria-controls="fruitsVegetable"><span
                                        class="lnr lnr-arrow-right"></span>{{ $cat->title }}<span class="number"> ( {{ $cat->brands->count() }})</span></a>


                            <ul class="collapse" id="category{{$cat->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="category{{$cat->id}}">
                                @foreach ($cat->brands as $brand)
                                    <li class="main-nav-list child" ><a href="/fabricant/slug-id" style="color: blue">{{ $brand->name }} <span class="number">({{ $brand->products->count() }})</span></a></li>

                                @endforeach
                            </ul>
                        </li>
                        @endforeach


                    </ul>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->

                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">

                    @foreach($categories as $category)
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="img/product/p6.jpg" alt="">
                                <div class="product-details">
                                    <h6> {{$category->title}}</h6>
                                    <div class="prd-bottom">
                                        <a href="{{ route('show_brands', ['slug'=>$category->slug, 'category'=>$category ]) }} " class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">VOIR PRODUIT</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </div>

                </section>

            <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                {{ $categories->links() }}

                <!-- End Filter Bar -->
            </div>
        </div>
    </div>

    <!-- Start related-product Area -->
    <section style="margin-bottom: 100px">
        <div class="container">

        </div>
    </section>

</div>

@endsection
