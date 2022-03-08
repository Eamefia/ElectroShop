<?php
session_start();
    if (isset($_POST['item-submit'])){
        $location = '../assets/products/';
        $filepath = '';
        $folder = './assets/products/';
        $item_brand = $_POST['brandName'];
        $item_name = $_POST['itemName'];
        $item_price = $_POST['itemPrice'];
		$Category = $_POST['category'];
		$strike = $_POST['strikPrice'];
		$place = $_POST['location'];
		$discription = $_POST['discription'];
		$Contact = $_POST['contact'];
		
        $item_register  = date("Y-m-d h:i:sa");
        $file = $_FILES['file']['name'];
        $fileTemp = $_FILES['file']['tmp_name'];
        $filepath .=$folder.$file." ";
        //call method cart
        $res = move_uploaded_file($fileTemp, $location.$file);
        if ($res){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "e-commerce";

           // Create connection
             try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               	 $query = "SELECT COUNT(*) FROM items";
                $init = $conn->query($query);
              
                $rowNumber = $init->fetchColumn();
                 $rowCount = $rowNumber + 1;
				
				$sql = "INSERT INTO items (item_brand, item_name, item_price, item_image, item_register, orderUploads, Category, Strike_Price, Description, Location, Contact)
                VALUES ('$item_brand', '$item_name', '$item_price', '$filepath', '$item_register', '$rowCount', '$Category', '$strike', '$discription', '$place', '$Contact')";
               // use exec() because no results are returned
               $result = $conn->exec($sql);
               $latest_id = $conn->lastInsertId();
               
			   $_SESSION['lastId'] = $latest_id;
			   header("Location: form2.php?upload=success");
			   
            } catch(PDOException $e) { 
                echo $sql . "<br>" . $e->getMessage(); 
            }
            $conn = null;

        }
    }





?>
<html>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
	
	 textarea[type=text] {
        width: 100%;
		height: 200px;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn {
        float: left;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
            width: 100%;
        }
    }
</style>
<body>

<form action="" method="post" enctype="multipart/form-data" class="pt-6">
<div class="file"> 
  <label for="file" class="btn">Select Image</label>
  <input id="file" style="visibility:hidden;" type="file" name="file">
</div>
    <input type="text" name="brandName" placeholder="brand name...">
    <input type="text" name="itemName" placeholder="item name...">
    <input type="text" name="itemPrice" placeholder="item price...">
	<input type="text" name="category" placeholder="category...">
	<input type="text" name="strikPrice" placeholder="strike price...">
	<input type="text" name="location" placeholder="location...">
	<input type="text" name="contact" placeholder="contact...">
	<textarea type="text" name="discription"></textarea>
    <button type="submit" name="item-submit">upload</button>
</form>

</body>
</html>
