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

//goes back to the main page
<form action="EmployeeRecords.php" method="post" >
    <p>
        <input type="submit" value="Return To Employees Database">
    </p>
</form>
</body>
</html>