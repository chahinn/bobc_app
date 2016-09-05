<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include 'dbconnbc.php';

$q = $_GET['q'];


$dbc=connect_to_db("csci2254");
	
$sqltable = "SELECT * FROM bestofbc WHERE  attraction_id LIKE '%$q%' OR insertion_date LIKE '%$q%' OR entered_by LIKE '%$q%' OR  name LIKE '%$q%' OR category LIKE '%$q%' OR address LIKE '%$q%' OR latitude LIKE '%$q%' OR longitude LIKE '%$q%' OR phone LIKE '%$q%' OR url LIKE '%$q%' OR stars LIKE '%$q%' OR price_range LIKE '%$q%' OR comment LIKE '%$q%'  " ;
$result= perform_query($dbc, $sqltable);


/*
$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

*/
echo "<table>
<tr>
<th>Attraction</th>
<th>Insert Date</th>
<th>Entered By</th>
<th>Name</th>
<th>Category</th>
<th>Address</th>
<th>latitude</th>
<th>longitude</th>
<th>phone</th>
<th>url</th>
<th>stars</th>
<th>price range</th>
<th>comment</th>
</tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['attraction_id'] . "</td>";
    echo "<td>" . $row['insertion_date'] . "</td>";
    echo "<td>" . $row['entered_by'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['latitude'] . "</td>";
    echo "<td>" . $row['longitude'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['url'] . "</td>";
    echo "<td>" . $row['stars'] . "</td>";
    echo "<td>" . $row['price_range'] . "</td>";
    echo "<td>" . $row['comment'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($dbc);
?>
</body>
</html>