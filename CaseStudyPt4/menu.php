<?php

$menu_array = array();

foreach ($_POST as $key => $val) {
    $menu_array[$key] = $val;
}

@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
 }

    foreach ($menu_array as $key => $value) {
        if(isset($value)){
            $query = "UPDATE Orders SET quantity= quantity + $value WHERE menuid=\"$key\"";
            $result = $db->query($query);
        }
    }

?>

<html lang = "en">

<head>

	<title>JavaJam Coffee House</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="color.css">
	
</head>

<body>
<div id="container">
<h1 id="header">
	<img src="images/head.png" alt="JavaJam"/>
</h1>

<div id="nav" style="padding:0px 0px 150px 0px;">
	<ul>
	<li><a href ="index.html">Home</a></li>
	<li><a href ="menu.php">Menu</a></li>
	<li><a href ="music.html">Music</a></li>
	<li><a href ="jobs.html">Jobs</a></li>
	<li><a href ="update.php">Price<br>Update</a></li>
	<li><a href ="report.html">Report</a></li>
	</ul>
</div>



<div id="MenuContent">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<div id="h2">
				Coffee at JavaJam
		</div>
		<table id="MenuTable">	
			<tbody>		
				<tr>
					<td>Just Java</td>
					<td>Regular house blend, decaffeinated coffee, or flavor of the day.<br>
						Endless Cup $2.00</td>
					<td class = "orderAmt"><input type="number" id="Java" name="1" 
						onInput="java()" min="0" value="0"></td>
					<td><p id="totalJava">$0.00</p></td>
				</tr>
				
				<tr>
					<td>Cafe au Lait</td>
					<td>House blended coffee infused into a smooth, steamed milk.<br>
						<input type="radio" id="singleCafe" name="Cafe" value="singleCafe" 
						onInput="cafe()" checked> Single $2.00 
						
						<input type="radio" id="doubleCafe" name="Cafe" value="doubleCafe" 
						onInput="cafe()"> Double $3.00 
					</td>
					<td class = "orderAmt"><input type="number" id="Cafe" name="Cafe" 
						onInput="cafe()" min="0" value="0"></td>
					<td><p id="totalCafe">$0.00</p></td>
				</tr>
				
				<tr>
					<td>Iced Cappuccino</td>
					<td>Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>
						<input type="radio" id="singleCappu" name="Cappu" value="singleCappu" 
						onInput="cappu()"checked> Single $4.75 
					
						<input type="radio" id="doubleCappu" name="Cappu" value="doubleCappu" 
						onInput="cappu()"> Double $5.75 
					</td>
					<td class = "orderAmt"><input type="number" id="Cappu" name="Cappu" 
						onInput="cappu()" min="0" value="0"></td>
					<td><p id="totalCappu">$0.00</p></td>
				</tr>
			</tbody>
		</table>

		<div id="total">
			Total Amount:
		<span id="totalAmt">$0.00</span>
			<div id="applyChanges" style="padding:10px 0px 0px 55px;">
					<input type="submit" value="Order"></td>
				</div>
		</div>
</div>



<div id="footer">
	<small><i>Copyright &copy; 2014 JavaJam Coffee House <br>
	<a href="mailto:Elvan@Koh.com"> Elvan@Koh.com </a>
	</div>

</div>

</form>

<script type="text/javascript">

	var amountTotal;
	var javaTotal;
	var cafeTotal;
	var cappuTotal;

	function java(){
		if ((document.getElementById("Java").value) == ""){
			javaTotal = 0.00;
		}
		else {
			javaTotal = parseInt(document.getElementById("Java").value);
		}

		javaTotal *= 2.00;
		document.getElementById("totalJava").innerHTML = "$" + javaTotal.toFixed(2);
		total();
	}

	function cafe(){
		var single;
		if (document.getElementById("singleCafe").checked == true){
			single = true;
			document.getElementById("Cafe").setAttribute("name","2");
		}
		else if (document.getElementById("doubleCafe").checked == true){
			single = false;
			document.getElementById("Cafe").setAttribute("name","3");
		}

		if ((document.getElementById("Cafe").value) == ""){
			cafeTotal = 0.00;
		}
		else {
			cafeTotal = parseInt(document.getElementById("Cafe").value);
		}

		if (single == true){
			cafeTotal *= 2.00;
		}
		else if (single== false){
			cafeTotal*= 3.00;
		} 
		
		document.getElementById("totalCafe").innerHTML = "$" + cafeTotal.toFixed(2);
		total();
	}

	function cappu(){
		var single;
		if (document.getElementById("singleCappu").checked == true){
			single = true;
			document.getElementById("Cappu").setAttribute("name","4");
		}
		else if (document.getElementById("doubleCappu").checked == true){
			single = false;
			
			document.getElementById("Cappu").setAttribute("name","5");
		}

		if ((document.getElementById("Cappu").value) == ""){
			cappuTotal = 0.00;
		}
		else {
			cappuTotal = parseInt(document.getElementById("Cappu").value);
		}

		if (single == true){
			cappuTotal *= 4.75;
		}
		else if (single == false){
			cappuTotal*= 5.75;
		}

		document.getElementById("totalCappu").innerHTML = "$" + cappuTotal.toFixed(2);
		total();
	}

	function total(){
		if (javaTotal == null){
			javaTotal = 0;
		}

		if (cafeTotal == null){
			cafeTotal = 0;
		}

		if (cappuTotal == null){
			cappuTotal = 0;
		}
		amountTotal = javaTotal + cafeTotal + cappuTotal;
		document.getElementById("totalAmt").innerHTML = "$" + amountTotal.toFixed(2);
	}


</script>
</body>

</html>