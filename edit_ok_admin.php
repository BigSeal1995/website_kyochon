<meta charset="UTF-8">
<?php 
include "inc/dbcon.php";
session_start();

$idx = $_POST["idx"];

$pwd=$_POST["pwd"];
$agency=$_POST["agency"];
$mobile=$_POST["mobile"];
$email_id=$_POST["email_id"];
$email_dns=$_POST["email_dns"];
$email=$email_id."@".$email_dns;

if($pwd){
    $sql="update members set pwd='$pwd', agency='$agency', mobile='$mobile', email='$email' where idx=$idx;";
}else{
    $sql="update members set agency='$agency', mobile='$mobile', email='$email' where idx=$idx;";
}

$result=mysqli_query($con,$sql);

mysqli_close($con);

echo "
    <script type='text/javascript'>
        alert('수정이 완료되었습니다.');
        location.href = 'list_admin.php';
    </script>
";

?>