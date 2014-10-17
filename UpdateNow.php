<!DOCTYPE html>
<html>
<head>
    <?php
    require_once('dbConnect.php');
    $db = getConnection();
    ?>
    <title>Insert Record</title>

    //links to my validation javascript
    <script src="Validation.js"></script>
</head>
<body>
<?php
$id = $_POST['id_update'];

//the query that updates
$query = "SELECT * FROM employees WHERE emp_no = $id";
//
$result = mysqli_query($db, $query);

//giving variables the value in the database
while ($column = mysqli_fetch_assoc($result))
{
    $emp_no = $column['emp_no'];
    $birth_date = $column['birth_date'];
    $first_name = $column['first_name'];
    $last_name = $column['last_name'];
    $gender = $column['gender'];
    $hire_date = $column['hire_date'];
}
//the form that has all the information
?>
<form action="update.php" method="post" onsubmit="return validateForm()">
    <label>Employee #: <input type="text" name="emp_no" id="emp_no" value="<?php echo $emp_no ?>"/>. </label><br>
    <label>Birth Date: <input type="text" name="birth_date" id="birth_date" value="<?php echo $birth_date ?>"
                              onfocus="highlight('birth_date')" onblur="lowlight('birth_date')"/>. </label><br>
    <label>First Name: <input type="text" name="first_name" id="first_name" value="<?php echo $first_name ?>"
                              onfocus="highlight('first_name')" onblur="lowlight('first_name')"/>. </label><br>
    <label>Last Name: <input type="text" name="last_name" id="last_name" value="<?php echo $last_name ?>"
                             onfocus="highlight('last_name')" onblur="lowlight('last_name')"/>. </label><br>
    <label>Gender: <input type="text" name="gender" id="gender" value="<?php echo $gender ?>"
                          onfocus="highlight('gender')" onblur="lowlight('gender')"/>. </label><br>
    <label>Hire Date: <input type="text" name="hire_date" id="hire_date" value="<?php echo $hire_date ?>"
                             onfocus="highlight('hire_date')" onblur="lowlight('hire_date')"/>. </label><br>
    <p><input type="submit" name="Update Record" value="Update Record" /></p>
</form>
<?php
mysqli_close($db);
?>
</body>
</html>