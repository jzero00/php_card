<!doctype html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <?php include $_SERVER["DOCUMENT_ROOT"] . "/inc/header.inc"; ?>
  <main class="container">
    <?php include "./selectZoneList.php" ?>
  </main>
</body>
<script>
  document.querySelectorAll('summary').forEach(e => {
    e.addEventListener('click', function () {
      const id = e.getAttribute('data-id');
      const div = e.parentElement.querySelectorAll("div");

      if (div[0].style.display == 'none') {
        
      } else if ((div[0].style.display == 'block')){

        $.ajax({
          url: "selectCardList.php",
          type: "post",
          dataType: "json",
          data: { "id": id },
          success: function (data) {
            div[0].innerHTML = "";
            let html = "";
            for (i = 0; i < data.card_no.length; i++) {
              let article = document.createElement('article');
              article.innerText = data.card_no[i] + ". " + data.card_nm[i];
              //button.classList.add("button-card");
              div[0].appendChild(article);
            }
          },
          error: function (error) {
            console.log(error);
          }
        }).done(function(){
          div[0].style.cssText == 'display : block;';
        });
      }
    });

  });
</script>

</html>