<html>
<head> 
	<title> calculation </title> 
	<style type="text/css">
	.mad {
	background-color:white;
	}
	body {
	margin: 0;
	padding:0;
	width: 100%;
	height: 100%;
	}

	.mad input[type=number] {
	   	position: relative;
    		width: 60px; 
	}
	table{
	width:50%; 
	background-color: #f1f1c1;
	text-align: justify;
	}	
    </style>
<head>
	<body bgcolor="#B0C4DE">
		<font color=white><center><u><h1>Beam Steel Calculation </h1></u></center></font>
	<div class="mad"><br>
	<form  method="post" action=result.php name="f1">
		<hr>
		&nbsp;&nbsp;&nbsp;&nbsp;<font size = 5 > Name of Work :</font><input type="text" size="50" style="font-size:25" name="name"><br>
		<hr>
		<font color="darkblue">
		&nbsp;&nbsp;&nbsp;&nbsp; Beam Numbers :<input type="text" size="20" name="n"> &nbsp;&nbsp;
		Number of Beam :<input type="number"  width="100" hight ="50" name="num"><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp; Beam size :C/C Length = <input type="number" step="0.001" size="20" name="bl" placeholder="L">&nbsp;m 
		&nbsp;&nbsp;
		Breadth = <input type="number" step="0.001" size="20" name="bb" placeholder="B">&nbsp;m &nbsp;&nbsp;
		Depth = <input type="number" step="0.001" size="20" name="bd" placeholder="D">&nbsp;m &nbsp;&nbsp;
		Left column offset = <input type="number" step="0.001" size="20" name="lco">&nbsp;m &nbsp;&nbsp;
		Right column offset =  <input type="number" step="0.001" size="20" name="rco">&nbsp;m<br><br>
		&nbsp;&nbsp;&nbsp;&nbsp; Continuous beam Right : Length = <input type="number" step="0.001" size="20" name="cblr">&nbsp;m &nbsp;&nbsp;
		Breadth = <input type="number" step="0.001" size="20" name="cbbr">&nbsp;m &nbsp;&nbsp;
		Depth = <input type="number" step="0.001" size="20" name="cbdr">&nbsp;m <br><br>
		&nbsp;&nbsp;&nbsp;&nbsp; Continuous beam left :&nbsp;&nbsp;&nbsp; Length = <input type="number" step="0.001" size="20" 			name="cbll">&nbsp;m&nbsp;&nbsp;
		Breadth = <input type="number" step="0.001" size="20" name="cbbl">&nbsp;m &nbsp;&nbsp;
		Depth = <input type="number"  step="0.001"size="20" name="cbdl">&nbsp;m <br><br>
		</font><font color="#qwe"><center>
		<table border=1 name=t1>
		<tr><td></td><td>Diameter</td><td>Number of bars </td></tr>
		<tr><td>&nbsp;Bottom bars &nbsp;</td><td><select  name="bbd">
  					<option value="12">12</option>
					<option value="16">16</option>
					<option value="20">20</option>
					<option value="25">25</option>
					</select>&nbsp;mm </td>
		<td> <input type="number" step="0.001" size="20" name="nbb">&nbsp;</td></tr>
		<tr><td>&nbsp;Curtail bars </td><td><select  name="cbd">
  					<option value="10">10</option>
  					<option value="12">12</option>
					<option value="16">16</option>
					<option value="20">20</option>
					<option value="25">25</option>
					</select>&nbsp;mm</td>
		<td> <input type="number" step="0.001" size="20" name="ncb">&nbsp;</td></tr>
		<tr><td>&nbsp;Anchor Bars </td><td><select  name="abd">
					<option value="8">8</option>
  					<option value="10">10</option>
  					<option value="12">12</option>
					<option value="16">16</option>
					<option value="20">20</option>
					<option value="25">25</option>
					</select>&nbsp;mm</td>
		<td> <input type="number" step="0.001" size="20" name="nab">&nbsp;</td></tr>
		<tr><td>&nbsp;Left top support </td><td><select  name="ltsd">
  					<option value="10">10</option>
  					<option value="12">12</option>
					<option value="16">16</option>
					<option value="20">20</option>
					<option value="25">25</option>
					</select>&nbsp;mm</td>
		<td><input type="number" step="0.001" size="20" name="nlts"></td></tr>
		<tr><td>&nbsp;Right top support </td><td><select  name="rtsd">
  					<option value="10">10</option>
  					<option value="12">12</option>
					<option value="16">16</option>
					<option value="20">20</option>
					<option value="25">25</option>
					</select>&nbsp;mm</td>
		<td><input type="number" step="0.001" size="20" name="nrts"></td></tr>
		<tr><td>&nbsp;Side face  bar </td><td><select  name="sfbd">
					<option value="8">8</option>
  					<option value="10">10</option>
  					<option value="12">12</option>
					</select>&nbsp;mm</td>
		<td><input type="number" step="0.001" size="20" name="nsb"></td></tr>
		<tr><td>&nbsp;Stirmps </td><td><select  name="strimpd">
					<option value="8">8</option>
  					<option value="10">10</option>
  					<option value="12">12</option>
					</select>&nbsp;mm @ spacing</td>
		<td><input type="number" step="0.001" size="20" name="spacing">&nbsp;c/c</td></tr>   
		</table>
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;<input type = submit name=submit style="font-size:25;color:white;background-color:#FF0000;border:1">
	
	
	</form>	
		
	<br><br>
	</div>	
	
	</body>
<html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "cd";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";

	$sql = "CREATE DATABASE steel";			
	if ($conn->query($sql) === TRUE) {
    	echo "Database created successfully";
	} 
	else{
    	echo "Error creating database: " . $conn->error;
	}
	$sql = "USE steel";
	if ($conn->query($sql) === TRUE) {
    	echo "Using successfully";
	} 
	else{
    	echo "Not using " . $conn->error;
	}

	$sql =" CREATE TABLE steel(srno INT ,Beam_No VARCHAR(200) , Discription VARCHAR(100) ,Dia_of_bar INT,no_of_bar VARCHAR(10), Length FLOAT , 8mm 			FLOAT , 10mm FLOAT ,12mm FLOAT , 16mm FLOAT , 20mm FLOAT ,25mm FLOAT )";

	if ($conn->query($sql) === TRUE) {
    	echo "Table created successfully";
	} 
	else{
	echo "Error creating table: " . $conn->error;
	}
	
?>
		
	
