<?php include "database.php" ?>
<?php

function addListing() {
    global $connection;
    
    // Gathering form values
    $apartment = $_POST['add-apartments-select'];
    $price =mysqli_real_escape_string($connection, $_POST['price']);
    $arrangement = $_POST['arrangement-select'];
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $email = mysqli_real_escape_string($connection, $_POST['email-add']);
    
//    echo $apartment."<br>";
//    echo $price."<br>";
//    echo $arrangement."<br>";
//    echo $contact."<br>";
//    echo $email."<br>";
    
    // Validating fields
    if ($price == "" || $contact == "" || $email == "") {
        echo "Please fill in all the fields.";
    } else {
        // Encrypting the email
        $hashFormat = "$2y$10$";
        $salt = "ThisWillProtectYourInfo";
        $hashAndSalt = $hashFormat.$salt;
        $encryptedEmail = crypt($email, $hashAndSalt);

        // Creating the query and submitting it
        $query = "INSERT INTO listings (apartment, price, arrangement, contact, email) VALUES ('$apartment', $price, '$arrangement', '$contact', '$encryptedEmail')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die();
        } else {
            echo "Listing successfully posted!";
        }
    }
}

?>