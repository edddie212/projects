
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Gossip |  <?= $page_title; ?> </title>
</head>
<body>
    <header class=" container mb-2 header-top" >	

        <nav class="navbar navbar-expand-md navbar-dark fixed-top border-bottom border-dark header-top " style="background-color: rgba(240, 253, 255)">
            <a class="navbar-brand" href="./"><i class="fab fa-gofore fa-2x text-dark mb-3"></i><span class='text-dark'>ossip</span></i> </a>

            <button  class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars text-dark"></i></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./"> <i class="fas fa-home mr-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="about.php"><i class="fas fa-book-reader mr-2 "></i>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="blog.php"><i class="fab fa-blogger nl-2 mr-2"></i>Blog</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (!u_verify()): ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="signin.php"><i class="fas fa-sign-in-alt mr-2"></i>Signin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="signup.php"><i class="fas fa-users mr-2"></i>Signup</a>
                        </li>
                    <?php else: ?> 
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><i class="fab fa-angellist pr-2"></i>Hi <?= htmlspecialchars($_SESSION['user_name']); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header> 

    <?php if (!empty($_GET['sm'])): ?>
        <br><br><br>
        <div id="msg-box" class="container mt-4 ">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-warning text-center">
                        <?= $_GET['sm']; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row ">
        <div class=" ydob"></div>
    </div>

    <a href="#" class="backTop"><i class="far fa-arrow-alt-circle-up fa-3x text-dark"></i>    </a>