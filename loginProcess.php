<?php
    //include $_SERVER["DOCUMENT_ROOT"]."/common/inc/header.php";
   include $_SERVER["DOCUMENT_ROOT"]."/connect.php";

    $user_id=$_POST['usid'];
    $user_pw=$_POST['password'];

    $sql = "SELECT * FROM card.user WHERE usid='$user_id' AND password = '$user_pw'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

      //결과가 존재하면 세션 생성
      if ($row != null) {
         session_start();
         $_SESSION['usid'] = $row['usid'];
         $_SESSION['name'] = $row['nm'];
         echo "<script>location.replace('zoneList.php');</script>";
         exit;
     }
     
     //결과가 존재하지 않으면 로그인 실패
     if($row == null){
        echo "<script>alert('ID와 PW를 다시 확인해주세요')</script>";
        echo "<script>location.replace('login.php');</script>";
        exit;
     }
?>