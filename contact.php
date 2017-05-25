<?php
  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'Website Contact Form'; 
    $to = 'luz@konviv.com'; 
    $subject = 'Message from Contact Demo ';
    
    $body ="From: $name\n E-Mail: $email\n Message:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Please enter your name';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
      $errHuman = 'Your anti-spam is incorrect';
    }
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
  } else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
  }
}
  }
?>

<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>Konviv </title>
  <meta name="keywords" content="">
  <meta name="description" content="A financial buddy in your pocket!">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <meta property="og:title" content="">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:site_name" content="">
	<meta property="og:description" content="">

  <!-- Styles -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,100,200,300,500,600,700,800" rel="stylesheet">

  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
  

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

  <script src="js/modernizr-2.7.1.js"></script>
  
</head>

<body>

    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="index.html"><img src="img/logo.png" style="width:30%;" alt="Logo"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="banks.html">Banks</a></li>
            <li><a href="impact.html">Impact</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-xs-6">
            <a href="index.html"><img src="img/logob.png" style="width:30%; margin-top:15px;" alt="Logo"></a>
          </div>
          <div class="col-xs-6 signin text-right navbar-nav2 navbar-inverse" style="margin-top:5px;">
            <a href="index.html">Home</a>&nbsp; &nbsp;<a href="about.html">About</a>&nbsp; &nbsp;<a href="banks.html">Banks</a>&nbsp; &nbsp;<a href="impact.html">Impact</a>&nbsp; &nbsp;<a href="contact.php">Contact</a>
          </div>
        </div>

  <div class="row" id="contactform" style="margin-top:60px;">
        <div class="text-center">
         <h1 class="black">Contact Us by filling out this form</h1><br />
        <p>Alternatively, you can email: luz@konviv.com</p><br />
        </div>
        </div>

        <div class="row">
        <form class="form-horizontal" role="form" method="post" action="contact.php">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
      <?php echo "<p class='text-danger'>$errName</p>";?>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
      <?php echo "<p class='text-danger'>$errEmail</p>";?>
    </div>
  </div>
  <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
      <?php echo "<p class='text-danger'>$errMessage</p>";?>
    </div>
  </div>
  <div class="form-group">
    <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
      <?php echo "<p class='text-danger'>$errHuman</p>";?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <?php echo $result; ?>  
    </div>
  </div>
</form> 

        </div>
      </div>
      </div>
    </section>
    
    <section id="be-the-third" class="pad-lg">
      <div class="container" style="margin-top:-45px;">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 text-center margin-10 wow fadeIn" data-wow-delay="0.6s">
            <h2 style="font-size:32px; margin-left:22px;">Distributed Ledgers, Smart Contracts, Artifical Intelligence, Micro-Lending, Mobile Banking... <br /><br />

            ...financial technology is on the verge of transforming the lives of billions of people who were traditionally left out of the mainstream.<br /><br />Konviv is committed to making sure these financial technologies are accessible by all and empowering to all.</h2>
          </div>
        </div>
        
      </div>
    </section>

    <section id="be-class" class="pad-sm">
      <div class="container">
        <div class="row margin-40 text-center" style="margin-top:150px;">
            <h2 class="bottommargin font-body uppercase t400" style="opacity:0;">.</h2>
         </div>
       </div>
    </section>

    <section id="press" class="pad-sm">
      <div class="container">
        <div class="row margin-30 news-container">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
            <a href="#" target="_blank">
            <img class="news-img pull-left" src="img/kate.png" style="width:120px;" alt="Testimonial">
            <br />
            <p class="black" style="font-size:21px;">"I can't wait for others to use Konviv. It was a game changer for me!"<br /><br />
            <small><em>Kate H. - April 27, 2017</em></small></p>
            </a>
            <br />
          </div>
        </div>

       <!-- Footer Links Menu -->
          <div class="row">
            <div class="col-sm-1"><a href="https://angel.co/konviv/jobs">Careers</a></div>
            <div class="col-sm-1"><a href="donate/index.html">Donate</a></div>
            <div class="col-sm-1"><a href="impact.html">Impact</a></div>
            <div class="col-sm-1"><a href="banks.html#be-class-pci">Security</a></div>
            <div class="col-sm-1"><a href="banks.html">Banks</a></div>
            <div class="col-sm-1"><a href="index.html#newsletter">Newsletter</a></div>
            <div class="col-sm-1"><a href="contact.php">Contact</a></div>
            <div class="col-sm-3" style="margin:-10px 0px -50px 50px;"><a href="http://skydeck.berkeley.edu/"><img src="img/skydeck.jpg" /></a></div>
          </div>
            <!-- End Footer Links Menu -->
      </div>

    </section>
    
    
    <footer>
      <div class="container">
        
        <div class="row">
          <div class="col-sm-8 margin-20">
            <ul class="list-inline social">
              <li>Connect with us on</li>
              <li><a href="https://twitter.com/konviv_co"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/konvivdotcom/"><i class="fa fa-facebook"></i></a></li>
            </ul>
          </div>
          

          <div class="col-sm-4 text-right">
            <p><small>Copyright &copy; 2017. All rights reserved. <br>

          </div>
        </div>
        
      </div>
    </footer>
    
    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/wow.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Mailchimp Javascript 
    =================================================== -->
    <!-- Mailchimp Popup
  ============================================= -->
  

    </body>
</html>