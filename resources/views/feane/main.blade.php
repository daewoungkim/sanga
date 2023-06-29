@include('feane.header')

@if (!request()->has('cate') && !request()->has('keyword'))
<!-- slider section -->
<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 " style="margin:auto;">
                            <div class="detail-box">
                                <div class="img-box">
                                    <img src="/feane/images/carousel_05.jpg" alt="" data-href="?keyword=--">
                                </div>
                                {{--<h1>
                                    Fast Food Restaurant
                                </h1>
                                <p>
                                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                </p>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Order Now
                                    </a>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>

</section>
<!-- end slider section -->
@endif

<!-- food section -->
<section class="food_section layout_padding-bottom">
    <div class="container">
        {{--<div class="heading_container heading_center" style="margin-top:30px;">
            <h2>
                Our Menu
            </h2>
        </div>--}}

        <ul class="filters_menu">
            <li @if (!request()->has('cate') && !request()->has('keyword')) class="active" @endif data-filter="">All</li>
            <li @if (request()->has('cate') && request()->cate == 'new') class="active" @endif data-filter="new"><span style="color:red;">신제품<span></li>
            <li @if (request()->has('cate') && request()->cate == '전기인등') class="active" @endif data-filter="전기인등">전기인등</li>
            <li @if (request()->keyword == '삼베칠보') class="active" @endif data-filter="삼베칠보">삼베칠보</li>
            <li @if (request()->has('cate') && request()->cate == '부처님') class="active" @endif data-filter="부처님">부처님</li>
            <li @if (request()->has('cate') && request()->cate == '산신') class="active" @endif data-filter="산신">산신</li>
            <li @if (request()->has('cate') && request()->cate == '용왕/옥황') class="active" @endif data-filter="용왕/옥황">용왕/옥황</li>
            <li @if (request()->has('cate') && request()->cate == '장군') class="active" @endif data-filter="장군">장군</li>
            <li @if (request()->has('cate') && request()->cate == '대신/불사/궁대신') class="active" @endif data-filter="대신/불사/궁대신">대신/불사/궁대신</li>
            <li @if (request()->has('cate') && request()->cate == '도사/글문') class="active" @endif data-filter="도사/글문">도사/글문</li>
            <li @if (request()->has('cate') && request()->cate == '동자류') class="active" @endif data-filter="동자류">동자류</li>
            <li @if (request()->has('cate') && request()->cate == '선녀') class="active" @endif data-filter="선녀">선녀</li>
            <li @if (request()->has('cate') && request()->cate == '탱화') class="active" @endif data-filter="탱화">탱화</li>
            <li @if (request()->has('cate') && request()->cate == '기타') class="active" @endif data-filter="기타">기타</li>
        </ul>

        @if (request()->has('cate'))
            @if (count($cate2) > 0)
            <div style="margin:auto;width:100%;text-align:center;font-weight:bold;padding-top:60px;"><span>치수</span></div>
            @endif
        <ul class="filters_detail_menu">
            @foreach ($cate2 as $cate_detail)
            <li @if (request()->has('cate2') && request()->cate2 == $cate_detail->size3) class="active" @endif data-filter="{{$cate_detail->size3}}">{{$cate_detail->size3}}</li>
            @endforeach
        </ul>
        @endif

        <div class="filters-content">
            <div class="row grid" id="goods-list-box">
                @foreach ($items as $item)
                    <div class="col-6 all {{ $item->category }}">
                        <a href="/about/{{ $item->id }}">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="http://sanga.fof.kr/thumb/{{ $item->file_name }}" loading="lazy" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <div style="padding-bottom:15px;">
                                            <h5>{{ $item->size3 }} {{ $item->name }}</h5>
                                        </div>
                                        <div style="color:#bebebe;">
                                            <h6>Code : {{ $item->code2 }}</h6>
                                        </div>
                                        <p>Size : {{ $item->size }}<br>{{ $item->size2 }}</p>
                                        @if ($item->category == '전기인등')
                                        <p>Category : {{ $item->category }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="btn-box">
{{--            <div href="" id="btn-more-item">--}}
{{--                View More--}}
{{--            </div>--}}

            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    @if ($pageInfo['page'] == 1 && ($pageInfo['totPage'] / 16) <= $pageInfo['page'])
                        <li class="page-item active"><a class="page-link">{{$pageInfo['page']}} <span class="sr-only">(current)</span></a></li>
                    @elseif ($pageInfo['page'] == 1)
                        <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']-1}}{{$queryString}}">이전</a></li>
                        <li class="page-item active"><a class="page-link">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="?page=2{{$queryString}}">2</a></li>
                        <li class="page-item"><a class="page-link" href="?page=3{{$queryString}}">3</a></li>
                        <li class="page-item"><a class="page-link" href="?page=4{{$queryString}}">4</a></li>
                        @if (($pageInfo['totPage'] / 16) >= 5)
                        <li class="page-item"><a class="page-link" href="?page=5{{$queryString}}">5</a></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']+1}}{{$queryString}}">다음</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']-1}}{{$queryString}}">이전</a></li>
                        @if ($pageInfo['page'] == 2)
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']-1}}{{$queryString}}">{{$pageInfo['page']-1}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']-2}}{{$queryString}}">{{$pageInfo['page']-2}}</a></li>
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']-1}}{{$queryString}}">{{$pageInfo['page']-1}}</a></li>
                        @endif
                        <li class="page-item active"><a class="page-link">{{$pageInfo['page']}} <span class="sr-only">(current)</span></a></li>
                        @if ($pageInfo['page'] == 2)
                            <li class="page-item"><a class="page-link" href="?page=3{{$queryString}}">3</a></li>
                            <li class="page-item"><a class="page-link" href="?page=4{{$queryString}}">4</a></li>
                            <li class="page-item"><a class="page-link" href="?page=5{{$queryString}}">5</a></li>
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']+1}}{{$queryString}}">다음</a></li>
                        @elseif (($pageInfo['totPage'] / 16) > $pageInfo['page'])
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']+1}}{{$queryString}}">{{$pageInfo['page']+1}}</a></li>
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']+2}}{{$queryString}}">{{$pageInfo['page']+2}}</a></li>
                            <li class="page-item"><a class="page-link" href="?page={{$pageInfo['page']+1}}{{$queryString}}">다음</a></li>
                        @endif
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</section>

<!-- end food section -->

<!-- offer section -->
<!--
<section class="offer_section layout_padding-bottom">
    <div class="offer_container">
        <div class="container ">
            <div class="row">
                <div class="col-md-6  ">
                    <div class="box ">
                        <div class="img-box">
                            <img src="/feane/images/o1.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tasty Thursdays
                            </h5>
                            <h6>
                                <span>20%</span> Off
                            </h6>
                            <a href="">
                                Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                        </g>
                    </g>
                                    <g>
                                        <g>
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                  </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  ">
                    <div class="box ">
                        <div class="img-box">
                            <img src="/feane/images/o2.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Pizza Days
                            </h5>
                            <h6>
                                <span>15%</span> Off
                            </h6>
                            <a href="">
                                Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                        </g>
                    </g>
                                    <g>
                                        <g>
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                  </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!-- end offer section -->

<!-- about section -->
<!--
<section class="about_section layout_padding">
    <div class="container  ">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="/feane/images/about-img.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            We Are Feane
                        </h2>
                    </div>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words which don't look even slightly believable. If you
                        are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
                        the middle of text. All
                    </p>
                    <a href="">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!-- end about section -->

<!-- book section -->
<!--
<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Book A Table
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="">
                        <div>
                            <input type="text" class="form-control" placeholder="Your Name" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Phone Number" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Your Email" />
                        </div>
                        <div>
                            <select class="form-control nice-select wide">
                                <option value="" disabled selected>
                                    How many persons?
                                </option>
                                <option value="">
                                    2
                                </option>
                                <option value="">
                                    3
                                </option>
                                <option value="">
                                    4
                                </option>
                                <option value="">
                                    5
                                </option>
                            </select>
                        </div>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                        <div class="btn_box">
                            <button>
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!-- end book section -->

<!-- client section -->
<!--
<section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center psudo_white_primary mb_45">
            <h2>
                What Says Our Customers
            </h2>
        </div>
        <div class="carousel-wrap row ">
            <div class="owl-carousel client_owl-carousel">
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <h6>
                                Moana Michell
                            </h6>
                            <p>
                                magna aliqua
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="/feane/images/client1.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <h6>
                                Mike Hamell
                            </h6>
                            <p>
                                magna aliqua
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="/feane/images/client2.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!-- end client section -->

@include('feane.footer')
