<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_GET['ecsesoc_id'])) {
    $csesoc_id = $_GET['ecsesoc_id'];


    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM cse_society WHERE Member_id=$csesoc_id";
    $result_data = $conn->query($selectQuery);

    if (isset($_POST['updateinfo'])) {
        $Member_id = $_POST['Member_id'];
        $common_id = $_POST['common_id'];
        $cse_Designation = $_POST['cse_Designation'];
        $Session = $_POST['Session'];

        $updatQuery = "UPDATE `cse_society` SET `Member_id`='$Member_id',`common_id`='$common_id',`cse_Designation`='$cse_Designation',`Session`='$Session' WHERE Member_id=$csesoc_id";

        if ($conn->query($updatQuery) == TRUE) {
            header("Location: csesoc.php");
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>CSE SOCIETY||admin</title>
        </head>
        <body>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
    while ($row = $result_data->fetch_assoc()) {
        ?>
                    <label>Enter Member_id:</label><input type="text" name="Member_id" value="<?php echo $row['Member_id']; ?>" placeholder="Member_id" required><br><br>
                    <label>Enter common_id:</label><input type="text" name="common_id" value="<?php echo $row['common_id']; ?>" placeholder="common_id" required><br><br>
                    <label>Enter Degination:</label><input type="text" name="cse_Designation" value="<?php echo $row['cse_Designation']; ?>" placeholder="cse_Designation" required><br><br>
                    <label>Enter CGPA:</label><input type="text" name="Session" value="<?php echo $row['Session']; ?>" placeholder="Session" required><br><br>
                    <input type="submit" name="updateinfo">
    <?php } ?>
            </form>
        </body>
    </html>
<?php } ?>