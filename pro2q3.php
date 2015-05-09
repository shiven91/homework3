<!DOCTYPE html>
<html lang = "en-US">
<head>
<meta charset = "UTF-10">
<title>contact.php</title>
<style type = "text/css">
 #header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:100px;
    width:100px;
    float:center;
    padding:10px; 
}

 table, th, td {border: 2.5px solid red};
</style>
</head>
<body>
<div id:"header">
<h1>Colleges with the Largest Endowment<h1>
</div>
<div id="nav">
Shiven patel<br>
IS 218<br>
Final Project<br>
</div>
<p>
<?php
        
        $dsn = 'mysql:host=localhost; dbname=shiven';
        $user = 'root';
        $password = 'hanumanji';
        try {
		$con = new PDO($dsn, $user, $password);
		$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$question1 = 'select hd2013.unitid, hd2013.instnm, f2013.f1h02 from hd2013 left join f2013 on hd2013.unitid=f2013.unitid group by unitid order by f1h02 desc limit 10';
        //first pass just gets the column names
		print "<table> \n";
			$result = $con->query($question1);
	//return only the first row (we only need field names)
		$row = $result->fetch(PDO::FETCH_ASSOC);
		print " <tr> \n";
			foreach ($row as $field => $value){
				print " <th>$field</th> \n";
				} // end foreach
		print " </tr> \n";
	//second query gets the data
  		$data = $con->query($question1);
  		$data->setFetchMode(PDO::FETCH_ASSOC);
  			foreach($data as $row){
   				print " <tr> \n";
   				foreach ($row as $name=>$value){
   					print " <td>$value</td> \n";
   				} // end field loop
   				print " </tr> \n";
  			} // end record loop
  		print "</table> \n";
		}
        	catch (PDOException $e) {
                	echo 'Connection failed: ' . $e->getMessage();
            	}
?>
</p>
</body>
</html>
