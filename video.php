<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videovuokraamo</title>
    <<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Asiakastiedot</h3>
        </div>
        <div class="row">
            <p>
                <a href="lisaa_asiakas.php" class="btn btn-success">Lisää</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Etunimi</th>
                        <th>Sukunimi</th>
                        <th>Sähköposti</th>
                        <th>Toiminto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Create a database connection
                    include "database.php";
                    $pdo = Database::connect();

                    $sql = "SELECT * FROM asiakas ORDER BY sukunimi, etunimi DESC";
                    $pdo->exec("SET names utf8");
                    foreach ($pdo->query($sql) as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['etunimi'] . "</td>";
                        echo "<td>" . $row['sukunimi'] . "</td>";
                        echo "<td>" . $row['sahkoposti'] . "</td>";

                        echo '<td><a class="btn" href="katso_asiakas.php?asiakasID='.$row['asiakasID'].'">Katso</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    // Disconnect from the database
                    $pdo = null;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://dnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>