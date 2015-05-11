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
 table, th, td {border: 2.5px solid blue};
</style>
</head>
<body>
<div id="header">
<h1>Region 0 - US Service schools</h1>
</div>
<div id="nav">
Shiven patel<br>
IS 218<br>
5/5/2015<br>
</div>
<div>
<h3>F1H02 = ENDOWMENT<br>
    F1A01 = TOTAL CURRENT ASSESTS<br>
    F1A09 = TOTAL CURRENT LIABILITIES<br>
    F1B08 = NON-ZERO TUITION REVENUE<br>
    F1B01 = ALL TUITION<br>
</h3>
</div>

<p>
<?php
        
        $dsn = 'mysql:host=localhost; dbname=shiven';
        $user = 'root';
        $password = 'hanumanji';
try {
		$con = new PDO($dsn, $user, $password);
		$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$question1 =array();
		array_push($question1, 'select hd2013.unitid, hd2013.instnm, f2013.f1h02, hd2013.obereg from hd2013 left join f2013 on hd2013.unitid=f2013.unitid where f1h02 is not null and obereg=\'0\' order by obereg asc limit 10;');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, f2013.f1a01, hd2013.obereg from hd2013 left join f2013 on hd2013.unitid=f2013.unitid where f1a01 is not null and obereg=\'0\' order by obereg asc limit 10;');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, f2013.f1a09, hd2013.obereg from hd2013 left join f2013 on hd2013.unitid=f2013.unitid where f1a09 is not null and obereg=\'0\' order by obereg asc limit 10;');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, f2013.f1b08, hd2013.obereg from hd2013 left join f2013 on hd2013.unitid=f2013.unitid where f1b08 is not null and obereg=\'0\' order by obereg asc limit 10;');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, f2013.f1b01, hd2013.obereg from hd2013 left join f2013 on hd2013.unitid=f2013.unitid where f1b01 is not null and obereg=\'0\' order by obereg asc limit 10;');
                $queries = count($question1);
		$num = 0;	
		while ($num < $queries) {		
	//first pass just gets the column names
		print "<table> \n";
			$result = $con->query($question1[$num]);
	//return only the first row (we only need field names)
		$row = $result->fetch(PDO::FETCH_ASSOC);
		print " <tr> \n";
			foreach ($row as $field => $value){
				print " <th>$field</th> \n";
				} // end foreach
		print " </tr> \n";
	//second query gets the data
  		$data = $con->query($question1[$num]);
  		$data->setFetchMode(PDO::FETCH_ASSOC);
  			foreach($data as $row){
   				print " <tr> \n";
   				foreach ($row as $name=>$value){
   					print " <td>$value</td> \n";
   				} // end field loop
   				print " </tr> \n";
  			} // end record loop
  		print "</table> \n";
		echo '<br>';
		$num ++;
		}}
        	catch (PDOException $e) {
                	echo 'Connection failed: ' . $e->getMessage();
            	}
?>
</p>
</body>
</html>
