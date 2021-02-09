<meta charset="UTF-8">
<?php
include "inc/dbcon.php";
session_start();

$idx = $_SESSION["s_idx"];

$sql="delete from members where idx=$idx;";

$result = mysqli_query($con, $sql);

unset($_SESSION["s_idx"]);
unset($_SESSION["s_uname"]);
unset($_SESSION["s_uid"]);

mysqli_close($con);

echo "
    <script type='text/javascript'>
        alert('탈퇴되었습니다.');
        location.href = 'index.php';
    </script>
";
?>