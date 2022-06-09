<?php

require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../controllers/UserController.php';

$errors = [];

if (isset($_GET['errors'])) {
    $errors = $_GET['errors'];
}

$id = new UserController();
$db = new Database();
?>
<?php require_once __DIR__.'/partials/head.php'?>

    <form action="/save" method="post">
        <label>
            First name
            <input name="first_name" type="text">
            <?php if (isset($errors['first_name'])) { ?>
                <div class="error"><?php echo $errors['first_name'] ?></div>
            <?php } ?>
        </label>
        <label>
            Last name
            <input name="last_name" type="text">
            <?php if (isset($errors['last_name'])) { ?>
                <div class="error"><?php echo $errors['last_name'] ?></div>
            <?php } ?>
        </label>
        <button type="submit">Save</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($db->all() as $id => $user) { ?>
            <tr>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td>
                    <a href="<?php echo '/views/edit.view.php?id='.$id  ?>">
                        Edit
                    </a>
                    <form action="/delete" method="post">
                        <input name="id" type="hidden" value="<?php echo $id ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php require_once __DIR__.'/partials/footer.php'?>