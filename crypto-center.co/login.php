<?php include("./methods/CryptoCenter.php"); ?>
<?php 
    if(isset($_POST["login-btn"])){
        if(isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["password"]) && !empty($_POST["password"])){

            $email = $_POST["email"];
            $password = $_POST["password"];

            CryptoCenter::login($email, $password);

        }
    }

    // if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    //     header("Location: index.php"); // Redirect to the home page or any other desired page
    //      // Stop executing the current script
    // }else{
    //     header("Location: login.php"); // Redirect to the home page or any other desired page

    // }

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from crypto-center.co/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jun 2023 17:08:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
 <meta name="google-site-verification" content="qA_BfUBgaQozUj1YG5TSlGVHz2k6x7yPhNLUGNBceog" />
<title>
    CRYPTO CENTER | 2023
</title>
<link rel="icon" sizes="16x16" href="assets/img/CryptoCenter.png">
<meta http-equiv="X-UA-Compatible"
      content="IE=edge">
<meta content="width=device-width, initial-scale=1.0"
      name="viewport"/>
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css"> 
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="assets/css/theme-dark.css" type="text/css" media="">
<link rel="stylesheet" href="assets/css/select.min.css" type="text/css" media="">
<link rel="stylesheet" href="assets/css/traderoom-style.css" type="text/css" media="">
<link rel="stylesheet" href="assets/css/layout-styles.css" type="text/css" media="">
<link rel="stylesheet" href="assets/css/slick-theme.css" type="text/css" media="">
</head>

<body class="page-header-fixed login">
 
    <div>

        <div class="container-fluid" style="background: radial-gradient(circle, #000428, #004e92)";>
            <nav class="navbar navbar-default navigation-clean-button" style="background-color:transparent;">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand navbar-link logo-all-pages" href="index.php"><img style="width: 250px" src="assets/img/1.png"></a>
                        <a class="navbar-brand navbar-link logo-traderoom" href="index.php"><img src="assets/img/1.png"></a>
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav main-menu">
                            <li role="presentation">
                                <div class="dropdown">
                                    <a href="index.php">
                                      <button class="dropbtn">PLATFORMS</button></a>
                                      <div class="dropdown-content">
                            <a href="mining.php">MINING</a>
                            <a href="login.php">TRADING</a>
                                     </div>
                                  </div>    
                            </li>
                            <li role="presentation"><a href="about.php" >About	Us</a></li>
                            <li role="presentation"><a href="accounts.php">Account types</a></li>
                            <li role="presentation"><a href="contact.php">Contact</a></li>
                        </ul>
                                                <p class="navbar-text navbar-right actions">
                            <a class="navbar-link login" href="login.php" >Sign in</a> 
                            <a class="live-acc" role="button" href="register.php"><span>Sign Up</span></a></p>
                        
                        
                                            </div>
                                    </div>
            </nav>
        </div>
    </div>   
    <div>
 
 <!-- div class="market-prices"></div -->
        
 <div class="content">
 <div class="content login-page" style="background: radial-gradient(circle, #000428, #004e92)";>">
<div class="container">
           <div class="col-md-12 right-login">
        <div class="panel panel-default ">
            <div class="panel-body">
                <h3> Sign in</h3><br><br>
                
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Email
                                <input type="email" class="form-control" name="email" value="">
                                </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Password
                                <input type="password" class="form-control" name="password" >
                                </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit"
                                    class="live-acc register-button"
                                    style="margin-right: 15px;"
                                    name="login-btn">
                                <span>Login</span>
                            </button>
                        </div>
                    </div>
                      
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

</div>
    <div class="footer-dark">
        <nav class="navbar footer-menu-content">
        <div class="container">
	<div class="footer-column">
		<img style="width:200px;" src="assets/img/1.png"><br><br>
	</div>
	<div class="footer-column">
		<h3>Quick Link</h3>
         <ul>
           <li><a href="index.php">Platforms</a></li>
           <li><a href="about.php">About us</a></li>
           <li><a href="accounts.php">Account Types</a></li>
           <li><a href="contact.php">Contact</a></li>
         </ul>
	</div>
	<div class="footer-column">
		<h3>Resources</h3>
         <ul>
           <li><a href="terms.php">Terms and Conditions</a></li>
           <li><a href="privacy.php">Privacy policy</a></li>
         </ul>
	</div>
	<div class="footer-column">
		<h3>We accept following payment systems</h3>
         <ul>
           <li><img src="assets/img/Visa.png"/></li>
           <li><img src="assets/img/Mastercard.png"/></li>
           <li><img src="assets/img/Bitcoin.png"/></li>
         </ul>
	</div>
   
    
    </div>
        </nav>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 item text" style="font-size:10px;">
                        <!-- p style="line-height: 20px; color: #fff; font-size: 9px; text-align: center;">GENERAL RISK WARNING: Crypto TRADING IS RISKY; READ OUR RISK DISCLOSURE BEFORE OPENING AN ACCOUNT. Trading is allowed to a trader who is above 18 years old and subjected to due dilligence of trader`s documents and KYC checks</p -->
                    </div>
                </div>
            </div>
        </footer>
        <footer></footer>
    </div>
    <div></div>

                           
   
  <script src="../cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.8.23.custom.min.js"></script>
    <script src="assets/js/jquery.kinetic.min.js"></script>
    <script src="assets/js/jquery.mousewheel.min.js"></script>
    <script src="assets/js/jquery.smoothdivscroll-1.3-min.js"></script>
      <script src="assets/js/script.js.html"></script>
     <script src="assets/js/slick.js"></script>
 
<script type="text/javascript">
	 $(document).ready(function () {
           var $balance= $("#balance");
           var $balancebtc = $("#balance-btc");
           var $invested = $("#invested");
           var $profit = $("#profit");
           $balancebtc.load("balancebtc");
    
             setInterval(function () {
                 $balance.load("balance");
               $balancebtc.load("balancebtc");
                 $invested.load("invested");
                 $profit.load("profit");
             }, 3000); 
 function loadChirps() {
   var ajax = new XMLHttpRequest();
   var  method = "GET";
   var url = "chot-t.html";
   var asynchronous = true;
   ajax.open(method, url, asynchronous);
   ajax.send();

   ajax.onreadystatechange = function()
   {
      if (this.readyState == 4 && this.status == 200)
        {
         
        
        }
   }
   }
  function loadChirpss() {
   var ajax = new XMLHttpRequest();
   var  method = "GET";
   var url = "rates.html";
   var asynchronous = true;
   ajax.open(method, url, asynchronous);
   ajax.send();

   ajax.onreadystatechange = function()
   {
      if (this.readyState == 4 && this.status == 200)
        {
         
        
        }
   }
   }
    setInterval(function () {
        loadChirps();
    }, 1000);
var isActive = false;

$(".js-menu").on("click", function() {
    if (isActive) {
        $(this).removeClass("active");
        $("body").removeClass("menu-open");
    } else {
        $(this).addClass("active");
        $("body").addClass("menu-open");
    }

    isActive = !isActive;
});

        });
        function calchyc() {
          var THS = document.getElementById("hashCapacityBTC").value;
          
          
        //   var btcPrice = document.getElementById("btcprice").value;
        //   console.log(btcPrice);
          var priceTotal = (THS * 50).toFixed(2);
          document.getElementById("hashPrice").innerHTML = priceTotal;
          var dailyProfit = 0.005;
          if(THS < 50){
                   dailyProfit = (priceTotal * 0.005).toFixed(2);
              }
              else if(THS >= 50 && THS < 200){
                   dailyProfit = (priceTotal * 0.0075).toFixed(2);
              }
              else if(THS >= 200 && THS < 500){
                   dailyProfit = (priceTotal * 0.01).toFixed(2);
              }
              else if(THS >= 500 && THS < 2000){
                   dailyProfit = (priceTotal * 0.015).toFixed(2);
              }
              else{
                  dailyProfit = (priceTotal * 0.025).toFixed(2);
              }
                    
             
                    
          
          
          document.getElementById("dailyProfitEuro").innerHTML = parseFloat(dailyProfit);
          var dpe = document.getElementById("dailyProfitEuro").innerHTML = parseFloat(dailyProfit);
          document.getElementById("dailyProfitBTC").innerHTML = parseFloat(dpe / 56361).toFixed(6);
          
         
         
        }
        // Disable inspect element
// $(document).bind("contextmenu",function(e) {
//   e.preventDefault();
// });
// $(document).keydown(function(e){
//   if(e.which === 123){
//     return false;
// }
// });
	</script>

<script>
    window._token = '46SpXbwRPOrR1KvkMGvvoWX3YoTMAEoKNh1s1PQf';
</script>

<script>
    $(document).ready(function () {
    
           $('.slider-2').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 10000,
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    cssEase: 'linear'
  });
        $(".notifications-menu").on('click', function () {
            if (!$(this).hasClass('open')) {
                $('.notifications-menu .label-warning').hide();
                $.get('internal_notifications/read');
            }
        });
	$('#register').click(function() {
            $('#myModal').modal();
        });
        $('#deposit').click(function() {
            $('#myModal').modal();
        });



    });
</script>
 


  </body>


<!-- Mirrored from crypto-center.co/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jun 2023 17:08:24 GMT -->
</html>