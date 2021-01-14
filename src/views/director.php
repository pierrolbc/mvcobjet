<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directors</title>
</head>
<body>
    <?php
    foreach ($directors as $director) { ?>
        <li><?= $director->getFirstName() .'&nbsp;'. $director->getLastName(); ?></li></br>
    <?php } ?>
</body>
</html>