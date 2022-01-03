<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>

    <style>

/* Styling table for Product lines, using code to style from W3Schools
online available at https://www.w3schools.com/css/tryit.asp?filename=trycss_table_fancy
*/
.table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table td, th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}

.title {
  text-align: center;
  color: #4CAF50;
  font-size: 45px;
}

</style>
</head>
<body>
<!-- Including both footer and navbar --> 
<?php
include '/Applications/XAMPP/xamppfiles/htdocs/David_Kuhestani_A3_COMP30680/navbar.php'
?>
</nav>

    <h1 class='title'>Offices</h1>
    <footer>
<?php 
include '/Applications/XAMPP/xamppfiles/htdocs/David_Kuhestani_A3_COMP30680/footer.php'
?>

</footer>
</body>
</html>


<?php
#OFFICES
require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);  

$sql_office = 'SELECT  city, phone, addressLine1, addressLine2, officeCode
        FROM offices';

$offices = $conn->query($sql_office);    
$offices->setFetchMode(PDO::FETCH_ASSOC);


#EMPLOYEE W OFFICECODE 1
$sql_employees_1 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
                FROM employees
                WHERE officeCode = 1
                ORDER BY jobTitle'; 

$emp1 = $conn->query($sql_employees_1);    
$emp1->setFetchMode(PDO::FETCH_ASSOC);


#EMPLOYEE W OFFICECODE 2
$sql_employees_2 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
                FROM employees
                WHERE officeCode = 2
                ORDER BY jobTitle'; 

$emp2 = $conn->query($sql_employees_2);    
$emp2->setFetchMode(PDO::FETCH_ASSOC);

#EMPLOYEE W OFFICECODE 3
$sql_employees_3 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
FROM employees
WHERE officeCode = 3
ORDER BY jobTitle'; 

$emp3 = $conn->query($sql_employees_3);    
$emp3->setFetchMode(PDO::FETCH_ASSOC);

#EMPLOYEE W OFFICECODE 4
$sql_employees_4 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
FROM employees
WHERE officeCode = 4
ORDER BY jobTitle'; 

$emp4 = $conn->query($sql_employees_4);    
$emp4->setFetchMode(PDO::FETCH_ASSOC);

#EMPLOYEE W OFFICECODE 5
$sql_employees_5 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
FROM employees
WHERE officeCode = 5
ORDER BY jobTitle'; 

$emp5 = $conn->query($sql_employees_5);    
$emp5->setFetchMode(PDO::FETCH_ASSOC);

#EMPLOYEE W OFFICECODE 6
$sql_employees_6 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
FROM employees
WHERE officeCode = 6
ORDER BY jobTitle'; 

$emp6 = $conn->query($sql_employees_6);    
$emp6->setFetchMode(PDO::FETCH_ASSOC);

#EMPLOYEE W OFFICECODE 7
$sql_employees_7 = 'SELECT firstName, lastName, jobTitle, employeeNumber, email, officeCode
FROM employees
WHERE officeCode = 7
ORDER BY jobTitle'; 

$emp7 = $conn->query($sql_employees_7);    
$emp7->setFetchMode(PDO::FETCH_ASSOC);

}
catch(PDOException $pe){
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

$conn = null;


//Populating tables with office details
echo "<table class='table'> <tr><th>City</th><th>Address</th><th>Phone</th><th>Employees</th></tr>";
//Now populating the table rows
$counter = 1;
while($row = $offices->fetch()){
    echo "<tr><td>" .$row["city"] . "</td><td>" .$row["addressLine1"] . "</td><td>"
    .$row["phone"] . "</td>";
    echo "<form method='POST'> <td> <input type='submit' name='button{$counter}' value='Employee details'/>  <td></form>";
    $counter++;
    
}
echo "</table>";

      
 
if(isset($_POST['button1'])) { 
    #Populating tables with employee data / TABLE EMPLOYEES 1
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp1->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";

    }
    echo "</table>";
    echo "<br><br><br>";
} 
if(isset($_POST['button2'])) { 

    //Populating tables with employee data TABLE EMPLOYEES 2
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp2->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";
    
    }
    echo "</table>";
    echo "<br><br><br>";
    
}
if(isset($_POST['button3'])){

    //Populating tables with employee data / EMPLOYEE 3 
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp3->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";

    }
    echo "</table>";
    echo "<br><br><br>";

}
if(isset($_POST['button4'])){

    //Populating tables with employee data / EMPLOYEE 4
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp4->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";

    }
    echo "</table>";
    echo "<br><br><br>";

}
if(isset($_POST['button5'])){

    //Populating tables with employee data / EMPLOYEE 5 
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp5->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";

    }
    echo "</table>";
    echo "<br><br><br>";

}
if(isset($_POST['button6'])){

    //Populating tables with employee data / EMPLOYEE 6
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp6->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";

    }
    echo "</table>";
    echo "<br><br><br>";

}
if(isset($_POST['button7'])){

    //Populating tables with employee data / EMPLOYEE 7
    echo "<br><br><br><table class='table'><tr><th>Firstname</th><th>Lastname</th><th>JobTitle</th><th>Employeenumber</th><th>Email</th></tr>";
    //Now populating the table rows
    while($row = $emp7->fetch()){
        echo "<tr><td>" .$row["firstName"] . "</td><td>" .$row["lastName"] . "</td><td>"
        .$row["jobTitle"] . "</td><td>" .$row["employeeNumber"] . "</td><td>" .$row["email"] . "</td><td>";

    }
    echo "</table>";
    echo "<br><br><br>";

}





?>

