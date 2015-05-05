
<!DOCTYPE html>
<html lang = "en-US">
<head>
<meta charset = "UTF-8">
<title>contact.php</title>
<style type = "text/css">
 table, th, td {border: 1px solid black};
</style>
</head>
<body>
<p>
<?php


        
        $dsn = 'mysql:host=localhost; dbname=employees';
        $user = 'root';
        $password = 'hanumanji';
           try {
		$con = new PDO($dsn, $user, $password);
		$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$question1 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 5';
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
