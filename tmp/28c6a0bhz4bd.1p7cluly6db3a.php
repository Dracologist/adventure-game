<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letterlight Bridge</title>
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
                    <a class="nav-link"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Name: <?= ($SESSION['player']->getFName()) ?> <?= ($SESSION['player']->getLName()) ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <p>
        A great stone bridge stretches over the rift in the mountainside before you.
        The first thing you notice about it is that it completely lacks any sort of
        railing to keep you from falling over the side. Your stomach reels as you
        step out onto the bridge, carefully placing one foot in front of the other until...
    </p>
    <?php if (strlen('weightyword') <= (strlen($SESSION['player']->getFname()) + strlen($SESSION['player']->getLname()))): ?>
        
            <?= ($SESSION['player']->awardPoints())."
" ?>
            <p>Your foot finds solid ground and you return to the safety of the turf.</p>
        
        <?php else: ?>
            <?= ($SESSION['player']->playerDeath())."
" ?>
            <p><b><i>WOOSH!</i></b> The wind knocks you sideways. You stumble out over
            the edge of the rocky bridge and plummet into the chasm below.</p>
            <h1>You died!</h1>
            <a class="btn btn-primary" href="signpost">Return to the Signpost</a>
        
    <?php endif; ?>
    Score: <?= ($SESSION['player']->getScore())."
" ?>
    <br>
    Deaths: <?= ($SESSION['player']->getDeaths)."
" ?>
</div>
</body>
</html>