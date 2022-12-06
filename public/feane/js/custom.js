// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();
let page = 1;
let cate = '';
let keyword = '';

search = (event) => {
    if(event.keyCode == 13){
        $(".nav_search-btn").click();
        event.preventDefault();
    }
}

// isotope js
$(window).on('load', function () {
    $(".nav_search-btn").click(function (){
        keyword = $(".order_online input").val();
        location.href = "?keyword="+keyword;
        return false;

        keyword = $(".order_online input").val();
        page = 1;
        getItem();
        $("#goods-list-box").empty();
        $(".navbar-toggler").click();
        $(".order_online input").val('');
        window.scrollTo(0, 1500);
    });

    $('.filters_detail_menu li').click(function () {
        cate = $(".filters_menu li.active").data('filter');
        cate2 = $(this).data('filter');
        location.href = "?cate=" + cate +"&cate2="+cate2;
        return false;
    });

    $('.filters_menu li').click(function () {
        cate = $(this).data('filter');
        if(cate != '삼베칠보') location.href = "?cate="+cate;
        else location.href = "?keyword="+cate;

        return false;


        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        cate = $(this).data('filter');
        page = 1;
        getItem();
        $("#goods-list-box").empty();

    });

    // getItem();

    $("#btn-more-item").click(function(){
        page = page+1;
        getItem();
    });

    $(".detail-box > .img-box > img").click(function(){
        location.href = $(this).data('href');
    });
});

// nice select
$(document).ready(function() {
    $('select').niceSelect();
});

function getItem() {
    $.ajax({
        //아래 headers에 반드시 token을 추가해줘야 한다.!!!!!
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'get',
        url: '/add',
        dataType: 'json',
        data: { 'page':page, 'cate':cate, 'keyword':keyword },
        success: function(res) {
            const datas = res.data;
            if(datas.length < 16) $("#btn-more-item").hide();
            else $("#btn-more-item").show();
            for(let i = 0 ; i < datas.length ; i++ ) {
                let data = datas[i];
                let itemHtml = "<div class=\"col-6 all " + data.category + " \">\n" +
                    "                    <a href=\"/about?code=" + data.code + "\">\n" +
                    "                        <div class=\"box\">\n" +
                    "                            <div>\n" +
                    "                                <div class=\"img-box\">\n" +
                    "                                    <img src=\"./goods/" + data.file_name + "\" loading=\"lazy\" alt=\"\">\n" +
                    "                                </div>\n" +
                    "                                <div class=\"detail-box\">\n" +
                    "                                    <div style=\"padding-bottom:15px;\">\n" +
                    "                                    <h5>\n" +
                    "                                        " + data.size3 + " " + data.name + "\n" +
                    "                                    </h5>\n" +
                    "                                    </div>\n" +
                    "                                    <div style=\"color:#bebebe;\">\n" +
                    "                                        <h6>Code : " + data.code + "</h6>\n" +
                    "                                    </div>\n" +
                    "                                    <p>\n Size : " +
                    "                                        " + data.size + "<br>\n" +
                    "                                        " + data.size2 + "\n" +
                    "                                    </p>\n" +
                    "                                </div>\n" +
                    "                            </div>\n" +
                    "                        </div>\n" +
                    "                    </a>\n" +
                    "                </div>";
                $("#goods-list-box").append(itemHtml);
            }
        },
        error: function(data) {
            console.log("error" +data);
        }
    });
}

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});
