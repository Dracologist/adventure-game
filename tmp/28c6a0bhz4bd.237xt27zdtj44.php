<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Continue</title>
</head>
<body>
<form method="post" action="continue">
    <?php if (isset($iderror)): ?>
        <p class="alert alert-danger"><?= ($iderror) ?></p>
    <?php endif; ?>
    <label>Player ID: <input type="number" id="player-id" name="player-id"></label>
    <br>
    <input type="submit" class="btn btn-primary" value="Load Character">
    <a href="character-form" class="btn btn-primary">Create new character</a>
</form>
</body>
</html>