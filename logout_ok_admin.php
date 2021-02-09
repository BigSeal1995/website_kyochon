<meta charset="UTF-8">
<?php
session_start();

unset($_SESSION["s_uname"]);
unset($_SESSION["s_uid"]);

echo "
    <script>
        location.href = \"index.php\";
    </script>
";

?>