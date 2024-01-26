<?php 
require_once("./header.php");
if (isset($_POST['ast'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];


    $checkNameQuery = $conn->query ("SELECT * FROM `students` WHERE `phone` = '$phone'");
    if ($checkNameQuery->num_rows > 0) {
        echo "Student Already Exists";
        echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
        exit;
    }


   $name = $conn->real_escape_string($name);
   $city = $conn->real_escape_string($city);
   $phone = $conn->real_escape_string($phone);


    $sql = "INSERT INTO `students`(`name`, `city`, `phone` ) VALUES ('$name','$city','$phone')";
    $resust= $conn->query($sql); 

    if ($resust) {
        echo "Student Added Successfully";
        echo "<script>setTimeout(()=> location.href='./', 2000)</script>";
    } else { 
        echo "Student Added failed";
        
    }
    
 
  
};
?>
   <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 m-auto border rounded shadow p-4">
                <form action="" method="post">
                    <input type="text" placeholder="Student Name" name="name" required minlength="3">
                <br><br>
                    <input type="text" placeholder="Student City" name="city" required minlength="3">
                <br> <br>
                    <input type="number" placeholder="Phone" name="phone" required minlength="11">
                <br> <br>
                <input type="submit" value="Add Student" name="ast">
                </form>
            </div>
        </div>
   </div>



<?php 
require_once("./footer.php");
?>