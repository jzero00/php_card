<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>로그인</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="./sha/core.min.js"></script>
  <script src="./sha/sha256.min.js"></script>
  <style>
    .log-in-form {
      border: 1px solid #cacaca;
      padding: 1rem;
      border-radius: 0;
    }
  </style>
</head>

<body>
  <form class="log-in-form" method="POST" id="frm" name="frm" action="loginProcess.php" onsubmit="return false">
    <h4 class="text-center">로그인</h4>
    <label>ID
      <input type="text" name="usid" id="usid" placeholder="ID를 입력해주세요">
    </label>
    <label>비밀번호
      <input type="password" AUTOCOMPLETE="off" id="password" placeholder="비밀번호">
    </label>
    <!--<input id="show-password" type="checkbox"><label for="show-password">Show password</label>-->
    <p><button type="" class="button expanded" style='cursor:pointer' id="loginBtn" onclick="login()">로그인</button></p>
    <input type="hidden" name="password" id="postPassword">
    <input type="hidden" name="prevUrl" id="prevUrl">
    <!--<p class="text-center"><a href="#">Forgot your password?</a></p>-->
  </form>
</body>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.min.js"></script>
<script>
  $(document).foundation();

  function login() {
    if (document.getElementById("usid").value == "") {
      alert("아이디를 입력해주십시오.");
    } else if (document.getElementById("password").value == "") {
      alert("비밀번호를 입력해주십시오.");
    } else {
      prevUrl = window.location.href;
      document.getElementById("prevUrl").value = prevUrl;
      var shaPw = CryptoJS.SHA256(document.getElementById("password").value).toString();
      document.getElementById("postPassword").value = shaPw;
      //form 보내기
      document.frm.submit();
    }
  }
</script>

</html>