<?php
$handler = fopen($argv[1] , "r");
$header = fgetcsv($handler);
$queries = "";
$large = [];
$id = 1;
while($row = fgetcsv($handler))
	{
	$queries .= "\r\n" . "INSERT INTO `countries` VALUES ($id";
	for($i = 0 ; $i < count($row) ; $i ++)
		{
		if(strlen($row[$i]) > 250 AND !in_array($i , $large))
			{
			$large[] = $i;
			}
		$queries .= " , '" . addslashes($row[$i]) . "'";
		}
	$queries .= ");";
	$id ++;
	}
$table = "CREATE TABLE `countries` (`ID` INT NOT NULL AUTO_INCREMENT";
for($i = 0 ; $i < count($header) ; $i ++)
	{
	$table .= " , `" . addslashes($header[$i]) . "` ";
	if(in_array($i , $large))
		{
		$table .= "TEXT NOT NULL";
		}
	else
		{
		$table .= "TINYTEXT NOT NULL";
		}
	}
$table .= " , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
fclose($handler);
file_put_contents($argv[2] , $table . $queries , FILE_APPEND);
echo "Done!";
?>

