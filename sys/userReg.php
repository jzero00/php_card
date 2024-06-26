<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css" />
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/inc/header.inc"; ?>
	<script src="/sha/core.min.js"></script>
	<script src="/sha/sha256.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
	<main class="container">
		<div class="board_title2">
			<h3>사용자정보 등록</h3>
		</div>
		<form name="frm" id="frm" method="post" action="insertUser.php">
			<fieldset class="fieldset">
				<legend>사용자 유형</legend>
				<?php
				include $_SERVER["DOCUMENT_ROOT"] . "/connect.php";
				$sql = "SELECT * FROM card.user_auth
							WHERE auth_useyn = 'Y'
							ORDER BY auth_no ASC";

				$result = mysqli_query($conn, $sql);
				$list = "";
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$list = $list . '<input type="radio" id="user_auth" name="auth_no" value="' . $row["auth_no"] . '"><label for="group1">' . $row["auth_nm"] . '</label>';
				}
				echo $list;
				$conn->close();
				?>
				<!--					<input id="checkbox12" type="checkbox"><label for="checkbox12">Checkbox 1</label>
					<input id="checkbox22" type="checkbox"><label for="checkbox22">Checkbox 2</label>
					<input id="checkbox32" type="checkbox"><label for="checkbox32">Checkbox 3</label>-->
			</fieldset>
			<p>ID</p>
			<fieldset role="group">
					<input name="usid" id="usid" placeholder="ID" autocomplete="given-name" />
					<input type="button" onclick="duple()" onkeyup="resetIdCheck()" value="중복확인">
			</fieldset>
			<div>
                <label for="userName">성명</label>
                <input type="text" id="userNm" name="userNm" required>
            </div>
            <div>
                <label for="userPhone">전화번호</label>
                <input type="tel" id="userTelno" name="userTelno" required>
            </div>
			<input type="hidden" name="idCheck" id="idCheck" />
		</form>
		<a class="button" onclick="reg()">등록</a>
		<a class="button" onclick="history.back(-1)">취소</a>
		</div>
	</main>
</body>
<script>
	const idInput = document.querySelector("input#usid");
	const idCheckInput = document.querySelector("input#idCheck");
	idInput.addEventListener("change", function (e) {
		idCheckInput.value = false;
	})

	function duple() {
		let usid = "";

		usid = document.querySelector("input#usid").value;
		if (!blankCheck(usid)) {
			alert("ID를 입력해주세요");
			return false;
		};

		let data = JSON.stringify({ "usid": usid });

		$.ajax({
			url: "usidCheck.php",
			type: "post",
			dataType: "json",
			data: { "data": data },
			success: function (data) {
				if (data.result == "duplicated") {
					alert("중복된 ID가 있습니다. 다른 ID를 입력해주세요");
					return;
				} else {
					alert("사용 가능한 ID입니다");
					document.querySelector("input#idCheck").value = true;
				}
			},
			error: function (error) {
				alert("중복체크 오류");
			}
		})
	}

	function blankCheck(id) {
		if (id == null || id == '') {
			return false;
		}
		return true;
	}

	function reg() {
		if (document.getElementById("usid").value == "") {
			alert("ID를 입력해주세요");
		} else if (document.getElementById("userNm").value == "") {
			alert("이름을 입력해주세요");
		} else if (document.getElementById("idCheck").value == 0) {
			alert("ID 중복확인해부세요");
		} else if (document.querySelectorAll("input[type=radio]").ischecked) {
			alert("권한을 선택해주세요");
		} else {
			document.querySelector("form[id=frm]").submit();
		}
	}
</script>