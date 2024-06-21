<?php
include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
$offset = 0;
if (isset($_POST["page"]) && $_POST["page"] != 1) {
    $offset = 10 * ($_POST["page"] - 1);
}
$where = '';
$searchType = '';
$keyword = '';

if (isset($_POST['searchType'])) $searchType = $_POST['searchType'];
if (isset($_POST['keyword'])) $keyword = $_POST['keyword'];
if (isset($_POST['offset'])) $offset = $_POST['offset'];

if ($searchType === 'nm') $where = $where . "AND (userNm LIKE CONCAT('%','" . $keyword . "','%'))";
if ($searchType === 'id') $where = $where . "AND (usid LIKE CONCAT('%','" . $keyword . "','%'))";
if ($searchType === 'pn') $where = $where . "AND (userTelno LIKE CONCAT('%','" . $keyword . "','%'))";
if ($searchType === 'ed') $where = $where . "AND (userEndde LIKE CONCAT('%','" . $keyword . "','%'))";

$sql = "SELECT u.seq, u.usid, u.user_nm, u.user_tel_no, ua.auth_nm
        FROM card.`user` u, card.user_auth ua
        WHERE 1=1 AND u.user_ty = ua.auth_no
        ORDER BY u.seq desc " . $where .
        "LIMIT 10 OFFSET " . $offset;

$result = mysqli_query($conn, $sql);
//$result = $conn->query($sql);
//$row = $result->fetch_array(MYSQLI_ASSOC); ?? 왜 result 하나가빠짐?

$cnt_sql = "SELECT COUNT(*) as cnt
            FROM card.user u, card.user_auth ua
            WHERE 1=1
            AND u.user_ty = ua.auth_no " . $where;

$cnt_res = $conn->query($cnt_sql);
$cnt = $cnt_res->fetch_array(MYSQLI_ASSOC);
$cnt = $cnt['cnt'];
//echo $cnt."건이 검색되었습니다.";

$list = "";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $list = $list . '<tr>';
    $list = $list . '<td><input type="checkbox"></td>';
    $list = $list . '<td>' . $row["seq"] . '</td>';
    $list = $list . '<td>' . $row["usid"] . '</td>';
    $list = $list . '<td>' . $row["user_nm"] . '</td>';
    $list = $list . '<td>' . $row["user_tel_no"] . '</td>';
    $list = $list . '<td>' . $row["auth_nm"] . '</td>';
    $list = $list . '</tr>';
}
$conn->close();
?>