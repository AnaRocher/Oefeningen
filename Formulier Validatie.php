<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <style>
        form div {
            margin: 10px 0;
        }

        .textarea-label {
            display: block;
        }

        .nieuwsbrief {
            background-color: lightgray;
            padding: 10px 10px 5px;
            display: inline-block;
            border-radius: 5px;
        }

        .error {
            color: red;
        }
    </style>

</head>
<body> 

<?php 

$foutmeldingen = [];
$success = false;

if ($_POST) {
    if (empty($_POST['naam'])) {
        $foutmeldingen['naam'] = 'Je moet een naam invullen.';
    }

    if (empty($_POST['email'])) {
        $foutmeldingen['email'] = 'Je moet een e-mailadres invullen.';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $foutmeldingen['email'] = 'Je moet een geldig e-mailadres invullen.';
    }

    if (!isset($_POST['accept'])) {
        $foutmeldingen['accept'] = 'Je moet de voorwaarden accepteren.';
    }

    if (!isset($_POST['nieuwsbrief'])) {
        $foutmeldingen['nieuwsbrief'] = 'Je moet een keuze maken.';
    }

    if (empty($foutmeldingen)) {
        $success = true;
    }
}

?>

<div>
    <pre><?php print_r($_POST) ?></pre>
</div>

<div class="container">
        <h1>Contact</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem doloremque accusantium non atque, similique ab, voluptatum molestiae odio a veniam laborum eaque. Veniam fugit molestias totam tempora, adipisci dolorem. Architecto!</p>

        <?php if ($success) : ?>
            <div>Het formulier is verzonden!</div>
        <?php else : ?>
            <form method="post" novalidate>
                <div>
                    <label>
                        Naam: <input value="<?php echo $_POST['naam'] ?? '' ?>" type="text" name="naam" id="naam">
                    </label>
                    <?php if (isset($foutmeldingen['naam'])) : ?>
                        <span class="error"><?php echo $foutmeldingen['naam'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <label>
                        E-mail: <input value="<?php echo $_POST['email'] ?? '' ?>" type="email" name="email" id="email">
                    </label>
                    <?php if (isset($foutmeldingen['email'])) : ?>
                        <span class="error"><?php echo $foutmeldingen['email'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <label>
                        Onderwerp: <select name="onderwerp" id="onderwerp">
                            <option <?php echo ($_POST['onderwerp'] ?? '') == 'contact' ? 'selected' : '' ?> value="contact">Contact</option>
                            <option <?php echo ($_POST['onderwerp'] ?? '') == 'klacht' ? 'selected' : '' ?> value="klacht">Klacht</option>
                            <option <?php echo ($_POST['onderwerp'] ?? '') == 'sollicitatie' ? 'selected' : '' ?> value="sollicitatie">Sollicitatie</option>
                        </select>
                    </label>
                </div>
                <div>
                    <label class="textarea-label">Bericht</label>
                    <textarea name="bericht" id="bericht" cols="30" rows="10"><?php echo $_POST['bericht'] ?? '' ?></textarea>
                    <?php if (isset($foutmeldingen['bericht'])) : ?>
                        <span class="error"><?php echo $foutmeldingen['bericht'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <label>
                        <input <?php echo isset($_POST['accept']) ? 'checked' : '' ?> type="checkbox" name="accept" id="accept">
                        Ik accepteer de voorwaarden
                    </label>
                    <?php if (isset($foutmeldingen['accept'])) : ?>
                        <span class="error"><?php echo $foutmeldingen['accept'] ?></span>
                    <?php endif ?>
                </div>
                <div class="nieuwsbrief">
                    Ik wil me inschrijven voor de nieuwsbrief
                    <div>
                        <label>
                            <input <?php echo ($_POST['nieuwsbrief'] ?? '') == 'ja' ? 'checked' : '' ?> type="radio" name="nieuwsbrief" value="ja" id="nieuwsbrief">
                            Ja
                        </label>
                        <label>
                            <input <?php echo ($_POST['nieuwsbrief'] ?? '') == 'nee' ? 'checked' : '' ?> type="radio" name="nieuwsbrief" value="nee" id="nieuwsbrief">
                            Nee
                        </label>
                    </div>
                </div>
                <?php if (isset($foutmeldingen['nieuwsbrief'])) : ?>
                    <span class="error"><?php echo $foutmeldingen['nieuwsbrief'] ?></span>
                <?php endif ?>
                <div>
                    <input type="submit" value="Verzenden">
                </div>
            </form>
        <?php endif ?>
    </div>

</body>

</html>