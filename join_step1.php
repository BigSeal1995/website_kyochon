<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>약관동의</title>
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
        .header{height:100px;margin:0 auto;position:relative;border:1px solid #c79f61;;background-color: #c79f61;}
        .header h1{width:173px;height:70px;background:url(images/logo.png) no-repeat;background-size:100% 100%;text-indent:-9999px;margin:15px auto 11px;}
        .header h1 a{display:block;height:100%;}

        .login_background{height:500px;margin:auto;background-color: #f8f8f8;}

        /* content */
        /* middle_menu */
        .middle_menu{width:800px;height:100px;box-sizing: border-box;position:relative;margin:auto;}
        .mm_terms_agree{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_terms_agree.png)no-repeat;border:1px solid red;margin:0 0 0 39px;}
        .mm_me_certification{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_me_certification.png)no-repeat;margin:0 0 0 79px;}
        .mm_information_enter{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_information_enter.png)no-repeat;margin:0 0 0 80px;}
        .mm_join_complete{float:left;text-indent:-9999px;width:120px;height:95px;background: url(images/step_join_complete.png)no-repeat;margin:0 0 0 80px;}

        /* terms_agree_box */      
        .terms_agree_box{width:800px;height:600px;border:1px solid #888888;margin:0 auto 103px;position: relative;background-color: white;}
        .terms_agree_box legend{margin:-1px;width:0;height:0;overflow: hidden;}
        .terms_agree_box fieldset{width:300px;height:300px;border:0px;margin:0 auto 30px;}

        .top_box{width:800px;height:128px;margin:0 auto 40px;padding:40px 0 0 49px;box-sizing:border-box;font-family:"나눔바른고딕";font-size:16px;}
        .top_box_h2{font-weight:bold;font-size:20px;}
        
        .checkbox1{margin:2px 12px 19px 25px;float:left;}
        .checkbox1_txt{display:block;color:#221e1f;font-size:16px;font-family:"나눔바른고딕";font-weight:bold;margin-bottom:20px;}
        
        .checkbox{width:700px;height:288px;border-top:1px solid #888888;border-bottom:1px solid #888888;font-size:16px;font-family:"나눔바른고딕";font-weight:bold;}

        .checkbox_content2{width:700px;height:16px;float:left;margin:19px 0 40px 0;}
        .checkbox2{margin:3px 10px 0 25px;float:left;}
        .checkbox2_red{display:block;color:red;float:left;margin:0 6px 0 0;} 
        .checkbox2_txt{color:#888888;margin:0 193px 1px 0;color:#221e1f;float:left;}
        .checkbox2_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}

        .checkbox_content3{width:700px;height:16px;float:left;margin:0 0 40px 0;}
        .checkbox3{margin:3px 10px 0 25px;float:left;}
        .checkbox3_red{display:block;color:red;float:left;margin:0 6px 0 0;} 
        .checkbox3_txt{color:#888888;margin:0 350px 1px 0;color:#221e1f;float:left;}
        .checkbox3_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}
        
        .checkbox_content4{width:700px;height:16px;float:left;margin:0 0 40px 0;}
        .checkbox4{margin:3px 10px 0 25px;float:left;}
        .checkbox4_red{display:block;color:red;float:left;margin:0 6px 0 0;} 
        .checkbox4_txt{color:#888888;margin:0 350px 1px 0;color:#221e1f;float:left;}

        .checkbox_content5{width:700px;height:16px;float:left;margin:0 0 40px 0;}
        .checkbox5{margin:3px 10px 0 25px;float:left;}
        .checkbox5_red{display:block;color:red;float:left;margin:0 6px 0 0;} 
        .checkbox5_txt{color:#888888;margin:0 269px 1px 0;color:#221e1f;float:left;}
        .checkbox5_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}

        .checkbox_content6{width:700px;height:16px;float:left;margin:0 0 40px 0;}
        .checkbox6{margin:3px 10px 0 25px;float:left;}
        .checkbox6_red{display:block;color:red;float:left;margin:0 6px 0 0;} 
        .checkbox6_txt{color:#888888;margin:0 276px 1px 0;color:#221e1f;float:left;}
        .checkbox6_full a{display:block;color:#b29999;text-decoration: underline;text-underline-position:under;overflow:hidden;width:58px;}

        /* button */
        .button_wrap{margin:0 auto 31px;width:800px;}
        .next_button{margin:0 0 0 349px;border:0px;width:100px;height:40px;background-color:#985b10;font-size:20px;color:white;font-family:"나눔바른고딕";font-weight:bold;position:absolute;top:633px;}
        
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
            var checkbox2=document.getElementById("checkbox2");
            var checkbox3=document.getElementById("checkbox3");
            var checkbox4=document.getElementById("checkbox4");        
            
            if(!checkbox2.checked||!checkbox3.checked||!checkbox4.checked){
                alert("필수 체크박스를 체크하세요!");
                return false;
            }
            
            frm.submit(); 
        }
        var check='false';

        function all_check(frm){
            if(check=='false'){
                for(i=0;i<frm.length;i++){
                    frm[i].checked=true;
                }
                check="true";
                return checkbox1;            
            }else{
                for(i=0;i<frm.length;i++){
                    frm[i].checked=false;
                }
                check="false";
                return checkbox1;
            }
        }
        
    </script>
</head>
<body>
    <div class="skip_menu">
        <a href="#none">전체선택 바로가기</a>
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

        <div class="terms_agree_box">
            <form action="join_step2.php" name="join_step1" id="terms_agree_content" method="post">
                <div class="top_box">
                    <ul>
                        <li class="top_box_h2">이용약관 동의</li>
                        <li>- 아래 약관을 잘 읽고 동의해주세요.</li>
                        <li>- 선택 사항에 동의 하지 않아도 서비스 이용은 가능합니다.</li>
                        <li>(단, 동의하지 않을 경우 제공 가능한 혜택이나 편의사항이 제한될 수 있습니다.)</li>
                    </ul>
                </div>
                <fieldset>
                <legend>약관동의</legend>                
                <input class="checkbox1" type="checkbox" name="checkbox" id="checkbox1" value="checkbox1" onclick="all_check(this.form)"><label class="checkbox1_txt" for="checkbox1">전체 선택</label>

                    <div class="checkbox">
                        <div class="checkbox_content2">
                            <input class="checkbox2" type="checkbox" name="mem_apply" id="checkbox2" value="checkbox2"><label for="checkbox2"><span class="checkbox2_red">&#91;필수&#93;</span><span class="checkbox2_txt">교촌 주문앱 및 멤버십 서비스 이용약관 동의</span></label><span class="checkbox2_full"><a href="#none">전문보기</a></span>
                        </div>
                        <div class="checkbox_content3">
                            <input class="checkbox3" type="checkbox" name="checkbox" id="checkbox3" value="checkbox3"><label for="checkbox3"><span class="checkbox3_red">&#91;필수&#93;</span><span class="checkbox3_txt">개인정보 수집 동의</span></label><span class="checkbox3_full"><a href="#none">전문보기</a></span>
                        </div>
                        <div class="checkbox_content4">
                            <input class="checkbox4" type="checkbox"  name="checkbox" id="checkbox4" value="checkbox4"><label for="checkbox4"><span class="checkbox4_red">&#91;필수&#93;</span><span class="checkbox4_txt">본인은 14세 이상입니다.</span></label>
                        </div>
                        <div class="checkbox_content5">
                            <input class="checkbox5" type="checkbox" name="mar_apply" id="checkbox5" value="y"><label for="checkbox5"><span class="checkbox5_txt">&#91;선택&#93;&nbsp;마케팅 활용 및 광고성 수신 동의</span></label><span class="checkbox5_full"><a href="#none">전문보기</a></span>
                        </div>
                        <div class="checkbox_content6">
                            <input class="checkbox6" type="checkbox" name="loc_apply" id="checkbox6" value="y"><label for="checkbox6"><span class="checkbox6_txt">&#91;선택&#93;&nbsp;위치기반 서비스 이용약관 동의</span></label><span class="checkbox6_full"><a href="#none">전문보기</a></span>
                        </div>
                    </div>      
                            
                </fieldset>
                <div class="button_wrap">
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