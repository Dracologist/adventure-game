<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weightyword Bridge</title>
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
<p>
    You carefully step out onto the rickety rope bridge ahead of you, gingerly setting your foot
    onto a warped board. As you gradually shift your weight onto this foot, you can hear the board
    squeak and the ropes creak. Softly, slowly, you take another step, and then another until...
</p>
<?php if (strlen('weightyword') > (strlen($SESSION['player']->getFname()) + strlen($SESSION['player']->getLname()))): ?>
    
        <p>
            Your foot finds solid ground and you return to the safety of the turf. You descend down the mountain
            and find another fork in the road. One path leads to a thick forest, another to lush grasslands,
            and a third to an arid desert.
        </p>
        <a href="forest" class="btn btn-primary">To the forest</a>
        <a href="grassland" class="btn btn-primary">To the grasslands</a>
        <a href="desert" class="btn btn-primary">To the desert</a>
    
    <?php else: ?>
        <p><b><i>SNAP!</i></b> The board beneath your foot breaks in half and you fall
        forward across the bridge. <b><i>TWANG!</i></b> The sudden impact of your fall was more
        than the ropes could handle. You plummet into the darkness of the abyss below.</p>
        <?= ($SESSION['player']->playerDeath())."
" ?>
        <a class="btn btn-primary" href="signpost">Return to the Signpost</a>
    
<?php endif; ?>
</div>
</body>
</html>