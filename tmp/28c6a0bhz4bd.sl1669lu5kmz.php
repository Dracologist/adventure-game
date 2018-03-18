<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>desert</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-nav sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="entryway">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="character-form">Edit Character</a></li>
            <li class="nav-item"><a class="nav-link" href="save">Save Character and Quit</a></li>
            <?php if (isset($SESSION['player'])): ?>
                <li class="nav-item">
                    <a class="nav-link">Name: <?= ($SESSION['player']->getFName()) ?> <?= ($SESSION['player']->getLName()) ?></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="delete">Delete Character and Quit</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <p id="desert-text">
        While traveling through the hot desert,
        you encounter a large rock shaped like a lion you've heard legends that there is a great treasure
        buried beneath the lion rock.
    </p>
    <button class="btn btn-primary" id="dig">Dig for treasure!</button>
    <a class="btn btn-primary" href="desert-end">Continue down the path</a>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#dig").click(function () {
            var text;
            if(Math.random() <= 0.4){
                text = "After hours of digging, your shovel strikes something solid and hollow. " +
                    "A few more minute of work and you've lifted a treasure chest out of the desert sand. " +
                    "Upon opening it, you find a golden crown set with the finest jewels.";
                $("#dig").detach();
            }
            else {
                text = "You dig for hours, but come up empty handed.";
                $("#dig").html("Try again");
                $("#dig").show();
            }
            $("#desert-text").html(text);
            $("#desert-text").show();
        });
    });
</script>
</body>
</html>