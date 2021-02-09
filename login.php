<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <style>
        /* CSS Reset */        
        *{padding:0;margin:0;}
        address{font-style:normal;}
        a{color:black;text-decoration: none;}
        ul,li {list-style: none;}
        body{font-family:"나눔바른고딕"}

        /* skip_menu */
        .skip_menu{position:absolute}
        .skip_menu a{position:absolute;top:-100px;left:0;width:138px;border:1px solid #4ec53d;background:#333;text-align:center}
        .skip_menu a:active, .skip_menu a:focus{top:0;z-index:1000;text-decoration:none}
        .skip_menu span{display:inline-block;padding:2px 6px 0 0;color:#fff;letter-spacing:-1px;font-size:13px;line-height:26px}

        /* header */
        .header{height:100px;margin:0 auto 100px;position:relative;border:1px solid#c79f61;background-color: #c79f61;}
        .header h1{width:173px;height:70px;background:url(images/logo.png) no-repeat;background-size:100% 100%;text-indent:-9999px;margin:15px auto 11px;}
        .header h1 a{display:block;height:100%;}

        /* content */
        .login_background{z-index:1;height:500px;margin:auto;background-color: #f8f8f8;}

        .login_box{width:500px;height:600px;border:1px solid #888888;z-index:5;margin:0 auto 111px;position: relative;background-color: white;}
        .login_box legend{margin:-1px;width:0;height:0;overflow: hidden;}
        .login_box fieldset{width:300px;height:300px;border:0px;margin:0 auto 30px;}

        .top_box{width:300px;height:77px;border-bottom:1px solid #888888;margin:0 auto 30px;padding:22px 109px 0;box-sizing: border-box;}
        .top_box h2{font-family:"나눔바른고딕";font-size:30px;font-weight:bold;}

        .id_box{width:300px;height:40px;border:0px;background-color:#f8f8f8;color:#888888;font-size:16px;font-weight:bold;padding:0 0 0 17px;box-sizing: border-box;margin-bottom:15px;}
        .id_span{font-size:13px;color:red;}
        .pw_box{width:300px;height:40px;border:0px;background-color:#f8f8f8;color:#888888;font-size:16px;font-weight:bold;padding:0 0 0 17px;box-sizing: border-box;margin-bottom:26px;background:url("images/pw_box.png") no-repeat}

        .login_button{width:300px;height:40px;border:0px;background-color:#fd8205;font-family:"나눔바른고딕";font-size:20px;font-weight:bold;color:white;}

        .checkbox_1{margin:16px 10px 0 0;float:left;}
        .checkbox_1_txt{display:block;color:#888888;font-size:16px;font-family:"나눔바른고딕";font-weight:bold;float:left;margin:14px 71px 0 0;}
        .checkbox_2{margin:16px 10px 0 0;float:left;}
        .checkbox_2_txt{display:block;color:#888888;font-size:16px;font-family:"나눔바른고딕";font-weight:bold;margin:14px 0 0 0;}

        .id_search a{display:block;font-size:16px;font-weight:bold;font-family:"나눔바른고딕";color:#888888;float:left;margin-left:99px;margin-bottom:40px;box-sizing:border-box;}
        .login_bar_1{display:block;text-indent:-9999px;width:1px;height:12px;background: url(images/login_bar.png) no-repeat;float:left;margin:3px 19px 0 19px;}
        .pw_search a{display:block;font-size:16px;font-weight:bold;font-family:"나눔바른고딕";color:#888888;float:left;margin-bottom:40px;}
        .login_bar_2{display:block;text-indent:-9999px;width:1px;height:12px;background: url(images/login_bar.png) no-repeat;float:left;margin:3px 21px 0 20px;}
        .join a{display:block;font-size:16px;font-weight:bold;font-family:"나눔바른고딕";color:#888888;margin-bottom:40px;float:left;}

        .naver_login,.google_login,.facebook_login{font-size:16px;font-weight:bold;font-family:"나눔바른고딕";width:300px;height:40px;border-radius:50px;border:1px solid #888888;background-color: white;margin-left:99px;color:#888888;}
        .naver_login{margin-bottom:24px;padding-right:138px;}
        .naver_icon{display:block;width:15px;height:15px;background: url(images/naver_icon.png) no-repeat;text-indent:-9999px;float:left;margin:0 13px 0 34px;}
        .google_login{margin-bottom:24px;padding-right:110px;}
        .google_icon{display:block;width:15px;height:15px;background: url(images/google_icon.png) no-repeat;text-indent:-9999px;float:left;margin-left:34px;}
        .facebook_login{padding-right:94px;}
        .facebook_icon{display:block;width:15px;height:15px;background: url(images/facebook_icon.png) no-repeat;text-indent:-9999px;float:left;margin-left:34px;}

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
    <script type="text/javascript">        
        $(function(){        
            $(".id_box").focus(function(){
                $(this).val('');
            });

            $(".pw_box").focus(function(){
                $(this).css("background-image","url(images/pw_box_c.png)");
            });
            
        });
        function frm_check(frm){
            /* var id = document.getElementById("id"); */
            
            if(id.value==""){
                alert("아이디를 입력하세요.");
                id.focus();
                return false;
            }else if(pw.value==""){
                alert("비밀번호를 입력하세요.");
                pw.focus();
                return false;
            };
            
            frm.submit();
        };  
    </script>
</head>
<body>
    <div class="skip_menu">
        <a href="#none">아이디 입력 바로가기</a>
        <a href="#none">비밀번호 입력 바로가기</a>
    </div>
    
    <div class="header">        
        <h1><a href="index.php">교촌치킨</a></h1>
        <div class="login_background"></div>        
    </div>    

    <div class="content">
        <div class="login_box">
            <form action="login_ok.php" name="" id="login_top" method="post">
                <fieldset>
                <legend>로그인</legend>
                <div class="top_box">
                    <h2>로그인</h2>
                </div>
                <input class="id_box" type="text" name="uid" id="id" value="아이디 입력">
                <span class="id_span"></span>
                <input class="pw_box" type="password" name="pwd" id="pw">
                <button type="button" class="login_button" onclick="frm_check(this.form)" style='cursor:pointer;'>LOGIN</button>
                <input class="checkbox_1" type="checkbox" name="checkbox1" id="checkbox1" value="checkbox1"><label for="checkbox1"><span class="checkbox_1_txt">로그인 상태 유지</span></label>
                <input class="checkbox_2" type="checkbox" name="checkbox2" id="checkbox2" value="checkbox2"><label for="checkbox2"><span class="checkbox_2_txt">아이디 저장</span></label> 
                </fieldset>
            </form>      
                <p class="id_search"><a href="find_id.php">아이디 찾기</a></p>
                <span class="login_bar_1">막대기</span>
                <p class="pw_search"><a href="find_pwd.php">비밀번호 찾기</a></p>
                <span class="login_bar_2">막대기</span>
                <p class="join"><a href="join_step1.php">회원가입</a></p>
                
                <button type="button" class="naver_login" style='cursor:pointer;'><span class="naver_icon">네이버아이콘</span>NAVER 로그인</button>
                <button type="button" class="google_login" style='cursor:pointer;'><span class="google_icon">구글아이콘</span>GOOGLE 로그인</button>
                <button type="button" class="facebook_login" style='cursor:pointer;'><span class="facebook_icon">페이스북아이콘</span>FACEBOOK 로그인</button>         
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