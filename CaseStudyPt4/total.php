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
    $return_array = array();
    $query = "SELECT menuid,quantity FROM Orders";
    $result  = $db->query($query);
    
    
    foreach ($result as $key) {
        array_push($return_array,$key["name"]);
        $return_array[$key["menuid"]] = $key["quantity"];

    }

    $Java = $return_array['1'];
    $SingleCafe = $return_array['2'];
    $DoubleCafe = $return_array['3'];
    $SingleCappu = $return_array['4'];
    $DoubleCappu = $return_array['5'];

    $return_array = array();
    $query = "SELECT name,price FROM Menu";
    $result  = $db->query($query);
    
    
    foreach ($result as $key) {
        array_push($return_array,$key["name"]);
        $return_array[$key["name"]] = $key["price"];

    }

    $JavaPrice = $return_array['Java'];
    $SingleCafePrice = $return_array['SingleCafe'];
    $DoubleCafePrice = $return_array['DoubleCafe'];
    $SingleCappuPrice = $return_array['SingleCappu'];
    $DoubleCappuPrice = $return_array['DoubleCappu'];

    $Java *= $JavaPrice;
    $SingleCafe *= $SingleCafePrice;
    $DoubleCafe *= $DoubleCafePrice;
    $SingleCappu *= $SingleCappuPrice;
    $DoubleCappu *= $DoubleCappuPrice;


    $CafeTotal = $SingleCafe + $DoubleCafe;
    $CappuTotal = $SingleCappu + $DoubleCappu;

    $Total = $Java + $CafeTotal + $CappuTotal;

    $db->close();
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
        <img src="images/head.png" alt="JavaJam"/>
    </h1>

    <div id="nav" style="padding:0px 0px 0px 0px;">
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
            <div id="h2">
                    Total Sales:
            </div>
            <table id="MenuTable">	
                <tbody >		
                    <tr> 
                        <td style="text-align:center; font-weight:bold; font-size:15px;">Product</td>
                        <td style="text-align:center; font-weight:bold; font-size:15px;">Sales 
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">Just Java</td>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">
                        $<?php echo $Java; ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">Cafe au Lait</td>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">
                        $<?php echo $CafeTotal; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">Iced Cappuccino</td>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">
                        $<?php echo $CappuTotal; ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">Total</td>
                        <td style="text-align:center; font-weight:normal; font-size:15px;">
                        $<?php echo $Total; ?>
                        </td>
                    </tr>


                </tbody>
            </table>
			<br>
            <button onclick="goBack()">Back</button>
    </div>



    <div id="footer">
        <small><i>Copyright &copy; 2014 JavaJam Coffee House <br>
        <a href="mailto:Elvan@Koh.com"> Elvan@Koh.com </a>
        </div>

    </div>

    </form>

    <script>
		function goBack() {
			window.history.back()
		}
</script>
    </body>
</html>
