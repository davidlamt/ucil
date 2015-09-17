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

function displayData() {
    global $connection;
    
    // Gathering form value
    $email = mysqli_real_escape_string($connection, $_SESSION['email-find']);

    // Encrypting the email
    $hashFormat = "$2y$10$";
    $salt = "ThisWillProtectYourInfo";
    $hashAndSalt = $hashFormat.$salt;
    $encryptedEmail = crypt($email, $hashAndSalt);

    // Creating and submitting query
    $query = "SELECT * FROM listings WHERE email = '$encryptedEmail'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die();
    } else {
        $row = mysqli_fetch_assoc($result);   
        echo "<tr>
        <td>".$row['apartment']."</td>
        <td>".$row['price']."</td>
        <td>".$row['arrangement']."</td>
        <td>".$row['contact']."</td>
        </tr>";
    }
    
}

function assignSession() {
    global $connection;
    session_start();

    // Assigning a session variable once the page loads
    if (isset($_POST['modify-listing'])) {
        $_SESSION['email-find'] = $_POST['email-find'];
        
        // Gathering form value
        $email = mysqli_real_escape_string($connection, $_SESSION['email-find']);

        // Encrypting the email
        $hashFormat = "$2y$10$";
        $salt = "ThisWillProtectYourInfo";
        $hashAndSalt = $hashFormat.$salt;
        $encryptedEmail = crypt($email, $hashAndSalt);

        // Creating and submitting query
        $query = "SELECT * FROM listings WHERE email = '$encryptedEmail'";       
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die();
        } else {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
        }        
    }    
}

function deleteListing() {
    global $connection;
    
    // Gathering form value
    $email = mysqli_real_escape_string($connection, $_SESSION['email-find']);

    // Encrypting the email
    $hashFormat = "$2y$10$";
    $salt = "ThisWillProtectYourInfo";
    $hashAndSalt = $hashFormat.$salt;
    $encryptedEmail = crypt($email, $hashAndSalt);

    // Creating and submitting query
    $query = "SELECT * FROM listings WHERE email = '$encryptedEmail'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die();
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row == "" || $row == null) {
            echo "<span class='message'>Sorry, we could not find a listing with that email.</span>";
            echo "<a href='index.php' class='btn btn-primary home-out-btn'><i class='fa fa-home'></i></a>";
            die();
        }
    }

    if (isset($_POST['delete-listing'])) {
        // Obtaining email from session variable
        $email = $_SESSION['email-find'];

        // Encrypting the email
        $hashFormat = "$2y$10$";
        $salt = "ThisWillProtectYourInfo";
        $hashAndSalt = $hashFormat.$salt;
        $encryptedEmail = crypt($email, $hashAndSalt);

        // Creating and submitting the query
        $query = "DELETE FROM listings where email = '$encryptedEmail'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die();
        } else {
            echo "Successfully removed the listing!";
            echo "<a href='index.php' class='btn btn-primary home-out-btn-2'><i class='fa fa-home'></i></a>";
            die();
        }
    }                    
}

function updateListing() {
    global $connection;
    
    if (isset($_POST['modify'])) {
        // Gathering form values
        $id = $_SESSION['id'];
        $apartment = $_POST['add-apartments-select'];
        $price =mysqli_real_escape_string($connection, $_POST['price']);
        $arrangement = $_POST['arrangement-select'];
        $contact = mysqli_real_escape_string($connection, $_POST['contact']);
        $email = mysqli_real_escape_string($connection, $_POST['email-add']);

        // Encrypting the email
        $hashFormat = "$2y$10$";
        $salt = "ThisWillProtectYourInfo";
        $hashAndSalt = $hashFormat.$salt;
        $encryptedEmail = crypt($email, $hashAndSalt);      

        // Creating the query and submitting it
        $query = "UPDATE listings set apartment = '$apartment', price = '$price', arrangement = '$arrangement', contact = '$contact', email = '$encryptedEmail' WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die();
        } else {
            echo "<span class='message'>Listing successfully updated!</span>";
            echo "<a href='index.php' class='btn btn-primary home-out-btn-3'><i class='fa fa-home'></i></a>";
            die();
        }
    }    
}

?>