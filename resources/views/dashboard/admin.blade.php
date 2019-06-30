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


            <div class="row">


                <!-- Users Stats -->
                <div class="col-lg-9 col-md-12 col-sm-12 mb-4">

                    <div class="card card-small">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Articles </h6>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Name</th>
                                    <th scope="col" class="border-0">Qte </th>
                                    <th scope="col" class="border-0">Category</th>
                                    <th scope="col" class="border-0">Brand</th>
                                    <th scope="col" class="border-0">Ref</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ali</td>
                                    <td>Kerry</td>
                                    <td>Russian Federation</td>
                                    <td>Gdańsk</td>
                                    <td>107-0339</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Clark</td>
                                    <td>Angela</td>
                                    <td>Estonia</td>
                                    <td>Borghetto di Vara</td>
                                    <td>1-660-850-1647</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Clark</td>
                                    <td>Angela</td>
                                    <td>Estonia</td>
                                    <td>Borghetto di Vara</td>
                                    <td>1-660-850-1647</td>
                                </tr><tr>
                                    <td>2</td>
                                    <td>Clark</td>
                                    <td>Angela</td>
                                    <td>Estonia</td>
                                    <td>Borghetto di Vara</td>
                                    <td>1-660-850-1647</td>
                                </tr><tr>
                                    <td>2</td>
                                    <td>Clark</td>
                                    <td>Angela</td>
                                    <td>Estonia</td>
                                    <td>Borghetto di Vara</td>
                                    <td>1-660-850-1647</td>
                                </tr><tr>
                                    <td>2</td>
                                    <td>Clark</td>
                                    <td>Angela</td>
                                    <td>Estonia</td>
                                    <td>Borghetto di Vara</td>
                                    <td>1-660-850-1647</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Jerry</td>
                                    <td>Nathan</td>
                                    <td>Cyprus</td>
                                    <td>Braunau am Inn</td>
                                    <td>214-4225</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Colt</td>
                                    <td>Angela</td>
                                    <td>Liberia</td>
                                    <td>Bad Hersfeld</td>
                                    <td>1-848-473-7416</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="card-footer border-top">
                            <div class="row">
                                <div class="col">
                                    <select class="custom-select custom-select-sm">
                                        <option selected>Last Week</option>
                                        <option value="1">Today</option>
                                        <option value="2">Last Month</option>
                                        <option value="3">Last Year</option>
                                    </select>
                                </div>
                                <div class="col text-right view-report">
                                    <a href="#">Full report &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>





                <!-- End Users Stats -->
                <!-- Users By Device Stats -->
                <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Brands List</h6>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-small list-group-flush">
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">GitHub</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">19,291</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Stack Overflow</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Hacker News</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Reddit</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">The Next Web</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Tech Crunch</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">YouTube</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Adobe</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>


                <!-- End Users By Device Stats -->
                <!-- New Draft Component -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <!-- Quick Post -->
                    <div class="card card-small h-100">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">CATEGORY</h6>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <form class="quick-post-form">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brave New World"> </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Words can be like X-rays if you use them properly..."></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-accent">SAVE  </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Quick Post -->
                </div>
                <!-- End New Draft Component -->



                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <!-- Quick Post -->
                    <div class="card card-small h-100">
                        <div class="card-header border-bottom">
                            <h6 class="m-0"> BRAND</h6>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <form class="quick-post-form">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brave New World"> </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Words can be like X-rays if you use them properly..."></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-accent">SAVE </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Quick Post -->
                </div>

                <!-- End Discussions Component -->
                <!-- Top Referrals Component -->
                <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Category List</h6>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-small list-group-flush">
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">GitHub</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">19,291</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Stack Overflow</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Hacker News</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Reddit</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">The Next Web</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Tech Crunch</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">YouTube</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <span class="text-semibold text-fiord-blue">Adobe</span>
                                    <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- End Top Referrals Component -->
            </div>
        </div>


        <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
            </span>
        </footer>
    </main>







@endsection
