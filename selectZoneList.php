<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

$sql = "SELECT z.zone_no, z.zone_nm 
        FROM card.zone z ";

$result = mysqli_query($conn, $sql);

$conn->close();
$list = "";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $list = $list . '<details>';
    $list = $list . '<summary data-id="'.$row['zone_no'].'">'.$row['zone_nm'].'</summary>';
    $list = $list . '<div id="'.$row['zone_no'].'" style="display:block;"></div>';
    $list = $list . '</details>';
}

echo $list;
?>