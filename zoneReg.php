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
        <form action="insertZone.php" method="post">
            <div class="grid">
                <div>
                    <label for="zone_nm">구역이름</label>
                    <input type="text" id="zone_nm" name="zone_nm" required>
                </div>
            </div>
            <button type="button">등록</button>
        </form>
    </main>
</body>
</html>
