<?php 
require_once("./header.php");
$id = $_GET['id'] ?? header("Location:./");
$id = $conn->real_escape_string($id);
$sql = "SELECT * FROM `students` WHERE `id` = '$id'";
$result = $conn->query($sql);
$result->num_rows == 0 ? header("Location:./") : null;
if (isset($_POST['dst'])) {
    $result = $conn->query("DELETE FROM `students` WHERE `id` = $id");
    if ($result) {
        echo "Student deleted successfully";
        echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
    } else {
        echo "Student Not deleted";
    }

}

?>

<div class="container">
    
<form action="" method="post">
    <h2>Are Sure you ant to delete this Student?</h2>
    <input type="submit" value="Yes" name="dst">
    <a href="./"><button type="button">No</button> </a>
</form>
</div>


<?php 
require_once("./footer.php");
?>