<section>
    <p>You can edit your entry here.</p>
    <form action="#" method="post">
        <?php $_SESSION['editId'] = $data['id']; ?>
        Name<input type="text"  name="editName" value="<?php echo $data['name']; ?>">
        Location<input type="text" name="editLocation" value="<?php echo $data['location']; ?>">
        <input type="submit" value="Confirm Edit" name="confirm">
    </form>
</section>
