<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Payments</title>

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

    <h1 class='title'>Payments</h1>
<footer>
<?php 
include '/Applications/XAMPP/xamppfiles/htdocs/David_Kuhestani_A3_COMP30680/footer.php'
?>

</footer>
</body>
</html>




<?php

require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);

}
catch(PDOException $pe){
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}



$conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);

#Retrieving information about payments, ordering them in desc order an limiting data to top 20. 
$sql_payments = 'SELECT *
                FROM payments
                ORDER BY paymentDate DESC
                LIMIT 20';
                

    
$payments = $conn->query($sql_payments);    
$payments->setFetchMode(PDO::FETCH_ASSOC);



//Populating tables with payment details
echo "<table class='table'> <tr><th>checkNumber</th><th>paymentDate</th><th>amount</th><th>customerNumber</th></tr>";
//Now populating the table rows
$counter = 1;
while($row = $payments->fetch()){
    echo "<tr><td> <form action='' method='POST'> " . $row["checkNumber"] . "</td><td>"
    .$row["paymentDate"] . "</td><td>" .$row["amount"] . "</td><td><input name='custid' type='text' value='".$row["customerNumber"]."' style='display:none' /> " . "<input type='submit' value='".$row["customerNumber"]."' /> </td></form></tr>";
    
    $counter++;
    
    }
    echo "</table>";
    echo"<br><br><br>";

    if(empty($_POST)){
        die();

    }

    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $sql_customers = 'SELECT *
                FROM customers, payments
                WHERE customers.customerNumber = payments.customerNumber AND customers.customerNumber = '.$_POST['custid'].';';

$customers = $conn->query($sql_customers);    
$customers->setFetchMode(PDO::FETCH_ASSOC);

//making query to retrieve sum of amount of payments for customers
$sql_total = 'SELECT SUM(amount) AS "Sum Payments" 
                FROM customers, payments
                WHERE customers.customerNumber = payments.customerNumber AND customers.customerNumber = '.$_POST['custid'].';';

$total = $conn->query($sql_total);    
$total->setFetchMode(PDO::FETCH_ASSOC);


//Populating table with information 
echo "<br><br><br><table class='table'> <tr><th>phone</th><th>salesRepEmployeeNumber</th><th>creditLimit</th><th>paymentDate</th><th>amount</th></tr>";
    while($row = $customers->fetch()){
        echo "<tr><td>" . $row["phone"] . "</td><td>" . $row["salesRepEmployeeNumber"] . "</td><td>" . $row["creditLimit"] . 
        "</td><td>" . $row["paymentDate"] . "</td><td>" .$row["amount"] . "</td></tr>" ;
    }
    echo "</table>";

//Making table to display the sum of the payments
echo "<br><br><table class='table'> <tr><th>SumPayments</th></tr>";
while($row = $total->fetch()){
    echo "<tr><td>" . $row["Sum Payments"] . "</td></tr>";
    
}
echo "</table>";
echo "<br><br><br><br>";


    
$conn = null; 
?>
