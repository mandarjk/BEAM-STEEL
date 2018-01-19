<?php
	$servername = "localhost";
	$username = "root";
	$password = "cd";
	$dbname = "steel";

	$conn = new mysqli($servername, $username, $password , $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	$work="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if (empty($_POST["name"])=="") {
	$work = $_POST["name"];    	
	}
    	else {
        $work = "Missing work name";
    	}
	}
	echo"<br><br>";
	echo"<font size =5><center>Work Name : $work </font></center>";
	echo"<hr>";
	
	//take all inputes
	
	$noofbeam = $_POST["num"];
	echo"<font size =4> Number of Beam  : $noofbeam </font>";
	
	echo"<br>";
	$beamno = $_POST["n"];    	
	echo"<font size =4> Beam Number : $beamno </font>";
	
	echo"<br>";
	$beamleng = $_POST["bl"];    	
	echo"<font size =4> Beam length : $beamleng </font>";
	
	echo"<br>";
	$beambre = $_POST["bb"];    	
	echo"<font size =4> Beam breadth : $beambre </font>";
	
	echo"<br>";
	$beamdeb = $_POST["bd"];    	
	echo"<font size =4> Beam deapth : $beamdeb </font>";
	
	echo"<br>";
	$lcolofset = $_POST["lco"];    	
	echo"<font size =4> Left column offset : $lcolofset </font>";
	
	echo"<br>";
	$rcolofset = $_POST["rco"];    	
	echo"<font size =4> Right column offset : $rcolofset </font>";
		
	echo"<br>";
	$contbeamrl = $_POST["cblr"];    	
	echo"<font size =4> Continuous beam right length: $contbeamrl </font>";
	
	echo"<br>";
	$contbeamrb = $_POST["cbbr"];    	
	echo"<font size =4> Continuous beam right breadth : $contbeamrb </font>";
	
	echo"<br>";
	$contbeamrd = $_POST["cbdr"];    	
	echo"<font size =4> Continuous beam right deapth : $contbeamrd </font>";
	
	echo"<br>";
	$contbeamll = $_POST["cbll"];    	
	echo"<font size =4> Continuous beam right length : $contbeamll </font>";
	
	echo"<br>";
	$contbeamlb = $_POST["cbbl"];    	
	echo"<font size =4> Continuous beam right breadth : $contbeamlb </font>";
 
	echo"<br>";
	$contbeamld = $_POST["cbdl"];    	
	echo"<font size =4> Continuous beam right depth : $contbeamld </font>";

	echo"<br>";
	$bottombd = $_POST["bbd"];    	
	echo"<font size =4> Bottom bar Diameter : $bottombd </font>";

	echo"<br>";
	$curtailbd = $_POST["cbd"];    	
	echo"<font size =4> curtail bar Diameter : $curtailbd </font>";

	echo"<br>";
	$anchorbd = $_POST["abd"];    	
	echo"<font size =4> Anchor bar Diameter : $anchorbd </font>";

	echo"<br>";
	$lefttsd = $_POST["ltsd"];    	
	echo"<font size =4> Left top support Diameter : $lefttsd </font>";

	echo"<br>";
	$righttsd = $_POST["rtsd"];    	
	echo"<font size =4> Right top suppot Diameter : $righttsd </font>";

	echo"<br>";
	$sidefbd = $_POST["sfbd"];    	
	echo"<font size =4> Side face bar Diameter : $sidefbd </font>";

	echo"<br>";
	$strimpd = $_POST["strimpd"];    	
	echo"<font size =4> Strimps Diameter : $strimpd </font>";

	echo"<br>";
	$numbb = $_POST["nbb"];    	
	echo"<font size =4> Number of bottom bar : $numbb </font>";
	
	echo"<br>";
	$numcb = $_POST["ncb"];    	
	echo"<font size =4> Number of curtail bar : $numcb </font>";

	echo"<br>";
	$numab = $_POST["nab"];    	
	echo"<font size =4> Number of anchor bar : $numab </font>";

	echo"<br>";
	$numlts = $_POST["nlts"];    	
	echo"<font size =4> Number of left top support bar : $numlts </font>";

	echo"<br>";
	$numrts = $_POST["nrts"];    	
	echo"<font size =4> Number of right top bar : $numrts </font>";


	echo"<br>";
	$numsb = $_POST["nsb"];    	
	echo"<font size =4> Number of Side bar : $numsb </font>";

	echo"<br>";
	$numss = $_POST["spacing"];    	
	echo"<font size =4> Spacing : $numss </font>";

	//CALCULATION PART 
	echo"<br>";
	
	//Length of bottom bar
	
	if($contbeamll =="" || $contbeamrl ==""){
	$lbb = $beamleng + $lcolofset + $rcolofset + 0.10;
//	echo"$lbb";
	$b=round($lbb,2);
	}
	echo"<br>";
	if(!$contbeamll =="" & !$contbeamrl ==""){
	$lbb = $beamleng + $lcolofset + $rcolofset - 0.05;
//	echo"$lbb";
	$b=round($lbb,2);
	}

	

	//Length of curtail bar
	echo"<br>";
	$lcb = $beamleng * 0.75;
//	echo"$lcb";
	$c=round($lcb,2);
	
	//Length of Anchor bar
	echo"<br>";
	$lab = $lbb;
	$ab=round($lab,2);
//	echo"$lab";

	//Length of left top support
	echo"<br>";
	if($contbeamll ==""){
	$ltsbl = $beamleng * 0.25 + $lcolofset + 0.125;
	$l=round($ltsbl,2);

//	echo"$ltsbl";
	}
	echo"<br>";
	if(!$contbeamll ==""){
	$ltsbl = $beamleng * 0.25 + $contbeamll * 0.25;
	$l=round($ltsbl,2);
//	echo"$ltsbl";
	}
	
	//Length of right top support
	echo"<br>";
	if($contbeamrl ==""){
	$ltsbr = $beamleng * 0.25 + $rcolofset + 0.125;
	$r=round($ltsbr,2);
//	echo"$ltsbr";
	}
	echo"<br>";
	if(!$contbeamrl ==""){
	$ltsbr = $beamleng * 0.25 + $contbeamrl * 0.25;
	$r=round($ltsbr,2);
//	echo"$ltsbr";
	}

	//Length of Side face reinforcement 
	echo"<br>";
	if($beamdeb > 0.60 || $beamdeb == 0.60 ){
	$sidefr = $beamleng + $lcolofset + $rcolofset - 0.05;
	$sf=round($sidefr,2);
//	echo"$sidefr";
	}

	//Length of striups
	echo"<br>";
	$s= ($strimpd * 16 )/1000 ;
	$lengths = ($beambre - 0.05 + $beamdeb - 0.05) * 2 + $s ;
	$lengthss = round($lengths,2);
//	echo"$lengths";

	//Number of Striups
	$numstrups =  ($beamleng - $lcolofset - $rcolofset)/ $numss;

			
	
	//input data in database


	//Bottom bar
	$nbr = $noofbeam * $numbb ;
	$ans = $nbr * $b ;
	$bb=round($ans,2); 


	if($bottombd == 8){
	
	$sql = "INSERT INTO steel VALUES(1,'$beamno' , 'Bottom bar' , 8 , '$noofbeam x $numbb' , $b , $bb , NULL , NULL , NULL , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}
	

	if($bottombd == 10){
	
	$sql = "INSERT INTO steel VALUES(1 ,'$beamno' , 'Bottom bar' , 10 , '$noofbeam x $numbb' , $b , NULL , $bb , NULL , NULL , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($bottombd == 12){
	
	$sql = "INSERT INTO steel VALUES(1 ,'$beamno' , 'Bottom bar' , 12 , '$noofbeam x $numbb' , $b , NULL , NULL , $bb , NULL , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($bottombd == 16){
	
	$sql = "INSERT INTO steel VALUES(1 ,'$beamno' , 'Bottom bar' , 16 , '$noofbeam x $numbb' , $b , NULL , NULL , NULL , $bb , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}


	if($bottombd == 20){
	
	$sql = "INSERT INTO steel VALUES(1 ,'$beamno' , 'Bottom bar' , 20 , '$noofbeam x $numbb' , $b , NULL , NULL , NULL , NULL , $bb ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($bottombd == 25){
	
	$sql = "INSERT INTO steel VALUES(1,'$beamno' , 'Bottom bar' , 25 , '$noofbeam x $numbb' , $b , NULL , NULL , NULL , NULL , NULL , $bb )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	//Curtail bar 
	$ncb = $noofbeam * $numcb ;
	$ansa = $ncb * $c;
	$cc=round($ansa,2);
	
	if($curtailbd == 8){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Curtail bar' , 8 , '$noofbeam x $numcb' , $c , $cc , NULL , NULL , NULL , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}
	

	if($curtailbd == 10){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Curtail bar' , 10 , '$noofbeam x $numcb' , $c , NULL , $cc  , NULL , NULL , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}
	
	if($curtailbd == 12){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Curtail bar' , 12 , '$noofbeam x $numcb' , $c , NULL ,  NULL , $cc  , NULL , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($curtailbd == 16){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Curtail bar' , 16 , '$noofbeam x $numcb' , $c , NULL ,  NULL , NULL , $cc , NULL ,NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($curtailbd == 20){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Curtail bar' , 20 , '$noofbeam x $numcb' , $c , NULL ,  NULL , NULL , NULL , $cc , NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($curtailbd == 25){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Curtail bar' , 25 , '$noofbeam x $numcb' , $c , NULL ,  NULL , NULL , NULL , NULL, $cc  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	//Anchor bar
	$nab = $noofbeam * $numab ;
	$ansb = $ncb * $ab;
	$aab=round($ansb,2);	
	
	if($anchorbd == 8){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Anchor bar' , 8 , '$noofbeam x $numab' , $ab , $aab , NULL ,  NULL , NULL , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	
	}

	if($anchorbd == 10){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Anchor bar' , 10 , '$noofbeam x $numab' , $ab , NULL , $aab ,  NULL , NULL , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($anchorbd == 12){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Anchor bar' , 12 , '$noofbeam x $numab' , $ab , NULL , NULL , $aab ,  NULL , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}
	
	if($anchorbd == 16){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Anchor bar' , 16 , '$noofbeam x $numab' , $ab , NULL , NULL ,  NULL ,$aab , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($anchorbd == 20){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Anchor bar' , 20 , '$noofbeam x $numab' , $ab , NULL , NULL ,  NULL , NULL ,$aab , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($anchorbd == 25){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Anchor bar' , 20 , '$noofbeam x $numab' , $ab , NULL , NULL ,  NULL , NULL ,NULL, $aab   )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	//Left top support
	$topsupl = $noofbeam * $numlts ;
	$anstl = $topsupl * $l;
	$ll=round($anstl,2);

	if($lefttsd == 8){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support left' , 8 , '$noofbeam x $numlts' , $l , $ll , NULL ,  NULL , NULL , NULL , 		NULL  )";
	
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($lefttsd == 10){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support left' , 10 , '$noofbeam x $numlts' , $l , NULL , $ll ,  NULL , NULL , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($lefttsd == 12){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support left' , 12 , '$noofbeam x $numlts' , $l , NULL , NULL , $ll ,  NULL , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}
	
	if($lefttsd == 16){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support left' , 16 , '$noofbeam x $numlts' , $l , NULL , NULL ,  NULL ,$ll , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($lefttsd == 20){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support left' , 20 , '$noofbeam x $numlts' , $l , NULL , NULL ,  NULL , NULL ,$ll , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($lefttsd == 25){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support left' , 20 , '$noofbeam x $numlts' , $l , NULL , NULL ,  NULL , NULL ,NULL, 		$ll  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	//Right top support
	$topsupr = $noofbeam * $numrts ;
	$anstr = $topsupr * $r;
	$rr=round($anstr,2); 

	if($righttsd == 8){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support right' , 8 , '$noofbeam x $numrts' , $r , $rr , NULL ,  NULL , NULL , NULL , 		NULL  )";
	
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($righttsd == 10){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support right' , 10 , '$noofbeam x $numrts' , $r , NULL , $rr ,  NULL , NULL , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($righttsd == 12){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support right' , 12 , '$noofbeam x $numrts' , $r , NULL , NULL , $rr ,  NULL , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	
	}
	
	if($righttsd == 16){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support right' , 16 , '$noofbeam x $numrts' , $r , NULL , NULL ,  NULL ,$rr , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($righttsd == 20){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support right' , 20 , '$noofbeam x $numrts' , $r , NULL , NULL ,  NULL , NULL ,$rr , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($righttsd == 25){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Top support right' , 25 , '$noofbeam x $numrts' , $r , NULL , NULL ,  NULL , NULL ,NULL, 		$rr   )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}
	 
// Side face reanforcement

	$sfr = $noofbeam * $numsb ;
	$anssf = $sfr * $sf; 
	$ss=round($anssf,2);

	if( $beamdeb == 60 ||  $beamdeb < 60){

	if($sidefbd == 8){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Side face' , 8 , '$noofbeam x $numsb' , $sf , $ss , NULL ,  NULL , NULL , NULL , 			NULL  )";
	
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($sidefbd == 10){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Side face' , 10 , '$noofbeam x $numsb' , $sf , NULL , $ss ,  NULL , NULL , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($sidefbd == 12){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'side face' , 12 , '$noofbeam x $numsb' , $sf , NULL , NULL , $ss ,  NULL , NULL , 		NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
		
	}
	
	if($sidefbd == 16){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Side face' , 16 , '$noofbeam x $numsb' , $sf , NULL , NULL ,  NULL ,$ss , NULL , 			NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	}

	if($sidefbd == 20){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'side face' , 20 , '$noofbeam x $numsb' , $sf , NULL , NULL ,  NULL , NULL ,$ss , 			NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($sidefbd == 25){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'side face' , 25 , '$noofbeam x $numsb' , $sf , NULL , NULL ,  NULL , NULL ,NULL, 			$ss   )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}
	}


 	//Strups 

	//total no of stirups
	echo"<br>";
	$aa = $numstrups + 1;
	$a = round($aa);
	$tnums = "$noofbeam x $a ";
//	echo"$tnums";

	

	
	$str = $noofbeam * $a ;
	$ansss = $str * $lengthss; 
	$as=round($ansss ,2);
	if($strimpd == 8){
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Stirrups' , 8 , '$tnums' , $lengthss , $as , NULL ,  NULL , NULL , NULL , NULL  )";
	
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($strimpd == 10){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Stirrups' , 10 , '$tnums' , $lengthss , NULL , $as ,  NULL , NULL , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($strimpd == 12){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Stirrups' , 12 , '$tnums' , $lengthss , NULL , NULL , $as ,  NULL , NULL ,NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	
	}
	
	if($strimpd == 16){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Stirrups' , 16 , '$tnums' , $lengthss , NULL , NULL ,  NULL ,$as , NULL ,NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	
	}

	if($strimpd == 20){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Stirrups' , 20 , '$tnums' , $lengthss , NULL , NULL ,  NULL , NULL ,$as ,NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}

	if($strimpd == 25){
	
	$sql = "INSERT INTO steel VALUES(NULL ,'' , 'Stirrups' , 25 , '$tnums' , $lengthss , NULL , NULL ,  NULL , NULL ,NULL, 	$as   )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 

	}
	
?>


<html>
<head> <title> result </title></head>
	<body>

	
<?php
	echo"<br>";
	$sql = "SELECT * FROM steel";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row

?>

	<table border=1 >
	<tr>	
		<th align="center"> Sr.No.</th>
	 	<th width="12" align="center">Beam no</th><th align="center"> Discription</th><th width="12" align="center">Diameter of bar
		</th>
		<th align="center">No of bars</th><th align="center">Length</th><th align="center">8mm</th>
		<th align="center">10mm</th><th align="center">12mm</th><th align="center">16mm</th><th align="center">20mm</th>
		<th align="center">25mm</th>
	</tr>
	
<?php
    	while($row = $result->fetch_assoc()) {
?>	
	
	<tr width="10">	
		<td align="center"><?php echo  $row['srno']; ?></td>
		<td align="center"><?php echo  $row['Beam_No'];?></td>
		<td align="justify"><?php echo  $row['Discription']; ?></td> 
		<td align="center"><?php echo  $row['Dia_of_bar']; ?></td> 
		<td align="center"><?php echo  $row['no_of_bar']; ?></td>
		<td align="center"><?php echo  $row['Length']; ?></td>
		<td align="center"><?php echo  $row['8mm']; ?></td>
		<td align="center"><?php echo  $row['10mm']; ?></td> 
		<td align="center"><?php echo  $row['12mm']; ?></td>
		<td align="center"><?php echo  $row['16mm']; ?></td>
		<td align="center"><?php echo  $row['20mm']; ?></td>
		<td align="center"><?php echo  $row['25mm']; ?></td>
		

        </tr>

<?php	
	
    	}
	} 	
	else {
    	echo "0 results";
	}
	
	

?>
</table>
<a href=project.php><input type = submit value= ADD style="font-size:25;color:white;background-color:#00FF00;border:1" ></a>
<form action=cal.php>
<input type = submit value= Finish style="font-size:25;color:black;background-color:white;border:1" >
</form>
</body>
</html>

