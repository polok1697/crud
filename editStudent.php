<?php 
require_once("./header.php");
$id = $_GET['id'] ?? header("Location:./");
$id = $conn->real_escape_string($id);
$sql = "SELECT * FROM `students` WHERE `id` = '$id'";
$result = $conn->query($sql);
$result->num_rows == 0 ? header("Location:./") : "";
$row = $result->fetch_object();
if (isset($_POST['ust'])){
    $name = $_POST['name'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];


   $name = $conn->real_escape_string($name);
   $city = $conn->real_escape_string($city);
   $phone = $conn->real_escape_string($phone);

   $sql = "UPDATE `students` SET `name` = '$name' , `city` = '$city', `phone` = '$phone' WHERE `id` = '$id'";
   $result = $conn->query($sql);

   if ($result){
    echo "Student updated";
    echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
   } else {
    echo "Student not updated";
   }



}
?>

<div class="container col-md-4 m-auto border rounded shadow p-4">
<h2>Edit Student Data</h2>


<div class="form ">
<form action="" method="post">
    <input type="text" placeholder="Student Name" name="name" required minlength="3" value="<?= $row->name?>">
    <br><br>
    <input type="text" placeholder="Student City" name="city" required minlength="3" value="<?= $row->city?>">
    <br> <br>
    <input type="number" placeholder="Phone" name="phone" required value="<?= $row->phone?>">
    <input type="submit" value="Update" name="ust">
</form>
</div>
</div>

<?php 
require_once("./footer.php");
?>