<?php include "database.php" ?>
<?php include "functions.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UCIL: Search Apartments</title>
    
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
    <section id="search-page-section">
        <div class="container">
            <h1>Find Your Apartment</h1>
            <div class="breadcrumb">
                <p><a href="index.php">Home</a> / Search Apartments</p>
            </div>
            <table id="apartment-table" style="width:100%">
                <tr>
                    <th>Apartment Complex</th>
                    <th>Price</th>
                    <th>Living Arrangement</th>
                    <th>Contact</th>
                </tr>
            <?php 

            showApartments();

            ?>    
            </table>    
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