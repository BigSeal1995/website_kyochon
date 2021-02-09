<?php
    session_start();
    
    $s_uid = isset($_SESSION["s_uid"])? $_SESSION["s_uid"]:"";
    $s_uname = isset($_SESSION["s_uname"])? $_SESSION["s_uname"]:"";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상품권</title>
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <style>
        /* CSS Reset */
        *{padding:0;margin:0;}
        address{font-style:normal;}
        a{color:black;text-decoration: none;}
        ul,li {list-style: none;}
        input, button{vertical-align: center;}

        /* skip_menu */
        .skip_menu{position:absolute}
        .skip_menu a{position:absolute;top:-100px;left:0;width:138px;border:1px solid #4ec53d;background:#333;text-align:center}
        .skip_menu a:active, .skip_menu a:focus{top:0;z-index:1000;text-decoration:none}
        .skip_menu span{display:inline-block;padding:2px 6px 0 0;color:#fff;letter-spacing:-1px;font-size:13px;line-height:26px}

        /* header */
        .header{width:1200px;height:123px;margin:19px auto 13px;position:relative;border-top:1px solid white;}
        .header_wrap{border-bottom:1px solid #c0a78c;margin-bottom:84px;}
        .header h1{width:173px;height:70px;background:url(images/교촌logo.png) no-repeat ;background-size:100% 100%;text-indent:-9999px;margin-top:53px;}
        .header h1 a{display:block;height:100%;}

        /* gnb */
        .gnb{width:738px;left:461px;position:absolute;top:102px;float:left;}        
        .gnb h2{width:0px;height:0px;overflow:hidden;margin:-1px;position:absolute;}
        .gnb a{height:100%;display:block;}
        .gnb ul ul{display:none}
        
        .gnb1{text-indent:-9999px;width:86px;height:19px;background:url(images/gnb_story.jpg) no-repeat;float:left;margin:0 55px 0 15px;position: relative;}
        .gnb1_b{width:141px;height:269px;background-color: white;padding:31px 0 0 0;position:absolute;right:-39px;top:20px;z-index:5;}
        .gnb1_1{text-indent:-9999px;width:73px;height:14px;background:url(images/gnb_story_1.jpg) no-repeat;margin:0 0 0 24px;}
        .gnb1_2{text-indent:-9999px;width:66px;height:14px;background:url(images/gnb_story_2.jpg) no-repeat;margin:36px auto 0 26px;}
        .gnb1_3{text-indent:-9999px;width:57px;height:33px;background:url(images/gnb_story_3.jpg) no-repeat;margin:38px auto 0 32px;}
        .gnb1_4{text-indent:-9999px;width:82px;height:14px;background:url(images/gnb_story_4.jpg) no-repeat;margin:35px auto 0 19px;}
        .gnb1_5{text-indent:-9999px;width:43px;height:14px;background:url(images/gnb_story_5.jpg) no-repeat;margin:36px auto 18px 38px;}
        
        .gnb2{text-indent:-9999px;width:71px;height:19px;background:url(images/gnb_info.jpg) no-repeat;float:left;margin-right:71px;}
        .gnb2_b{width:100px;height:269px;background-color:white;padding:31px 0 0 0;position:absolute;left:140px;top:20px;z-index:5;}
        .gnb2_1{text-indent:-9999px;width:54px;height:15px;background:url(images/gnb_info_1.jpg) no-repeat;margin:0 0 0 24px;}
        .gnb2_2{text-indent:-9999px;width:40px;height:14px;background:url(images/gnb_info_2.jpg) no-repeat;margin:35px 0 0 31px;}

        .gnb3{text-indent:-9999px;width:34px;height:19px;background:url(images/gnb_menu.jpg) no-repeat;float:left;margin-right:65px;}
        .gnb3_b{width:148px;height:269px;background-color:white;padding:31px 0 0 0;position:absolute;left:240px;top:20px;z-index:5;}
        .gnb3_1{text-indent:-9999px;width:25px;height:14px;background:url(images/gnb_menu_1.jpg) no-repeat;margin:0 0 0 60px;}
        .gnb3_2{text-indent:-9999px;width:41px;height:14px;background:url(images/gnb_menu_2.jpg) no-repeat;margin:35px 0 0 52px;}   
        .gnb3_3{text-indent:-9999px;width:39px;height:15px;background:url(images/gnb_menu_3.jpg) no-repeat;margin:38px auto 0 52px;}
        
        .gnb4{text-indent:-9999px;width:68px;height:19px;background:url(images/gnb_s_info.jpg) no-repeat;float:left;margin-right:51px;}
        .gnb4_b{width:84px;height:269px;background-color:white;padding:31px 0 0 0;position:absolute;left:388px;top:20px;z-index:5;}
        .gnb4_1{text-indent:-9999px;width:54px;height:15px;background:url(images/gnb_s_info_1.jpg) no-repeat;margin:0 0 0 16px;}
        .gnb4_2{text-indent:-9999px;width:54px;height:15px;background:url(images/gnb_s_info_2.jpg) no-repeat;margin:35px 0 0 16px;}

        .gnb5{text-indent:-9999px;width:68px;height:19px;background:url(images/gnb_service.jpg) no-repeat;float:left;margin-right:36px;}
        .gnb5_b{width:127px;height:269px;background-color:white;padding:31px 0 0 0;position:absolute;left:472px;top:20px;z-index:5;}
        .gnb5_1{text-indent:-9999px;width:26px;height:12px;background:url(images/gnb_service_1.jpg) no-repeat;margin:0 0 0 64px;}
        .gnb5_2{text-indent:-9999px;width:66px;height:14px;background:url(images/gnb_service_2.jpg) no-repeat;margin:35px 0 0 43px;}
        
        .gnb6{text-indent:-9999px;width:118px;height:20px;background:url(images/gnb_order.png) no-repeat;float:left;margin:0 0 0 0px;}

        /* top menu */
        .top_menu{;position:absolute;right:0;top:0;font-size:13px;}
        .top_menu h2{width:0px;height:0px;overflow:hidden;margin:-1px;position:absolute;}
        .top_menu ul li{float:left;font-family:"나눔바른고딕";margin-left:10px;}
        .s_uname{font-weight:bold;color:#308ede;}

        /* content */
        /* menu */
        .menu_wrap{width:432px;height:100px;margin:0 auto 11px;position: relative;}
        .menu_2depth{font-size:24px;font-family:"나눔바른고딕";}
        .menu_chicken{float:left;margin:0 71px 0 71px}        
        .menu_chicken a{display:block;width:100%;height:100%;}
        .menu_side{float:left;margin:0 72px 0 0;}    
        .menu_side a{display:block;width:100%;height:100%;}   
        .menu_voucher{margin:0 46px 0 0px;float:left;font-weight:bold;}
        .menu_voucher a{color:red;display:block;width:100%;height:100%;}
        .menu p{text-align:center;font-size:11.96px;font-family:"나눔바른고딕";top:30px;position: absolute;}
        
        /* voucher */
        .voucher{width:1194px;height:830px;margin:0 auto 80px;}

        .voucher dt{margin:-1px;width:0px;height:0px;overflow: hidden;}

        .voucher_01>.vm_01 a{display:block;width:294px;height:400px;background:url(images/voucher_menu_image01.png);text-indent:-9999px;float:left;margin:0 6px 30px 0;}
        .voucher_02>.vm_01 a{display:block;width:294px;height:400px;background:url(images/voucher_menu_image02.png);text-indent:-9999px;float:left;margin:0 6px 30px 0;}
        .voucher_03>.vm_01 a{display:block;width:294px;height:400px;background:url(images/voucher_menu_image03.png);text-indent:-9999px;float:left;margin:0 6px 30px 0;}
        .voucher_04>.vm_01 a{display:block;width:294px;height:400px;background:url(images/voucher_menu_image04.png);text-indent:-9999px;float:left;margin:0 0 30px 0;}
        .voucher_05>.vm_01 a{display:block;width:294px;height:400px;background:url(images/voucher_menu_image05.png);text-indent:-9999px;float:left;margin:0 6px 30px 0;}        
        
        /* footer */
        .footer_wrap{background-color:#fafbfc;border-top:1px solid #e4e8eb;height:128px;}
        /* term */        
        .footer{width:1200px;margin:auto;}
        .footer_top{width:1200px;float:left;}
        .footer h2{width:0;height:0;margin:-1px;overflow: hidden;}
        .term{float:left;}
        .term_term{width:520px;height:13px;margin:14px 52px 16px 0;}
        .term li{float:left;font-size:14px;font-family:"나눔바른고딕";}
        .term1{margin-right:74px;}
        .term2{margin-right:40px;}
        .term3{margin-right:52px;}

        /* sns */
        .sns{float:left;}
        .sns h2{width:0;height:0;margin:-1px;overflow: hidden;}
        .sns_sns{margin:12px 0 0 0}
        .sns_sns li{float:left;}
        .sns1 a{display:block;width:20px;height:20px;background: url(images/sns_facebook.png)no-repeat;text-indent:-9999px;margin-right:4px;}
        .sns2 a{display:block;width:20px;height:20px;background: url(images/sns_insta.png)no-repeat;text-indent: -9999px;margin-right:4px;}
        .sns3 a{display:block;width:20px;height:20px;background:url(images/sns_youtube.png)no-repeat;text-indent: -9999px;}
        
        /* footer_cont */
        .footer_cont{width:1200px;font-size:14px;}
        .footer_add1{float:left;margin-right:3px;}
        .footer_add2{float:left;margin-right:4px;}
        .footer_cont1_1{float:left;margin-right:6px;}

        .footer_cont2_1{float:left;margin-right:4px;}
        .footer_cont2_2{float:left;margin-right:3px;}
        .footer_cont2_3{float:left;margin-right:3px;}
        .footer_cont2_4{float:left;margin-right:4px;}
        .footer_cont2_5{float:left;margin-right:4px;}

        .footer_cont3{margin:20px 0 21px 0;}
    </style>
    <script>
        $(function(){

        /* gnb */  
            $(".gnb>ul>li").mouseenter(function(){
                $(".gnb ul ul").stop().slideDown();
            });
            $(".gnb>ul>li").mouseleave(function(){
                $(".gnb ul ul").stop().slideUp();
            });

        $(".gnb1").hover(function(){
            $(this).css({"background":"url(images/gnb_story_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb1_1").hover(function(){
            $(this).css({"background":"url(images/gnb_story_1_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb1_2").hover(function(){
            $(this).css({"background":"url(images/gnb_story_2_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb1_3").hover(function(){
            $(this).css({"background":"url(images/gnb_story_3_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb1_4").hover(function(){
            $(this).css({"background":"url(images/gnb_story_4_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb1_5").hover(function(){
            $(this).css({"background":"url(images/gnb_story_5_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb2").hover(function(){
            $(this).css({"background":"url(images/gnb_info_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb2_1").hover(function(){
            $(this).css({"background":"url(images/gnb_info_1_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb2_2").hover(function(){
            $(this).css({"background":"url(images/gnb_info_2_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb3").hover(function(){
            $(this).css({"background":"url(images/gnb_menu_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb3_1").hover(function(){
            $(this).css({"background":"url(images/gnb_menu_1_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb3_2").hover(function(){
            $(this).css({"background":"url(images/gnb_menu_2_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb3_3").hover(function(){
            $(this).css({"background":"url(images/gnb_menu_3_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb4").hover(function(){
            $(this).css({"background":"url(images/gnb_s_info_hover.png)"});
        },function(){
            $(this).css('background', '');
        });
        
        $(".gnb4_1").hover(function(){
            $(this).css({"background":"url(images/gnb_s_info_1_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb4_2").hover(function(){
            $(this).css({"background":"url(images/gnb_s_info_2_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb5").hover(function(){
            $(this).css({"background":"url(images/gnb_service_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb5_1").hover(function(){
            $(this).css({"background":"url(images/gnb_service_1_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb5_2").hover(function(){
            $(this).css({"background":"url(images/gnb_service_2_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".gnb6").hover(function(){
            $(this).css({"background":"url(images/gnb_order_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        /* top menu */
        $(".tm a").hover(function(){
            $(this).css({"color":"red"});
        },function(){
            $(this).css({"color":""});
        });

        });
    </script>
</head>
<body>
    <div class="skip_menu">
        <a href="#none">주요메뉴 바로가기</a>
        <a href="#none">치킨 바로가기</a>
        <a href="#none">사이드 바로가기</a>
        <a href="#none">상품권 바로가기</a>
    </div>

    <div class="header_wrap">
        <div class="header">        
            <h1><a href="index.php">교촌치킨</a></h1>

            <div class="gnb">
                <h2>주요메뉴</h2>
                    <ul>    
                        <li class="gnb1"><a href="#none">교촌스토리</a>
                            <ul class="gnb1_b">
                                <li class="gnb1_1"><a href="#none">CEO 인사말</a></li>
                                <li class="gnb1_2"><a href="#none">교촌스토리</a></li>
                                <li class="gnb1_3"><a href="#none">행복 채움 프로젝트</a></li>
                                <li class="gnb1_4"><a href="#none">나만의 레시피</a></li>
                                <li class="gnb1_5"><a href="#none">PR센터</a></li>
                            </ul>
                        </li>
                        <li class="gnb2"><a href="#none">안내사항</a>
                            <ul class="gnb2_b">
                                <li class="gnb2_1"><a href="#none">공지사항</a></li>
                                <li class="gnb2_2"><a href="#none">이벤트</a></li>
                            </ul>
                        </li>
                        <li class="gnb3"><a href="#none">메뉴</a>
                            <ul class="gnb3_b">
                                <li class="gnb3_1"><a href="menu_chicken.php">치킨</a></li>
                                <li class="gnb3_2"><a href="menu_side.php">사이드</a></li>
                                <li class="gnb3_3"><a href="#none">상품권</a></li>
                            </ul>
                        </li>
                        <li class="gnb4"><a href="#none">매장안내</a>
                            <ul class="gnb4_b">
                                <li class="gnb4_1"><a href="#none">국내매장</a></li>
                                <li class="gnb4_2"><a href="#none">해외매장</a></li>
                            </ul>
                        </li>
                        <li class="gnb5"><a href="#none">고객센터</a>
                            <ul class="gnb5_b">
                                <li class="gnb5_1"><a href="#none">FAQ</a></li>
                                <li class="gnb5_2"><a href="#none">고객의소리</a></li>
                            </ul>
                        </li>
                        <li class="gnb6"><a href="#none">온라인주문</a></li>
                    </ul>
                </div>

                <?php
                if($s_uid){
            ?>
            <div class="top_menu">
            <h2>사용자메뉴</h2>
                <ul>                    
                    <li class="tm"><span class="s_uname"><?php echo $s_uname; ?></span>님 안녕하세요</li>
                    <?php 
                        if($s_uid=="admin"){
                    ?>
                    <li class="tm"><a href="index_admin.php">관리자페이지</a></li>
                    <?php }; ?>
                    <li class="tm"><a href="edit.php">정보수정</a></li>              
                    <li class="tm"><a href="logout_ok.php">로그아웃</a></li>
                    <li class="tm"><a href="sitemap.php">사이트맵</a></li>
                </ul>
            </div>

            <?php
                } else{
            ?>
            <div class="top_menu">
            <h2>사용자메뉴</h2>
                <ul>
                    <li class="tm"><a href="login.php">로그인</a></li>
                    <li class="tm"><a href="sitemap.php">사이트맵</a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="content">
        <div class="menu_wrap">
            <div class="menu">
                <ul class="menu_2depth">
                    <li class="menu_chicken"><a href="menu_chicken.php">치킨</a></li>
                    <li class="menu_side"><a href="menu_side.php">사이드</a></li>
                    <li class="menu_voucher"><a href="#none">상품권</a></li>
                </ul>                
                    <p>
                        <b>교촌의 처음부터 좋은 생각</b>을 상품권에 담았습니다.<br/>
                        좋은 분께 좋은 마음이 될 수 있도록 교촌의 생각을 담아 상품권을 준비했습니다.<br/>
                        교촌오리지날, 허니오리지날 등 교촌치킨을 대표하는 메뉴들로 정성스럽게 구성하였습니다.<br/>
                        특별한 날 특별한 분께 드리는 가장 값진 외식문화 상품권이 있습니다.<br/>
                        고객 여러분은 언제나 교촌치킨의 VIP입니다.
                    </p>           
            </div>
        </div>
    </div>

        <div class="voucher">
            <dl class="voucher_01">
                <dt>교촌오리지날 상품권</dt>
                <dd class="vm_01"><a href="#none">권장소비자가격 <strong>15,000</strong>원</a></dd>
            </dl>
            <dl class="voucher_02">
                <dt>교촌허니오리지날 상품권</dt>
                <dd class="vm_01"><a href="#none">권장소비자가격 <strong>15,000</strong>원</a></dd>
            </dl>
            <dl class="voucher_03">
                <dt>교촌라이스세트 상품권</dt>
                <dd class="vm_01"><a href="#none">권장소비자가격 <strong>19,000</strong>원</a></dd>
            </dl>
            <dl class="voucher_04">
                <dt>교촌허니순살R 상품권</dt>
                <dd class="vm_01"><a href="#none">권장소비자가격 <strong>20,000</strong>원</a></dd>
            </dl>
            <dl class="voucher_05">
                <dt>교촌신화오리지날 상품권</dt>
                <dd class="vm_01"><a href="#none">권장소비자가격 <strong>18,000</strong>원</a></dd>
            </dl>
        </div>    

        <div class="footer_wrap">
            <div class="footer">
                <h2>사이트 이용안내</h2>
                    <div class="footer_top">
    
                    <div class="term">
                        <h2>약관 및 정책</h2>
                        <ul class="term_term">
                            <li class="term1"><a href="#none">이용약관</a></li>
                            <li class="term2"><a href="#none">개인정보처리방침</a></li>
                            <li class="term3"><a href="#none">이메일 무단수집거부</a></li>
                            <li class="term4"><a href="#none">찾아오시는 길</a></li>
                        </ul>
                    </div>
    
                    <div class="sns">
                        <h2>sns</h2>
                        <ul class="sns_sns">
                            <li class="sns1"><a href="#none">facebook</a></li>
                            <li class="sns2"><a href="#none">instagram</a></li>
                            <li class="sns3"><a href="#none">youtube</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="footer_cont">
                    <div class="footer_cont1">
                        <address class="footer_add1">사업장소재지 : 39852 경상북도 칠곡군 가산면 송신로 78</address>
                        <address class="footer_add2">본사(오산교육원)주소 : 18150 경기도 오산시 동부대로 436번길 55-18</address>
                        <p class="footer_cont1_1">상호명 : 교촌에프앤비(주)</p>
                        <p class="footer_cont1_2">대표이사 : 소진세, 황학수</p>
                    </div>
                    <div class="footer_cont2">
                        <p class="footer_cont2_1">대표번호 : 031-371-3500</p>
                        <p class="footer_cont2_2">소비자상담번호 : 080-320-3000</p>
                        <p class="footer_cont2_3">사업자등록번호 : 513-81-16574</p>
                        <p class="footer_cont2_4">통신판매업신고 : 2012-경상북도칠곡-00023호</p>
                        <p class="footer_cont2_5">개인정보보호책임자 : 윤순도</p>
                        <p class="footer_cont2_6">영업시간 : 12:00~23:30</p>                
                    </div>
                    <p class="footer_cont3">Copyright 2015 © KYOCHON F&B. All rights reserved.</p>
                </div>
            </div>
        </div>
</body>
</html>