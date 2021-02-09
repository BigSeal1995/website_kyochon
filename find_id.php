<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <style>
        /* CSS Reset */
        *{padding:0;margin:0;}
        address{font-style:normal;}
        a{color:black;text-decoration: none;}
        ul,li {list-style: none;}

        /* skip_menu */
        .skip_menu{position:absolute}
        .skip_menu a{position:absolute;top:-100px;left:0;width:138px;border:1px solid #4ec53d;background:#333;text-align:center}
        .skip_menu a:active, .skip_menu a:focus{top:0;z-index:1000;text-decoration:none}
        .skip_menu span{display:inline-block;padding:2px 6px 0 0;color:#fff;letter-spacing:-1px;font-size:13px;line-height:26px}

        /* header */
        .header{height:100px;margin:0 auto 101px;position:relative;border:1px solid #c79f61;background-color: #c79f61;}
        .header h1{width:173px;height:70px;background:url(images/logo.png) no-repeat;background-size:100% 100%;text-indent:-9999px;margin:15px auto 11px;}
        .header h1 a{display:block;height:100%;}

        .login_background{height:500px;margin:auto;background-color: #f8f8f8;}

        /* content */
        /* id_search_box */      
        .id_search_box{width:800px;height:600px;border:1px solid #888888;margin:0 auto 103px;position:relative;background-color:white;}
        .id_search_box legend{margin:-1px;width:0;height:0;overflow:hidden;}

        /* top_box */
        .top_box{width:700px;height:100px;margin:auto;padding:39px 0 0 0;box-sizing:border-box;}
        .top_box_txt{color:#221e1f;font-size:30px;font-family:"나눔바른고딕";font-weight:bold;text-align:center;}

        /* bottom_box */
        .bottom_box{width:480px;height:497px;
        border-top:1px solid #888888;margin:auto;}        

        .bottom_box_enter{width:490px;height:497px;margin:auto;border:0;}
        .bottom_box_enter input,span,select{font-size:16px;font-weight:bold;font-family:"나눔바른고딕";border:0;color:#888888;}
        .bottom_name{width:480px;height:40px;background-color:#f8f8f8;padding:0 0 0 38px;box-sizing:border-box;margin:79px 0 0 0;}
        .bottom_pn{width:480px;height:40px;background-color:#f8f8f8;padding:0 0 0 38px;box-sizing:border-box;margin:40px 0 40px 0;}
        .bottom_mail1{width:150px;height:40px;background-color:#f8f8f8;padding:0 0 0 38px;box-sizing:border-box;margin-right:2px;}
        .bottom_mail2{width:150px;height:40px;background-color:#f8f8f8;margin-left:2px;padding-left:10px;box-sizing:border-box;}
        .mail_select{width:140px;height:40px;box-sizing:border-box;padding:0 0 0 21px;background:url(images/select.png) no-repeat;-webkit-appearance:none;margin-left:3px;cursor: pointer;padding-left:10px;}

        /* button */
        .id_search_button{border:0px;width:150px;height:40px;background-color:#fd8205;font-size:20px;color:white;font-family:"나눔바른고딕";font-weight:bold;margin:78px auto 0 166px;cursor: pointer}
        
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
        function form_check(frm){
            var uname=document.getElementById("uname");
            var uname_len=uname.value.length;
            var mobile=document.getElementById("mobile");
            var mobile_len=mobile.value.length;
            var email_id=document.getElementById("email_id");
            var email_id_len=email_id.value.length;
            var email_dns=document.getElementById("email_dns");
            var email_dns_len=email_dns.value.length;
            var m_reg=/^[0-9]+$/g; 
            var e_reg=/^[a-zA-z0-9._%+-]+$/;
            var ed_reg=/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,6}$/;
            

            if(uname_len==""){
                alert("아이디를 입력해주세요.");
                return false;
            }; 

            if(mobile.value==""){
                alert("휴대폰번호를 입력하시오.");
                return false;
            }else if(m_reg.test(mobile.value) == false){
                alert("휴대폰번호는 숫자만 입력할 수 있습니다.");
                mobile.focus();
                return false;
            }else if(!(mobile_len==11)){
                alert("휴대폰번호는 11글자로 입력해주세요.");
                return false;
            };

            if(email_id.value==""){
                alert("이메일을 입력하시오.");
                email_id.focus();
                return false;
            }else if (e_reg.test(email_id.value) == false){
                alert("이메일을 바르게 적어주세요");
                email_id.focus();
                return false;
            }else if(email_id_len>20){
                alert("이메일이 너무 깁니다.");
                return false;
            }; 

            if(email_dns.value==""){
                alert("이메일을 입력하시오.");
                email_dns.focus();
                return false;
            }else if (ed_reg.test(email_dns.value) == false){
                alert("이메일을 바르게 적어주세요");
                email_dns.focus();
                return false;
            }else if(email_dns_len>20){
                alert("이메일이 너무 깁니다.");
                return false;
            }; 
            frm.submit();
        };

        function change_email(){
            var email_dns=document.getElementById("email_dns");
            var email_sel=document.getElementById("email_sel");

            var idx=email_sel.options.selectedIndex;
            
            if(email_sel.options[idx].value==""){
                email_dns.focus();
            }
            email_dns.value=email_sel.options[idx].value; 
            if(email_dns.value=="1"){
                email_dns.value="";
                email_dns.readOnly=false;
            }else{
                email_dns.readOnly=true;
            }
            return false;            
        };
    </script>
</head>
<body>
    <div class="skip_menu">
        <a href="#none">이름 입력 바로가기</a>
        <a href="#none">휴대폰 번호 입력 바로가기</a>
        <a href="#none">이메일 입력 바로가기</a>
    </div>
    
    <div class="header">
        <h1><a href="index.php">교촌치킨</a></h1>
        <div class="login_background"></div>        
    </div>    

    <div class="content">
        <div class="id_search_box">
            <form action="find_id_ok.php" name="id_search_content" id="id_search_content" method="post">        
                <div class="top_box">
                    <p class="top_box_txt">아이디 찾기</p>
                </div>
                <div class="bottom_box">
                    <fieldset class="bottom_box_enter">
                    <legend>회원정보입력</legend>
                        
                        <input class="bottom_name" type="text" name="uname" id="uname" onFocus="this.value='';return true;" value="이름 입력" >
                        
                        <input class="bottom_pn" type="text" name="mobile" id="mobile" onFocus="this.value='';return true;" value="휴대폰 번호 '-' 제외하고 숫자 입력 (11자리)">
                        
                        <input class="bottom_mail1" type="text" name="email_id" id="email_id" onFocus="this.value='';return true;" value="이메일 입력">
                        <span class="bottom_txt">@</span>
                        <input class="bottom_mail2" type="text" name="email_dns" id="email_dns">
                        <select class="mail_select" id="email_sel" name="email_sel" onchange="change_email()">
                            <option value="1">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                            <option value="nate.com">nate.com</option>
                        </select>
                        <button class="id_search_button" type="button" onclick="form_check(this.form)">아이디 찾기</button>
                    </fieldset>
                </div>
            </form>            
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