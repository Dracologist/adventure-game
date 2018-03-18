<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
    <p>You reach the end of the forest path, still checking over your shoulder to see if the bear is following you.
        Ahead you can see the road forks again. One path leads to a desert, another to a grassland, and a third
        to some mountains.</p>
    <a href="desert" class="btn btn-primary">To the Desert</a>
    <a href="grassland" class="btn btn-primary">To the Grassland</a>
    <a class="btn btn-primary" href="mountains">To the Mountains</a>
</div>
</body>
</html>