<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Espace Client - Osature</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <meta name="msapplication-tap-highlight" content="no">

    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.min.css">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <!-- Header -->     
        <div class="app-header header-shadow">
            @include('client/layouts/header')
        </div>     
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                @include('client/layouts/sidebar')
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                <div class="app-wrapper-footer">
                    @include('client/layouts/footer')
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>