<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/login/css/style.css">
    <title>Login Page Takalo</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
  <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url()?>assets/login/images/product.jpg');"></div>

    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Amado takalo</strong></h3>
            <p class="mb-4">Site de "Takalo" en ligne sécurisé et fiable</p>
            <form action="<?php echo base_url('welcome/login');?>" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="your-email@gmail.com" id="mail" name="mail">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="mail" name="mdp">
              </div>
              

              <input type="submit" value="Log In" class="btn btn-block btn-primary" style= "background-color: red;">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    

  </body>
 
</html>