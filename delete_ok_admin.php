<meta charset="UTF-8">
<?php

session_start();

include "inc/dbcon.php";

$idx = $_GET["idx"];


$sql = "delete from members where idx=$idx;";

$result = mysqli_query($con, $sql);

mysqli_close($con);


echo "
    <script type='text/javascript'>
        location.href = 'list_admin.php';
    </script>
";


?>