<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Fouad"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style/style1.css"/>
            <link rel="icon" href="images/favicon.ico"/>
            <title>Fouad</title>
        </head>
        <body class="body83">
      <center> <h1 style="text-align:center; color:blue; background-color:black; cursor:pointer; width: 250px; border: 1px solid black; box-shadow: 1px 1px 10px black" onclick="myFunction2('https://fouad.rf.gd/')"> Home Page </h1> </center>
        <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> incorrect password
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> incorrect email
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong> non existing account
                            </div>
                        <?php
                        break; } }
                ?> 
            <form action="connexion.php" method="post">
                <h2 class="text-center">Login</h2>       
                <div class="form-group">
                    <label for='email'>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for='password'>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div> 
                <div class="form-group">
                <p class="text-center"><a href="inscription.php">Registration</a></p>
                <p class="text-center"> <a href="https://fouad.rf.gd/forget/index1.php"> Forget Password ? </a> </p>
                </div>
                </form>
        </div>
        <script src="script/script7.js"></script>
        </body>
</html>