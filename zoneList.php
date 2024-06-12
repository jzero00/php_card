<!doctype html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Foundation Starter Template</title>
  <link rel="stylesheet" href="css/foundation.css" />
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
  </style>
</head>

<body>
  <?php include $_SERVER["DOCUMENT_ROOT"]."/inc/header.inc"; ?>
  <ul class="multilevel-accordion-menu vertical menu" data-accordion-menu>
    <li>
      <a href="#">Item 1</a>
      <ul class="menu vertical sublevel-1">
        <li>
          <a href="#">Sub-item 1</a>
          <ul class="menu vertical sublevel-2">
            <li><a class="subitem" href="#">Thing 1</a></li>
            <li><a class="subitem" href="#">Thing 2</a></li>
            <li><a class="subitem" href="#">Thing 3</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Sub-item 2</a>
          <ul class="menu vertical sublevel-2">
            <li>
              <a href="#">Super-sub-item 1</a>
              <ul class="menu vertical sublevel-3">
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
              </ul>
            </li>
            <li><a class="subitem" href="#">Thing 2</a></li>
          </ul>
        </li>
        <li><a class="subitem" href="#">Thing 1</a></li>
        <li><a class="subitem" href="#">Thing 2</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Item 2</a>
      <ul class="menu vertical sublevel-1">
        <li><a class="subitem" href="#">Thing 1</a></li>
        <li><a class="subitem" href="#">Thing 2</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Item 3</a>
      <ul class="menu vertical sublevel-1">
        <li><a class="subitem" href="#">Thing 1</a></li>
        <li><a class="subitem" href="#">Thing 2</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Item 4</a>
      <ul class="menu vertical sublevel-1">
        <li>
          <a href="#">Sub-item 3</a>
          <ul class="menu vertical sublevel-2">
            <li><a class="subitem" href="#">Thing 1</a></li>
            <li><a class="subitem" href="#">Thing 2</a></li>
          </ul>
        </li>
        <li><a class="subitem" href="#">Thing 1</a></li>
        <li><a class="subitem" href="#">Thing 2</a></li>
      </ul>
    </li>
  </ul>
</body>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.min.js"></script>
<script>
  $(document).foundation();
  $("[data-menu-underline-from-center] a").addClass("underline-from-center");
</script>

</html>