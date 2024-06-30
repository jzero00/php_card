<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
header("Content-Type: application/json");

$sql = "SELECT c.card_no, c.card_nm
        FROM card.card c 
        WHERE c.zone_no = " .$_POST['id'];

$result = mysqli_query($conn, $sql);
$db_card_no = array();
$db_card_nm = array();
$array = array();

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    array_push($db_card_no,$row['card_no']);
    array_push($db_card_nm,$row['card_nm']);
}
echo (json_encode(array("card_no" => $db_card_no , "card_nm" => $db_card_nm)));
$conn->close();
?>