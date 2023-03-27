<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style/style1.css"/>
            <link rel="icon" href="images/favicon.ico"/>
            <title>Fouad</title>
        </head>
        <body class="body83">
         <center> <h1 style="text-align:center; background-color:black; color:blue; cursor:pointer; width: 250px; border: 1px solid black; box-shadow: 1px 1px 10px black" onclick="myFunction2('https://fouad.rf.gd/')"> Home Page </h1> </center>
         <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                              <center> <strong>Successful</strong> registration successful ! </center>
                         <?php 
                        header('Refresh: 3; URL=https://fouad.rf.gd/login/index.php');
                        exit;
                          ?>        
                            </div>   
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                             <strong>Error</strong> Different password
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                               <strong>Error</strong> invalid email
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> email too long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                 <strong>Error</strong> username too long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> existing account
                            </div>
                        <?php 
                         } }
                        ?>
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Registration</h2>       
                <div class="form-group">
                    <label for='new_name'>Full Name</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Full name" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for='email'>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for='password'>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for='password_retype'>Retype password</label>
                    <input type="password" name="password_retype" class="form-control" placeholder="Retype password" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Registration</button>
                </div> 
                <div class="form-group">
                <center> <span> If you have an account <a href="https://fouad.rf.gd/login/index.php" style="text-decoration: none">  Login </a> </span> </center>
                </div>
            </form>
        </div> 
        <script src="script/script7.js"></script>
        </body> </html>
