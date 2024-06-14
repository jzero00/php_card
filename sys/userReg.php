<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="/css/foundation.css" />
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/inc/header.inc"; ?>
	<script src="/sha/core.min.js"></script>
	<script src="/sha/sha256.min.js"></script>
	<style>
		.multilevel-accordion-menu .is-accordion-submenu-parent a {
			background: #4d5158;
		}

		.multilevel-accordion-menu .is-accordion-submenu a {
			background: #35383d;
		}

		.multilevel-accordion-menu .sublevel-1 {
			text-indent: 1rem;
		}

		.multilevel-accordion-menu .sublevel-2 {
			text-indent: 2rem;
		}

		.multilevel-accordion-menu .sublevel-3 {
			text-indent: 3rem;
		}

		.multilevel-accordion-menu .sublevel-4 {
			text-indent: 4rem;
		}

		.multilevel-accordion-menu .sublevel-5 {
			text-indent: 5rem;
		}

		.multilevel-accordion-menu .sublevel-6 {
			text-indent: 6rem;
		}

		.multilevel-accordion-menu a {
			color: #fefefe;
			box-shadow: inset 0 -1px #41444a;
		}

		.multilevel-accordion-menu a::after {
			border-color: #fefefe transparent transparent;
		}

		.multilevel-accordion-menu .menu>li:not(.menu-text)>a {
			padding: 1.2rem 1rem;
		}

		.multilevel-accordion-menu .is-accordion-submenu-parent[aria-expanded="true"] a.subitem::before {
			content: "\f016";
			font-family: FontAwesome;
			margin-right: 1rem;
		}

		.multilevel-accordion-menu .is-accordion-submenu-parent[aria-expanded="true"] a::before {
			content: "\f07c";
			font-family: FontAwesome;
			margin-right: 1rem;
		}

		.multilevel-accordion-menu .is-accordion-submenu-parent[aria-expanded="false"] a::before {
			content: "\f07b";
			font-family: FontAwesome;
			margin-right: 1rem;
		}


		.hover-underline-menu {
			width: 100%;
		}

		.hover-underline-menu .menu {
			background-color: #2C3840;
		}

		.hover-underline-menu .menu a {
			color: #fefefe;
			padding: 1.2rem 1.5rem;
		}

		.hover-underline-menu .menu .underline-from-center {
			position: relative;
		}

		.hover-underline-menu .menu .underline-from-center::after {
			content: "";
			position: absolute;
			top: calc(100% - 0.125rem);
			border-bottom: 0.125rem solid #fefefe;
			left: 50%;
			right: 50%;
			transition: all 0.5s ease;
		}

		.hover-underline-menu .menu .underline-from-center:hover::after {
			left: 0;
			right: 0;
			transition: all 0.5s ease;
		}

		td {
			text-align: center;
		}
	</style>
</head>

<body>
	<div id="content">
		<div class="grid-container">
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
				<div class="">

					<div class="input-group">
						<span class="input-group-label">&nbsp;&nbsp;ID&nbsp;&nbsp;</span>
						<input class="input-group-field" type="text" name="usid" id="usid">
						<div class="input-group-button">
							<input class="button" type="button" onclick="duple()" onkeyup="resetIdCheck()" value="중복확인">
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-label">&nbsp;성명&nbsp;</span>
						<input class="input-group-field" type="text" name="userNm" id="userNm">
					</div>
					<div class="input-group">
						<span class="input-group-label">전화번호</span>
						<input class="input-group-field" type="text" name="userTelno">
					</div>
					<input type="hidden" name="idCheck" id="idCheck" />
			</form>
			<a class="button" onclick="reg()">등록</a>
			<a class="button" onclick="history.back(-1)">취소</a>
		</div>
	</div>
	</div>
</body>
<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/js/vendor/jquery.js"></script>
<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/js/vendor/what-input.js"></script>
<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/js/vendor/foundation.min.js"></script>
<script>
	$(document).foundation();
	$("[data-menu-underline-from-center] a").addClass("underline-from-center");
</script>
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