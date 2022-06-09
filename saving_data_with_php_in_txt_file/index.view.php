<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Fake DB</title>
</head>
<body>
<form action="save.php" method="post">
    <div>
        <label><span> First name: </span>
            <input type="text" name="first_name" required value="<?php echo $_GET['first_name'] ?? '' ?>">
        </label>

    </div>
    <div>
        <label><span> Last name: </span>
            <input type="text" name="last_name" required value="<?php echo $_GET['last_name'] ?? '' ?>">
        </label>
    </div>
    <div>
        <span>Hobbies</span>
        <label> Reading
            <input
                type="checkbox"
                name="hobbies[reading]"
                value="reading">
            <?php if (isset($_POST['hobbies']['reading'])){
                echo 'checked';
            } ?>
        </label>
        <label> Cycling
            <input
                type="checkbox"
                name="hobbies[cycling]"
                value="cycling">
            <?php if (isset($_POST['hobbies']['cycling'])){
                echo 'checked';
            } ?>
        </label>
        <label> Swimming
            <input
                type="checkbox"
                name="hobbies[swimming]"
                value="swimming">
            <?php if (isset($_POST['hobbies']['swimming'])){
                echo 'checked';
            } ?>
        </label>
    </div>
    <input type="submit" value="Submit">
</form>

<table class="table">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Hobbies</th>
    </tr>

        <?php foreach ($users as $user) { ?>

        <tr>
            <?php
                require 'usersRows.php';
            ?>
        </tr>

        <?php } ?>
</table>
</body>
</html>