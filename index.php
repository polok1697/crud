<?php 
require_once("./header.php");
$sql = "SELECT * FROM  `students` ORDER BY `id` ASC";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "No students fund";
} else {
    ?>


<h2 style="text-align:center">All Students Data</h2>
<div class="container col-md-4 m-auto border rounded shadow p-4 ">
    <div class="form">
    <table class="border" cellpadding="10" cellspacing="0" style="text-align:center">
    <tr class="m-auto border rounded shadow p-4 border ">
        <th>SL</th>
        <th>Name</th>
        <th>City</th>
        <!-- <th>Phone</th> -->
        <th>Action</th>
    </tr>
    <?php $sn =1;
    while ($row = $result->fetch_object()){

   ?>
    <tr class=" m-auto border rounded shadow p-4 border ">
        <td><?= $sn++ ?></td>
        <td><?= $row->name?></td>
        <td><?= $row->city?></td>
        <!-- <td><?= $row->phone?></td> -->
        <td>
            <a href="./editStudent.php?id=<?= $row->id ?>"><button>Edit</button></a>
            <a href="./deleteStudent.php?id=<?= $row->id ?>"><button>Delete</button></a>
        </td>

    </tr>
   <?php
    }
   ?>

</table>
    </div>
</div>

<?php
} 
?>



<?php 
require_once("./footer.php");
?>