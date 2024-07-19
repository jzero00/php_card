<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";

$stmt = $conn->prepare("INSERT INTO card.zone (zone_no, zone_nm)
                        VALUES
                        ((SELECT MAX(z.zone_no) + 1 AS seq FROM card.ZONE z),
                         ?");
$stmt->bind_param("s", $zone_nm);

$userNm = $_POST['zone_nm'];

$result = '';
try {
    $stmt->execute();
    $stmt->close();
    $conn->close();

    $result = "<script>alert('등록 성공');location.href='/sys/zoneList.php'</script>";
} catch (Exception $e) {
    $stmt->close();
    $conn->close();
    $result = "등록 실패" . $e->getMessage();
} finally {
    echo $result;
}
?>