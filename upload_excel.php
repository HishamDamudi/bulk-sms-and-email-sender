<?php include("db_connect.php"); ?>
<?php

use SimpleExcel\SimpleExcel;
// mail start
use PHPMailer\PHPMailer\PHPMailer;

require_once "mailTryA/PHPMailer/PHPMailer.php";
require_once "mailTryA/PHPMailer/SMTP.php";
require_once "mailTryA/PHPMailer/Exception.php";

$mail = new PHPMailer();

//SMTP Settings
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "damproject7@gmail.com";
$mail->Password = 'rbrdetfaoviwtgvt';
$mail->Port = 465;
$mail->SMTPSecure = "ssl";




// mail end


require_once('SimpleExcel/SimpleExcel.php');



$fileUpload = false;
$targetFile = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opType = $_POST['operation']; // Assuming you retrieve the selected option from the form


    if ($opType == "sms") {
        $path = "excels/sms_excels/";
       
    } else {
        $path = "excels/mail_excels/";
    }

    // If operation type is "email", proceed with email sending
    if ($opType == "email") {
        // Load the Excel file
        $excel = new SimpleExcel('csv');
        $excel->parser->loadFile($_FILES['excelFile']['name']);
        $foo = $excel->parser->getField();

        // Loop through the rows of the Excel file
        for ($count = 1; $count < count($foo); $count++) {
            $roll = $foo[$count][0];
            $name = $foo[$count][1];
            $email = $foo[$count][2];
            $mobile = $foo[$count][3];
            $subject = $foo[$count][4];
            $body = $foo[$count][5];

            // Configure email settings
            $mail->isHTML(true);
            $mail->setFrom("damproject7@gmail.com", $name); // Set sender's name
            $mail->addAddress($email); // Add recipient's email
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send email
            if ($mail->send()) {
                echo "Email sent to $email successfully.<br>";
            } else {
                echo "Failed to send email to $email. Error: {$mail->ErrorInfo}<br>";
            }
            // Clear recipients and attachments to prepare for the next email
            $mail->clearAddresses();
            $mail->clearAttachments();
        }
    }

    // Check if a file was uploaded
    if (!empty($_FILES['excelFile'])) {
        $originalFileName = $_FILES['excelFile']['name'];
        $fileType = pathinfo($originalFileName, PATHINFO_EXTENSION);

        // Get the current date and time
        $currentDateTime = date("Y-m-d_H-i-s");

        // Create a new file name with the current date and time added before the extension
        $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $currentDateTime . '.' . $fileType;

        $targetFile = $path . $newFileName;
        


        // Check if the file is an Excel file
        if ($fileType == "xls" || $fileType == "xlsx" || $fileType == "csv") {
            if (move_uploaded_file($_FILES['excelFile']['tmp_name'], $targetFile)) {
                echo "File uploaded successfully as $newFileName.";
                echo "<br>";
                $fileUpload = true;
                if ($opType == "sms") {
                    $command = "python C:/xampp/htdocs/msgSender/sendSmsPy.py $targetFile";
                    $output = shell_exec($command);
                }
                $_SESSION['upload_message'] = "File uploaded , $newFileName";
                
                // header('Location: index.php');
                // exit;
            } else {
                echo "There was an error uploading the file, please try again!";
                echo "<br>";
            }
        } else {
            echo "Sorry, only Excel files are allowed.";
            echo "<br>";
        }
    } else {
        echo "No file was selected for upload.";
        echo "<br>";
    }

    // 
    if ($fileUpload) {
        // add the path to the database
        $sqlInsPath = "INSERT INTO `excels_paths` (`excel_id`, `excel_path`, `curr_date`) VALUES (NULL, '$targetFile', current_timestamp());";
        $resInsPath = mysqli_query($conn, $sqlInsPath);
        if ($resInsPath) {
            echo "Data Inserted";
            echo "<br>";
        } else {
            echo "Data Not Inserted";
            echo "<br>";
        }
    }
}
// Redirect back to the same page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
// read xls file
?>
