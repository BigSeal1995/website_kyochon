<?php
include "inc/dbcon.php";

$uname=$_POST["uname"];
$nationality=$_POST["nationality"];
$birth=$_POST["birth"];
$gender=$_POST["gender"];
$agency=$_POST["agency"];
$mobile=$_POST["mobile"];

$sql="select * from members order by idx desc;";

$result=mysqli_query($con,$sql);

$array = mysqli_fetch_array($result);
$g_idx=$array['idx'];

$c_sql = "update members set uname='$uname', nationality='$nationality', birth='$birth', gender='$gender', agency='$agency', mobile='$mobile' where idx='$g_idx';";

$c_result=mysqli_query($con,$c_sql);
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보입력</title>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
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
        .header{height:100px;margin:0 auto;position:relative;border:1px solid #c79f61;background-color: #c79f61;}
        .header h1{width:173px;height:70px;background:url(images/logo.png) no-repeat;background-size:100% 100%;text-indent:-9999px;margin:15px auto 11px;}
        .header h1 a{display:block;height:100%;}

        .login_background{height:500px;margin:auto;background-color: #f8f8f8;}

        /* content */
        /* middle_menu */
        .middle_menu{width:800px;height:100px;box-sizing: border-box;position:relative;margin:auto;}
        .mm_terms_agree{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_terms_agree.png)no-repeat;margin:0 0 0 39px;}
        .mm_me_certification{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_me_certification.png)no-repeat;margin:0 0 0 79px;}
        .mm_information_enter{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_information_enter.png)no-repeat;margin:0 0 0 80px;border:1px solid red;}
        .mm_join_complete{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_join_complete.png)no-repeat;margin:0 0 0 80px;}

         /* information_enter_box */      
        .information_enter_box{width:800px;height:600px;border:1px solid #888888;margin:0 auto 103px;position:relative;background-color: white;}
        .information_enter_box legend{margin:-1px;width:0;height:0;overflow: hidden;}

        /* top_box */
        .top_box{width:480px;height:178px;margin:15px auto 15px;border:0;}
        .top_box input{background-color:#f8f8f8;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#888888;text-align:center;border:0;}
        .top_name{width:300px;height:40px;margin-right:34px;margin-bottom:29px;}
        .top_country{width:140px;height:40px;margin-bottom:29px;}
        .top_birthday{width:300px;height:40px;margin-right:34px;margin-bottom:29px;}
        .radio_sex{width:140px;height:40px;}
        .news_agency{width:140px;height:40px;margin-right:34px;}
        .pn{width:300px;height:40px;}

        /* bottom_box */        
        .bottom_box{width:700px;height:389px;
        border-top:1px solid #888888;margin:0 auto;}
        .bottom_information_enter_box{width:485px;height:330px;border:0;margin: 28px auto;}
        .bottom_box input,span,select{font-size:16px;font-family:"나눔바른고딕";font-weight:bold;color:#888888;background-color:#f8f8f8;border:0;}

        .id_enter{width:300px;height:40px;margin-right:36px;margin-bottom:57px;padding:0 0 0 26px;box-sizing: border-box;}
        .double_checkbox{width:140px;height:40px;border:0;background-color:#985b10;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:white;margin-bottom:57px;text-align:center;}
        .pw_enter{width:481px;height:40px;margin-bottom:57px;padding:0 0 0 26px;box-sizing: border-box;background:url("images/pw_enter_bg.png")}
        .pw_check_enter{width:481px;height:40px;margin-bottom:57px;padding:0 0 0 26px;box-sizing: border-box;background:url("images/pw_check_enter_bg.png")}
        .email_id{width:150px;height:40px;margin-bottom:57px;text-align:center;margin-right:3px;}        
        .email_dns{width:150px;height:40px;margin-bottom:57px;margin:0 14px 0 3px;padding-left:10px;box-sizing:border-box;}
        .email_sel{width:140px;height:40px;box-sizing: border-box;padding-left:10px;background:url(images/select.png) no-repeat;-webkit-appearance: none;}


        /* button */
        .button_wrap{margin:0 auto 31px;width:800px;}
        .button_wrap button{border:0px;width:100px;height:40px;background-color:#985b10;font-size:20px;color:white;font-family:"나눔바른고딕";font-weight:bold;}
        .prev_button{margin:0 0 0 259px;float:left;position:absolute;top:633px;}
        .next_button{margin:0 0 0 439px;position:absolute;top:633px;}
        
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

            $(".pw_enter").focus(function(){
                $(this).css("background-image","url(images/pw_box_c.png)");
            });

            $(".pw_check_enter").focus(function(){
                $(this).css("background-image","url(images/pw_box_c.png)");
            });
            
            $(".email_id").focus(function(){
                $(this).val('');
            });
        });

        function form_check(frm){
            var uid=document.getElementById("uid");
            var uid_len=uid.value.length;
            var pwd=document.getElementById("pwd");
            var pwd_len=pwd.value.length;
            var repwd=document.getElementById("repwd");
            var repwd_len=repwd.value.length;
            var reg=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,14}$/;
            var email_id=document.getElementById("email_id");
            var email_id_len=email_id.value.length;
            var email_dns=document.getElementById("email_dns");
            var email_dns_len=email_dns.value.length;
            var e_reg=/^[a-zA-z0-9._%+-]+$/;
            var ed_reg=/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,6}$/;
            

            if(uid_len<6||uid_len>12){
                alert("아이디는 6~12글자로 입력해주세요.");
                uid.focus();
                return false;
            }; 

            if(pwd.value==""){
                alert("비밀번호를 입력하시오.");
                pwd.focus();
                return false;
            }else if (reg.test(pwd.value) == false){
                alert("비밀번호는 숫자, 문자, 특수문자 모두 포함해 주세요");
                pwd.focus();
                return false;
            }else if(pwd_len<6||pwd_len>14){
                alert("비밀번호는 6~14글자로 입력해주세요.");
                pwd.focus();
                return false;
            }; 

            if(repwd.value != pwd.value){
                alert("비밀번호가 일치하지 않습니다.");
                repwd.focus();
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
                email_id.focus();
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
                email_dns.focus();
                return false;
            }; 
            frm.submit();
        };
        function id_check(){
            window.open("id_check.php","idCheck","width=600,height=300,left=100,top=100");
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
        <a href="#none">아이디 입력 바로가기</a>
        <a href="#none">비밀번호 입력 바로가기</a>
    </div>
    
    <div class="header">
        <h1><a href="index.php">교촌치킨</a></h1>
        <div class="login_background"></div>        
    </div>    

    <div class="content">
        <div class="middle_menu">
            <ul class="middle_menu_step">
                <li class="mm_terms_agree">약관동의</li>
                <li class="mm_me_certification">본인인증</li>
                <li class="mm_information_enter">정보입력</li>
                <li class="mm_join_complete">가입완료</li>
            </ul>
        </div>

        <div class="information_enter_box">
            <form action="join_step4.php" name="information_enter_content" id="information_enter_content" method="post">        
                <fieldset class="top_box">
                        <legend>회원정보</legend>
                        <input class="top_name" type="text" name="top_name" id="top_name" value="<?php echo $uname ?>" disabled>
                        <input class="top_country" type="text" name="top_country" id="top_country" value="<?php echo $nationality ?>" disabled>
                        <input class="top_birthday" type="text" value="<?php echo substr($birth,0,4)."-".substr($birth,4,2)."-".substr($birth,6,2) ?>" disabled>
                        <input class="radio_sex" type="text" name="radio_sex" id="radio_sex" value="<?php echo $gender ?>" disabled>
                        <input class="news_agency" type="text" name="news_agency" id="news_agency" value="<?php echo $agency ?>" disabled>                        
                        <input class="pn" type="text" name="pn" id="pn" value="<?php echo substr($mobile,0,3)."-".substr($mobile,3,4)."-".substr($mobile,7,4) ?>" disabled>                  
                </fieldset>
                
                <div class="bottom_box">
                <fieldset class="bottom_information_enter_box">
                <legend>회원정보입력</legend>                    
                        <input class="id_enter" type="text" name="uid" id="uid" value="아이디 (6~12글자)" readonly>
                        <button class="double_checkbox" type="button" style='cursor:pointer;' onclick="id_check()">중복확인</button>
                        <input class="pw_enter" type="password" name="pwd" id="pwd" value="">
                        <input class="pw_check_enter" type="password" name="repwd" id="repwd" value="">
                        <input class="email_id" type="text" name="email_id" id="email_id" value="이메일 입력"><span>@</span><input class="email_dns" type="text" name="email_dns" id="email_dns">
                        <select class="email_sel" id="email_sel" name="email_sel" onchange="change_email()" style='cursor:pointer;'>
                            <option value="1">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                            <option value="nate.com">nate.com</option>
                        </select>
                </fieldset>
            </div>
            <div class="button_wrap">
                <button type="button" class="prev_button" onclick="javascript:history.back();" style='cursor:pointer;'>이전</button>
                <button type="button" class="next_button" onclick="form_check(this.form)" style='cursor:pointer;'>가입완료</button>        
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