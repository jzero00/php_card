<?php
    include $_SERVER["DOCUMENT_ROOT"]."/connect.php";

    $stmt = $conn->prepare("INSERT INTO card.user (usid, password, user_tel_no, user_ty, user_nm, seq)
                            VALUES 
                            (?, ?, ?, ?, ?,
                            (SELECT COALESCE(MAX(a.seq)+1,1) AS seq FROM card.user a))");

    $stmt->bind_param("sssss", $usid, $password, $userTelno, $userTy, $userNm);

    $usid = $_POST['usid'];
    $password = hash("sha256", substr($_POST['userTelno'], -4));
    $userTelno = $_POST['userTelno'];
    $userTy = $_POST['auth_no'];
    $userNm = $_POST['userNm'];

    $result = '';
    try{
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        $result = "<script>alert('등록 성공');location.href='/sys/userList.php'</script>";
    } catch (Exception $e){
        $stmt->close();
        $conn->close();
        $result = "등록 실패".$e->getMessage();
    } finally {
        echo $result;
    }

    echo $result;
?>