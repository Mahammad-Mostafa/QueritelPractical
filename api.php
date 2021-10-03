<?php
header("Content-Type: application/json; charset=utf-8");
$connection = mysqli_connect("localhost" , "root" , "123456" , "testing");
mysqli_set_charset($connection , "UTF8");
if(count($_GET) == 0)
	{
	echo json_encode(["status" => 404 , "result" => []] , JSON_PRETTY_PRINT);
	exit;
	}
$list = [];
$country = mysqli_real_escape_string($connection , filter_input(INPUT_GET , "name"));
$fields = json_decode(filter_input(INPUT_GET , "fields"));
if($country == "all")
	{
	$result = mysqli_query($connection , "SELECT `Country Name` , `Phone Code` FROM `countries`");
	}
else if(isset($fields) AND count($fields) > 0)
	{
	//$query = "SELECT `" . implode("` , `" , $fields) . "` FROM `countries` WHERE `Country Name` = '" . $country . "'";
	$query = "SELECT `";
	$last = array_key_last($fields);
	foreach($fields as $key => $field)
		{
		$query .= mysqli_real_escape_string($connection , $field);
		if($key != $last)
			{
			$query .= "` , `";
			}
		}
	$query .= "` FROM `countries` WHERE `Country Name` = '" . $country . "'";
	$result = mysqli_query($connection , $query);	
	}
else
	{
	echo json_encode(["status" => 404 , "result" => []] , JSON_PRETTY_PRINT);
	exit;
	}
while($row = mysqli_fetch_assoc($result))
	{
	$list[] = $row;
	}
echo json_encode(["status" => 200 , "result" => $list] , JSON_PRETTY_PRINT);
?>

