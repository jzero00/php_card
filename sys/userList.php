<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css"/>
</head>

<body>
    <?php include "./selectUserList.php"; ?>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/inc/header.inc"; ?>
    <main class="container">
            <!--
                <table class="sch_table">
                    <colgroup>
                        <col style="width:140px">
                        <col style="width:auto">
                    </colgroup>
                    <tr>
                        <th>구분</th>
                        <td>
                            <select name="searchType" id="searchType" class="selectCSS">
                                <option value="nm" <?php $_SERVER["REQUEST_METHOD"] == "POST" && $_POST['searchType'] == 'nm' ? print ('selected') : '' ?>>이름</option>
                                <option value="id" <?php $_SERVER["REQUEST_METHOD"] == "POST" && $_POST['searchType'] == 'id' ? print ('selected') : '' ?>>아이디</option>
                                <option value="pn" <?php $_SERVER["REQUEST_METHOD"] == "POST" && $_POST['searchType'] == 'pn' ? print ('selected') : '' ?>>휴대폰번호</option>
                                <option value="ed" <?php $_SERVER["REQUEST_METHOD"] == "POST" && $_POST['searchType'] == 'ed' ? print ('selected') : '' ?>>만료일</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>상태</th>
                        <td>
                            <input type="checkbox" id="st1" value="1" class="usrStatus"> <label for="st1">대기중</label>
                            <input type="checkbox" id="st2" value="1" class="usrStatus"> <label for="st2">승인취소</label>
                            <input type="checkbox" id="st3" value="1" class="usrStatus"> <label for="st3">승인완료</label>
                            <input type="checkbox" id="st4" value="1" class="usrStatus"> <label for="st4">승인만료</label>
                        </td>
                    </tr>
                    <tr>
                        <th>검색어</th>
                        <td>
                            <input name="keyword" id="keyword" type="text" class="inputSearch2"
                                value="<?php $_SERVER["REQUEST_METHOD"] == "POST" ? print ($_POST['keyword']) : '' ?>">
                            <button class="btn_sch" onclick="search()">검색</button>
                            <button class="btn_reset" onclick="reset()">초기화</button>
                        </td>
                    </tr>
                </table>
                -->
            <div class="callout clearfix button-group align-right">
                <button class="pico-background-cyan-300"><a href="<?php echo htmlspecialchars('userReg.php') ?>"></a>등록</button>
                <button>수정</button>
                <button onclick="deleteUser()">삭제</button>
            </div>
            <table>
                <colgroup>
                    <col style="width:10%">
                    <col style="width:auto">
                    <col style="width:auto">
                    <col style="width:auto">
                    <col style="width:auto">
                </colgroup>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>No.</th>
                    <th>아이디</th>
                    <th>이름</th>
                    <th>휴대폰번호</th>
                    <th>권한</th>
                </tr>
                <?php echo $list; ?>
            </table>
            <form id="searchForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type='hidden' name="page" value="<?php $_SERVER["REQUEST_METHOD"] == "POST" ? print ($_POST['page']) : print (1) ?>" />
                <input type='hidden' name="keyword" value="<?php $_SERVER["REQUEST_METHOD"] == "POST" ? print ($_POST['keyword']) : '' ?>" />
                <input type='hidden' name="searchType" value="<?php $_SERVER["REQUEST_METHOD"] == "POST" ? print ($_POST['searchType']) : '' ?>" />
                <input type='hidden' name="cnSe" value="<?php $_SERVER["REQUEST_METHOD"] == "POST" ? print ($_POST['cnSe']) : '' ?>" />
            </form>
            <!-- 					<ul class="dw_bar"> -->
            <!-- 						<li><a href="sub071.php">목록</a></li> -->
            <!-- 					</ul> -->
                <?php include $_SERVER["DOCUMENT_ROOT"] . "/inc/pagination.php"; ?>
    </main>
</body>

<script>
    function search() {
        var searhForm = document.querySelector("#searchForm");
        console.log(searhForm);

        var keyword = document.querySelector("input#keyword").value;
        var searchType = document.querySelector("select#searchType").value;
        console.log(keyword);
        console.log(searchType);

        var iType = searhForm.querySelector("input[name='searchType']");
        var iKey = searhForm.querySelector("input[name='keyword']");
        var iPage = searhForm.querySelector("input[name='page']");

        iType.value = searchType;
        iKey.value = keyword;
        iPage.value = 1;

        console.log(iType.value);
        console.log(iKey.value);

        // 	console.log(document.querySelector("form#searchForm"));
        document.querySelector("form#searchForm").submit();
    }

    function reset() {
        var searhForm = document.querySelector("#searchForm");

        var iType = searhForm.querySelector("input[name='searchType']");
        var iKey = searhForm.querySelector("input[name='keyword']");
        var iPage = searhForm.querySelector("input[name='page']");

        iType.value = '';
        iKey.value = '';
        iPage.value = 1;

        document.querySelector("form#searchForm").submit();
    }
</script>
</html>