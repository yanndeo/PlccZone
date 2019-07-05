<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ADMIN </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="h-100">

<div class="color-switcher animated">

    <h5> Color</h5>
    <ul class="accent-colors">
        <li class="accent-primary active" data-color="primary">
            <i class="material-icons">check</i>
        </li>
        <li class="accent-secondary" data-color="secondary">
            <i class="material-icons">check</i>
        </li>
        <li class="accent-success" data-color="success">
            <i class="material-icons">check</i>
        </li>
        <li class="accent-info" data-color="info">
            <i class="material-icons">check</i>
        </li>
        <li class="accent-warning" data-color="warning">
            <i class="material-icons">check</i>
        </li>
        <li class="accent-danger" data-color="danger">
            <i class="material-icons">check</i>
        </li>
    </ul>


    <div class="social-wrapper">
        <div class="loading-overlay">
            <div class="spinner"></div>
        </div>
    </div>
    <div class="close">
        <i class="material-icons">close</i>
    </div>
</div>
<div class="color-switcher-toggle animated pulse infinite">
    <i class="material-icons">settings</i>
</div>
<div class="container-fluid">
    <div class="row">

       @yield('content')

    </div>
</div>

<script src="{{mix('js/app.js')}}" ></script>
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="scripts/extras.1.1.0.min.js"></script>
<script src="scripts/shards-dashboards.1.1.0.min.js"></script>
<script src="scripts/app/app-blog-overview.1.1.0.js"></script>
</body>
</html>