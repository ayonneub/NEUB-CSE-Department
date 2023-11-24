<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_GET['eti_id'])) {
    $tc_id = $_GET['eti_id'];


    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `teacher` WHERE Teacher_id=$tc_id";
    $result_data = $conn->query($selectQuery);

    if (isset($_POST['updateinfo'])) {
        $Name = $_POST['Teacher_Name'];
        $Mobile = $_POST['Phone_number'];
        $Email = $_POST['Email'];
        $Designation = $_POST['Designation'];

        $updatQuery = "UPDATE `teacher` SET `Teacher_Name`='$Name',`Phone_number`='$Mobile',`Email`='$Email',`Designation`='$Designation' WHERE Teacher_id=$tc_id";

        if ($conn->query($updatQuery) == TRUE) {
            header("Location: ti.php");
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Teachers Information||admin</title>
        </head>
        <body>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
    while ($row = $result_data->fetch_assoc()) {
        ?>
                    <label>Enter Teacher Name:</label><input type="text" name="Teacher_Name" value="<?php echo $row['Teacher_Name']; ?>" placeholder="Teacher Name" required><br><br>
                    <label>Enter Mobile Number:</label><input type="text" name="Phone_number" value="<?php echo $row['Phone_number']; ?>" placeholder="Mobile Number" required><br><br>
                    <label>Enter Teacher Email:</label><input type="text" name="Email" value="<?php echo $row['Email']; ?>" placeholder="Teacher Email" required><br><br>
                    <label>Enter Designation:</label><input type="text" name="Designation" value="<?php echo $row['Designation']; ?>" placeholder="Designation" required><br><br>
                    <input type="submit" name="updateinfo">
    <?php } ?>
            </form>
        </body>
    </html>
<?php } ?>