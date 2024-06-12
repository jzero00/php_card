<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php   include $_SERVER["DOCUMENT_ROOT"]."/inc/head.inc"; ?>
<script src="/sha/core.min.js"></script>
<script src="/sha/sha256.min.js"></script>
</head>
<body>
<div id="content">
	<div class="navi">
		<h2>사용자관리</h2>
		<ul>
			<li><a href="userMngList.php">시스템관리</a></li>
			<li><a href="userMngList.php">사용자관리</a></li>
		</ul>
	</div>
	<div class="board_inner">
		<div class="board_title2">
			<h3>사용자정보 등록</h3>
		</div>
		<form name="frm" id="frm" method="post" action="insertUser.php">	
<!-- 			<input type="hidden" value="sub00801i.do" name="loc"> -->
<!-- 			<input name="midchk" id="midchk" type="hidden" value="0"> -->
			<table class="table_view">
				<colgroup>
					<col style="width:150px">
					<col style="width:30%">
					<col style="width:150px">
					<col style="width:auto">
				</colgroup>
					<tbody>
						<tr>
							<th>사용자타입</th>
							<td colspan="3">
								<?php
									include $_SERVER["DOCUMENT_ROOT"]."/connect.php";
									$sql = "SELECT * FROM safejsp.userAuth
											WHERE authUseyn = 'Y'
											ORDER BY authoryNo ASC";
									
									$result = $conn->query($sql);
               	 					$row = $result->fetch_array(MYSQLI_ASSOC);
									$list = "";
									while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
										$list = $list.'<input type="radio" id="usrAuth" name="authoryNo" value="'.$row["authoryNo"].'"><label for="group1">'.$row["authNm"].'</label>';
									}
									echo $list;
                					$conn->close();
								?>
							</td>
						</tr>
						<tr>
							<th>ID</th>
							<td><input type="text" name="usid" id="usid" style="width:150px"><button class="btn_sch" type="button" onclick="duple()" onkeyup="resetIdCheck()">중복확인</button></td>
							<th>성명</th>
							<td><input type="text" name="userNm" id="userNm" style="width: 200px;"></td>
						</tr>
						<tr>
							<th>직위</th>
							<td><input type="text" style="width:150px" name="userClsf"></td>
							<th>연락처</th>
							<td><input type="text" style="width: 200px;" name="userTelno"></td>
						</tr>
						<tr>
							<th>비밀번호</th>
							<td><input type="password" style="width:150px" id="password1"></td>
							<th>비밀번호확인</th>
							<td><input type="password" style="width: 200px;" id="password2"></td>
						</tr>
					</tbody>
				</table>
				<input type="hidden" name="idCheck" id="idCheck" />
				<input type="hidden" name="password" id="postPassword" />
			</form>
			<ul class="dw_bar">
				<li></li>
				<li>
					<a onclick="reg()">저장</a>
					<a onclick="history.back(-1)">취소</a>
				</li>
			</ul>
		</div>
	</div>
</body>
<script>
	const idInput = document.querySelector("input#usid");
	const idCheckInput = document.querySelector("input#idCheck");
	idInput.addEventListener("change", function(e){
		idCheckInput.value = false;
	})

	function duple(){
		let usid = "";
		
		usid = document.querySelector("input#usid").value;
		if(!blankCheck(usid)){
			alert("ID를 입력해주세요");
			return false;
		};

		let data = JSON.stringify({"usid" : usid});
		
		$.ajax({
			url : "usidCheck.php",
			type : "post",
			dataType : "json",
			data : {"data" : data},
			success : function(data){
				if(data.result == "duplicated"){
					alert("중복된 ID가 있습니다. 다른 ID를 입력해주세요");
					return;
				} else {
					alert("사용 가능한 ID입니다");
					document.querySelector("input#idCheck").value = true;
				}
			},
			error : function(error){
				alert("중복체크 오류");
			}
		})		
	}

	function blankCheck(id){
		if(id == null || id == ''){
			return false;
		}
		return true;
	}

	function reg(){
		if(document.getElementById("usid").value == ""){
			alert("ID를 입력해주세요");
		} else if (document.getElementById("userNm").value == ""){
			alert("이름을 입력해주세요");
		} else if(document.getElementById("password1").value == ""){
			alert("비밀번호를 입력해주세요");
		} else if(document.getElementById("password2").value == ""){
			alert("확인 비밀번호를 입력해주세요");
		} else if(document.getElementById("password1").value != document.getElementById("password2").value){
			alert("입력한 두 비밀번호가 일치하지 않습니다.");
		} else if(document.getElementById("idCheck").value == 0){
			alert("ID 중복확인해부세요");
		} else if(document.querySelectorAll("input[type=radio]").ischecked){
			alert("권한을 선택해주세요");
		} else {
			var shaPw = CryptoJS.SHA256(document.getElementById("password1").value).toString(); 
			document.getElementById("postPassword").value = shaPw;
			console.log(document.getElementById("usid").value);
			document.querySelector("form[id=frm]").submit();
		}
	}
</script>