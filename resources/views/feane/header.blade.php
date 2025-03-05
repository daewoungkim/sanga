<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="/feane/images/favicon.ico" type="">

    <title> 상아불상 </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/feane/css/bootstrap.css?v={{date('ymdhis')}}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="/feane/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/feane/css/style.css?v={{date('ymdhis')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/feane/css/responsive.css?v={{date('ymdhis')}}" rel="stylesheet" />

</head>

<body style="background: url(/feane/images/sanga-bg.png)">

<!-- jQery -->
<script src="/feane/js/jquery-3.4.1.min.js"></script>
<!-- kakao -->
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
<script>
    Kakao.init('a0b137b7b526d2aa2679330dcae4fcb4');
    Kakao.isInitialized();
</script>
<div class="hero_area">{{--
    <div class="bg-box">
        <img src="/feane/images/sanga-bg.png" alt="">
    </div>--}}
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="/">
                    <img src="/feane/images/logo.png" alt="">
                </a>
                <a class="navbar-brand" style="position: relative;top:-80px;" href="/?topCategory=탱화">
                    탱화
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--
                    <ul class="navbar-nav  mx-auto ">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="book">Book Table</a>
                        </li>
                    </ul>
                    -->

                    <div class="user_option">
{{--                        <a href="" class="user_link">--}}
{{--                            <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--                        </a>--}}

                        <form class="form-inline" onsubmit="return false;">
                            <div class="order_online">
                                <input type="text" onKeyPress="return search(event)" placeholder="검색어를 입력해주세요.">
                            </div>
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="button">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
