<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weightyword Bridge</title>
</head>
<body>
<div class="container">
<p>
    You carefully step out onto the rickety rope bridge ahead of you, gingerly setting your foot
    onto a warped board. As you gradually shift your weight onto this foot, you can hear the board
    squeak and the ropes creak. Softly, slowly, you take another step, and then another until...
</p>
<?php if (strlen('weightyword') > (strlen($SESSION['player']->getFname()) + strlen($SESSION['player']->getLname()))): ?>
    
        <?= ($SESSION['player']->awardPoints(10))."
" ?>
        <p>Your foot finds solid ground and you return to the safety of the turf.</p>
    
    <?php else: ?>
        <?= ($SESSION['player']->playerDeath())."
" ?>
        <p><b><i>SNAP!</i></b> The board beneath your foot breaks in half and you fall
        forward across the bridge. <b><i>TWANG!</i></b> The sudden impact of your fall was more
        than the ropes could handle. You plummet into the darkness of the abyss below.</p>
        <h1>You died!</h1>
    
<?php endif; ?>
</div>
</body>
</html>