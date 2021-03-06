<?php include "database.php" ?>
<?php include "functions.php" ?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UCIL: UCI Living</title>
    
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
    <header id="header">
        <div class="container">
            <span class="message">
                <?php

                if (isset($_POST['add-listing'])) {
                    addListing();
                }

                ?>                
            </span> 
            <h1>UCIL</h1> 
            <h2>Helping UCI Students Find Housing</h2> 
            <div class="section row">
                <div class="col span-4-of-12">
                    <i class="fa fa-home fa-2x first"></i>
                    <h2>Find Apartments</h2>
                    <a href="#search-section" class="btn btn-primary">Search</a>
                </div>
                <div class="col span-4-of-12">
                    <i class="fa fa-plus fa-2x"></i>
                    <h2>Add Listing</h2>
                    <a href="#add-section" class="btn btn-primary">Add</a>
                </div>
                <div class="col span-4-of-12">
                    <i class="fa fa-times fa-2x"></i>
                    <h2>Modify Listing</h2>
                    <a href="#modify-section" class="btn btn-primary">Modify</a>
                </div>
            </div>              
        </div>
    </header>

    <section id="search-section">
        <div class="container">
            <h2 class="main-text">Find Apartments</h2>
            <form action="search_apartments.php" method="post">
                <label for="search-apartment-select">Choose Your Apartment</label>
                <select id="search-apartments-select" name="search-apartments-select">
                    <option value="All Apartments">All Apartments</option>
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
                <input type="submit" name="search-apartments" value="Search" class="btn btn-primary search-btn">
            </form>              
        </div>
    </section>
    
    <section id="add-section">
        <div class="container">
            <h2 class="main-text">Add Listing</h2>
            <form action="" method="post">
                <div class="section row">
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
                        <input type="text" id="contact" name="contact" placeholder="E.g. (123) 456-7890" required>
                        <label for="email-add">Email</label>
                        <p>For modification and deletion of listings</p>
                        <input type="email" id="email-add" name="email-add" placeholder="E.g. apartment@find.com" required>            
                    </div>
                </div>
                <input type="submit" id="add-listing" name="add-listing" class="btn btn-primary add-btn" value="Add">
            </form>             
        </div>
    </section>
    
    <section id="modify-section">
        <div class="container">
            <h2 class="main-text">Modify Listing</h2>
            <form action="modify_listing.php" method="post">
                <label for="email-find">Please enter the email you used to post the listing</label>
                <input type="email" id="email-find" name="email-find" placeholder="E.g. apartment@find.com" required>
                <input type="submit" id="modify-listing" name="modify-listing" class="btn btn-primary modify-btn" value="Modify">
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2015 &mdash; A project by <a href="http://davidtranscend.com/" target="_blank">David Tran</a></p>
            <br/>
            <p>Disclaimer: This application is only for demonstration purposes and all data is fictitious.</p>
        </div>
    </footer>  
</body>
</html>