<html>
<head>
  <title>Walmart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/create.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>
<body class = "bg-light">

  <nav aria-label="Eighth navbar example" class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <img src='../../uploads/walmartLogo.svg' height = "35" class="mw-10" alt="Responsive image">

      <!--<path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
      <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
    </svg>-->
    </div>



    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <!--<li class="nav-item">
        <a class="nav-link active text-light fw-bold border border-light rounded m-1" aria-current="page" href="<?php echo site_url('news/index'); ?>">Explore</a>
      </li>-->

      <?php 
      if(!isset($_SESSION['logged_in'])){
        $add = site_url('user_authentication/signin');
        echo '<li class="nav-item"><a class="nav-link active text-light fw-bold border border-light rounded m-1" aria-current="page" href="'.$add.'">Singin</a></li>';
      }
      ?>

      <?php 
      if(isset($_SESSION['logged_in'])){
        $add_log_out = site_url('user_authentication/logout');
        echo '<li class="nav-item"><a class="nav-link active text-light border border-light rounded m-1" aria-current="page" href="'.$add_log_out.'">Logout</a></li>';
      }
      ?>
    </ul>



  </nav>





  <!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/edit/news_title_1-->
  <!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/pages/view/home-->
  <!--https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index-->





