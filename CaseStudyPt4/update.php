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
            $query = "UPDATE Menu SET price=$value WHERE name=\"$key\"";
            $result = $db->query($query);
        }
    }

    $return_array = array();
    $query = "SELECT name,price FROM Menu";
    $result  = $db->query($query);
    
    
    foreach ($result as $key) {
        array_push($return_array,$key["name"]);
        $return_array[$key["name"]] = $key["price"];

    }

    $db->close();

    $Java = $return_array['Java'];
    $SingleCafe = $return_array['SingleCafe'];
    $DoubleCafe = $return_array['DoubleCafe'];
    $SingleCappu = $return_array['SingleCappu'];
    $DoubleCappu = $return_array['DoubleCappu'];
?>

    <html lang = "en">

    <head>

        <title>JavaJam Coffee House</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="color.css">
        
    </head>

    <body>
    <div id="container">
    <h1 id="header" style="padding-bottom:7px;">
        <img src="images/head.png" alt="JavaJam"/ >
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
                        <td style="width:80px; height:75px;"><input type="checkbox" id="changeJava"
                            onInput="enableChangeJava()">
                            <br>
                            <input type="hidden" id="newJava" name="Java" placeholder="Java" value="">
                        </td>
                        <td style="text-align:center; font-weight:bold;">Just Java</td>
                        <td style="font-weight:normal;">Regular house blend, decaffeinated coffee, or flavor of the day.<br>
                            Endless Cup 
                            $<span id="Java"><?php echo $Java; ?></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width:80px; height:75px;"><input type="checkbox" id="changeCafe"
                            onInput="enableChangeCafe()">
                            <br>
                            <input type="hidden" id="newSingleCafe" name="SingleCafe" placeholder="Single Cafe" value=""> 
                            <br>
                            <input type="hidden" id="newDoubleCafe" name="DoubleCafe" placeholder="Double Cafe" value="">
                        </td>
                        <td style="text-align:center; font-weight:bold;">Cafe au Lait</td>
                        <td style="font-weight:normal;">House blended coffee infused into a smooth, steamed milk.<br>
                            Single $<span id="SingleCafe"><?php echo $SingleCafe; ?></span>
                            
                            Double $<span id="DoubleCafe"><?php echo $DoubleCafe; ?></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width:80px; height:75px;"><input type="checkbox" id="changeCappu"
                            onInput="enableChangeCappu()">
                            <br>
                            <input type="hidden" id="newSingleCappu" name="SingleCappu" placeholder="Single Cappuccino" value="">
                            <br>
                            <input type="hidden" id="newDoubleCappu" name="DoubleCappu" placeholder="Double Cappuccino" value="">
                        </td>
                        <td style="text-align:center; font-weight:bold;">Iced Cappuccino</td>
                        <td style="font-weight:normal;">Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>
                            Single $<span id="SingleCappu"><?php echo $SingleCappu; ?></span>
                        
                            Double $<span id="DoubleCappu"><?php echo $DoubleCappu; ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
			
            <div id="applyChanges" style="padding:10px 0px 0px 55px;">
                <input type="submit" value="Apply Changes"></td>
            </div>
    </div>



    <div id="footer">
        <small><i>Copyright &copy; 2014 JavaJam Coffee House <br>
        <a href="mailto:Elvan@Koh.com"> Elvan@Koh.com </a>
        </div>

    </div>

    </form>

    <script type="text/javascript">

        function enableChangeJava(){
            if(document.getElementById("changeJava").checked == true){
                document.getElementById("newJava").setAttribute("type", "number");
				document.getElementById("newJava").setAttribute("step", "0.01");
				document.getElementById("newJava").setAttribute("value", "<?php echo $Java; ?>");
            }
			
			if(document.getElementById("changeJava").checked == false){
                document.getElementById("newJava").setAttribute("type", "hidden");
            }


        }

        function enableChangeCafe(){
            if(document.getElementById("changeCafe").checked == true){
                document.getElementById("newSingleCafe").setAttribute("type", "number");
				document.getElementById("newSingleCafe").setAttribute("step", "0.01");
				document.getElementById("newSingleCafe").setAttribute("value", "<?php echo $SingleCafe; ?>");
                document.getElementById("newDoubleCafe").setAttribute("type", "number");
				document.getElementById("newDoubleCafe").setAttribute("step", "0.01");
				document.getElementById("newDoubleCafe").setAttribute("value", "<?php echo $DoubleCafe; ?>");
            }
			
			if(document.getElementById("changeCafe").checked == false){
                document.getElementById("newSingleCafe").setAttribute("type", "hidden");
				document.getElementById("newDoubleCafe").setAttribute("type", "hidden");
            }
        }
        
        function enableChangeCappu(){
            if(document.getElementById("changeCappu").checked == true){
                document.getElementById("newSingleCappu").setAttribute("type", "number");
				document.getElementById("newSingleCappu").setAttribute("step", "0.01");
				document.getElementById("newSingleCappu").setAttribute("value", "<?php echo $SingleCappu; ?>");
                document.getElementById("newDoubleCappu").setAttribute("type", "number");
				document.getElementById("newDoubleCappu").setAttribute("step", "0.01");
				document.getElementById("newDoubleCappu").setAttribute("value", "<?php echo $DoubleCappu; ?>");
            }
			
			if(document.getElementById("changeCappu").checked == false){
                document.getElementById("newSingleCappu").setAttribute("type", "hidden");
				document.getElementById("newDoubleCappu").setAttribute("type", "hidden");
            }
        }

    </script>
    </body>
</html>
