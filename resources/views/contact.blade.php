<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Project Schmetterling!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="img/schmetterling2.jpg" width="50" height="60" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                    <li>
                        <a href="booking.html">Booking</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <html>
<div align="center"><h1>Contact</h1></div>

<form action="formular.php" method="post" >
<div align="center">
<table border="0" cellspacing="0" cellpadding="2">
  <tbody>
   
    <tr>
      <td>Title:</td>
      <td>
        <input checked="checked" name="Anrede" type="radio" value="Herr" /> Mr
        <input name="Anrede" type="radio" value="Frau" /> Mrs
      </td>
    </tr>
    <tr>
      <td>First name:</td>
      <td>
        <input required maxlength="50" name="First name" placeholder="Max" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td>Last name:</td>
      <td>
        <input required name="Last name" placeholder="Mustermann" size="45" type="text" />
      </td>
    </tr>
	<tr>
      <td>Street:</td>
      <td>
        <input required maxlength="50" name="Street" size="45" type="text" />
      </td>
    </tr>
	<tr>
      <td>Housenumber:</td>
      <td>
        <input required maxlength="50" name="Housenumber" pattern="[0-9]+[a-z]{0,1}" size="45" type="text" />
      </td>
    </tr>
    <tr>
    <td>Postcode:</td>
    <td>
      <input required maxlength="5" name="Postcode" pattern="[0-9]{5}" size="7" type="text" />
    </td>
    </tr>
    <tr>
      <td>City:</td>
      <td>
        <input required maxlength="50" name="City" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td>Country:</td>
      <td>
        <input required name="Country" size="45" type="text" value="Germany" />
      </td>
    </tr>
    <tr>
      <td>Email:</td>
      <td>
        <input required name="Email" size="45" type="text" />
      </td>
    </tr>
    <tr>
      <td>Subject:</td>
      <td>
        <input name="Subject" size="45" type="text" />
      </td>
    </tr>
   
    <tr>
      <td>Message:</td>
      <td><textarea cols="30"  rows="5" placeholder="Your message" name="Message"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Send" />
      </td>
    </tr>
	
	
	
  </tbody>
</table>
</div>
</form>

	
	
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <p>Copyright &copy; Project Schmetterling</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
