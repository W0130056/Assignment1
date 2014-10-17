<!DOCTYPE html>
<html>
<head>
    <?php
    require_once('dbConnect.php');
    $db = getConnection();
    ?>
    <title>Insert Record</title>
    <link rel="stylesheet" href="css.css">
    <script src="Validation.js"></script>
</head>
<body>

//form for inserting a record
<form action="InsertRecord.php" method="post" onsubmit="return validateForm()">
    <label>Birth Date: <input type="text" name="birth_date" id="birth_date"
                              onfocus="highlight('birth_date')" onblur="lowlight('birth_date')"/>. </label><br>
    <label>First Name: <input type="text" name="first_name" id="first_name"
                              onfocus="highlight('first_name')" onblur="lowlight('first_name')"/>. </label><br>
    <label>Last Name: <input type="text" name="last_name" id="last_name"
                             onfocus="highlight('last_name')" onblur="lowlight('last_name')"/>. </label><br>
    <label>Gender: <input type="text" name="gender" id="gender"
                          onfocus="highlight('gender')" onblur="lowlight('gender')"/>. </label><br>
    <label>Hire Date: <input type="text" name="hire_date" id="hire_date"
                             onfocus="highlight('hire_date')" onblur="lowlight('hire_date')"/>. </label><br>
    <p><input type="submit" name="Insert Record" value="Insert Record" /></p>
</form>
<?php

//if all the fields are not empty
if(!empty($_POST['birth_date']) && !empty($_POST['first_name']) &&
    !empty($_POST['last_name']) && !empty($_POST['gender']) && !empty($_POST['hire_date']));
$query = "SELECT MAX(emp_no) AS highest FROM employees";
$result = mysqli_query($db, $query);
if(!$result)
{
    die('Unable to get the MAX from emp_no');
}

//variables are handing sticky fields
//keeps fields in the boxes
$emp_no = mysqli_fetch_assoc($result);
$emp_no['highest']++;
$birth_date = $_POST['birth_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$hire_date = $_POST['hire_date'];
//sql query
//inserts
$query = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)";
$query .= "VALUES ('";
$query .= $emp_no['highest'];
$query .= "', '";
$query .= $birth_date;
$query .= "', '";
$query .= $first_name;
$query .= "', '";
$query .= $last_name;
$query .= "', '";
$query .= $gender;
$query .= "', '";
$query .= $hire_date;
$query .= "');";
$result = mysqli_query($db, $query);
if(!$result)
{
    die('Unable to update record in employee Database.');
}
?>

//prints out the new record
<p>Successfully inserted <?php echo mysqli_affected_rows($db); ?> records(s).</p>
<?php
$query = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 0, 1";
$result = mysqli_query($db, $query);
if(!$result)
{
    die('Unable to update records in employee Database');
}
?>

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
    dbClose();
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