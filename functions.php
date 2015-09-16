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

function showApartments() {
    global $connection;
    
    // Gathering form value
    $apartment =  $_POST['search-apartments-select'];

    // Validating if user wants to view all apartments
    if ($apartment == "All Apartments") {
        // Creating the query and submitting it
        $query = "SELECT * FROM listings";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die();
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>".$row['apartment']."</td>
                <td>".$row['price']."</td>
                <td>".$row['arrangement']."</td>
                <td>".$row['contact']."</td>
                </tr>";
            }
        }
    } else {
        // Creating query and submitting it
        $query = "SELECT * FROM listings WHERE apartment = '$apartment'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die();
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>".$row['apartment']."</td>
                <td>".$row['price']."</td>
                <td>".$row['arrangement']."</td>
                <td>".$row['contact']."</td>
                </tr>";
            }                    
        }
    }    
}

?>