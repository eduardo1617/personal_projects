<td><?php echo $user['first_name'] ?? '' ?></td>
<td><?php echo $user['last_name'] ?? '' ?></td>
<td>
    <?php echo implode('-', $user['hobbies']) ?>
</td>
