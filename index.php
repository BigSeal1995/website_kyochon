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
    <title>교촌치킨</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/flickity.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/flickity.pkgd.min.js"></script>
    <style>
        /* CSS Reset */
        body{overflow-x: hidden;overflow-y: auto;}
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
        .header{width:1200px;height:123px;margin:19px auto 13px;position:relative;border:1px solid white}
        .header_wrap{border-bottom:1px solid #c0a78c;}
        .header h1{width:173px;height:70px;background:url(images/교촌logo.png) no-repeat ;background-size:100% 100%;text-indent:-9999px;margin-top:53px;}
        .header h1 a{display:block;height:100%;}

        /* gnb */             
        .gnb{width:738px;left:461px;position:absolute;top:102px;float:left;}        
        .gnb h2{position:absolute;left:-9999px;top:-9999px}
        .gnb ul li a{height:100%;display:block;}
        .gnb ul ul{display:none}
        /* .gnb ul:hover ul{display:block}*/
        
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
        
        /* main_content */
        .main_image h2{position:absolute;left:-9999px;top:-9999px}
        .mask img{width:1200px;height:597px;}
        .mask li{float:left;}
        .mask ul{width:4800px;position:relative;overflow: hidden;margin-bottom:20px;}
        .mask{width:1200px;overflow:hidden;margin:auto;position:relative;}
        .pager a{display:block;}
        .mask .prev{width:26px;height:42px;position:absolute;background: url(images/prev.png) no-repeat;top:287px;left:10px;text-indent:-9999px;}
        .mask .next{width:26px;height:42px;position:absolute;background: url(images/next.png) no-repeat;top:287px;right:10px;text-indent:-9999px;}
        
        .main_content{width:1200px;height:400px;position:relative;margin:-10px auto 43px;background:url(images/main_content_back.jpg) no-repeat;background-size:cover;}

        /* news_events */
        .news_events{width:800px;height:400px; margin:0 0 43px;position:absolute;float:left;}
        .news_events h2{width:144px;height:19px;background: url(images/news_event.png) no-repeat;margin:15px 327px 15px 320px;text-indent:-9999px;position:absolute;}

        .img{width:250px;height:250px;overflow: hidden;margin-bottom:7px;}
        .img img{width:250px;height:250px;position: relative;}

        .news_events1{width:250px;height:351px;float:left;margin:49px 12.5px 0 12.5px;position:relative;}        
        .news_events2{width:250px;height:351px;float:left;margin:49px 12.5px 0 0;position:relative;}
        .news_events3{width:250px;height:351px;float:left;margin:49px 12.5px 0 0;position:relative;}

        .nt_1{font-family:"나눔바른고딕";font-size:14px}        
        .nt_2{font-family:"나눔바른고딕";font-size:12px;color:#595656;position:absolute;top:333px;}

        .news_events>a{position:absolute;background:url(images/news_event_more.png) no-repeat;width:19px;height:18px;text-indent:-9999px;top:18px;right:13px;}

        /* store_search */
        .store_search{width:400px;height:140px;float:left;position:absolute;margin:0 0 0 800px;}
        .store_search h2{width:138px;height:17px;text-indent:-9999px;background: url(images/store_search.png) no-repeat;margin:17px 0 11px 131px;}
        .store_search legend{margin:-1px;overflow: hidden;width:0;height:0;}
        .store_search input{border:0px;width:298px;height:30px;display:block;margin:0 0 0 25px;text-indent:0px;padding-left:10px;box-sizing:border-box;font-family:"나눔바른고딕"}
        .store_search fieldset{border:0px;}
        .store_search p{width:240px;height:28px;text-indent:-9999px;background: url(images/store_search_text.png) no-repeat;margin:0 26px 8px 79px;}
        .store_search p span{display:block;width:30px;height:30px;text-indent:-9999px;background: url(images/store_search_icon.png) no-repeat;float:left;right:25px;top:45px;position:absolute;}
        .store_search a span{display:block;text-indent:-9999px;width:52px;height:30px;background: url(images/store_search_button.png)no-repeat;position:absolute;float:left;right:25px;top:81px;position:absolute;}

        /* store_open */
        .store_open{width:400px;height:260px;float:left;margin:140px 0 0 800px;position: relative;}
        .store_open h2{width:139px;height:20px;background:url(images/store_open.png)no-repeat;margin:17px 0 41px 130.5px;text-indent:-9999px;}

        .store_open1{width:100px;height:131px;padding:100px 0 0 0;margin:0 25px 0 25px;background:url(images/store_open_image1.png)no-repeat;box-sizing: border-box;text-indent: -9999px;float:left;}

        .store_open1 a{display:block;width:64px;height:17px;background:url(images/store_open1.png)no-repeat;margin:14px 17px 0;}        

        .store_open2{width:100px;height:131px;padding:100px 0 0 0;background: url(images/store_open_image2.png)no-repeat;box-sizing: border-box;text-indent: -9999px;float:left;}

        .store_open2 a{display:block;width:61px;height:17px;background: url(images/store_open2.png)no-repeat;margin:14px 19.5px 0;}     

        .store_open3{width:116px;height:131px;padding:100px 0 0 0;background: url(images/store_open_image3.png)center top no-repeat;box-sizing: border-box;text-indent: -9999px;float:left;margin-left:17px;}

        .store_open3 a{display:block;width:116px;height:17px;background: url(images/store_open3.png)no-repeat;margin-top:14px;}        

        .store_open>a{display:block;width:66px;height:21px;background:url(images/store_open_more.png)no-repeat;text-indent:-9999px;margin:22px 0 0 166.5px;float:left;}          
        
        /* best_menu */
        .best_menu{width:1200px;height:400px;background: url(images/bestmenu.jpg)no-repeat;background-size:100% 100%;margin:0 auto 43px;padding:16px 0 0 0;position: relative;}
        .best_menu h2{width:105px;height:17px;background:url(images/bestmenu_bestmenu.png)no-repeat;text-indent: -9999px;margin:0 0 0 550px;}        
        .mask_best li{float:left;margin:25px 50px;}
        .mask_best img{width:200px;height:300px;}
        .mask_best ul{width:2400px;}
        .mask_best .pager{text-indent:-9999px;}

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
        $(document).ready(function(){
            $('.abc').bxSlider({
                auto:true
            });
        });
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

        /* news & event */
        $(".img img").hover(function(){
            $(this).stop().animate({width:275,height:275,left:-10,top:-10})
        },function(){
            $(this).stop().animate({width:250,height:250,left:0,top:0})
        });

        $(".nt_1").hover(function(){
            $(this).css({"color":"red"});
        },function(){
            $(this).css({"color":""});
        });

        $(".store_open1 a").hover(function(){
            $(this).css({"background":"url(images/store_open1_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".store_open2 a").hover(function(){
            $(this).css({"background":"url(images/store_open2_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $(".store_open3 a").hover(function(){
            $(this).css({"background":"url(images/store_open3_hover.png)"});
        },function(){
            $(this).css('background', '');
        });

        $('.mask_best').flickity({
        // options
        cellAlign: 'left',
        contain: true,
        groupCells: true,
        });


        });
    </script>
</head>
<body>
    <div class="skip_menu">
        <a href="#none">주요메뉴 바로가기</a>
        <a href="#none">행사 바로가기</a>
        <a href="#none">뉴스&#38;이벤트 바로가기</a>
        <a href="#none">매장찾기 바로가기</a>
        <a href="#none">가맹점 개설안내 바로가기</a>
        <a href="#none">베스트메뉴 바로가기</a>
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
                                <li class="gnb3_2"><a href="menu_side.php">사이드22233</a></li>
                                <li class="gnb3_3"><a href="menu_voucher.php">상품권</a></li>
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
                        <li class="gnb6"><a href="#none">온라인주문</a>
                        </li>
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
    

    <div id="content">
        <div class="main_image">
            <h2>행사</h2>
            <div class="mask">
                <ul class="abc">
                    <li><a href="#none"><img src="images/main_image_1.jpg" alt="교촌신상리얼후라이드"></a></li>
                    <li><a href="#none"><img src="images/main_image_2.jpg" alt="아동학대국민감시단"></a></li>
                    <li><a href="#none"><img src="images/main_image_3.jpg" alt="교촌멤버십"></a></li>
                    <li><a href="#none"><img src="images/main_image_4.jpg" alt="배달종사자를위한"></a></li>
                </ul>  
                <div class="pager">
                    <a href="#none" class="prev">이전</a>
                    <a href="#none" class="next">다음</a>
                </div>
            </div>            
        </div>

        <div class="main_content">
            <div class="news_events">
                <h2>뉴스&#38;이벤트</h2>
                <div class="news_events1">
                    <div class="img"><a href="#none"><img src="images/news_events1.jpg" alt=""></a></div>
                    <ul>
                        <li class="nt_1">교촌치킨&#44; 교촌 주문앱 이용 고객 대상 치즈볼 증정 이벤트 진행</li>
                        <li class="nt_2">2020&#45;09&#45;10</li>
                    </ul>
                </div>
                <div class="news_events2">
                    <div class="img"><a href="#none"><img src="images/news_events2.jpg" alt=""></a></div>
                    <ul>
                        <li class="nt_1">교촌치킨&#44; 닭가슴살 슬라이스 3종 닭가슴살 스틱 출시</li>
                        <li class="nt_2">2020&#45;09&#45;10</li>
                    </ul>
                </div>
                <div class="news_events3">
                    <div class="img"><a href="#none"><img src="images/news_events3.jpg" alt=""></a></div>
                    <ul>
                        <li class="nt_1">교촌치킨&#44; 새로운 BI&#183;SI 공개</li>
                        <li class="nt_2">2020&#45;09&#45;03</li>
                    </ul>
                </div>

                <a href="#none">더보기</a>
            </div>

            <div class="store_search">
                <h2>매장찾기</h2>                
                    <p>매장 또는 지역을 입력해주세요.<span>검색</span></p>
                    <form action="#" name="" method="">
                        <fieldset>
                            <legend>검색창</legend> 
                            <input type="text" name="" id="">
                            <a href="#none"><span>버튼</span></a> 
                        </fieldset>
                    </form>     
            </div>
            <div class="store_open">
                <h2>가맹점 개설안내</h2>
                <ul class="store_open1">
                    <li><a href="#none">개설절차</a></li>
                </ul>
                <ul class="store_open2">
                    <li><a href="#none">인테리어</a></li>
                </ul>
                <ul class="store_open3">
                    <li><a href="#none">지역별 상담창구</a></li>
                </ul>               
                <a href="#none">더보기</a>
            </div>            
        </div>

        <div class="best_menu">
            <h2>베스트메뉴</h2>
            <div class="best_menu_wrap">
                <div class="mask_best">
                    <ul class="best_ul">
                        <li><a href="#none"><img src="images/bestmenu_01.png" alt="교촌반반순살"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_02.png" alt="교촌반반콤보"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_03.png" alt="교촌후라이드"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_04.png" alt="교촌살살치킨"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_05.png" alt="교촌신화오리지날"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_06.png" alt="교촌허니콤보"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_07.png" alt="교촌레드콤보"></a></li>
                        <li><a href="#none"><img src="images/bestmenu_08.png" alt="교촌콤보"></a></li>
                    </ul>  
                    <div class="pager">
                        <a href="#" class="prev">이전</a>
                        <a href="#" class="next">다음</a>
                    </div>
                </div>   
            </div>         
        </div>
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