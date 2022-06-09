<?php

require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../controllers/UserController.php';


$errors = [];

if (isset($_GET['errors'])) {
    $errors = $_GET['errors'];
}

$id = new UserController();
$db = new Database();
$user = $db->find($_GET['id']);
?>
<?php require_once __DIR__.'/partials/head.php'?>

<body>
    <form action="/save_edit" method="post">
        <input name="id" type="hidden" value="<?php echo $_GET['id'] ?>">
        <label>
            First name
            <input name="first_name" type="text" value="<?php echo $user['first_name'] ?>">
            <?php if (isset($errors['first_name'])) { ?>
                <div class="error"><?php echo $errors['first_name'] ?></div>
            <?php } ?>
        </label>
        <label>
            Last name
            <input name="last_name" type="text" value="<?php echo $user['last_name'] ?>">
            <?php if (isset($errors['last_name'])) { ?>
                <div class="error"><?php echo $errors['last_name'] ?></div>
            <?php } ?>
        </label>
        <button type="submit">Save</button>
    </form>
<?php require_once __DIR__.'/partials/footer.php'?>