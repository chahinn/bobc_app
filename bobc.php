<?php
setcookie('omitCookie', 666666666);

if(isset($_GET['hide'])){
	
	if(isset($_COOKIE['omitCookie'])){
		$omitlist = $_COOKIE['omitCookie'].",". $_GET['place'];
		setcookie('omitCookie',$omitlist);
		
		}

		
	
	
	//header('Location:http://cscilab.bc.edu/~chahinn/hw13part1/bobc.php');
} else {
	$omitlist = isset($_COOKIE['omitCookie']) ? $_COOKIE['omitCookie']: "";
}

if(isset($_GET['clear'])){
	setcookie('omitCookie', 0, time()-3600);
	$omitlist = "";
	//header('Location:http://cscilab.bc.edu/~chahinn/hw13part1/bobc.php');
} 

?>

<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="hideshow.js"></script>
<link rel="stylesheet" type="text/css" href="bobc.css">

<script>
function updatetable(){
	var searching = document.getElementById("searchdata1").value;
	
	if(searching==""){
			document.getElementById("tabledisplay").innerHTML = "nothing searched";
		}
	else{
			xmlhttp = new XMLHttpRequest();
			 xmlhttp.onreadystatechange = function() {
           		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                		document.getElementById("tabledisplay").innerHTML = xmlhttp.responseText;
            	}
       		 };
       		xmlhttp.open("GET","gettable.php?q="+searching,true);
        	xmlhttp.send();	
	}
}

function validatee(){	

	var name= namevalidate();
	var category=categoryvalidate();
	var enteredby=enteredbyvalidate();
	var url=urlvalidate();
	var phone=phonevalidate();
	var address=addressvalidate();
	var comment=commentvalidate();
	
	if(name&&category&&enteredby&&url&&phone&&address&&comment){
		return true;
	}
	else {return false;
	}
}


function namevalidate(){
	if(document.getElementById("name2").value.length==0){
			document.getElementById("subjectmessage1").innerHTML="Please input name";
			return false;
	}		
	else{
			document.getElementById("subjectmessage1").innerHTML="";
			return true;
		}	
	
}

function categoryvalidate(){
	if(document.getElementById("category2").value.length==0){
			document.getElementById("subjectmessage2").innerHTML="Please input category";
			return false;
	}		
	else{
			document.getElementById("subjectmessage2").innerHTML="";
			return true;
		}	
	
}

function enteredbyvalidate(){
	if(document.getElementById("enteredby2").value.length==0){
			document.getElementById("subjectmessage3").innerHTML="Please input enteredby";
			return false;
	}		
	else{
			document.getElementById("subjectmessage3").innerHTML="";
			return true;
		}	
	
}

function urlvalidate(){
	var urls =document.getElementById("url2").value;
	if(document.getElementById("url2").value.length==0 || urls.indexOf('.')==-1){
			document.getElementById("subjectmessage4").innerHTML="Please input correct url, include a point";
			return false;
	}		
	else{
			document.getElementById("subjectmessage4").innerHTML="";
			return true;
		}	
	
}

function phonevalidate(){
	if(document.getElementById("phone2").value.length==0 || isNaN(document.getElementById("phone2").value) || document.getElementById("phone2").value.length!=10  ){
			document.getElementById("subjectmessage5").innerHTML="Please enter 10 digits, only numbers accepted";
			return false;
	}		
	else{
			document.getElementById("subjectmessage5").innerHTML="";
			return true;
		}	
	
}

function addressvalidate(){
	if(document.getElementById("address2").value.length==0){
			document.getElementById("subjectmessage6").innerHTML="Please input address";
			return false;
	}		
	else{
			document.getElementById("subjectmessage6").innerHTML="";
			return true;
		}	
	
}

function commentvalidate(){
	if(document.getElementById("comment2").value.length==0){
			document.getElementById("subjectmessage7").innerHTML="Please input comment";
			return false;
	}
	else{
			document.getElementById("subjectmessage7").innerHTML="";
			return true;
		}	
	
}


</script>

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

   


<h1>The best of Boston College</h1>


<form method="get">
Search: <input type="text" name="searchdata" id="searchdata1"> <br>
<input type="button" name = "searchbutton"value="Search" onclick="updatetable()" >
<input type="button" name = "addattraction" id="addattraction" value="Add Attraction" >


</form>

<form method="get">
<input type="submit" name = "clear" id="clear" value="Show All" >
</form>
<br>



<br>
<div>
	<form method="post" id="insertform" onsubmit="return validatee()">
  		<fieldset>
    		<legend>Enter Attraction Information:</legend>
    		Name: <input type="text" name="name1" id="name2"> <span id="subjectmessage1" ></span><br> 
    		Category: <input type="text" name="category1" id="category2"><span id="subjectmessage2" ></span> <br>
    		Rating: <select name ="rating1"id="rating2">
  				<option value="*">*</option>
 				<option value="**">**</option>
  				<option value="***">***</option>
  				<option value="****">****</option>
  				<option value="*****">*****</option>
			</select>
			<br>
			Price: <select name="price1"id="price2">
  				<option value="$">$</option>
  				<option value="$$">$$</option>
  				<option value="$$$">$$$</option>
			</select>
  			<br>
  
    		Entered By: <input type="text" name="enteredby1" id="enteredby2" ><span id="subjectmessage3" ></span><br>
    		URL: <input type="text" name="url1" id="url2" ><span id="subjectmessage4" ></span><br>
    		Phone: <input type="text" name="phone1" id="phone2" ><span id="subjectmessage5" ></span><br>
    		Address: <input type="text" name="address1" id="address2" ><span id="subjectmessage6" ></span><br>
    		Comment:<br><textarea rows="4" cols="50" name="comment1" id="comment2"></textarea><span id="subjectmessage7" ></span><br>
    		<input type="submit" name="insertattr"value="Add This Attraction"  > 
  		</fieldset>
	</form>
</div>

<br>

<div id="tabledisplay">
<?php
include 'dbconnbc.php';




$dbc1=connect_to_db("csci2254");


	
$sqltable1 = "SELECT * FROM `bestofbc`";
if ($omitlist != "")
	$sqltable1 .= "WHERE attraction_id NOT IN ($omitlist)";

$result1= perform_query($dbc1, $sqltable1);






echo "<table>
<tr>
<th>Hide<th>
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

while($row = mysqli_fetch_assoc($result1)) {
    $attraction = $row['attraction_id'];
    echo "<tr>";
    echo "<td>   <form method= 'get' >
    <input type='hidden' name= 'place' value= '$attraction' >
    <input type='submit' name='hide' value='Hide Attraction'>    
    </form>         
    </td>";
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


echo " $omitlist";

//echo " $cookie";
mysqli_close($dbc1);
?>
	
</div>






<?php
if(isset($_POST['insertattr'])){
	inserttable();
}

function inserttable(){

	 $name3 = $_POST['name1'] ;
	 $category3 =$_POST['category1'];
	 $rating3 =$_POST['rating1'] ;
	 $price3 =$_POST['price1'] ;
	 $enteredby3 =$_POST['enteredby1'] ;
	 $url3 =$_POST['url1'] ;
	 $phone3 =$_POST['phone1'] ;
	 $address3 =$_POST['address1'] ;
	 $comment3 =$_POST['comment1'];
	 
	 $loc = getLatLong($address3);
	 $lat = $loc["latitude"];
	 $long = $loc["longitude"];
	
	$dbc5=connect_to_db("csci2254");
	$sqltable5 = "INSERT INTO bestofbc (`insertion_date`, `entered_by`, `name`, `category`,`address`,`latitude`,`longitude`,`phone`,`url`,`stars`,`price_range`,`comment`)VALUES ('getdate()','$enteredby3','$name3','$category3','$address3','$lat','$long','$phone3','$url3','$rating3','$price3','$comment3')";
	$result5= perform_query($dbc5, $sqltable5);
	mysqli_close($dbc5);
}

function getLatLong($address){
		
   		$geocodeURL = "https://maps.googleapis.com/maps/api/geocode/xml?";
   		$address = "address=" . urlencode($address);
   		$key = "key=AIzaSyD66xa224cyoktCawBN9CfMjPwzG6JVoYM";
   		$geocoderequest = "$geocodeURL$address" . "&" . $key;
   		
   		//die( "The url is >" . $geocoderequest . "<" );
   		
   		$xml= new SimpleXMLElement( file_get_contents( $geocoderequest ) );
   		
   		if($xml->status != 'OK') {
   			$status = $xml->error_message;
   			die("bad result status $status");
   		}
   		$loc = getLocation($xml);
   		
   		return $loc;
	}

function getLocation($xml)
    {
        //echo "<pre>"; print_r( $xml);  	echo "</pre>";
        $latitude  = $xml->result->geometry->location->lat;
        $longitude = $xml->result->geometry->location->lng;
        
        $location = array("latitude" => $latitude, "longitude" => $longitude);
        
        return ($location);
    }

?>
</body>
</html>



