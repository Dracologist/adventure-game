<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letterlight Bridge</title>
</head>
<body>
<div class="container">
    <p>
        A great stone bridge stretches over the rift in the mountainside before you.
        The first thing you notice about it is that it completely lacks any sort of
        railing to keep you from falling over the side. Your stomach reels as you
        step out onto the bridge, carefully placing one foot in front of the other until...
    </p>
    <?php if (strlen('weightyword') <= (strlen($SESSION['player']->getFname()) + strlen($SESSION['player']->getLname()))): ?>
        
            <?= ($SESSION['player']->awardPoints(10))."
" ?>
            <p>Your foot finds solid ground and you return to the safety of the turf.</p>
        
        <?php else: ?>
            <?= ($SESSION['player']->playerDeath())."
" ?>
            <p><b><i>WOOSH!</i></b> The wind knocks you sideways. You stumble out over
            the edge of the rocky bridge and plummet into the chasm below.</p>
            <h1>You died!</h1>
        
    <?php endif; ?>
</div>
</body>
</html>