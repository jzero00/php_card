<?php
    include $_SERVER["DOCUMENT_ROOT"]."/connect.php";

    $data = json_decode($_POST['data']);
    $usid = $data->usid;

    $sql = "SELECT * FROM card.user
            WHERE usid = '".$usid."'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    $json = "";

    if($count == 0) {
        $json = json_encode(array("result"=> "success"));
    } else {
        $json = json_encode(array("result"=> "duplicated"));
    }
    echo $json;
?>