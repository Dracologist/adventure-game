<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Starting</title>
</head>
<body>
<p>First Name: <?= ($SESSION['player']->getFname()) ?></p>
<p>Last Name: <?= ($SESSION['player']->getLname()) ?></p>
<a href="character-form" class="btn-primary">Edit My Character</a>
<a href="<?= ($SESSION['location']) ?>" class="btn-primary">Continue</a>
</body>
</html>