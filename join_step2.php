<?php
include "inc/dbcon.php";

$mar_apply=isset($_POST["mar_apply"])? $_POST["mar_apply"]:"off";
$loc_apply=isset($_POST["loc_apply"])? $_POST["loc_apply"]:"off";

if($mar_apply=="y" && $loc_apply=="off"){
    $sql = "insert into members(mar_apply) values('$mar_apply');";
}else if($mar_apply=="off" && $loc_apply=="y"){
    $sql = "insert into members(loc_apply) values('$loc_apply');";
}else if($mar_apply=="y" && $loc_apply=="y"){
    $sql = "insert into members(mar_apply, loc_apply) values('$mar_apply','$loc_apply');";
}else if($mar_apply=="off" && $loc_apply=="off"){
    $sql = "insert into members(mar_apply, loc_apply) values(null,null);";
}
$result=mysqli_query($con,$sql);
mysqli_close($con);

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>본인인증</title>
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
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
        .mm_me_certification{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_me_certification.png)no-repeat;margin:0 0 0 79px;border:1px solid red;}
        .mm_information_enter{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_information_enter.png)no-repeat;margin:0 0 0 80px;}
        .mm_join_complete{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_join_complete.png)no-repeat;margin:0 0 0 80px;}

        /* me_ceritification_box */      
        .me_certification_box{width:800px;height:600px;border:1px solid #888888;margin:0 auto 103px;position:relative;background-color: white;}
        .me_certification_box legend{margin:-1px;width:0;height:0;overflow: hidden;}

        /* top_box */
        .top_box{width:480px;height:178px;margin:15px auto 15px;border:0;}
        .top_name{width:300px;height:40px;border:0;background-color:#f8f8f8;box-sizing: border-box;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#888888;padding:0 0 0 26px;margin-right:34px;margin-bottom:29px;}
        .top_country{width:140px;height:40px;border:0;background-color:#f8f8f8;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#888888;box-sizing: border-box;padding:0 0 0 29px;background:url(images/select.png) no-repeat;-webkit-appearance: none;margin-bottom:29px;}
        .birthday{width:300px;height:40px;border:0;background-color:#f8f8f8;box-sizing: border-box;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#888888;padding:0 0 0 26px;margin-right:34px;margin-bottom:29px;}
        .radio_sex input[type="radio"]{
        display:none;
        }
        .radio_sex input[type="radio"] + span{
        display:inline-block;
        background-color:#f8f8f8;        
        text-align:center;
        width:67px;
        height:40px;
        line-height:33px;
        font-weight:bold;
        cursor:pointer;
        color:#888888;
        margin-bottom:29px;
        }
        .radio_sex input[type="radio"]:checked + span{
        background:#f6e000;
        color:#888888;
        margin-bottom:29px;
        }
        .news_agency{width:140px;height:40px;border:0;background-color:#f8f8f8;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#888888;box-sizing: border-box;padding:0 0 0 10px;background:url(images/select.png) no-repeat;-webkit-appearance: none;margin-right:34px;}
        .pn{width:300px;height:40px;border:0;background-color:#f8f8f8;box-sizing: border-box;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#888888;padding:0 0 0 8px;}

        /* bottom_box */
        .bottom_box{border:0;}
        .checkbox{width:700px;height:288px;border-top:1px solid #888888;border-bottom:1px solid #888888;font-size:16px;font-family:"나눔바른고딕";font-weight:bold;margin:0 auto;}

        .red_txt{color:red;}

        .allcheck{width:700px;height:16px;float:left;margin:14px 0 0 0;}
        .allcheckbox{margin:2px 26px 0 26px;float:left;}
        .allcheckbox_txt{color:#888888;margin:0 500px 0 0;color:#221e1f;float:left;}

        .checkbox_content1{width:700px;height:16px;float:left;margin:42px 0 0 0;}
        .checkbox1{margin:2px 26px 0 26px;float:left;}        
        .checkbox1_txt{color:#888888;margin:0 294px 0 0;color:#221e1f;float:left;}
        .checkbox1_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}
        
        .checkbox_content2{width:700px;height:16px;float:left;margin:42px 0 0 0;}
        .checkbox2{margin:2px 26px 0 26px;float:left;}        
        .checkbox2_txt{color:#888888;margin:0 365px 0 0;color:#221e1f;float:left;}
        .checkbox2_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}

        .checkbox_content3{width:700px;height:16px;float:left;margin:42px 0 0 0;}
        .checkbox3{margin:2px 26px 0 26px;float:left;}         
        .checkbox3_txt{color:#888888;margin:0 351px 0 0;color:#221e1f;float:left;}
        .checkbox3_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}
        
        .checkbox_content4{width:700px;height:16px;float:left;margin:42px 0 0 0;}
        .checkbox4{margin:2px 26px 0 26px;float:left;}        
        .checkbox4_txt{color:#888888;margin:0 411px 0 0;color:#221e1f;float:left;}
        .checkbox4_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}

        /* button */
        .button_wrap{margin:0 auto 31px;width:800px;}
        .prev_button{margin:0 0 0 259px;border:0px;width:100px;height:40px;background-color:#985b10;font-size:20px;color:white;font-family:"나눔바른고딕";font-weight:bold;float:left;position:absolute;top:633px;}
        .next_button{margin:0 0 0 439px;border:0px;width:100px;height:40px;background-color:#985b10;font-size:20px;color:white;float:left;font-family:"나눔바른고딕";font-weight:bold;position:absolute;top:633px;}
        
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
        function form_check(frm){
            var top_name=document.getElementById("top_name");
            var birthday=document.getElementById("birthday");
            var pn=document.getElementById("pn");
            var birth_len=birthday.value.length;
            var pn_len=pn.value.length;
            var reg=/^[0-9]+$/g;
            var reg_pn=/^[0-9]+$/g; 
            var checkbox1=document.getElementById("checkbox1");
            var checkbox2=document.getElementById("checkbox2");
            var checkbox3=document.getElementById("checkbox3");
            var checkbox4=document.getElementById("checkbox4");

            if(top_name.value==""){
                alert("이름을 입력하시오.");
                top_name.focus();
                return false;
            };

            if(birthday.value==""){
                alert("생년월일을 입력하시오.");
                birthday.focus();
                return false;
            }else if (reg.test(birthday.value) == false){
                alert("생년월일은 숫자만 입력할 수 있습니다.");
                birthday.focus();
                return false;
            }else if(!(birth_len==8)){
                alert("생년월일은 8글자로 입력해주세요.");
                birthday.focus();
                return false;
            };

            if(pn.value==""){
                alert("휴대폰번호를 입력하시오.");
                pn.focus();
                return false;
            }else if(reg_pn.test(pn.value) == false){
                alert("휴대폰번호는 숫자만 입력할 수 있습니다.");
                pn.focus();
                return false;
            }else if(!(pn_len==11)){
                alert("휴대폰번호는 11글자로 입력해주세요.");
                pn.focus();
                return false;
            };

            if(!checkbox1.checked||!checkbox2.checked||!checkbox3.checked||!checkbox4.checked){
                alert("모든 체크박스를 체크하시오.");
                return false;
            }
            frm.submit();
        }

        $(function(){             
            $("#allcheckbox").click(function(){            
                if($("#allcheckbox").prop("checked")) {           
                    $("input[type=checkbox]").prop("checked",true);         
                } else { 
                    $("input[type=checkbox]").prop("checked",false); } 
            })
        });

    </script>
</head>
<body>
    <div class="skip_menu">
        <a href="#none">이름 입력 바로가기</a>
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

        <div class="me_certification_box">
            
            <form action="join_step3.php" name="me_certification_content" id="me_certification_content" method="post">        
                <fieldset class="top_box">                                     
                        <legend>회원정보입력</legend>
                        <input onFocus="this.value='';return true;" class="top_name" type="text" name="uname" id="top_name" value="이름">
                        <select name="nationality" id="top_country" class="top_country" style='cursor:pointer;'>
                            <option value="내국인">내국인</option>
                            <option value="외국인">외국인</option>
                        </select>
                        <input onFocus="this.value='';return true;" id="birthday" class="birthday" type="text" name="birth" value="생년월일 19850101 (8자리)">
                        <label class="radio_sex"><input type="radio" name="gender" id="radio" value="남" checked="checked"><span>남</span></label>
                        <label class="radio_sex"><input type="radio" name="gender" id="radio" value="여"><span>여</span></label>                        
                        <select class="news_agency" name="agency" id="news_agency" style='cursor:pointer;'>
                            <option value="SKT">SKT</option>
                            <option value="KT">KT</option>
                            <option value="LGU+">LGU+</option>
                            <option value="알뜰폰SKT">알뜰폰SKT</option>
                            <option value="알뜰폰KT">알뜰폰KT</option>
                            <option value="알뜰폰LGU+">알뜰폰LGU+</option>
                        </select>
                        <input onFocus="this.value='';return true;" class="pn" type="text" name="mobile" id="pn" value="휴대폰 번호 '-' 제외하고 숫자 입력 (11자리)">                    
                </fieldset>
                
                <fieldset class="bottom_box">
                <legend>약관동의</legend>
                    <div class="checkbox">
                        <div class="allcheck">
                            <input class="allcheckbox" type="checkbox" name="allcheckbox" id="allcheckbox" value="allcheckbox" onclick="all_check(this.form)"><label class="alllcheckbox_txt" for="allcheckbox">전체 선택</label>
                        </div>
                        <div class="checkbox_content1">
                            <input class="checkbox1" type="checkbox" name="checkbox1" id="checkbox1" value="checkbox1"><label for="checkbox1"><span class="checkbox1_txt"><span class="red_txt">[필수]</span> 개인정보 수집·이용·취급위탁 동의</span></label><span class="checkbox1_full"><a href="#none">전문보기</a></span>
                        </div>
                        <div class="checkbox_content2">
                            <input class="checkbox2" type="checkbox" name="checkbox2" id="checkbox2" value="checkbox2"><label for="checkbox2"><span class="checkbox2_txt"><span class="red_txt">[필수]</span> 고유식별 정보처리 동의</span></label><span class="checkbox2_full"><a href="#none">전문보기</a></span>
                        </div>
                        <div class="checkbox_content3">
                            <input class="checkbox3" type="checkbox"  name="checkbox3" id="checkbox3" value="checkbox3"><label for="checkbox3"><span class="checkbox3_txt"><span class="red_txt">[필수]</span> 본인확인 서비스 이용약관</span></label><span class="checkbox3_full"><a href="#none">전문보기</a></span>
                        </div>
                        <div class="checkbox_content4">
                            <input class="checkbox4" type="checkbox" name="checkbox4" id="checkbox4" value="checkbox4"><label for="checkbox4"><span class="checkbox4_txt"><span class="red_txt">[필수]</span> 통신사 이용약관</span></label><span class="checkbox4_full"><a href="#none">전문보기</a></span>
                        </div>
                    </div>               
                </fieldset>
                <div class="button_wrap">
                    <button type="button" class="prev_button" onclick="javascript:history.back();" style='cursor:pointer;'>이전</button>
                    <button type="button" class="next_button" onclick="form_check(this.form)" style='cursor:pointer;'>다음</button>        
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