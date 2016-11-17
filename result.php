<!DOCTYPE HTML>

<hmtl>
  <head>
    <meta http-equiv="Content-Type" content="text/html"  charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Ruda" rel="stylesheet">
    <script type="text/javascript" src="bootstrap/js/jquery-3.1.0.min.js" > </script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js" > </script>
    <script type="text/javascript" src="js/register.js"> </script>
    <script type="text/javascript" src="js/login.js"> </script>
    <script type="text/javascript" src="js/checkSession.js"> </script>
    <script type="text/javascript" src="js/logout.js"> </script>
    <script type="text/javascript" src="js/result.js"> </script>
  </head>

  <body>

    <div class="genres">
      <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <img class="pull-left" src="images/logo.png" width="58" height="49">
            <a class="navbar-brand" href="index.html">MovieWave</a>
          </div>

          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="genres.html">Genres</a></li>
            <li><a href="topMovies.html">Top Movies</a></li>
            <li id="addMovieli"><a href="addMovie.html">Add Movie</a></li>
            <li><a href="aboutUs.html">About us</a></li>
          </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            &nbsp;
            &nbsp;
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a id="loginLink" href="#myModal" data-toggle="modal" data-target="#myModal">Log-in</a></li>
          <li><a id="userLink" href="profile.html"> </a></li>
          <li><a id="logoutLink" href="#">Logout</a></li>
        </ul>
        </div>
      </nav>


      <div class="modal fade" id="myModal">
      	<div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Log-in</h4>
              </div>

              <div class="modal-body">
                <div class="tabbable"> <!-- Only required for left/right tabs -->
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Login</a></li>
                        <li><a href="#tab2" data-toggle="tab">Register</a></li>
                      </ul>
                      <div class="tab-content">

                          <div class="tab-pane active" id="tab1">
                            <div id="logPasswordErrorMsg" class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              The password is incorrect!
                            </div>
                            <div id="logBlankField" class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              Fill all the fields!
                            </div>

                            <div class="form-group">
                              <label for="loginUsername">Username</label>
                              <input class="form-control" id="loginUsername" placeholder="Enter email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input class="form-control" id="loginPassword" placeholder="Password" type="password">
                            </div>
                            <div class="modal-footer">
                              <a href="#" data-dismiss="modal" class="btn">Close</a>
                              <a href="#" class="btn btn-primary">Log-in</a>
                            </div>
                          </div>
                          <div class="tab-pane" id="tab2">
                          <div id="successMsg" class="alert alert-success fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              User succesfully added!
                            </div>
                            <div id="passwordErrorMsg" class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              The passwords do not match!
                            </div>
                            <div id="invalidMailMsg" class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              The provided email is not valid!
                            </div>
                            <div id="usernameInvalidMsg" class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              The provided user is not valid!
                            </div>
                            <div id="errorAddedMsg" class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              The user could not be added!
                            </div>
                            <div class="form-group">
                              <label for="register-username-label">Username</label>
                              <input class="form-control" id="register-username" placeholder="Enter username" type="text">
                            </div>
                            <div class="form-group">
                              <label for="register-email-label">Email</label>
                              <input class="form-control" id="register-email-input" placeholder="Enter email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="register-password1-label">Password</label>
                                <input class="form-control" id="register-password1" placeholder="Password" type="password">
                            </div>
                            <div class="form-group">
                                <label for="register-password2-label">Confirm Password</label>
                                <input class="form-control" id="register-password2" placeholder="Password" type="password">
                            </div>
                            <div class="modal-footer">
                              <a href="#" data-dismiss="modal" class="btn">Close</a>
                              <a href="#" class="btn btn-primary" id="register-button">Register</a>
                            </div>
                          </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="container">
        <div class="well">
          <div class="resultDiv">
            <h1 id="resultHeader"><?php echo $_GET["genre"]?></h1></h1>

          </div>
        </div>
      </div>

    </div>


  </body>

</hmtl>
