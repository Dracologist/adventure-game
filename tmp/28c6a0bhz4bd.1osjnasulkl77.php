<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Character</title>
</head>
<body>
<div class="container">
    <div class="row">
        <form action="submit-character" method="post" class="container">
            <div class="row">
                <fieldset class="container">
                    <div class="row">
                        <legend>Character Name</legend>
                        <?php if (isset($fnerror)): ?>
                            <p class="alert alert-danger"><?= ($fnerror) ?></p>
                        <?php endif; ?>
                        <label>First Name: <input type="text" name="fname" id="fname" <?php if (isset($SESSION['player'])): ?>value="<?= ($SESSION['player']->getFname()) ?>"<?php endif; ?>></label>
                    </div>
                    <div class="row">
                        <?php if (isset($lnerror)): ?>
                        <p class="alert alert-danger"><?= ($lnerror) ?></p>
                        <?php endif; ?>
                        <label>Last Name: <input type="text" name="lname" id="lname" <?php if (isset($SESSION['player'])): ?>value="<?= ($SESSION['player']->getLname()) ?>"<?php endif; ?>></label>
                    </div>
                </fieldset>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
</body>
</html>