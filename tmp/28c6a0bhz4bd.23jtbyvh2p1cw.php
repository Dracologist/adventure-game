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
            <li class="nav-item"><a class="nav-link" href="quit">Quit</a></li>
            <?php if (isset($SESSION['player'])): ?>
                <li class="nav-item">
                    <a class="nav-link">Name: <?= ($SESSION['player']->getFName()) ?> <?= ($SESSION['player']->getLName()) ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <p>You attempt to sneak past the bear cub.</p>
    <?php if ($cub->perception(50)): ?>
        
            <p>A twig snaps under your foot and the little bear's face whips around to look at you.</p>
            <a href="forest-end" class="btn btn-primary">Run Away</a>
            <a href="bear-cub" class="btn btn-primary">Approach the Cub</a>
        
        <?php else: ?>
            <p>The little bear does not notice your presence and you continue along your way.</p>
            <a href="forest-end" class="btn btn-primary">Continue</a>
        
    <?php endif; ?>
</div>
</body>
</html>