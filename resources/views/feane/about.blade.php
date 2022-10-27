@include('feane.header')

<!-- about section -->

<section class="about_section layout_padding">
    <div class="container  ">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="/goods/{{ $item->file_name }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            {{ $item->size3 }} {{ $item->name }}
                        </h2>
                    </div>
                    <p>
                        Size : {{ $item->size }}(cm)
                    </p>
                    <p>
                        Code : {{ $item->code2 }}
                    </p>
                    <p>
                        {{ $item->size2 }}
                    </p>
                </div>
            </div>
        </div>

        @if ($item->link != '')
            <div class="row">
                <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
                <div class='embed-container'><iframe src='https://www.youtube.com/embed/tvduY2aBnck' frameborder='0' allowfullscreen></iframe></div>
            </div>
        @endif


        <div style="margin-top: 20px;text-align:right;">
            <a href="/goods/{{ $item->file_name }}" download>
                <img src="/feane/images/download.png" alt="" style="max-width: 40px;background-color:#fff;">
            </a>
            <a id="create-kakao-link-btn" href="javascript:;">
                <img src="https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png" alt="카카오링크 보내기 버튼" style="max-width: 40px;"/>
            </a>
            <a id="sendSms">
                <img src="/feane/images/sms.png" alt="" style="max-width: 40px;background-color:#fff;">
            </a>
        </div>
    </div>
</section>
<script type="text/javascript">
    const userAgent = navigator.userAgent.toLocaleLowerCase();
    let smsUrl = '';
    const uri = encodeURIComponent("{{env('APP_URL')}}/about/{{ $item->id }}");

    if (userAgent.search('android') > -1) {
        smsUrl = 'sms:?body=제품 사진 보내드립니다. '+uri;
    } else if (userAgent.search('iphone') > -1 || userAgent.search('ipad') > -1) {
        smsUrl = 'sms:&body=제품 사진 보내드립니다. '+uri;
    }else{
        $("#sendSms").hide();
    }

    $("#sendSms").click(function(){
        location.href = smsUrl;
    });

    Kakao.Link.createDefaultButton({
        container: '#create-kakao-link-btn',
        objectType: 'feed',
        content: {
        title: '{{ $item->size3 }} {{ $item->name }}',
        description: 'Size : {{ $item->size }}, {{ $item->category }}',
        imageUrl: "{{env('APP_URL')}}/goods/{{ $item->file_name }}",
        link: {
            mobileWebUrl: '{{env('APP_URL')}}/about/{{ $item->id }}',
            webUrl: '{{env('APP_URL')}}/about/{{ $item->id }}'
        },
    },
    // social: {
    //     likeCount: 286,
    //     commentCount: 45,
    //     sharedCount: 845,
    // },
    buttons: [
        {
            title: '웹으로 보기',
            link: {
                mobileWebUrl: '{{env('APP_URL')}}/about/{{ $item->id }}',
                webUrl: '{{env('APP_URL')}}/about/{{ $item->id }}'
            },
        },
    ],
});
</script>

<!-- end about section -->

@include('feane.footer')
