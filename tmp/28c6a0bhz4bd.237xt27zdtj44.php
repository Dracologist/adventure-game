<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Continue</title>
</head>
<body>
<div class="container">
    <form id="load" action="continue" method="post">
        <legend>Load Previous Character</legend>
        <div id="load-message"></div>
        <?php if (isset($iderror)): ?>
            <p class="alert alert-danger"><?= ($iderror) ?></p>
        <?php endif; ?>
        <label>Player ID: <input type="number" id="player-id" name="player_id"></label>
        <br>
        <button class="btn btn-primary" id="load-character">Load Character</button>
    </form>
    <a href="character-form" class="btn btn-primary">Create new character</a>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit-character").click(function (e) {
            var id = Number($("#player-id").val());
            if(id.valueOf() < 1){
                $("#load-message").html("<p class='alert alert-danger'>ID must be at least 1</p>");
                e.preventDefault();
            }
            else {
                $.post("continue", {
                    player_id: id
                });
            }
        });
    });
</script>
</body>
</html>