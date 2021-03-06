<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Starting</title>
</head>
<body>
<body>
<div class="container">
    <nav class="navbar navbar-nav sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="entryway">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="character-form">Edit Character</a></li>
            <li class="nav-item"><a class="nav-link" href="save">Save Character and Quit</a></li>
            <?php if (isset($SESSION['player'])): ?>
                <li class="nav-item">
                    <a class="nav-link">Name: <?= ($SESSION['player']->getFName()) ?> <?= ($SESSION['player']->getLName()) ?></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="delete">Delete Character and Quit</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <p>First Name: <?= ($SESSION['player']->getFname()) ?></p>
    <p>Last Name: <?= ($SESSION['player']->getLname()) ?></p>
    <a href="character-form" class="btn btn-primary">Edit My Character</a>
    <a href="<?= ($SESSION['location']) ?>" class="btn btn-primary">Continue</a>
</body>
</div>
</html>