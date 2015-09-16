<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UCIL: UCI Living</title>
    
    <!-- Linking CSS dependencies -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/creative.css">
    
    <!-- Linking JS dependencies -->
    <script type="text/javascript" src="resources/js/creative.js"></script>
</head>
<body>
   <div id="home-page">
        <header>
            <div class="container">
                <h1>UCIL</h1> 
                <h2>Helping UCI Students Find Housing</h2>               
            </div>
        </header>
        
        <section id="main-section">
            <div class="container">
                <div class="section group">
                    <div class="col span_1_of_2">
                        <i class="fa fa-home fa-2x icon"></i>
                        <h2>Find Apartments</h2>
                        <div class="select-box">
                            <form action="" method="post">
                                <select id="find-apartments" name="find-apartments">
                                    <option value="all-apartments">All Apartments</option>
                                    <option value="ambrose">Ambrose</option>
                                    <option value="berkeley-court">Berkeley Court</option>
                                    <option value="camino-del-sol">Camino del Sol</option>
                                    <option value="columbia-court">Columbia Court</option>
                                    <option value="cornell-court">Cornell Court</option>
                                    <option value="dartmouth-court">Dartmouth Court</option>
                                    <option value="dartmouth-court">Harvard Court</option>
                                    <option value="puerta-del-sol">Puerta del Sol</option>
                                    <option value="stanford-court">Stanford Court</option>
                                    <option value="vista-del-campo">Vista del Campo</option>
                                    <option value="vista-del-campo-norte">Vista del Campo Norte</option>
                                </select>   
                                <input type="submit" name="search-apartments" value="Search" class="btn btn-primary search-apartments">
                            </form>                         
                        </div>
                    </div>
                    <div class="col span_1_of_2">
                        <i class="fa fa-plus fa-2x icon"></i>
                        <h2>Add Listing</h2>
                    </div>
                </div>
            </div>
        </section>    
        
        <footer>
            <div class="container">
                <p>&copy; 2015 &mdash; A project by <a href="http://davidtranscend.com/" target="_blank">David Tran</a></p>
            </div>
        </footer>  
   </div>
</body>
</html>