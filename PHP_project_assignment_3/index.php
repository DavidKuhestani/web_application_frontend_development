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
    <h1 class='title'>Product Line</h1>

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

#Retrieving information about product line and text descriptions
$sql = 'SELECT  productLine, textDescription
        FROM productlines';
    
    $q = $conn->query($sql);    
    $q->setFetchMode(PDO::FETCH_ASSOC);


#Retrieving info on classic cars
$sql_classic = 'SELECT *
                FROM products
                WHERE productLine = "Classic Cars"';

  $classic = $conn->query($sql_classic);    
  $classic->setFetchMode(PDO::FETCH_ASSOC);


#Retrieving info on Motorcycles
$sql_motorcycles = 'SELECT *
FROM products
WHERE productLine = "Motorcycles"';

$motorcycles = $conn->query($sql_motorcycles);    
$motorcycles->setFetchMode(PDO::FETCH_ASSOC);


#Retrieving info on Planes
$sql_planes = 'SELECT *
FROM products
WHERE productLine = "Planes"';

$planes = $conn->query($sql_planes);    
$planes->setFetchMode(PDO::FETCH_ASSOC);


#Retrieving info on Ships
$sql_ships = 'SELECT *
FROM products
WHERE productLine = "Ships"';

$ships = $conn->query($sql_ships);    
$ships->setFetchMode(PDO::FETCH_ASSOC);

#Retrieving info on trains
$sql_trains = 'SELECT *
FROM products
WHERE productLine = "Trains"';

$trains = $conn->query($sql_trains);    
$trains->setFetchMode(PDO::FETCH_ASSOC);
  
#Retrieving info on Trucks and buses 
$sql_trucksbuses = 'SELECT *
FROM products
WHERE productLine = "Trucks and Buses"';

$trucksbuses = $conn->query($sql_trucksbuses);    
$trucksbuses->setFetchMode(PDO::FETCH_ASSOC);

#Retrieving info on vintage cars
$sql_vintage = 'SELECT *
FROM products
WHERE productLine = "Vintage Cars"';

$vintage = $conn->query($sql_vintage);    
$vintage->setFetchMode(PDO::FETCH_ASSOC);
  


}
catch(PDOException $pe){
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


#Populating table with product lines and text description
echo "<table class='table'> <tr><th>ProductLine</th><th>TextDescripton</th><th>Extra Info</th></tr>";
//Now populating the table rows
$counter = 1;
while($row = $q->fetch()){
    echo "<tr><td>" .$row["productLine"] . "</td><td>" .$row["textDescription"] . "</td>";
    echo "<form method='POST'> <td> <input type='submit' name='button{$counter}' value='More info'/>  <td></tr></form> ";
    $counter++;
    
}
echo "</table>";
echo "<br><br><br>";

if(isset($_POST['button1'])) { 
    #Populating new table with detailed information on classic cars 
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $classic->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";
}
if(isset($_POST['button2'])) { 
    #Populating new table with detailed information on motorcycles
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $motorcycles->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";

}

if(isset($_POST['button3'])) { 
    #Populating new table with detailed information on planes
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $planes->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";

}

if(isset($_POST['button4'])) { 
    #Populating new table with detailed information on ships
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $ships->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";

}

if(isset($_POST['button5'])) { 
    #Populating new table with detailed information on trains
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $trains->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";

}

if(isset($_POST['button6'])) { 
    #Populating new table with detailed information on trucks and buses
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $trucksbuses->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";
}

if(isset($_POST['button7'])) { 
    #Populating new table with detailed information on vintage cars
    echo "<br><br><br><table class='table'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productScale</th><th>productVendor</th><th>
    productDescription</th><th>quantityinStock</th><th>buyPrice</th><th>MSRP</th></tr>";
    //Now populating the table rows
    while($row = $vintage->fetch()){
        echo "<tr><td>" .$row["productCode"] . "</td><td>" .$row["productName"] . "</td><td>"
        .$row["productLine"] . "</td><td>" .$row["productScale"] . "</td><td>" .$row["productVendor"] . 
        "</td><td>" .$row["productDescription"] . "</td><td>" .$row["quantityInStock"] . "</td><td>" .$row["buyPrice"] . 
        "</td><td>" .$row["MSRP"] . "</td></tr>";

    }
    echo "</table>";
    echo "<br><br><br>";

}


?>
