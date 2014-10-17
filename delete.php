<!DOCTYPE html>
<html>
<head>
    <title>Delete An Employee</title>
</head>
<body>
<?php
require_once('dbConnect.php');
$db = getConnection();
if (isset($_POST['id_delete']))
{
    //this is the delete that links to the button
    //when the delete button is clicked it calls this sql query
    $id = $_POST['id_delete'];
    $result = mysqli_query($db,"DELETE FROM employees WHERE emp_no = '" . $id ."';");
    if(!$result)
    {
        die('Could not delete record from the Employees Database: ' . mysqli_error($db));
    }
    Else
    {;

        //prints out how many rows were affected
        $affectedRows = mysql_affected_rows($db);
        echo "<p>Successfully deleted " . $affectedRows . " record(s).</p>";
    }
    mysqli_close($db);
}
?>
<form action="EmployeeRecords.php" method="post" >
    <p>
        //goes back to the main page
        <input type="submit" value="Return To Employees Database">
    </p>
</form>
</body>
</html>