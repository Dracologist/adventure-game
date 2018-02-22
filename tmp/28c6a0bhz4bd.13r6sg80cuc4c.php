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
                    <label>First Name: <input type="text" name="fname" value="<?= ($SESSION['player']->getFname) ?>"></label>
                    <br>
                    <label>Last Name: <input type="text" name="lname" value="<?= ($SESSION['player']->getLname) ?>"></label>
                </fieldset>
            </div>
            <div class="row">
                <input type="submit" name="submit-char" value="Submit" class="btn-primary">
            </div>
        </form>
    </div>
</div>
</body>
</html>