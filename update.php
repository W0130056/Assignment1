<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
require_once('dbConnect.php');
$db = getConnection();
//if all the fields are not empty
if(!empty($_POST['birth_date']) && !empty($_POST['first_name']) &&
    !empty($_POST['last_name']) && !empty($_POST['gender']) && !empty($_POST['hire_date']));
//variables are handing sticky fields
//keeps fields in the boxes
$emp_no = $_POST['emp_no'];
$birth_date = $_POST['birth_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$hire_date = $_POST['hire_date'];
//sql query
//updates
$query = "UPDATE employees ";
$query .= "SET birth_date='";
$query .= $birth_date;
$query .= "', first_name='";
$query .= $first_name;
$query .= "', last_name='";
$query .= $last_name;
$query .= "', gender='";
$query .= $gender;
$query .= "', hire_date='";
$query .= $hire_date;
$query .= "' WHERE emp_no = '$emp_no'";
$result = mysqli_query($db, $query);
if(!$result)
{
    die('Unable to update record into employee Database.');
}

//prints out the new record
$query = "SELECT * FROM employees WHERE emp_no = '$emp_no' ORDER BY emp_no DESC LIMIT 0, 1";
$result = mysqli_query($db, $query);
if(!$result)
{
    die('Unable to update record from employee Database');
}
?>
<p>Successfully updated <?php echo mysqli_affected_rows($db); ?> records(s).</p>

//prints out a table with the employee in it, just the one
<table>
    <thread>
        <th>Emp. Number</th>
        <th>Birth Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Hire Date</th>
    </thread>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['emp_no']; ?></td>
            <td><?php echo $row['birth_date']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['hire_date']; ?></td>
        </tr>
    <?php
    endwhile;
    mysqli_close($db);
    ?>
    </tbody>
</table>

//goes back to the main page
<form action="EmployeeRecords.php" method="post" >
    <p>
        <input type="submit" value="Return To Employees Database">
    </p>
</form>
</body>
</html>