<?php

include 'inc/header.php';
include 'lib/config.php';
include 'lib/database.php';


?>


<?php

$db = new Database();
if (isset($_POST['create'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

    if($name =="" || $email == "" || $skill == ""){
        $error = "Filled must not be empty..!!";
    }else{
        $query = "INSERT INTO tbl_user(name,email,skill) values('$name','$email','$skill')";
        $create = $db->insert($query);
    }
}

?>

        <div class="form_reg">

            <?php
            if (isset($error)){
                echo "<span style='color: red;'>".$error."</span>";
            }
            ?>

            <form action="" method="POST">


                <div class="form-group">
                    <label for="name"> Your Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name"/>
                </div>

                <div class="form-group">
                    <label for="email"> Your Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email"/>
                </div>

                <div class="form-group">
                    <label for="skill"> Email Skill</label>
                    <input type="text" id="skill" name="skill" class="form-control" placeholder="Enter Skill"/>
                </div>



                <button type="submit" name="create" class="btn btn-success">Create</button>
                <button type="reset" name="cancel" class="btn btn-danger">Cancel</button>
                <a class="btn btn-primary" href="index.php">Go Back</a>

            </form>


        </div>


<?php include 'inc/footer.php';?>






