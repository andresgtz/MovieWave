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

         <!-- Modal Login -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Log-in</h4>
                  </div>
                  <div class="modal-body">
                     <div class="tabbable">
                        <!-- Only required for left/right tabs -->
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
         <!-- Modal Edit Info -->
         <div class="modal fade" id="modalAboutMe">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">About Me</h4>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                       <textarea class="form-control" rows="10" id="editAbout"></textarea>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <a href="#" data-dismiss="modal" class="btn">Close</a>
                     <a id="saveAboutMe" href="#" class="btn btn-primary">Save</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="container">
            <div class="well">
               <div class="row allAboutMe">
                  <div class="profilesHeader col-md-3">
                     <h1 id="h1movieTitle"><?php echo $_GET["movieTitle"]?></h1>
                     <img height="180" width="180" src="images/movie.jpeg"/>
                  </div>
                  <div class="col-md-3 divMovieInfo">
                      <label>Movie Title:</label>
                      <p id="movieTitle"></p>
                      <label>Year:</label>
                      <p id="movieYear"></p>
                      <label>Genre:</label>
                      <p id="movieGenre"></p>
                      <label>Actors:</label>
                      <p id="movieActors"></p>
                      <label>Rating:</label>
                      <p id="movieRating"></p>
                  </div>
               </div>
               <br></br>
               <div class="row commentSection">
                 <h3>Comments</h3>
                  <div id="comments">
                      <form accept-charset="UTF-8" action="" method="POST">
                         <textarea class="form-control" id="text" name="text" placeholder="Type in your message" rows="5"></textarea>
                         <label>Rating: </label>
                         <select name="ratingSelect">
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           <option>5</option>
                         </select><br>
                         <button class="btn btn-info" type="submit">Comment!</button>
                      </form>
                  </div>
                  <div id="noLoginMsg">
                      <h5>Please login to comment.</h5>
                  </div>
                  <div id="userComments">

                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</hmtl>
