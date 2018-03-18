<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>forest</title>
</head>
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
    <p>
        After trekking for 10 minutes through the dense forest,
        You reach a clearing in the trees surrounded by berry bushes.
        On the left side of the clearing, you can see a little bear cub feasting on the berries.
    </p>

    <a class="btn btn-primary" href="bear-cub">Approach the bear cub</a>
    <a class="btn btn-primary" href="sneak">Sneak past the bear cub</a>
    <a class="btn btn-primary" href="entryway">Turn back</a>
</div>

</body>
</html>