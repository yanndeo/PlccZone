@extends('base.adm')

@section('content')

    @include('partials/admin/_aside')
    <!-- End Main Sidebar -->
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

        @include('partials/admin/_notifications')
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                    @if (session('status'))
                        <span class="text-uppercase page-subtitle">
                        {{ session('status') }}
                    </span>
                    @endif
                        You are logged in!
                        <h3 class="page-title">Dashboard</h3>
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
           @include('partials/admin/_blocs')
            <!-- End Small Stats Blocks -->


            <div class="row" id="main-admin-ui">
                <!-- DataTable -->



                <!-- BrandList -->



                <!-- Category-form -->



                <!-- Category-list -->

            </div>





        </div>


        <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
            </span>
        </footer>
    </main>







@endsection
