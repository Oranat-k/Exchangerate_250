<?php 
	
	//รับค่า
	//ส่งมาแบบ post
	//$thb = $_POST['attribute name']
	$thb = $_POST['thb'];
	$type = $_POST['changeto'];

	if ($type == "usd") {
		$result = $thb / 31.227;
	}else if ($type == "jyp") {
		$result = $thb / 29.056;
	}else if ($type == "krw") {
		$result = $thb / 0.029;
	}else if ($type == "gbp") {
		$result = $thb / 44.32;
	}else if ($type == "eur") {
		$result = $thb / 38.27;
	}


	//-----------------------

	// if ($type=="usd") {
	// 	$rate = 31.227;
	// }elseif ($type1=="jyp") {
	// 	$rate = 29.056;
	// }elseif ($type1=="krw") {
	// 	$rate = 0.029;
	// }elseif ($type1=="gbp") {
	// 	$rate = 44.32;
	// }elseif ($type1=="eur") {
	// 	$rate = 38.27;
	// }

	// echo "Result = ".$thb/$rate;
	// echo "<br>";

	//-----------------------

	// switch ($type) {
	// 	case 'usd':
	// 		$rate = 31.227;
	// 		break;
	// 	case 'jyp':
	// 		$rate = 29.056;
	// 		break;	
	// 	case 'krw':
	// 		$rate = 0.029;
	// 		break;
	// 	case 'gbp':
	// 		$rate = 44.32;
	// 		break;
	// 	case 'eur':
	// 		$rate = 38.27;
	// 		break;

	// 	default:
	// 		$rate=0;
	// 		break;
	// }

	// echo "Result=".$thb/$rate;
	// echo "<br>";

	//import
	require 'connect.php';
	$sql = "INSERT INTO exch052_history(thb, calculated, currency) VALUES ($thb, $result, '$type')";
	//สั่งให้คิวรี่ลงดาต้าเบส
	$sql_exe = $conn -> query($sql);

	echo "<br>";

 ?>

 <!DOCTYPE html>
 <html>

	 <head>
	 	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	 	<title>Result</title>
	 </head>

	 
<body>
  <div class="container">
    <h1>Result</h1>
    <?php

      echo "Result=".$result;
      echo "<br>";
      echo "ค่าที่กรอกคือ ".$thb;
      echo "<br>";
      echo "สกุลเงินที่ใช้คำนวณ ".$type;
      echo "<br>";
      echo "<br>";
    ?>

    <table class="table table-striped">

      <thead>
          <tr>
            <th>Baht</th>
            <th>Exchage to</th>
            <th>Calculated</th>
            <th>Date Time</th>
            <th>Delete</th>

          </tr>
        </thead>

      
         <tbody>
           <tr>
              

          <?php
            $sql ="SELECT * FROM exch052_history ORDER BY dateRecord DESC";
            $sql_exe=$conn -> query($sql);
          ?>



          <?php
            while ($row = mysqli_fetch_assoc($sql_exe)) {

          ?>

          <td>
            <?php
                echo $row['thb']
            ?>
          </td>

          <td>
          
            <?php
                echo $row['currency']
            ?>

          </td> 
          <td>
            <?php
                echo $row['calculated']
            ?>
          </td> 

          <td>

            <?php
              echo $row['dateRecord'];
                // $array['key/field name']
            ?>
          </td> 

          

          <td>
  
            <a href="delete.php?id=<?php echo $row['recordID']?>&thb=<?php echo $row['thb'];?>" class="btn btn-warning">Delete</a>
          </td>

          </tr>
          <?php

            }

            $conn -> close();
          ?>
          
        

      </tbody>
      

    </table>

  </div>




</body>

 </html>




























