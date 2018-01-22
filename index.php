<?php

    include 'inc/header.php';
    include 'lib/config.php';
    include 'lib/database.php';


?>


<?php

    $db = new Database();
    $query = "SELECT * FROM tbl_user";
    $read = $db->select($query);


?>

<?php
    if (isset($_GET['msg'])){
        echo "<span style='color: green'>".$_GET['msg']."</span>";
    }
?>


    <table class="text-center table table-striped">
        <tr>
            <th width="10%">Serial</th>
            <th width="30%">Name</th>
            <th width="30%">Email</th>
            <th width="20%">Skill</th>
            <th width="10%">Action</th>
        </tr>

        <?php
            $i = 1;
            if ($read){
                while ($row = $read->fetch_assoc()){

        ?>

        <tr>

            <td><?php echo $i++; ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['skill'] ?></td>
            <td>
                <a class="btn btn-primary" href="update.php?id=<?php echo urldecode($row['id']); ?>">Edit</a>

            </td>

        </tr>
        <?php } ?>

        <?php }else{ ?>
                <p>Data not available...!</p>
        <?php } ?>


    </table>

<a class="btn btn-primary" href="create.php">Create</a>
<a class="btn btn-primary" href="index.php">Home</a>





<?php include 'inc/footer.php';?>



