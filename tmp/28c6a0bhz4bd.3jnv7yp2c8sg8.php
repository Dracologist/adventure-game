<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entrance</title>
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
</div>
<p>
    Before you stretch four pathways. The first one leads west to the mountains.
    The second leads north to the forest. The third path leads east to the grasslands.
    The fourth and final path leads south to the desert.
</p>
<a href="mountains" class="btn-primary btn">To the mountains</a>
<a href="forest" class="btn btn-primary">To the forest</a>
<a href="grassland" class="btn btn-primary">To the grasslands</a>
<a href="desert" class="btn btn-primary">To the desert</a>
</body>
</html>