<?php
//otetaan tiedoto mukaan joka pitää sisällään luokna jonka avulla  saamme yhteyden tietokantaan 
require 'database.php';
$asiakasID = null;

//tarkistetaan että onko asiakasID parametri välitetty get metodilla
//jos on niin tallennetaan arvo muuttujaan

if ( !empty($_GET['asiakasID'])){
    $asiakasID = $_REQUEST['asiakasID'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM asiakas WHERE asikasID = ?";
    $q = $pdo -> prepare($sql);
    $q -> execute(array($asiakasID));
    $data = $q -> fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}

// tarkistetaan että onko käyttäjä painanut lomakkeet kyllä painiketta
// tallennetaan piilotetun (input kentän type= "hidden") arvo muuttujaan asikasID

if ( !empty($_POST)) {
    $asiakasID = $_POST['asiakasID'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM asiakas WHERE asiakasID = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($asiakasID));
    Database::disconnect();
    header("Location: index.php");
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
            <form action="poista_asiakas.php" method="post">
                <input type="hidden" name="asiakasID" value="<?php echo $data['asiakasID']; ?>" />
                <p class="alert alert-warning">Haluatko varmasti poistaa asiakkaan
                    <?php echo $data['etunimi'] . " " . $data['sukunimi']; ?>tiedot</p>
                <div>
                    <button type="submit" class="btn btn-danger">kyllä</button>
                    <a class="btn" href="asiakas.php">Ei</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>