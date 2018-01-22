<?php

include 'inc/header.php';
include 'lib/config.php';
include 'lib/database.php';


?>


<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM tbl_user WHERE id = $id";
$getData = $db->select($query)->fetch_assoc();


if (isset($_POST['update'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

    if($name =="" || $email == "" || $skill == ""){
        $error = "Filled must not be empty..!!";
    }else{
        $query = " UPDATE tbl_user
        SET
        name = '$name',
        email = '$email',
        skill = '$skill'
        WHERE id = $id;
        
        ";
        $create = $db->update($query);
    }
}

?>

<?php
if (isset($_POST['delete'])){
    $query = "DELETE FROM tbl_user WHERE  id = $id";
    $delete = $db->delete($query);
}

?>

<div class="form_reg">

    <?php
    if (isset($error)){
        echo "<span style='color: red;'>".$error."</span>";
    }
    ?>

    <form action="update.php?id=<?php echo $id; ?>" method="POST">


        <div class="form-group">
            <label for="name"> Your Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $getData['name']; ?>"/>
        </div>

        <div class="form-group">
            <label for="email"> Your Email</label>
            <input type="text" id="email" name="email" class="form-control" value="<?php echo $getData['email']; ?>"/>
        </div>

        <div class="form-group">
            <label for="skill"> Email Skill</label>
            <input type="text" id="skill" name="skill" class="form-control" value="<?php echo $getData['skill']; ?>"/>
        </div>



        <button type="submit" name="update" class="btn btn-success">Update</button>
        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        <button type="reset" name="cancel" class="btn btn-danger">Cancel</button>
        <a class="btn btn-primary" href="index.php">Go Back</a>

    </form>


</div>


<?php include 'inc/footer.php';?>






