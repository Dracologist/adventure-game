<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Starting</title>
</head>
<body>
<p>First Name: <?= ($SESSION['player']->getFname()) ?></p>
<p>Last Name: <?= ($SESSION['player']->getLname()) ?></p>
<a href="edit-character" class="btn-primary btn-lg">Edit My Character</a>
</body>
</html>