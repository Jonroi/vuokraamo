<?php
//otetaan tiedosto mukaan joka pitää sisällään luokan jonka avulla saamme yhteyden tietokantaan
require_once('asiakas.php');
$asiakasID = null;

// tarkistetaan että onko asiakasID parametri välitetty get. metodilla
// jos on niin tallennetaan arvo muuttujaan
if (!empty($_GET['asiakasID'])) {
    $asiakasID = $_REQUEST['asiakasID'];
}

//jos asiakasID parametriä ei välitetty palautetaan käyttäjä takaisin asikas.php sivulle
// jos välitettiin niin haetaan taulusta kyseisen asiakkaan tiedot data muuttujaan

if (null == $asiakasID) {
    header("Location: asikas.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET names utf8");
    $sql = "SELECT * FROM asiakas WHERE asiakasID = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($asiakasID));
    $data = $q->fetch(PDO::FETCH_ASSOC);
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
            <h3>Katso asiakastietoja</h3>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Henkilötunnus</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="statichenkilotunnus"
                    value="<?php echo $data['henkilotunnus']; ?>">
            </div>
        </div>

        <!-- Etunimi -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Etunimi</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticetunimi"
                    value="<?php echo $data['etunimi']; ?>">
            </div>
        </div>

        <!-- Sukunimi -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Sukunimi</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticsukunimi"
                    value="<?php echo $data['sukunimi']; ?>">
            </div>
        </div>

        <!-- Lähiosoite -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Lähiosoite</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticlahiosoite"
                    value="<?php echo $data['lahiosoite']; ?>">
            </div>
        </div>

        <!-- Postinumero -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Postinumero</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticpostinumero"
                    value="<?php echo $data['postinumero']; ?>">
            </div>
        </div>

        <!-- Postitoimipaikka -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Postitoimipaikka</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticpostitoimipaikka"
                    value="<?php echo $data['postitoimipaikka']; ?>">
            </div>
        </div>

        <!-- Sähköposti -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Sähköposti</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticsahkoposti"
                    value="<?php echo $data['sahkoposti']; ?>">
            </div>
        </div>

        <!-- Puhelin -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label text-right">Puhelin</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticpuhelin"
                    value="<?php echo $data['puhelin']; ?>">
            </div>
        </div>

        <div>
            <a class=btn href="asiakas.php">Takaisin</a>
        </div>

    </div>
</body>

</html>