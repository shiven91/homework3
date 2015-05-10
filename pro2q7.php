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
<h1>Top 10 colleges by region for ENDOWMENT, TOTAL CURRENT ASSETS, TOTAL CURRENT LIABILITIES, LOWEST NON-ZERO TUITION, HIGHEST TUITION</h1>
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
		array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="0" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="1" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="2" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="3" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="4" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="5" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="6" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="7" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
                array_push($question1, 'select hd2013.unitid, hd2013.instnm, hd2013.obereg, f2013.f1h02, f2013.f1a01, f2013.f1a09, f2013.f1b08, f2013.f1b01 from hd2013 join f2013 on hd2013.unitid=f2013.unitid where obereg="8" and f1h02 is not null order by f1b08 asc,f1b01 desc limit 10;
');
		$queries = count($question1);
		$num = 0;	
		while ($num < $queries) {
		echo 'Region ';
		echo $num;
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
