<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>grassland path</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-nav sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="entryway">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="character-form">Edit Character</a></li>
            <li class="nav-item"><a class="nav-link" href="quit">Quit</a></li>
            <?php if (isset($SESSION['player'])): ?>
                <li class="nav-item">
                    <a class="nav-link">Name: <?= ($SESSION['player']->getFName()) ?> <?= ($SESSION['player']->getLName()) ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<p>
    While skipping through the soft grassland,
    you can see a fork in the road up ahead. A signpost indicates that the left
    path leads to Weightyword Bridge and the right path leads Letterlight Bridge.
    There are other signs on the post, but they are too small to read at this distance.
</p>

<a class="btn btn-primary" href="weightyword">Go to Weightyword Bridge</a>
<a class="btn btn-primary" href="signpost">Examine Signpost</a>
<a class="btn btn-primary" href="letterlight">Go to Letterlight Bridge</a>
</body>
</html>