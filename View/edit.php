<section>


    <p>You can edit your entry here.</p>
    <form action="#" method="post">
       <?php $_SESSION['editId'] = $data['id']; ?>
        Name<input type="text"  name="editName" value="<?php echo $data['name']; ?>">
        Email<input type="text" name="editEmail" value="<?php echo $data['email']; ?>">
        Class<input type="text" name="editClass" value="<?php echo $data['class']; ?>">
        <input type="submit" value="Confirm Edit" name="confirm">
    </form>
</section>
