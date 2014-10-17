<!DOCTYPE html>
<html>
<head>
    <title>Assignment One - Emerald Wells (w0130056)</title>
</head>
<body>
<?php
//this starts the session
session_start();
//gets the db connection from dbConnect
require_once('dbConnect.php');
$db = getConnection();
//sets the variable
$_session['search'] = 0;
//sets the array
$array['ids'] = array();
//sets the counter
$arrayCounter = 0;
//sets an empty string
$string = "";
//sets the string equal to post 'search'
$string = $_POST['search'];
//works with the search form and the server
//defines a method and a name
 //has an input for search, set as text....echos the string from above
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post" name="EmployeeSearch">
    <p>Search:

        <input name="search" type="text" value="<?php echo $string; ?>" />

        <input name="" type="submit">
        <input name="previous" type="submit" value="Previous Page">
        <input name="next" type="submit" value="Next Page" >
    </p>


    <table border = "1">
        <th>Emp. Number</th><th>Birth Date</th>
        <th>First Name</th><th>Last Name</th>
        <th>Gender</th><th>Hire Date</th>
        <th>Edit Emp</th><th>Delete Emp</th>


        <?php
        //this is the counter for next and previous
        if (isset ($_POST['next']))
        {
            $_session['search']+= 25;
        }//end if
        if (isset ($_POST['previous']))
        {
            if(($_session['search']- 25) <= 0)
            {
                $_session['search']= 0;
            }
            else
            {
                $_session['search']-= 25;
            }
        }//end if

        //search string starts
        $sqlOrder = "SELECT * FROM employees";
        if (isset($_POST['search']))
        {
            $string = $_POST['search'];
            $string = "%" . $string . "%";
            $sqlOrder .= " WHERE first_name LIKE '$string' OR last_name LIKE '$string'";
        }//end if
        $sqlOrder .= " LIMIT " . $_session['search'] . ",25";
        if (!$db)
        {
            //die means stop processses
            die('Could not connect to the Employees Database: ' . mysqli_error($db));
        }//end if
        $result = mysqli_query($db,$sqlOrder);
        if(!$result)
        {
            die('Could not retrieve records from the Employees Database: ' . mysqli_error($db));
        }//end if

        //printing out the employee records, so the table
        while ($row = mysqli_fetch_assoc($result))
        {
            echo  "<tr><td>" . $row['emp_no'] ."</td><td>" . $row['birth_date'] . "</td>
                        <td>" . $row['first_name'] ."</td><td>" . $row['last_name'] . "</td>
                        <td>" . $row['gender'] ."</td><td>" . $row['hire_date'] . "</td>";
            ?>
            <?php

            //adds the employee id to the array
            array_push($array['ids'], $row['emp_no']);
            //the update and delete buttons--below
            ?>
            <td>

                <form action="UpdateNow.php"  method="post" name="id_update">
                    <input type="hidden" name="id_update" value="<?php echo ($array[ids][$arrayCounter]); ?>"/>
                    <input type="submit" value="Update Employee" />
                </form></td>
            <td><form action="delete.php"  method="post" name="id_delete">
                    <input type="hidden" name="id_delete" value="<?php echo ($array[ids][$arrayCounter]); ?>"/>
                    <input type="submit" value="Delete Employee" />
                </form></td></tr>
            <?php
            //counter steps up one before starting the loop over
            $arrayCounter++;
        }//end while
        //insert record button--down in form action
        ?>
</form>
</table>


<form action="InsertRecords.php" method="post" >
    <p>
        <input type="submit" value="Create A New Entry">
    </p>
</form>
<?php
mysqli_close($db);
?>
</body>
</html>