<?php

//foutmeldingen array aanmaken

//als formulier verzonden is 

$foutmelding = [];

if ($_POST) {
    // email verplicht // email moet geldig email adres zijn
    if (!$_POST['email']) {
        $foutmelding['email'] = 'Email moet verplicht zijn';
    }

    //password verplicht // password minstens 5 tekens // moet special tekens bevatte
    if (empty($_POST['password'])) {
        $foutmelding['password'] = 'Password is verplicht';   
    } else if(strlen($_POST['password']) < 5) {
        $foutmelding['password'] = 'Password moet minstens 5 tekens lang zijn;';
    }

    //als er geen foutmeldingen zijn: verwerken
    if (empty($foutmelding)) {
        header('location: sucess.php');
        exit;
    }
}

//data in formulier invullen
//foutmelding tonen in pagina

?>
<form method="post">
    <div class="<?php echo isset($foutmelding['email']) ? 'has_error' : '' ?>">

        <input name="email" type="text">

        <?php if (isset($foutmelding['email'])): ?>

        <div class="error">
            <?php echo $foutmelding['email'] ?>
        </div>
        <?php endif ?>
    </div>

</form>