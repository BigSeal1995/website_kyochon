<?php
include "inc/user_check.php";

include "inc/dbcon.php";

$idx=$_GET["idx"];

$sql = "select * from members where idx=$idx;";

$result = mysqli_query($con, $sql);

$array=mysqli_fetch_array($result);


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
    *{margin:0;padding:0;}
    body{height:1000px;overflow-x: hidden;overflow-y: auto;font-family:"나눔바른고딕"}
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
    

    table{width:900px;margin:50px auto 10px;}
    td{height:60px}
    table,td{border:1px solid black;border-collapse: collapse;}
    .td1{width:110px;font-size:18px;text-align:center;background-color:#c79f61;}
    .td2{padding-left:10px;box-sizing:border;}

    .view_button{left:555px;position:absolute;top:635px;}
    .view_button a{color:#000;text-decoration:none;display:inline-block;border:1px solid #999;border-radius:3px;padding:5px 7px}
    
    .back{position:absolute;top:645px;right:50px;}
    

</style>
<script type="text/javascript">   
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
            <p class="content_main_top"><span class="uname"><?php echo $array["uname"]; ?></span>님의 가입 정보</p>
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
                    <td class="td1">전화번호</td>
                    <td class="td2"><?php echo $array["agency"]; ?>&nbsp;&nbsp;&nbsp;<?php echo substr($array["mobile"],0,3)."-".substr($array["mobile"],3,4)."-".substr($array["mobile"],7,4) ?></td>
                </tr>
                <tr>
                    <td class="td1">이메일</td>
                    <td class="td2"><?php echo $array["email"]; ?></td>
                </tr>   
                <tr>
                    <td class="td1">가입일</td>
                    <td class="td2"><?php echo $array["reg_date"]; ?></td>
                </tr>
            </table>
            <div class="view_button">                
                <a href="edit_admin.php?idx=<?php echo $array["idx"]; ?>">수정</a>
                <a href="#none" onclick="del_mem(<?php echo $array["idx"]; ?>)">삭제</a>
            </div>
            <a class="back" href="list_admin.php">목록으로</a>
        </div>
    </div>
</body>
</html>