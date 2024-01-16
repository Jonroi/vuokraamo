<!DOCTYPE html>
<html lang="fi">

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
        <h3>Lisää asiakas</h3>
    </div>

    <form action="lisaa_asiakas.php" method="post">
        <!-- Henkilötunnus -->
        <div class="form-group row <?php echo !empty($henkilotunnusError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Henkilötunnus</label>
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
        <div class="form-group row <?php echo !empty($etunimiError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Etunimi</label>
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
        <div class="form-group row <?php echo !empty($sukunimiError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Sukunimi</label>
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
        <div class="form-group row <?php echo !empty($lahiosoiteError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Lähiosoite</label>
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
        <div class="form-group row <?php echo !empty($postinumeroError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Postinumero</label>
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
        <div class="form-group row <?php echo !empty($postitoimipaikkaError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Postitoimipaikka</label>
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
        <div class="form-group row <?php echo !empty($puhelinError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Puhelin</label>
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
        <div class="form-group row <?php echo !empty($sahkopostiError)?'alert alert-info':''; ?>">
            <label class="col-md-2 col-form-label text-right">Sähköposti</label>
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

        <div class="form-actions">
            <button tyope="submit" class="btn btn-success">Lisää</button>
            <a class="btn" href="index.php">Takaisin</a>
        </div>
    </form>
    </div>
</body>

</html>