<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>아이디 검색</title>
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <style type="text/css">
        *{margin:0;padding:0;font-family:"나눔바른고딕";}
        .header{height:59px;background-color:#c79f61;border-top:1px solid #c79f61;padding:17px 0 0 30px;box-sizing: border-box;color:white;font-weight:bold;font-size:20px;}
        a{background:url(images/cancel.png) no-repeat;display:block;width:20px;height:20px;text-indent:-9999px;background-size:100% 100%;position:absolute;right:20px;top:20px;}
        legend{width:0;height:0;margin:-1px;overflow: hidden;}
        fieldset{border:0px solid black;padding:30px;font-size:16px;}        
        input{width:150px;height:20px;}
        button{width:50px;height:25px;}        
        span{font-size:14px;color:#f00}  
    </style>
    <script>
        function id_check(frm){
            var uid = document.getElementById("uid");
            var txt = document.querySelector("span");
            var len = uid.value.length;
            
            if(uid.value == ""){
                txt.textContent = "아이디를 입력하세요.";
                uid.focus();
                return false;
            };
            
            if((len < 6) || (len > 12)){
                txt.textContent = "아이디는 6~12글자만 입력할 수 있습니다.";
                uid.focus();
                return false;
            };
            
            frm.submit();
        };
        function Winclose(){
            window.close();
        };
    </script>
</head>
<body>
    <div class="header">아이디 중복확인<a href="#none" onclick="Winclose()">cancel</a></div>
    <form name="id_check_form" action="id_search.php" method="post">
        <fieldset>
            <legend>아이디 중복확인</legend>
            <p>
                아이디는 6~12글자만 입력할 수 있습니다.
                <br><br>
                <label for="uid"></label>
                <input type="text" id="uid" name="uid">
                <button type="button" onclick="id_check(this.form)">검색</button><br><br>
                <span></span>
            </p>
        </fieldset>
    </form>
</body>
</html>