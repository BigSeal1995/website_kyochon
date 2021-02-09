<?php
include "inc/dbcon.php";
ini_set('display_errors', '0');

$uname=$_POST["uname"];
$mobile=$_POST["mobile"];
$email_id=$_POST["email_id"];
$email_dns=$_POST["email_dns"];
$email=$email_id."@".$email_dns;

$sql="select uid from members where uname='$uname' and mobile='$mobile' and email='$email';";

$result=mysqli_query($con,$sql);

$array = mysqli_fetch_array($result);
$g_uid=$array['uid'];


mysqli_close($con);    
?>
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
        .top_box_txt{color:#221e1f;font-size:20px;font-family:"나눔바른고딕";font-weight:bold;text-align:center;}

        /* bottom_box */
        .bottom_box{width:480px;height:497px;
        border-top:1px solid #888888;margin:auto;position:relative;}        
        .bottom_box_txt{text-align:center;margin:150px 0 150px 0;font-family:"나눔바른고딕"}
        button{border:0px;width:150px;height:40px;background-color:#fd8205;font-size:20px;color:white;font-family:"나눔바른고딕";font-weight:bold;cursor: pointer}
        .find_id{color:#308ede;font-weight:bold;}
        .buttonl{position:absolute;left:30px;}
        .buttonp{position:absolute;right:30px;}
        .none1{text-align:center;margin:150px 0 0 0;font-family:"나눔바른고딕";font-size:25px;margin-bottom:10px;}
        .none2{text-align:center;margin:0 0 110px 0;font-family:"나눔바른고딕"}
        .buttonn{position:absolute;left:165px}

        

        /* button */
        
        
        /* footer */
        .footer_wrap{background-color:#fafbfc;border-top:1px solid #e4e8eb}
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
            <form action="id_search_content" name="id_search_content" id="id_search_content">        
                <div class="top_box">
                    <p class="top_box_txt">아이디 찾기</p>
                </div>

                <?php if($g_uid){ ?>
                <div class="bottom_box">
                    <p class="bottom_box_txt">회원가입 시 사용한 아이디는 <span class="find_id"><?php echo $g_uid ?></span>입니다.</p>                    
                    <button type="button" class="buttonl" onclick="location.href='login.php'">로그인</button>
                    <button type="button" class="buttonp" onclick="location.href='find_pwd.php'">비밀번호 찾기</button>
                </div>          
                <?php } else if(!$g_uid || $g_uid=="admin"){ ?>
                <div class="bottom_box">
                    <p class="none1">가입된 정보가 없습니다.</p> 
                    <p class="none2">입력된 정보를 확인해주세요.</p>
                    <button type="button" class="buttonn" onclick="javascript:history.back();">다시검색</button>
                </div>
                <?php } ?> 
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