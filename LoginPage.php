<html>

  <head>
    <title>Login Page</title>
    <link href="Professor.css" rel="stylesheet" type="text/css" />
    <!--<script src="jquery.min.js"></script>-->
    <!--<script src="LoginPage.js"></script>-->
  </head>

  <body>
    <div class="ublogo">
      <img src="ub-logo.png" />
    </div>

    <div>
    	<p class="welcome_text">Welcome to TA's Feedback System</p>
    </div>

    <div>
      <form action="CoursePage.php" method="post">  
  
        <label class="label_input">UBIT:&nbsp</label><input type="text" name="username" class="text_input"/>
        <label class="label_input">Password:&nbsp</label><input type="password" name="password" class="text_input"/>  
  
        <!--<div id="login_control">-->
            <input class="login_button" type="submit" id="btn_login" value="Login"/>
            <!--<input class="login_button" type="button" id="btn_login" value="Login" onclick="window.location='CoursePage.html'"/>-->
        <!--</div>-->
      </form>

    </div>

  </body>

</html>