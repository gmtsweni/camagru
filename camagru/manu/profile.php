<!DOCTYPE html>
<html>
    <head>
            <title>Profile page</title>
        <link rel="stylesheet" type="text/css" href="timeline.css">
    </head>
    <body class="pro_bg">
            <header>
                    <div class="nav">
                            <ul>
                              <li class="home"><a  href="Home.php">Home</a></li>
                              <li class="profile"><a class="active" href="profile.php ">profile</a></li>
                              <li  class="contact"><a href="logout.php">Logout</a></li>
                            </ul>
                          </div>
                </header>
                <div class="card">
          <img src="bg.jpg" href="" alt="profile picture" style="width:100%">
          <h1>User's name</h1>
          <p class="title"> User's details</p>
          <br/>
          <input type="file" name="file">
					<a type="submit" class="booth-capture-button" name="upload" value="upload">upload</a>
					<a type="submit" class="booth-capture-button" name="display" value="display">view</a>
          <div>   </div>
          <li class="okbtn"><a href="edit.php">Edit profile</a></li>
        <div>   </div>
          <br />
        </div>
        <footer>
            <div class="nav">
                    <ul>
                            <!--button class="btn btn-1 btn-1a">Upload</button-->
                            &copyright
                        </ul>
                  </div>   
       </footer>
    </body>
</html>