<?php
include "inc/user_check.php";

include "inc/dbcon.php";

$sql = "select * from members;";

// 쿼리 전송
$result = mysqli_query($con, $sql);

// 전체 데이터 개수
//// pager : 전체 데이터 개수
$num = mysqli_num_rows($result);

//// pager : 한 페이지 당 글 개수
$list_num = 10;

//// pager : 한 블럭 당 페이지 수
$page_num = 3;

//// pager : 현재 페이지
$page = isset($_GET["page"])? $_GET["page"] : 1;

//// pager : 전체 페이지 수
// 전체 글 개수 / 한 페이지 당 글 개수
// ceil(숫자) = 올림값
$total_page = ceil($num/$list_num);
// echo "전체 페이지 수 : ".$total_page;

//// pager : 총 블럭 수
// 전체 페이지 수 / 한 블럭 당 페이지 수
$total_block = ceil($total_page/$page_num);
// echo "전체 페이지 수 : ".$total_block;

//// pager : 현재 블럭 번호
// 현재 페이지 번호 / 블럭 당 페이지 수
$now_block = ceil($page/$page_num);

//// pager : 블럭 당 시작 페이지 번호
// (해당 글의 블럭번호-1) * 블럭 당 페이지 수 + 1
$s_pageNum = ($now_block-1) * $page_num + 1;
// 페이지 수가 0인 경우 1로 설정
if($s_pageNum <= 0){
    $s_pageNum = 1;
};

//// pager : 블럭 당 종료 페이지 번호
// 현재 블럭 번호 * 블럭 당 페이지 수
$e_pageNum = $now_block * $page_num;
// 종료 페이지 번호가 최대 페이지 수를 넘지 않도록 설정
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
};

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

    table{margin:50px auto 10px;border:1px solid blue;width:1100px;text-align:center}
    .trhead{font-size:18px;background-color:#c79f61;height:70px;}
    table, td{border:1px solid black;border-collapse: collapse;}
    td{height:40px}
    td a{color:#000;text-decoration:none;display:inline-block;border:1px solid #999;border-radius:3px;padding:5px 7px}   

    .paging{text-align:center}
    .box{color:#ffffff;text-decoration:none;display:inline-block;border:1px solid #999;border-radius:3px;padding:5px 7px;background-color:#c79f61}

    .total{margin-left:1097px;}
    .pag{color:red;}

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

        $("table a").hover(function(){
            $(this).css({"background-color":"#eeeeee"});
        },function(){
            $(this).css({"background-color":""});
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
            <p class="content_main_top">가입된 회원 정보</p>
            <table>
                <tr class="trhead">
                    <td>번호</td>
                    <td>아이디</td>
                    <td>이름</td>
                    <td>국적</td>
                    <td>생년월일</td>
                    <td>성별</td>
                    <td>통신사</td>
                    <td>전화번호</td>
                    <td>이메일</td>
                    <td>약관동의1</td>
                    <td>약관동의2</td>
                    <td>가입일</td>
                    <td>설정</td>
                </tr>
                <?php
        
        //// pager : 시작 번호 
        // (현재 페이지 번호 -1) * 페이지 당 보여질 개수
        $start = ($page - 1) * $list_num;

        //// pager : 쿼리 작성
        // $sql = "select * from members limit 몇번부터(배열), 몇개;";
        $sql = "select * from members limit $start, $list_num;";
        
        //// pager : 쿼리 전송
        $result = mysqli_query($con, $sql);
        
        //// pager : 글번호
        // 전체 데이터 수 - ((현재 페이지 번호 - 1) * 페이지 당 보여질 개수)  --  역순
        // (현재 페이지 번호 - 1) * 페이지 당 보여질 개수 + 1  --  오름차순
        $cnt = $start + 1;
        while($array = mysqli_fetch_array($result)){  
            
        ?>
        <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $array["uid"]; ?></td>
            <td><?php echo $array["uname"]; ?></td>
            <td><?php echo $array["nationality"]; ?></td>
            <td><?php echo substr($array["birth"],0,4)."-".substr($array["birth"],4,2)."-".substr($array["birth"],6,2) ?></td>
            <td><?php echo $array["gender"]; ?></td>
            <td><?php echo $array["agency"]; ?></td>
            <td><?php echo substr($array["mobile"],0,3)."-".substr($array["mobile"],3,4)."-".substr($array["mobile"],7,4) ?></td>
            <td><?php echo $array["email"]; ?></td>
            <td><?php echo $array["mar_apply"]; ?></td>
            <td><?php echo $array["loc_apply"]; ?></td>
            <td><?php echo $array["reg_date"]; ?></td>
            <td>
            <!-- get ::  http://도메인?변수=값&변수=값&변수=값,... -->
                <a href="view_admin.php?idx=<?php echo $array["idx"]; ?>">보기</a>
                <a href="edit_admin.php?idx=<?php echo $array["idx"]; ?>">수정</a>
                <a href="#none" onclick="del_mem(<?php echo $array["idx"]; ?>)">삭제</a>
            </td>
        </tr>
        
        <?php  
            $cnt++;
        };  
        ?>
    </table>
    <p class="total">총 <?php echo $num; ?> 명</p>
    <p class="paging">
        <?php
            //// pager : 이전 페이지
            if($page <= 1){
        ?>
        <a href="list_admin.php?page=1" class="box">이전</a>
        <?php
            } else{
        ?>
        <a href="list_admin.php?page=<?php echo ($page-1); ?>" class="box">이전</a>
        <?php
            };
        ?>
        
        <?php
        //// pager : 번호 & 링크 출력
        for( $print_page = $s_pageNum;  $print_page <= $e_pageNum;  $print_page++){
            if($page==$print_page){
        ?>
            <a href="list_admin.php?page=<?php echo $print_page; ?>" class="pag"><?php echo $print_page; ?></a>
        <?php
            }else{
        ?>
            <a href="list_admin.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
        <?php }; };
            
        ?>
        
        <?php
            //// pager : 다음 페이지
            if($page >= $total_page){
        ?>
        <a href="list_admin.php?page=<?php echo $total_page; ?>" class="box">다음</a>
        <?php
            } else{
        ?>
        <a href="list_admin.php?page=<?php echo ($page+1); ?>" class="box">다음</a>
        <?php
            };
        ?>
        
    </p>    
        </div>
    </div>
</body>
</html>

