<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuokraamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <link rel="carousel.css" href="/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="index.php">VUOKRAAMO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span=""></button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo '<li class="nav-item';
                        echo ($valikko==="asiakas") ? " active" : "";
                        echo '"><a class="nav-link" href="asiakas.php">Asiakas <span class="sr-only"></span></a></li>';

                        echo '<li class="nav-item';
                        echo ($valikko==="video") ? " active" : "";
                        echo '"><a class="nav-link" href="video.php">Video</a></li>';

                        echo '<li class="nav-item';
                        echo ($valikko==="vuokraus") ? " active" : "";
                        echo '"><a class="nav-link" href="vuokraus.php">Vuokraus</a></li>';
                        
                        echo '<li class="nav-item';
                        echo ($valikko==="myyja") ? " active" : "";
                        echo '"><a class="nav-link" href="myyja.php">Myyjä</a></li>';
                        
                        echo '<li class="nav-item dropdown>';
                        echo ($valikko==="raportit") ? " active" : "";
                        echo '"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Raportit</a>
                        <div class="dropdown-menu"aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="vuokralla.php">Vuokralla</a>
                        </div>
                        </li>';
                    }
                    ?>

                </ul>


                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Syötä hakusana" aria-label="Search">

                </form>
                <button class="btn btn-outline-success my-2 my-sm-0 ms-2" type="submit">Haku</button>
                <a class="nav-link" href="kirjaudu.php">Kirjaudu<span class="oi oi-account-login"></span></a>
            </div>
        </nav>
    </header>
    <?php
    //ei tehdä tarkistusta jos olet jo kirjautunut
    //ei tehdä jos olet etusivulla
    //käyttäjää ei päästetä muille sivuille ilman kirjautumista vaan hänet
    //ohjataan takaisin etusivulle
    //exit lopettaa koodin suorittamisen

// Check if the user is logged in and not on the index or kirjaudu page
if (basename($_SERVER["PHP_SELF"]) !== "index.php" && basename($_SERVER["PHP_SELF"]) !== "kirjaudu.php") {
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: index.php");
        exit;
    }
}
?>

    <mainrole="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                        alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Example headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget
                                metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                        alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget
                                metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                        alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <h1>One more for good measure.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget
                                metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </mainrole>