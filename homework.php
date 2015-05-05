
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
<h1>HOMEWORK 3</h1>
</div>
<div id="nav">
Shiven patel<br>
IS 218<br>
5/5/2015<br>
</div>
<p>
<?php


        
        $dsn = 'mysql:host=localhost; dbname=employees';
        $user = 'root';
        $password = 'hanumanji';
try {
		$con = new PDO($dsn, $user, $password);
		$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$question1 =array();
		array_push($question1, 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 5');
		array_push($question1, 'select * from employees left join salaries on employees.emp_no=salaries.emp_no where from_date between \'1981-01-01\' and \'1985-12-31\' order by salary DESC limit 5');
		array_push($question1, 'select dept_manager.*,salaries.salary, employees.first_name, employees.last_name, departments.dept_name from dept_manager join departments on departments.dept_no=dept_manager.dept_no join employees on dept_manager.emp_no=employees.emp_no join salaries on salaries.emp_no=employees.emp_no where dept_manager.to_date =\'9999-01-01\' order by salary desc limit 5');
		array_push($question1, 'select * from departments');
		array_push($question1, 'select dept_manager.dept_no, dept_manager.emp_no, employees.first_name, employees.last_name, dept_manager.to_date from dept_manager left join employees on dept_manager.emp_no=employees.emp_no where to_date=\'9999-01-01\'');
		array_push($question1, 'select employees.first_name, employees.last_name, salaries.salary from dept_emp left join dept_manager on dept_emp.emp_no =dept_manager.emp_no, employees, salaries where dept_emp.emp_no = employees.emp_no and dept_emp.emp_no=salaries.emp_no and dept_manager.emp_no is NULL and dept_emp.to_date = \'9999-01-01\' order by salary DESC limit 5');
		array_push($question1, 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no where to_date =\'9999-01-01\' order by salary ASC limit 5');
		array_push($question1, 'select dept_no, count(emp_no) from dept_emp group by dept_no');
		array_push($question1, 'select departments.dept_name, sum(salary) from dept_emp join employees on dept_emp.emp_no=employees.emp_no join salaries on employees.emp_no=salaries.emp_no join departments on departments.dept_no=dept_emp.dept_no where dept_emp.to_date =\'9999-01-01\' group by dept_name');
		array_push($question1, 'select sum(salary) from salaries where to_date = \'9999-01-01\'');

		$queries = count($question1);
		$num = 0;	
		while ($num < $queries) {
		echo 'QUESTION ';
		echo $num+1;
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
