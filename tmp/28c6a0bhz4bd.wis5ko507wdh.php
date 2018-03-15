<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signpost</title>
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
                    <a class="nav-link">Score: <?= ($SESSION['player']->getScore()) ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Name: <?= ($SESSION['player']->getFName()) ?> <?= ($SESSION['player']->getLName()) ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<p>
    Upon closer inspection, you can see three small warning signs nailed to the signpost.
</p>
<div class="sign">
    <h4>Attention!</h4>
    <p>Words have weight. Make sure you know the exact weight of your full name</p>
</div>
<div class="sign">
    <h4>Warning!</h4>
    <p>Weightyword Bridge cannot handle a name with greater weight than its own</p>
</div>
<div class="sign">
    <h4>Caution!</h4>
    <p>The wind in the cannyon is very strong and may blow away travellers with light names</p>
</div>
<p>A post-it note at the bottom says "Space weighs nothing"</p>
<a class="btn btn-primary" href="weightyword">Go to Weightyword Bridge</a>
<a class="btn btn-primary" href="letterlight">Go to Letterlight Bridge</a>
</body>
</html>