<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css')?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust as needed */
        }
        .center-img {
            max-width: 65%; /* Ensures responsiveness */
            height: auto;    /* Maintains aspect ratio */
        }
    </style>
    <section id="header">
    <style>
        #p3 {
            background-color: rgb(255,77,77);
        }
        .img {
            height: 80px;
            width: 60px;
        }
        .header {
            font-size: 30px;
            font-family: Georgia, serif;
        }
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <nav class="navbar navbar-expand-lg bg-red navbar-dark">
        <!-- Brand -->
        <h3 class="navbar-brand py-3"></h3>
        <div class="col-12 col-lg-4 center-content">
                <img src="<?= base_url('assets/images/autofixicon.png') ?>" class="img" alt="ggsl">
                <span class="header ml-3">AutoFix Garage</span>
            </div>
</hr>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

    
           
               
    
                            <a href="<?= site_url('login/user') ?>" class="ml-auto">
                <button type="button" class="btn btn-warning">
                 Login
                </button>
            </a>
        


                



                    </form>
                    
                </div>
            </div>
        </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-gray">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="; ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<; ?>">Contact</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/AutoFixG" target="_blank">Facebook Page</a>
                    </li>
            </ul>
        </div>
    </nav>
    
    <div class="center-container">
        <img src="assets/images/autofixkotse.jpg" class="img-fluid center-img" alt="...">
    </div>
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to  AutoFix</h1>
        <p class="lead">Automatically optimize the garage car workshop with scheduling repairs, and streamlining workflow.</p>
        <hr class="my-4">
        <p></p>
        <a class="btn btn-primary btn-lg" href="" role="button">Learn more</a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo base_url('assets/images/engine.jpg'); ?>" class="card-img-top" alt="Car 1">
                    <div class="card-body">
                        <h5 class="card-title">Engine Rebuild</h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo base_url('assets/images/carnux.jpg'); ?>" class="card-img-top" alt="Car 2">
                    <div class="card-body">
                        <h5 class="card-title">Datailing</h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo base_url('assets/images/aircon.jpg'); ?>" class="card-img-top" alt="Car 3">
                    <div class="card-body">
                        <h5 class="card-title">Aircon Cleaning</h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="card-body" style="font-family: Georgia;">
    			
      				<p>
Autofix is an essential feature in modern software development tools and code editors, designed to automatically correct coding errors and apply formatting adjustments according to predefined rules or configurations. This functionality is particularly useful for maintaining a consistent coding style, adhering to best practices, and improving overall code quality without requiring manual intervention. Typically integrated into various Integrated Development Environments (IDEs) and editors like Visual Studio Code, IntelliJ IDEA, and Sublime Text, autofix capabilities streamline the coding process by addressing common issues identified by linters and formatters.

One of the primary benefits of autofix is its ability to enforce code formatting standards. By automatically adjusting elements such as indentation, spacing, line breaks, and bracket placement, autofix ensures that the codebase remains uniform and readable. This is especially crucial in collaborative environments where multiple developers contribute to the same project, as it eliminates discrepancies that can arise from differing personal coding styles. Tools like Prettier for JavaScript and Black for Python are widely used for this purpose, providing configuration options that can be tailored to match specific style guides.
</p>
    			</blockquote>
  			</div>
  
              <div class="card-deck">
  <div class="card">
    <img src="assets/images/autofix garage.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Repair and Maintenance</h5>
      <p class="card-text">Our car workshop offers comprehensive repair and maintenance services, leveraging skilled technicians and state-of-the-art equipment to keep vehicles running smoothly and safely on the road.</p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
  <div class="card">
    <img src="assets/images/Changeoil.jpg " class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Change oil</h5>
      <p class="card-text">Our car workshop, we provide professional oil change services, ensuring your vehicle's engine runs smoothly and efficiently, extending its lifespan and maintaining optimal performance.</p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
  <div class="card">
    <img src="assets/images/Wirings.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">ABS Module Problem DTC U3000</h5>
      <p class="card-text">Our car workshop specializes in addressing ABS module issues, such as the DTC U3000 error code, by utilizing advanced diagnostic tools and experienced technicians to ensure accurate repairs and optimal braking performance.</p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
</div>

            
<div class="container">
  

    <footer class="bg-red text-center text-lg-start mt-5">
        <div class="container p-4">
            <p>&copy; OVER 15 YEARS EXPERIENCE

With over 15 years of experience,
 AutoFix Garage has been the trusted 
 destination for reliable and expert 
 car repairs.</p>
  </div>
    </footer>
      