<!doctype html>
<html lang="en">
<head>
    <title>Projekat citati</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indikatori -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- Slajder -->
        <div class="carousel-inner">
        <?php
        
        $dir = 'slikezaheader';
        $slike = array("1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg", "8.jpg", "9.jpg", "10.jpg");

        $menja = array_rand($slike, 3);
        $img1 = $dir."/" . $slike[$menja[0]];
        $img2 = $dir."/" . $slike[$menja[1]];
        $img3 = $dir."/" . $slike[$menja[2]];

        ?>
        
        <img class="carousel-item active" src="<?php echo $img1?>">
        <img class="carousel-item" src="<?php echo $img2?>">
        <img class="carousel-item" src="<?php echo $img3?>">
        </div>
        
        <!-- Levi i desni kursor -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <!-- Meni -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="?categoryVariable=posao" >Posao</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="?categoryVariable=ljubav">Ljubav</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="?categoryVariable=zdravlje">Zdravlje</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="?categoryVariable=motivacija">Motivacija</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="?categoryVariable=citati">Svi Citati</a>
        </li>
    </ul>
    </nav>
    
    <!-- Deo sekcije gde izlaze citati -->
    <section class="container text-center p-5">
    <?php
        
        if(isset($_GET['categoryVariable'])){ 
        getRandomQuote($_GET['categoryVariable']); 
        } 
        function getRandomQuote($category){
        $filename = "quotes/" . $category . ".json" ;
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));

        fclose($handle);

        $citati = json_decode($contents,true);

        $randomIndex = rand ( 0 , 9);
        echo $citati[$randomIndex]['text'], '<br>';
        echo $citati[$randomIndex]['author'], '<br>';
        }

    
    ?>
    
    </section>

    <!-- Footer -->
    <footer class="container-fluid bg-primary p-1 text-white-50">
    <div class="row">
    <div class="col-sm-12">
    <?php
    echo date("dS \of F Y h:i A")
    ?>
    </div>
    </div>
    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>