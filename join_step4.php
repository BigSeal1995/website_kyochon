<?php
include "inc/dbcon.php";

$uid=$_POST["uid"];
$pwd=$_POST["pwd"];
$email_id=$_POST["email_id"];
$email_dns=$_POST["email_dns"];
$email=$email_id."@".$email_dns;
$reg_date=date("Y-m-d");

$sql="select * from members order by idx desc;";

$result=mysqli_query($con,$sql);

$array = mysqli_fetch_array($result);
$g_idx=$array['idx'];
$g_uname=$array['uname'];

$c_sql = "update members set uid='$uid', pwd='$pwd', email='$email', reg_date='$reg_date' where idx='$g_idx';";

$c_result=mysqli_query($con,$c_sql);
mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>가입완료</title>
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
        .header{height:100px;margin:0 auto;position:relative;border:1px solid#c79f61;background-color: #c79f61;}
        .header h1{width:173px;height:70px;background:url(images/logo.png) no-repeat;background-size:100% 100%;text-indent:-9999px;margin:15px auto 11px;}
        .header h1 a{display:block;height:100%;}

        .login_background{height:500px;margin:auto;background-color: #f8f8f8;}

        /* content */
        /* middle_menu */
        .middle_menu{width:800px;height:100px;box-sizing: border-box;position:relative;margin:auto;}
        .mm_terms_agree{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_terms_agree.png)no-repeat;margin:0 0 0 39px;}
        .mm_me_certification{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_me_certification.png)no-repeat;margin:0 0 0 79px;}
        .mm_information_enter{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_information_enter.png)no-repeat;margin:0 0 0 80px;}
        .mm_join_complete{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_join_complete.png)no-repeat;margin:0 0 0 80px;border:1px solid red;}

        /* join_complete_box */      
        .join_complete_box{width:800px;height:600px;border:1px solid #888888;margin:0 auto 32px;position:relative;background-color: white;}
        .join_complete_box legend{margin:-1px;width:0;height:0;overflow: hidden;}

        /* top_box */
        .top_box{width:700px;height:208px;margin:auto;padding:89px 0 0 0;box-sizing:border-box;}
        .top_box_txt{color:#221e1f;font-size:30px;font-family:"나눔바른고딕";font-weight:bold;text-align:center;}

        /* bottom_box */
        .bottom_box{width:700px;height:389px;
        border-top:1px solid #888888;margin:0 auto;}        
        
        .step_image{width:309px;height:390px;float:left;}
        .step_image1{display:inline-block;text-indent:-9999px;width:120px;height:95px;background:url(images/step_image1.png)no-repeat;margin:22px 0 0 94px;}
        .step_image4{display:inline-block;text-indent:-9999px;width:120px;height:95px;background:url(images/step_image4.png)no-repeat;margin:34px 63px 0 0;}
        .step_image2{display:inline-block;text-indent:-9999px;width:120px;height:95px;background:url(images/step_image2.png)no-repeat;margin:33px 0 0 0;}
        .step_image3{display:inline-block;text-indent:-9999px;width:120px;height:95px;background:url(images/step_image3.png)no-repeat;margin:33px 0 0 93px;}        

        .bottom_information_enter_box{width:325px;height:298px;margin:45px auto;border:0;}
        .bottom_information_enter_box input{font-size:16px;font-weight:bold;font-family:"나눔바른고딕";border:0;font-weight:bold;text-align:center;}
        .bottom_name{width:100px;height:40px;background-color:#f6e000;color:#221e1f;margin:0 19px 89px 0;}
        .bottom_name_v{width:200px;height:40px;background-color:#f8f8f8;color:#888888;margin-bottom:89px;}        
        .bottom_id{width:100px;height:40px;background-color:#f6e000;color:#221e1f;margin:0 19px 89px 0;}
        .bottom_id_v{width:200px;height:40px;background-color:#f8f8f8;color:#888888;margin-bottom:89px;}       
        .bottom_mail{width:100px;height:40px;background-color:#f6e000;color:#221e1f;margin-right:19px;}
        .bottom_mail_v{width:200px;height:40px;background-color:#f8f8f8;color:#888888;}

        /* button */
        .button_wrap{margin:0 auto 31px;width:800px;}
        .login_button{margin:0 0 0 324px;border:0px;width:150px;height:40px;background-color:#985b10;font-size:20px;color:white;font-family:"나눔바른고딕";font-weight:bold;}
        
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
</head>
<body>
    <div class="skip_menu">
        <a href="#none">로그인 바로가기</a>
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

        <div class="join_complete_box">
            <form action="" name="join_complete_content" id="join_complete_content">        
                <div class="top_box">
                    <p class="top_box_txt">교촌의 식구가 되신것을 환영합니다 !!</p>
                </div>
                <div class="bottom_box">
                    <div class="step_image">
                        <span class="step_image1">달걀이미지</span>
                        <span class="step_image4">치킨이미지</span>
                        <span class="step_image2">병아리이미지</span>
                        <span class="step_image3">닭이미지</span>
                    </div>
                <fieldset class="bottom_information_enter_box">
                <legend>회원정보</legend>
                    
                    <input class="bottom_name" type="text" name="bottom_name" id="bottom_name" value="이름" disabled>
                    <input class="bottom_name_v" type="text" name="bottom_name_v" id="bottom_name_v" value="<?php echo $g_uname ?>" disabled>
                    
                    <input class="bottom_id" type="text" name="bottom_id" id="bottom_id" value="아이디" disabled>
                    <input class="bottom_id_v" type="text" name="bottom_id_v" id="bottom_id_v" value="<?php echo $uid ?>" disabled>
                    
                    <input class="bottom_mail" type="text" name="bottom_mail" id="bottom_mail" value="이메일" disabled>
                    <input class="bottom_mail_v" type="text" name="bottom_mail_v" id="bottom_mail_v" value="<?php echo $email ?>" disabled>
                </fieldset>
            </div>
            </form>            
        </div>
    </div>

    <div class="button_wrap">
        <button type="button" class="login_button" style='cursor:pointer;' onclick="location.href='login.php'">로그인</button>      
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