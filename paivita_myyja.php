<?php
//otetaan tiedosto mukaan joka pitää sisällään luokan jonka avulla saamme yhteyden tietokantaan
require 'database.php';
$asiakasID = null; // alustetaan muuttuja

//tarkistenaan onko asiakasID parametri päitetty get. metodilla
//jos on niin otetaan se muuttujaan

if (!empty($_GET['asiakasID'])) {
    $asiakasID = $_REQUEST['asiakasID'];
}
// jos asikasID parametriä ei välitetty palautetaan käyttäjä takaisin asiakas.php sivulle
if (!empty($_GET['asiakasID'])) {
    $asiakasID = $_REQUEST['asiakasID'];
} 
// jos asikasID parametriä ei käytety palautetaan asiakas.php sivulle
if (null==$asiakasID) {
    header("Location: asiakas.php");
}

//jos käyttäjä on painanut lomakkeen päivitä painiketta niin lomakkeen action aktivoituu
// ja lähettää lomakkeen sisältämät tiedot poist metodilla tälle samalle sivulle
//eli if lohkon sisälle mennään vasta päiitä painikkeen painamisen jälkeen ei ensimmäisellä kerralla sivulle tultaessa 
//else haarassa haetaan asikasID parametrien mukaiset asiakastiedot tietokannasta ja tallennetaan ne muuttujaan
if ( !empty($_POST)) {
    $etunimiError = null;
    $sukunimiError= null;
    $lahiosoiteError = null;
    $postinumeroError = null;
    $postitoimipaikkaError = null;
    $puhelinError = null;
    $sahkopostiError = null;
    $henkilotunnusError= null;

    $valid = true;

    if (empty($etunimiError)){
        $etunimiError = 'Syötä etunimi';
        $valid = false;
    }
    if (empty($sukunimiError)){
        $sukunimiError = 'Syötä sukunimi';
        $valid = false;
    }
    if (empty($lahiosoiteError)){
        $lahiosoiteError = 'Syötä lahiosoite';
        $valid = false;
    }
    if (empty($postinumeroError)){
        $postinumeroError = 'Syötä postinumero';
        $valid = false;
    }
    if (empty($postitoimipaikkaError)){
        $postitoimipaikkaError = 'Syötä postitoimipaikka';
        $valid = false;
    }
    if (empty($puhelinError)){
        $puhelinError = 'Syötä puhelinnumero';
        $valid = false;
    }
    if (empty($henkilotunnusError)){
        $henkilotunnusError = 'Syötä henkilotunnus';
        $valid = false;
    }

    //päivitetään tiedot tietokannan tauluun jos kenttien syötteet olivat kunnossa
    //ohjataan käyttääj asikas.php sivulle

    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE asiakas SET etunimi = ?, sukunimi = ?, lahiosoite = ?, postinumero = ?, postitoimipaikka = ?, puhelin = ?, sahkoposti = ?, henkilotunnus = ? WHERE asiakasID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($etunimi, $sukunimi, $lahiosoite, $postinumero, $postitoimipaikka, $puhelin, $sahkoposti, $henkilotunnus, $asiakasID));
        Database::disconnect();
        header("Location: asiakas.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM asiakas WHERE asiakasID = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($asiakasID));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $etunimi = $data['etunimi'];
    $sukunimi = $data['sukunimi'];
    $lahiosoite = $data['lahiosoite'];
    $postinumero = $data['postinumero'];
    $postitoimipaikka = $data['postitoimipaikka'];
    $puhelin = $data['puhelin'];
    $sahkoposti = $data['sahkoposti'];
    $henkilotunnus = $data['henkilotunnus'];
    Database::disconnect();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuokraamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Päivitä asiakas</h3>
        </div>
        <!-- lomake asiakastietojen päivittämistä varten
        koodissa käytetään lyhennettyä if-else lausetta (esim !empty(henkilotunnusError)?'alert alert-info':'';)
        koodissa käytetään myls if lausetta joka päättyy kohdassa endif huomoi että form action kentässä välitetäään myös asikasID parametri -->
        <form action="paivita_asiakas.php?asiakasID=<?php echo $asiakasID; ?>" method="post">
            <!-- Henkilötunnus -->
            <div class="form-group row <?php echo !empty($henkilotunnusError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Henkilötunnus</label>
                <div class="col-sm-10">
                    <input name="henkilotunnus" type="text" placeholder="Henkilötunnus"
                        value="<?php echo !empty($henkilotunnus)?$henkilotunnus:''; ?>">
                    <?php if (!empty($henkilotunnusError)): ?>
                    <small class="text-muted">
                        <?php echo $henkilotunnusError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Etunimi -->
            <div class="form-group row <?php echo !empty($etunimiError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Etunimi</label>
                <div class="col-sm-10">
                    <input name="etunimi" type="text" placeholder="Etunimi"
                        value="<?php echo !empty($etunimi)?$etunimi:''; ?>">
                    <?php if (!empty($etunimiError)): ?>
                    <small class="text-muted">
                        <?php echo $etunimiError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Sukunimi -->
            <div class="form-group row <?php echo !empty($sukunimiError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Sukunimi</label>
                <div class="col-sm-10">
                    <input name="sukunimi" type="text" placeholder="Sukunimi"
                        value="<?php echo !empty($sukunimi)?$sukunimi:''; ?>">
                    <?php if (!empty($sukunimiError)): ?>
                    <small class="text-muted">
                        <?php echo $sukunimiError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Lähiosoite -->
            <div class="form-group row <?php echo !empty($lahiosoiteError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Lähiosoite</label>
                <div class="col-sm-10">
                    <input name="lahiosoite" type="text" placeholder="Lähiosoite"
                        value="<?php echo !empty($lahiosoite)?$lahiosoite:''; ?>">
                    <?php if (!empty($lahiosoiteError)): ?>
                    <small class="text-muted">
                        <?php echo $lahiosoiteError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Postinumero -->
            <div class="form-group row <?php echo !empty($postinumeroError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Postinumero</label>
                <div class="col-sm-10">
                    <input name="postinumero" type="text" placeholder="Postinumero"
                        value="<?php echo !empty($postinumero)?$postinumero:''; ?>">
                    <?php if (!empty($postinumeroError)): ?>
                    <small class="text-muted">
                        <?php echo $postinumeroError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Postitoimipaikka -->
            <div class="form-group row <?php echo !empty($postitoimipaikkaError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Postitoimipaikka</label>
                <div class="col-sm-10">
                    <input name="postitoimipaikka" type="text" placeholder="Postitoimipaikka"
                        value="<?php echo !empty($postitoimipaikka)?$postitoimipaikka:''; ?>">
                    <?php if (!empty($postitoimipaikkaError)): ?>
                    <small class="text-muted">
                        <?php echo $postitoimipaikkaError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Puhelin -->
            <div class="form-group row <?php echo !empty($puhelinError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Puhelin</label>
                <div class="col-sm-10">
                    <input name="puhelin" type="text" placeholder="Puhelin"
                        value="<?php echo !empty($puhelin)?$puhelin:''; ?>">
                    <?php if (!empty($puhelinError)): ?>
                    <small class="text-muted">
                        <?php echo $puhelinError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>

            <!-- Sähköposti -->
            <div class="form-group row <?php echo !empty($sahkopostiError)?'':''; ?>">
                <label class="col-sm-2 col-form-label text-right">Sähköposti</label>
                <div class="col-sm-10">
                    <input name="sahkoposti" type="text" placeholder="Sähköposti"
                        value="<?php echo !empty($sahkoposti)?$sahkoposti:''; ?>">
                    <?php if (!empty($sahkopostiError)): ?>
                    <small class="text-muted">
                        <?php echo $sahkopostiError; ?>
                    </small>
                    <?php endif;?>
                </div>
            </div>


        </form>
    </div>
</body>

</html>