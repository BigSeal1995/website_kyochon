<meta charset="UTF-8">
<?php
// 세션 시작
session_start();
$s_uid = isset($_SESSION["s_uid"])? $_SESSION["s_uid"]:"";

if(!$s_uid){
    // 비로그인 사용자 접근
    echo "
        <script type='text/javascript'>
            alert(\"로그인 정보가 없습니다.\");
            location.href = \"login.php\";
        </script>
    ";
    exit;
};

if($s_uid != "admin"){
    // 일반 사용자 접근
    echo "
        <script type='text/javascript'>
            alert(\"관리자 로그인이 필요합니다.\");
            location.href = \"index.php\";
        </script>
    ";
    exit;
};
?>