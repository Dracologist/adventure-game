<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>grassland path</title>
</head>

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
        While skipping through the soft grassland,
        you come upon a skunk. You carefully tiptoe past it, hoping it doesn't spray you.

    </p>
    <?php if ($skunk->perception(30)): ?>
        
            <p>Unfortunately, the skunk notices your presence and raises its tail.</p>
            <?= ($skunk->attack())."
" ?>
            <p>
                Still smelling of skunk, you find another fork in the road.
                One path leads to the desert, another to the mountains, and a third to the forest.
            </p>
        
        <?php else: ?>
            <p>Luckily, it doesn't seem to notice you and you continue on your way.</p>
            <p>
                You find another fork in the road.
                One path leads to the desert, another to the mountains, and a third to the forest.
            </p>
        
    <?php endif; ?>
    <a class="btn btn-primary" href="mountains">Go to the Mountains</a>
    <a class="btn btn-primary" href="desert">Go to the Desert</a>
    <a class="btn btn-primary" href="forest">Go to the Forest</a>
</div>
</body>
</html>