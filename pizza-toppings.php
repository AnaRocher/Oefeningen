<?php

$toppings = [
    [
        'naam' => 'kaas',
        'prijs' => 2,
    ],
    [
        'naam' => 'ham',
        'prijs' => 2,
    ],
    [
        'naam' => 'kip',
        'prijs' => 3,
    ],
    [
        'naam' => 'kebap',
        'prijs' => 3,
    ],
    [
        'naam' => 'ananas',
        'prijs' => 3,
    ],
];

$verzonden = $_POST && isset($_POST['toppings']);
if ($verzonden) {
    $prijs = 0;
    $gekozenToppings = [];

    foreach($_POST['toppings'] as $checkedItem) {
        $prijs += $toppings[$checkedItem]['prijs'];
        $gekozenToppings[] = $toppings[$checkedItem];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
</head>

<body>

    <?php if ($verzonden) : ?>
        <p>Je hebt gekozen voor:</p>
        <ul>
            <?php foreach($gekozenToppings as $topping): ?>
                <li>
                    <?php echo $topping['naam'] ?> 
                    (<?php echo $topping['prijs'] ?> EUR)
                </li>
            <?php endforeach ?>
        </ul>
        <p>Jouw prijs is: <?php echo $prijs ?> EUR.</p>
    <?php else : ?>
        <form method="post">
            <p>Pizza toppings</p>
            <ul>
                <?php foreach($toppings as $key => $topping): ?>
                <li>
                    <label>
                        <input type="checkbox" name="toppings[]" id="toppings_<?php echo $key ?>" value="<?php echo $key ?>"> <?php echo $topping['naam'] ?>
                    </label>
                </li>
                <?php endforeach ?>
            </ul>
            <p><input type="submit" value="Verzenden"></p>
        </form>
    <?php endif ?>


</body>

</html>