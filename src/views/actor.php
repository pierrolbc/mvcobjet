<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actors</title>
</head>
<body>
    <?php
    foreach ($actors as $actor) { ?>
        <li><?= $actor->getFirstName() .'&nbsp;'. $actor->getLastName(); ?></li></br>
    <?php } ?>
</body>
</html>

