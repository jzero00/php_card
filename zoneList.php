<!doctype html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css" />
</head>

<body>
  <?php include $_SERVER["DOCUMENT_ROOT"] . "/inc/header.inc"; ?>
  <main class="container">
    <?php include "./selectZoneList.php" ?>
  </main>
</body>
<script>
  document.querySelectorAll('summary').forEach(e => {
    e.addEventListener('click', function() {
      console.log(e);
      const id = e.getAttribute('data-id');
      console.log(id);
      
  });
  });
</script>

</html>