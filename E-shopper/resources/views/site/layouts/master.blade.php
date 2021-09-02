<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('site/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/css/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('site/assets/css/style.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('site/assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('site/assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('site/assets/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('site/assets/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('site/assets/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('site/assets/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('site/assets/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head><!--/head-->
<body>
@include('site.layouts.header')
@yield('content')
@include('site.layouts.footer')
<script src="{{asset('site/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.js')}}"></script>
<script src="{{asset('site/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('site/assets/js/price-range.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('site/assets/js/main.js')}}"></script>
</script><!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "106252541692450");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

@yield('footer_script')

</body>
