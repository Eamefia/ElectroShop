<?php
session_start();
ini_set('display_errors', '1');
if(isset($_POST['child'])){
    // Include the database configuration file


    // File upload configuration
    $targetDir = "../assets/childImages/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if(!empty($fileNames)){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "e-commerce";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            //Check connection
            if ($conn->connect_error) {
                echo 'could not connect to database';
            }

            $query = "SELECT * FROM items";
            $init = $conn->query($query);
            if ($init) {
                $rowNumber = $_SESSION['lastId'];
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }


            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."', NOW(), '$rowNumber'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }

        if(!empty($insertValuesSQL)){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "e-commerce";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            //Check connection
            if ($conn->connect_error) {
                echo 'could not connect to database';
            }



            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $sql = "INSERT INTO childImages (image_name, uploaded_on, orderUploads) VALUES $insertValuesSQL";

            if ($conn->query($sql) === TRUE) {
                header("Location: form2.php?upload=success");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            if($sql){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ','):'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ','):'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }

        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    // Display status message
    echo $statusMsg;
}

