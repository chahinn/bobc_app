<?php if(isset($_POST['insertattr'])){
	




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
	
}

header("location: bobc.php");
exit;

?>