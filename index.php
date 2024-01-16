<?php include 'header.php'; ?>

<div class="container marketing">
    <div class="row">
        <?php
                //otetaan tiedosto mukaan joka pitää sisällään luokan jonka avulla saamme yhteyden tietokantaan
                //haetaan tietokannasta kolme viimeisintä julkaisua videon tiedot ja tulostetaan ne echolla sivulle
                include_once 'database.php';
                $pdo = Database::connect();
                $pdo->exec("SET names utf8");
                $sql = "SELECT * FROM video ORDER BY julkaisupaiva DESC LIMIT 3";

                foreach ($pdo->query($sql) as $row) {
                    echo '<div class="col-lg-4">';
                    echo 'img class="" src=<img src="' . $row['kuva'] . '" alt=""' . ' width="140">';
                    echo '<p><strong>' . $row['nimi'].'</strong></p>';
                    echo '<p>' . $row['julkaisupaiva'] . '</p>';
                    echo 'p><a class="btn btn-secondary" href="videon_tiedot.php?videoID=' . $row['videoID'] . '" role="button">Katso lisää</a></p>';
                    echo '</div>';
                } ?>
    </div>

    <div class="col-lg-4">
        <img class="rounded-circle"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
            alt="Generic placeholder image" width="140" height="140">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh
            ultricies
            vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent
            commodo
            cursus magna.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-lg-4">
        <img class="rounded-circle"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
            alt="Generic placeholder image" width="140" height="140">
        <h2>Heading</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec
            elit.
            Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo,
            tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-lg-4">
        <img class="rounded-circle"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
            alt="Generic placeholder image" width="140" height="140">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id
            ligula
            porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
            nibh, ut
            fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
</div>

<!-- START THE FEATURETTES -->
<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">Avengers Endgame</h2>
        <p class="lead">Thanoksen aikaansaama hävitys, joka tuhosi puolet universumista ja rikkoi Avengersien
            rivit, ajaa jäljelle jääneet Avengersit viimeiseen taisteluun Marvel Studiosin 22 elouvaa saarjan
            eeppisessä päätösosassa Avengers: Endgame</p>
    </div>
    <div class="col-md-5">
        <img src="img/Avengers_Endgame_2019.jpg" width="250">
    </div>
</div>

<hr class="featurette-divider">
<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">Dumbo</h2>
        <p class="lead">Disney ja mielikuvitus mestari Tim Burton tuovat valkokankaille uuden live-action
            seikkailun DUMBO. Elokuva laajentaa rakastetun klassikon tarinaa, joka juhlii erilaisuutta, vaalii
            perhettä ja joka siivittää unelmat lentoon. Sirkuksen omistaja Max Medici (Danny DeVito) antaa
            entiselle tähdelle Holt Ferrierille (Colin Farrel) ja hänen lapsilleen Millylle (Nico Parker) ja
            Joelle (finley Hobbins) tehtäväksi huolehtia vastasyntyneestä elefantista...</p>
    </div>
    <div class="col-md-5">
        <img src="img/dumbo_2019.jpg" width="250">
    </div>
</div>
<hr class="featurette-divider">
<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">Jurassic World - Fallen Kingdom</h2>
        <p class="lead">On kulunut kolme vuotta siitä, kun teemapuisto ja luksuslomakohde Jurassic World
            tuhoutui dinosaurusten päästyä valloilleen. Isla Nublar on hylätty ja hävityksestä selviytyneet
            dinosaurukset elävät villeinä viidakossa. Kun saaren uinuva tuolivuori alkaa näyttää elonmerkkejä,
            Owen (Chris Pratt) ja Claier (Bryce Dallas Howard) aloittavat kampanjan, jonka tarkoituksena on
            pelastaa dinosaurukset uuden sukupuuton uhalta,</p>
    </div>
    <div class="col-md-5">
        <img src="img/Jurassic_World_Fallen_Kingdom_2018.jpg" width="250">
    </div>
</div>
<hr class="featurette-divider">
</div>


<?php include 'footer.php'; ?>