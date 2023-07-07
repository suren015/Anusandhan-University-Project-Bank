<!DOCTYPE html>
<html>
    <head lang="vi">
        <meta http-equi="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Anusandhaan</title>
        <link rel="stylesheet" href="css/homepage.css">
        <script src="../js/homepagejs.js"></script>
        <link rel="icon" href="/favicon/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />        
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>

    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
            
                <a class="navbar-brand" href="index.php"><img src="img/navbar.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#page-beg">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Abt-sec">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Team-sec">Team</a></li>                        
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="title-box" id="page-beg">
            <div class="main-title">
                Anusandhaan
            </div>
            <div class="main-subtitle">
                University Project Bank
            </div>
            <div class="mini-subtitle">
                A Project By Team DevCoders
            </div>
        </div>

        <div class="btn-box" id="Login">
            <div class="btn-title">Login</div>
            <div class="bts">
                <button onclick="location.href='userlogin.php'"; class="btn" type="button" >Student</button>
                <button onclick="location.href='adminlogin.php'"; class="btn" type="button" >Admin</button>
            </div>
        </div>
    
        <div class="ag-format-container">
            <div class="ag-courses_box">
                <div class="ag-courses_item" id="Abt-sec">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title" >About Project</div>                
                    <div class="ag-courses-item_title2">
                        Anusandhaan is a University Project Bank.
                        It allows students to search, publish and track research papers for educational purposes.
                        Our portal allows college to control who uses the portal and the research conducted by students.
                        <p>Team DevCoders welcomes you to explore and do Anusandhaan.</p>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item" id="Team-sec">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">Our Team - The DevCoders</div>
                    <div class="ag-courses-item_title2">
                        <p>Sparsh Gupta</p>
                        <p>Tanmay Sreejith</p>
                        <p>Aadesh Agte</p>
                        <p>Dasari Vamsi Krishna</p>
                        <p>Surendra Tholiya</p>
                    </div>
                </a>
                </div>

                <div class="ag-courses_item" id="contact">
                    <a href="#" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">Contact Us</div>
                        <div class="ag-courses-item_title2">
                        <p>Give us your Feedback on Gmail</p>
                        <button onclick="location.href='mailto:anusandhaan.tdc@gmail.com'"; class="btn" type="button" >Mail Us</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <footer class="footer py-4">
            <div> Copyright © Anusandhaan 2023</div>
        </footer>
    <script src="js/scripts.js"></script>
    </body>
</html>