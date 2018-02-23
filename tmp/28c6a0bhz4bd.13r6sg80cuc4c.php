<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Character</title>
</head>
<body>
<div class="container">
    <div class="row">
        <form action="submit-character" method="post">
            <div class="row">
                <fieldset>
                    <legend>Character Name</legend>
                    <label>First Name: <input type="text" name="fname" <?php if (isset($SESSION['player'])): ?>value="<?= ($SESSION['player']->getFname()) ?>"<?php endif; ?>></label>
                    <br>
                    <label>Last Name: <input type="text" name="lname" <?php if (isset($SESSION['player'])): ?>value="<?= ($SESSION['player']->getLname()) ?>"<?php endif; ?>></label>
                </fieldset>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Submit" class="btn-primary">
            </div>
        </form>
    </div>
</div>
</body>
</html>