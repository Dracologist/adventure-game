<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signpost</title>
    <link rel="stylesheet" href="styles/signpost-styles.css">
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
        Upon closer inspection, you can see three small warning signs nailed to the signpost.
    </p>
    <div class="sign col-sm-6 col-md-4">
        <h4>Attention!</h4>
        <p>Words have weight. Make sure you know the total weight of your first and last names.</p>
    </div>
    <div class="sign col-sm-6 col-md-4">
        <h4>Warning!</h4>
        <p>Weightyword Bridge cannot handle a name with greater weight than its own.</p>
    </div>
    <div class="sign col-sm-6 col-md-4">
        <h4>Caution!</h4>
        <p>The wind in the cannyon is very strong and may blow away travellers with light names.</p>
    </div>
    <br>
    <a class="btn btn-primary" href="weightyword">Go to Weightyword</a>
    <a class="btn btn-primary" href="letterlight">Go to Letterlight</a>
</div>
</body>
</html>