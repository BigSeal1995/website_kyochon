<?php
include "inc/dbcon.php";

$uid = $_POST["uid"];
$sql = "select uid from members where uid='$uid';";

$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>"<?php echo $uid; ?>" 검색결과</title>
    <style>
        *{margin:0;padding:0;font-family:"나눔바른고딕";}
        .header{height:59px;background-color:#c79f61;border-top:1px solid #c79f61;padding:17px 0 0 30px;box-sizing: border-box;color:white;font-weight:bold;font-size:20px;}
        .cancel{background:url(images/cancel.png) no-repeat;display:block;width:20px;height:20px;text-indent:-9999px;background-size:100% 100%;position:absolute;right:20px;top:20px;}
        .main{padding:30px;font-size:16px;}
        span{font-weight:bold}
        button{border:0px solid blue;width:100px;height:40px;font-size:16px;margin-left:230px;}

        <?php if(!$num){ ?>
        .blueText{color:#308ede}
        <?php } else{ ?>
        .redText{color:#f03a64}
        <?php } ?>
    </style>
    <?php  if(!$num){ ?>
    <script>
        function return_value(){
            opener.document.getElementById("uid").value = "<?php echo $uid; ?>";
            window.close();
        };
    </script>
    <?php } ?>
</head>
<body>
    <div class="header">검색결과<a href="#none" class="cancel" onclick="Winclose()">cancel</a></div>
    <div class="main">    
    <?php  if(!$num){ ?>
        <p>
            '<span><?php echo $uid; ?></span>'는 사용할 수 <span class="blueText">있는</span> 아이디 입니다.
        </p>
        <br>
        <p>
            <button type="button" style='cursor:pointer;' onclick="return_value()">사용하기</button>
        </p>
    <?php } else{ ?>
        <p>
            '<span><?php echo $uid; ?></span>'는 사용할 수 <span class="redText">없는</span> 아이디 입니다.
        </p>
        <br>
        <p>
        <button type="button" style='cursor:pointer;' onclick="javascript:history.back();">다시 검색</button>
    </p>
    <?php }; ?>    
    </div>
</body>
</html>
















