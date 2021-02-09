<meta charset="UTF-8">
<?php
include "inc/dbcon.php";
session_start();
ini_set('display_errors', '0');

$uid=$_POST["uid"];
$pwd=$_POST["pwd"];

$sql="select idx, uname, uid, pwd from members where uid='$uid';";

$result=mysqli_query($con,$sql);

$array=mysqli_fetch_array($result);

$g_idx=$array["idx"];
$g_uname=$array["uname"];
$g_uid=$array["uid"];
$g_pwd=$array["pwd"];

if($uid!=$g_uid){
    echo"
        <script>
            alert(\"일치하는 아이디가 없습니다.\");
            history.back();
        </script>
    ";
}else{
    if($pwd!=$g_pwd){
        echo"
            <script>
                alert(\"비밀번호가 틀렸습니다.\");
                history.back();
            </script>
        ";
    }else{
        $_SESSION["s_idx"]=$g_idx;
        $_SESSION["s_uid"]=$g_uid;
        $_SESSION["s_uname"]=$g_uname;
        echo"
            <script>
                location.href=\"index.php\";
            </script>
        ";
    }    
}
?>
