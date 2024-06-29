<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

$sql = "SELECT c.card_no, c.card_nm
        FROM card.card c 
        WHERE c.zone_no = " .$_POST['id'];

$result = mysqli_query($conn, $sql);

$list = "";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $list = $list."<p>".$row['card_nm']."<p>";
}
$conn->close();
echo $list;

?>