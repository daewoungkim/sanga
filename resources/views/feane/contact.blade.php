@include('feane.subHeader')

<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">개요</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">후기</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">의뢰</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <pre>


마하반야 바라밀다심경 관자재보살 행심반야 바라밀다

시 조견오온개공도 일체고액 사리자 색불이공 공불이색

색즉시공 공즉시색 수상행식 역부여시 사리자 시

제법공상 불생불멸 불구부정 부증불감 시고 공중무색

무수상행식 무안이비설신의 무색성향미촉법

무안계 내지 무의식계 무무명 역무무명진 내지

무노사 역무노사진 무고집멸도 무지역무득

이무소득고 보리살타 의반야바라밀다고 심무가애

무가애고 무유공포 원리전도몽상 구경열반 삼세제불

의반야바라밀다 고득아뇩다라삼먁삼보리

고지반야바라밀다 시대신주 시대명주 시무상주 시무등등주

능제일체고 진실불허 고설 반야바라밀다주 즉설주왈

아제 아제 바라아제 바라승아제 모지 사바하

아제 아제 바라아제 바라승아제 모지 사바하

아제 아제 바라아제 바라승아제 모지 사바하
                </pre>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row justify-content-md-center">
                    <div class="img-box col-sm-5">
                        <img src="http://sanga.fof.kr/thumb/new049-075.png" loading="lazy" alt="" style="width:100%;">
                    </div>
                    <div class="col-sm-2" style="text-align:center;">
                        <div display="flex" class="Box-nv15kw-0 Flex-arghxi-0 cEagMo"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="display:inline-block;vertical-align:text-bottom"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg></div>
                    </div>
                    <div class="img-box col-sm-5">
                        <img src="http://sanga.fof.kr/thumb/new049-075.png" loading="lazy" alt="" style="width:100%;">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <!-- Start Contact -->
                <div class="container py-5">
                    <div class="row py-5">
                        <form class="col-md-9 m-auto dropzone dz-clickable" action="/contact/upload" class="dropzone dz-clickable" id="myAwesomeDropzone">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="inputname">이름</label>
                                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="이름">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="inputphone">전화번호</label>
                                    <input type="phone" class="form-control mt-1" id="phone" name="phone" placeholder="전화번호">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputsubject">제목</label>
                                <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="제목">
                            </div>
                            <div class="mb-3">
                                <label for="inputmessage">내용</label>
                                <textarea class="form-control mt-1" id="message" name="message" placeholder="내용" rows="8"></textarea>
                            </div>

                            <div class="dz-default dz-message"><span>업로드할 파일</span></div>

                            <div class="row">
                                <div class="col text-end mt-2">
                                    <button type="submit" class="btn btn-success btn-lg px-3">확인</button>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </form>
                        <input type="file" multiple="multiple" class="dz-hidden-input" accept=".jpeg,.jpg,.png,.gif" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
                    </div>
                </div>
                <!-- End Contact -->
            </div>
        </div>
    </div>
        <a id="create-kakao-link-btn"></a>
</section>

<script>

    Dropzone.options.myAwesomeDropzone = {
        clickable: true,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        autoProcessQueue: false,
        success:function(path){
            console.log(path);

            let des = $("input[name='name']").val()+"/"+$("input[name='phone']").val()+"/"+$("#message").val();
            Kakao.Link.createDefaultButton({
                container: '#create-kakao-link-btn',
                objectType: 'feed',
                content: {
                    title: $("input[name='subject']").val(),
                    description: des,
                    imageUrl: path,
                    link: {
                        mobileWebUrl: 'http://sanga.fof.kr',
                        webUrl: 'http://sanga.fof.kr'
                    },
                },
                buttons: [
                    {
                        title: '웹으로 보기',
                        link: {
                            mobileWebUrl: 'http://sanga.fof.kr/about/351',
                            webUrl: 'http://sanga.fof.kr/about/351'
                        },
                    },
                ],
            });

            setTimeout(() => $("#create-kakao-link-btn").click(), 1000);
        },
        init: function() {
            var myDropzone = this;

            // Update selector to match your button
            $(".btn-success").click(function (e) {
                if($("input[name='name']").val() == ''){
                    alert('이름을 입력해주세요');
                    return false;
                }

                if($("input[name='phone']").val() == ''){
                    alert('전화번호를 입력해주세요');
                    return false;
                }

                if($("input[name='subject']").val() == ''){
                    alert('제목을 입력해주세요');
                    return false;
                }

                if($("#message").val() == ''){
                    alert('내용을 입력해주세요');
                    return false;
                }

                if($(".dz-preview").length == 0){
                    var queryString = $("form[id=myAwesomeDropzone]").serialize() ;

                    $.ajax({
                        method: "POST",
                        url: "/contact/upload",
                        data: queryString
                    })
                        .done(function( msg ) {
                            alert( msg );
                        });
                    return false;
                }

                e.preventDefault();
                myDropzone.processQueue();
            });
        }
    };
</script>
