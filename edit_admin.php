<?php
include "inc/user_check.php";

include "inc/dbcon.php";

$idx=$_GET["idx"];

$sql = "select * from members where idx=$idx;";

$result = mysqli_query($con, $sql);

$array=mysqli_fetch_array($result);

$email_explode=explode("@",$array["email"]);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자페이지</title>
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</head>
<style type="text/css">
    /* CSS Reset */
    *{margin:0;padding:0;font-family:"나눔바른고딕"}
    body{height:1000px;overflow-x: hidden;overflow-y: auto;}
    address{font-style:normal;}
    a{color:black;text-decoration: none;}
    ul,li {list-style: none;}

    /* header */    
    .header{width:300px;height:1000px;background-color:#353535;position:relative;}
    h1{width:173px;height:70px;background:url(images/교촌logo.png) no-repeat;background-size:100% 100%;text-indent:-9999px;position:absolute;top:30px;right:60px;}
    h1 a{width:100%;height:100%;display:block;}

    .li1{width:300px;top:150px;position:absolute;padding-left:30px;box-sizing:border-box;}
    .icon1{width:40px;height:40px;display:block;background:url("images/community.png") no-repeat;background-size:100% 100%;text-indent:-9999px;}
    .gnb_txt1{display:block;position:absolute;top:10px;left:100px;color:#dededd;font-weight:bold;}

    .li1 ul{width:300px;height:135px;background-color:#757575;position:absolute;top:40px;left:0px;padding-left:100px;box-sizing:border-box;font-weight:bold;display:none}
    .li1 ul li{margin-top:30px;}
    .li1 ul li a{color:#ffffff;width:65px;height:16px;}

    .li2 ul{width:300px;height:135px;background-color:#757575;position:absolute;top:40px;left:0px;padding-left:100px;box-sizing:border-box;font-weight:bold;display:none}
    .li2 ul li{margin-top:30px;}
    .li2 ul li a{color:#ffffff;width:65px;height:16px;}

    .arrow{width:40px;height:40px;display:block;background:url("images/arrow.png") no-repeat;background-position:0 -20px;background-size:100% 100%;text-indent:-9999px;position:absolute;top:13px;right:30px;}
    .gnb a{display:block;height:100%;width:200px;}

    .li2{width:300px;position:absolute;top:220px;padding-left:30px;box-sizing:border-box;}
    .icon2{width:40px;height:40px;display:block;background:url("images/monitor.png") no-repeat;background-size:100% 100%;text-indent:-9999px;}
    .gnb_txt2{display:block;position:absolute;top:10px;left:100px;color:#dededd;font-weight:bold;}

    /* main */
    .content{height:1000px;background-color:#eeeeee;position:relative;top:-1000px;left:300px;}
    .content_top{height:50px;background-color:#ffffff;box-shadow:0 0 10px gray;padding:15px 0 0 20px;box-sizing:border-box;}
    .content_top p{font-size:18px;color:#82878b;font-weight:bold;}
    .button1{position:absolute;top:5px;left:1470px;font-size:16px;font-weight:bold;color:#7785a1;background-color:#ffffff;width:100px;height:40px;box-shadow:0 0 2px gray;border:0;outline:0;cursor: pointer;}
    .button2{position:absolute;top:5px;left:1340px;font-size:16px;font-weight:bold;color:#7785a1;background-color:#ffffff;width:100px;height:40px;box-shadow:0 0 2px gray;border:0;outline:0;cursor: pointer;}

    .content_main{border-radius:10px;width:1200px;height:700px;position:absolute;top:175px;left:205px;background-color:#ffffff;box-shadow:1px 1px 5px 0 gray;}
    .content_main_top{width:1200px;font-size:20px;color:#82878b;font-weight:bold;border-bottom: 1px solid #f7f7f7;padding:20px;box-sizing:border-box;box-shadow:0 3px 3px -3px gray;}
    .uname{color:#308ede}

    fieldset{border:0;}
    legend{margin:-1px;width:0;height:0;overflow:hidden;}

    table{width:900px;margin:50px auto 10px;}
    td{height:50px}
    table,td{border:1px solid black;border-collapse: collapse;}
    .td1{width:110px;font-size:18px;text-align:center;background-color:#c79f61;}
    .td2{padding-left:10px;box-sizing:border;}

    .pwd_box{width:200px;height:40px;background-color:#f5f5f5;padding:0 0 0 20px;box-sizing:border-box;border:0;font-size:15px;}
    .news_agency{width:140px;height:40px;border:0;background-color:#f5f5f5;font-family:"나눔바른고딕";font-size:16px;font-weight:bold;color:#555555;box-sizing: border-box;padding:0 0 0 10px;background:url(images/select.png) no-repeat;-webkit-appearance: none;}
    .mobile_box{width:250px;height:40px;background-color:#f5f5f5;padding:0 0 0 20px;box-sizing:border-box;border:0;font-size:15px;}
    .email_id{width:130px;height:40px;margin-right:3px;padding-left:20px;box-sizing:border-box;font-size:15px;background-color:#f5f5f5;border:0;}        
    .email_dns{width:130px;height:40px;margin:0 6px 0 3px;padding-left:20px;box-sizing:border-box;font-size:15px;background-color:#f5f5f5;border:0;}
    .email_sel{width:140px;height:40px;box-sizing: border-box;padding-left:10px;background:url(images/select.png) no-repeat;-webkit-appearance: none;font-size:15px;background-color:#f5f5f5;border:0;}

    .view_button{left:555px;position:absolute;top:635px;}
    .view_button a{color:#000;text-decoration:none;display:inline-block;border:1px solid #999;border-radius:3px;padding:5px 7px}
    .view_button button{width:46px;height:31px;background-color:#ffffff;color:#000;text-decoration:none;border:1px solid #999;border-radius:3px;padding:3px 7px;font-size:16px;box-sizing:border;cursor:pointer;}

    .back{position:absolute;top:645px;right:50px;}
    

</style>
<script type="text/javascript">   
    function form_check(frm){
        var pwd=document.getElementById("pwd");
        var pwd_len=pwd.value.length;
        var repwd=document.getElementById("repwd");           
        var mobile=document.getElementById("mobile");
        var mobile_len=mobile.value.length;
        var email_id=document.getElementById("email_id");
        var email_id_len=email_id.value.length;
        var email_dns=document.getElementById("email_dns");
        var email_dns_len=email_dns.value.length;
        var reg=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,14}$/;
        var m_reg=/^[0-9]+$/g; 
        var e_reg=/^[a-zA-z0-9._%+-]+$/;
        var ed_reg=/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,6}$/;
        
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

        if(mobile.value==""){
            alert("휴대폰번호를 입력하시오.");
            mobile.focus();
            return false;
        }else if(m_reg.test(mobile.value) == false){
            alert("휴대폰번호는 숫자만 입력할 수 있습니다.");
            mobile.focus();
            return false;
        }else if(!(mobile_len==11)){
            alert("휴대폰번호는 11글자로 입력해주세요.");
            mobile.focus();
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

    function change_email(){
        var email_dns=document.getElementById("email_dns");
        var email_sel=document.getElementById("email_sel");

        var idx=email_sel.options.selectedIndex;
        
        if(email_sel.options[idx].value==""){
            email_dns.focus();
        }
        email_dns.value=email_sel.options[idx].value; 
        if(email_dns.value=="1"){
            email_dns.focus();
            email_dns.value="";
            email_dns.readOnly=false;
        }else{
            email_dns.readOnly=true;
        }
        return false;            
    };

    $(function(){
        $("button").hover(function(){
            $(this).css({"background-color":"#eeeeee"});
        },function(){
            $(this).css({"background-color":""});
        });

        $("button").hover(function(){
            $(this).css({"background-color":"#eeeeee"});
        },function(){
            $(this).css({"background-color":""});
        });        
        
        $(".li1 a").click(function(){            
            $(".li1 ul").slideToggle(200);
            $(".li2").animate({top:325});
        });
        
        $(".li2 a").click(function(){            
            $(".li1 ul").slideUp(500);
            $(".li2 ul").slideToggle(200);
            $(".li2").animate({top:220});      
        });

        $(".li1 ul li").hover(function(){
            $(this).css({"text-decoration":"underline"});
        },function(){
            $(this).css({"text-decoration":""});
        });
        
        $(".li2 ul li").hover(function(){
            $(this).css({"text-decoration":"underline"});
        },function(){
            $(this).css({"text-decoration":""});
        });

        $(".view_button a").hover(function(){
            $(this).css({"background-color":"#eeeeee"});
        },function(){
            $(this).css({"background-color":""});
        });
        
        $(".back").hover(function(){
            $(this).css({"color":"red"});
        },function(){
            $(this).css({"color":""});
        }); 
    });

    function del_mem(idx){
            var rt = confirm("정말 탈퇴하시겠습니까?");
            if(rt){
                // alert("delete_ok.php?idx"+idx);
                location.href = "delete_ok_admin.php?idx="+idx;
            };
        };
</script>
<?php if($s_uid){ ?>
    <script>
        function logout_check(){
            var rt = confirm("정말 로그아웃하시겠습니까?");
            if(rt){  // if(rt == true){
                location.href = "logout_ok_admin.php";
            };
        };
    </script>
<?php } ?>
<body>
    <!-- header -->
    <div class="header">
        <h1><a href="index_admin.php">교촌치킨</a></h1>
        <ul class="gnb">
            <li class="li1">
                <a href="#none"><span class="icon1">아이콘</span><span class="gnb_txt1">회원 관리</span><span class="arrow">화살표</span></a>
                <ul>
                    <li><a href="list_admin.php">회원 목록</a></li>
                    <li><a href="#none">Null</a></li>
                </ul>
            </li>
            <li class="li2">
                <a href="#none"><span class="icon2">아이콘</span><span class="gnb_txt2">온라인주문 관리</span><span class="arrow">화살표</span></a>
                <ul>
                    <li><a href="list_order_admin.php">주문 목록</a></li>
                    <li><a href="#none">Null</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- main -->
    <div class="content">
        <div class="content_top">
            <p>관리자 페이지</p>   
            <button type="button" class="button1" onclick = "location.href = 'index.php' ">메인으로</button>
            <button type="button" class="button2" onclick="logout_check()">로그아웃</button>
        </div>
        <div class="content_main">
            <p class="content_main_top"><span class="uname"><?php echo $array["uname"]; ?></span>님의 회원정보 수정</p>
            <form name="edit_form" action="edit_ok_admin.php" method="post">
                <fieldset>
                    <legend>회원정보 수정</legend>
                    <input type="hidden" name="idx" value="<?php echo $idx; ?>">
                    <table>
                        <tr>
                            <td class="td1">이름</td>
                            <td class="td2"><?php echo $array["uname"]; ?></td>
                        </tr>
                        <tr>
                            <td class="td1">성별</td>
                            <td class="td2"><?php echo $array["gender"]; ?></td>
                        </tr>
                        <tr>
                            <td class="td1">아이디</td>
                            <td class="td2"><?php echo $array["uid"]; ?></td>
                        </tr>
                        <tr>
                            <td class="td1">국적</td>
                            <td class="td2"><?php echo $array["nationality"]; ?></td>
                        </tr>
                        <tr>
                            <td class="td1">생일</td>
                            <td class="td2"><?php echo substr($array["birth"],0,4)."-".substr($array["birth"],4,2)."-".substr($array["birth"],6,2) ?></td>
                        </tr>
                        <tr>
                            <td class="td1"><label for="pwd">비밀번호</label></td>
                            <td class="td2"><input type="password" name="pwd" id="pwd" class="pwd_box"> 숫자, 문자, 특수문자 포함 6~14글자만 입력</td>
                        </tr>
                        <tr>
                            <td class="td1"><label for="repwd">비밀번호 확인</label></td>
                            <td class="td2"><input type="password" name="repwd" id="repwd" class="pwd_box"></td>
                        </tr>
                        <tr>
                            <td class="td1"><label for="repwd">통신사</label></td>
                            <td class="td2">
                                <select class="news_agency" name="agency" id="news_agency" style='cursor:pointer;'>
                                    <option value="SKT">SKT</option>
                                    <option value="KT">KT</option>
                                    <option value="LGU+">LGU+</option>
                                    <option value="알뜰폰SKT">알뜰폰SKT</option>
                                    <option value="알뜰폰KT">알뜰폰KT</option>
                                    <option value="알뜰폰LGU+">알뜰폰LGU+</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td1">전화번호</td>
                            <td class="td2"><input class="mobile_box" type="text" name="mobile" id="mobile" onFocus="this.value='';return true;" value="<?php echo $array["mobile"]; ?>">  '-' 제외하고 숫자 입력 (11자리)</td>
                        </tr>
                        <tr>
                            <td class="td1">이메일</td>
                            <td class="td2">
                                <input class="email_id" type="text" name="email_id" id="email_id" onFocus="this.value='';return true;" value="<?php echo "$email_explode[0]"; ?>"> @
                                <input class="email_dns" type="text" name="email_dns" id="email_dns" value="<?php echo "$email_explode[1]"; ?>">
                                <select class="email_sel" id="email_sel" name="email_sel" onchange="change_email()">
                                    <option value="1">직접입력</option>
                                    <option value="naver.com">naver.com</option>
                                    <option value="daum.net">daum.net</option>
                                    <option value="nate.com">nate.com</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="view_button">                
                        <button type="button" onclick="form_check(this.form)">수정</button>
                        <a href="#none" onclick="del_mem(<?php echo $array["idx"]; ?>)">삭제</a>
                    </div>
                    <a class="back" href="list_admin.php">목록으로</a>
                </fieldset>
            </form>
            
        </div>
    </div>
</body>
</html>