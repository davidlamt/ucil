<?php include "database.php" ?>
<?php include "functions.php" ?>

<?php

assignSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UCIL: Modify Listing</title>
    
    <!-- Linking CSS dependencies -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
    <link rel="stylesheet" type="text/css" href="resources/css/creative.css">
    
    <!-- Linking JS dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/creative.js"></script>      
</head>
<body>
    <section id="modify-listing-section">
        <div class="container">
            <h1>Modify Listing</h1>
            <div class="breadcrumb">
                <p><a href="index.php">Home</a> / Modify Listing</p>
            </div>      
            <span class="message">
            <?php
            
            deleteListing();
            updateListing();

            ?>
            </span>
            <h2>Current Listing</h2>
            <table id="apartment-table" style="width:100%">
                <tr>
                    <th>Apartment Complex</th>
                    <th>Price</th>
                    <th>Living Arrangement</th>
                    <th>Contact</th>
                </tr>                        
            <?php 

            displayData();

            ?>
            </table>            
            <form action="" method="post">
                <div class="row section">
                    <div class="col span-6-of-12">
                        <label for="add-apartments-select">Choose Your Apartment</label>
                        <select id="add-apartments-select" name="add-apartments-select">
                            <option value="Ambrose">Ambrose</option>
                            <option value="Berkeley Court">Berkeley Court</option>
                            <option value="Camino del Sol">Camino del Sol</option>
                            <option value="Columbia Court">Columbia Court</option>
                            <option value="Cornell Court">Cornell Court</option>
                            <option value="Dartmouth Court">Dartmouth Court</option>
                            <option value="Harvard Court">Harvard Court</option>
                            <option value="Puerta del Sol">Puerta del Sol</option>
                            <option value="Stanford Court">Stanford Court</option>
                            <option value="Vista del Campo">Vista del Campo</option>
                            <option value="Vista del Campo Norte">Vista del Campo Norte</option>
                        </select>                           
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" placeholder="E.g. 485, 600, 790" required>
                        <label for="arrangement">Living Arrangement</label>
                        <select id="arrangement-select" name="arrangement-select">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                            <option value="Quad">Quad</option>
                            <option value="Living Room">Living Room</option>
                            <option value="Other">Other</option>
                        </select>  
                    </div>
                    <div class="col span-6-of-12">
                        <label for="contact">Contact</label>
                        <input type="text" id="contact" name="contact" placeholder="E.g. (123) 456-7890" required>                                                       <label for="email-add">Email</label>
                        <p>For modification and deletion of listings</p>
                        <input type="email" id="email-add" name="email-add" placeholder="E.g. apartment@find.com" required>
                    </div>
                </div>    
                <input type="submit" id="modify" name="modify" class="btn btn-primary add-btn" value="Update"> 
                <input type="submit" id="delete-listing" name="delete-listing" class="btn btn-danger" value="Delete" formnovalidate>
            </form>    
            <a href="index.php" class="btn btn-primary home-btn"><i class="fa fa-home"></i></a>      
        </div>        
    </section> 
    
    <footer>
        <div class="container">
            <p>&copy; 2015 &mdash; A project by <a href="http://davidtranscend.com/" target="_blank">David Tran</a></p>
        </div>
    </footer>      
</body>
</html>