<!-- This file is just checking if any notes exist in the database 
and redirecting to the appropriate page... Move this check to the login script
-->


<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Dashboard</title>
  <meta name="author" content="Connor Hansen">
    
  <!-- custom styles -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!-- jQuery -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <!-- Menu Plugin -->
  <link rel="stylesheet" href="plugins/css/slicknav.min.css" />
  <script src="plugins/js/jquery.slicknav.min.js"></script>

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>


<!-- Check if the user has any notes in the database -->
<!-- if not -> display prompt to create first note -->

<body>

<header>
<nav>
<ul id="main-menu">
    <li><a href="dashboard.php">Home</a></li>  
    <li class="menu-item">
        <a href="#">Scripts</a>
        <ul>
            <li><a href="#" id="create-json-button">Export JSON</a></li>
            <li><a href="notes-json.php" id="#">Read JSON</a></li>
            <li><a href="#">Export XML</a></li>
            <li><a href="#">Read XML</a></li>
        </ul>
    </li>
    <li><a href="scripts/logout.php">Logout</a></li>  
</ul>
</nav>
</header>