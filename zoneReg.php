<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>구역 등록</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@2.0.1/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>구역 등록</h1>
        <form action="insertZone.php" method="post" id="frm">
            <div class="grid">
                <div>
                    <label for="zone_nm">구역이름</label>
                    <input type="text" id="zone_nm" name="zone_nm" required>
                </div>
            </div>
            <button type="button" onclick="reg()">등록</button>
        </form>
    </main>
</body>
<script>
    function reg(){
        let input = document.querySelector("input[id=zone_nm]");
        let form = document.querySelector("form[id=frm]");

        if(input.value == null || input.value == ""){
            alert("구역 이름을 입력해주십시오");
            return false;
        }
            form.submit();
    }
</script>
</html>
