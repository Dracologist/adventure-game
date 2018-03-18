<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Character</title>
</head>
<body>
<form id="character" action="submit-character" method="post">
    <div class="container">
        <div class="row text-center">
            <legend>Character Name</legend>
        </div>
        <div class="row my-5">
            <div class="col-md">
                <div id="fname-message"></div>
                <?php if (isset($fnerror)): ?>
                    <p class="alert alert-danger"><?= ($fnerror) ?></p>
                <?php endif; ?>
                <label>First Name: <input type="text" name="fname" id="fname" <?php if (isset($SESSION['player'])): ?>value="<?= ($SESSION['player']->getFname()) ?>"<?php endif; ?>></label>
            </div>
            <div class="col-md">
                <div id="lname-message"></div>
                <?php if (isset($lnerror)): ?>
                <p class="alert alert-danger"><?= ($lnerror) ?></p>
                <?php endif; ?>
                <label>Last Name: <input type="text" name="lname" id="lname" <?php if (isset($SESSION['player'])): ?>value="<?= ($SESSION['player']->getLname()) ?>"<?php endif; ?>></label>
            </div>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary" id="submit-character">Submit</button>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit-character").click(function (e) {
            var first = $("#fname").val();
            var last = $("#lname").val();
            var valid = true;
            if(first.length < 1){
                $("#fname-message").html("<p class='alert alert-danger'>First name must be at least one character long</p>");
                valid = false;
            }
            if(last.length < 1){
                $("#lname-message").html("<p class='alert alert-danger'>Last name must be at least one character long</p>");
                valid = false;
            }
            if(first.match(/\W/) != null){
                $("#fname-message").html("<p class='alert alert-danger'>First name can not contain special characters</p>");
                valid = false;
            }
            if(last.match(/\W/) != null){
                $("#lname-message").html("<p class='alert alert-danger'>Last name can not contain special characters</p>");
                valid = false;
            }
            if(!valid){
                e.preventDefault();
            }
            if (valid){
                $.post("submit-character", {
                    fname: first,
                    lname: last
                });
            }
        });
    });
</script>
</body>
</html>