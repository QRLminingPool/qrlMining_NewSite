<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRL Mining</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css">
    <link rel="stylesheet" href="webicons/webicons.css">
    <link rel="shortcut icon" type="image/png" href="assets/qrlmininggrey.png"/>
    <link rel="shortcut icon" type="image/png" href="http://qrlmining.fr1t2.com/assets/qrlmininggrey.png"/>

  <?php include('php/Poolscript.php'); ?>
<link rel="stylesheet" href="css/qrlmining.css">

  </head>
  
  <body>
  
    <div class="grid-container full">
      <!-- main site content -->
      <div class="hero-full-screen">
      <!-- topbar -->
	  

  <!--<div class="top-content-section">
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
         <!-- <li class="menu-text"><img src="" alt=""></li> 
	  <li><a href="index.php">Home</a></li>
          <li><a href="pool.html">Pool</a></li>

       
          <li><a href="pages/getting_started.html">Getting Started</a></li>
		  <!--  Not yet
          <li><a href="">FAQ</a></li>
		  
          <li><a href="pages/pool_blocks.html">Pool Blocks</a></li>
          <li><a href="pages/payments.html">Payments</a></li>
          <li><a href="pages/support.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
        </ul>
      </div>
    </div>
  </div>
-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span id="coinName"></span> QRL Mining</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="active"><a class="hot_link" data-page="home.html" href="#">
                    <i class="fa fa-home"></i> Home
                </a></li>
				
				<li><a class="hot_link" data-page="pool.html" href="pool.html">
                    <i class="fa fa-inbox"></i> Pool
                </a></li>

                <li><a class="hot_link" data-page="getting_started.html" href="pages/getting_started.html">
                    <i class="fa fa-rocket"></i> Getting Started
                </a></li>

                <li><a class="hot_link" data-page="pool_blocks.html" href="pool.html#pool_blocks">
                    <i class="fa fa-cubes"></i> Pool Blocks
                </a></li>

                <li><a class="hot_link" data-page="payments.html" href="pool.html#payments">
                    <i class="fa fa-paper-plane-o"></i> Payments
                </a></li>

                <li><a class="hot_link" data-page="support.html" href="pool.html#support">
                    <i class="fa fa-comments"></i> Support
                </a></li>

            </ul>
            <div id="stats_updated">Stats Updated &nbsp;<i class="fa fa-bolt"></i></div>
        </div>

    </div>
</div>
  
  
  
        <div class="middle-content-section">

<?php 
if( isset($_GET['unsubscribe']) ) { 
  include('php/unsubscribe.php'); 
} else {
    include('php/signup.php');
}
if( isset($_GET['sent']) && isset($_GET['email']) ) { include('conf/thanks.php'); } 
if( isset($_GET['removed']) && isset($_GET['email']) ) { include('conf/goodby.php'); } 
?>

        </div>
        <div class="grid-x grid-padding-x">
          <div class="small-12 cell">
            <script type="text/javascript">
              baseUrl = "https://widgets.cryptocompare.com/";
              var scripts = document.getElementsByTagName("script");
              var embedder = scripts[ scripts.length - 1 ];
              var cccTheme = {"General":{"background":"#000000","float":"left"},"BigPrice":{"color":"#eaa221","symbolColor":"#56347c"},"SmallPrice":{"color":"eaa221","symbolColor":"#56347c"},"Chart":{"labelBackground":"#1d2951","labelColor":"#eaa221","animation":true,"fillColor":"rgba(86,52,124,.23)","borderColor":"#a50b5e"}};
              (function (){
                var appName = encodeURIComponent(window.location.hostname);
                if(appName==""){appName="local";}
                var s = document.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                var theUrl = baseUrl+'serve/v1/coin/header?fsym=QRL&tsyms=USD,EUR,BTC,KRW';
                s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                embedder.parentNode.appendChild(s);
              })();
            </script>
          </div>
        </div>
        <div class="bottom-content-section" data-magellan data-threshold="0">
          <a href="#main-content-section">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"></path></svg>
          </a>
        </div>
      </div>
      <!-- end hero full screen -->
      <div class="mining">
        <div id="main-content-section" data-magellan-target="main-content-section">
        <!-- your content goes here -->


          <div class="grid-x grid-padding-x">

                <div id="stats_updated">Stats Updated &nbsp;<i class="fa fa-bolt"></i></div>
              
          <div class="container">
            <div id="page"></div>
            <p id="loading" class="text-center"><i class="fa fa-circle-o-notch fa-spin"></i></p>
          </div>
      </div>

          <div class="grid-x grid-padding-x">
          <!-- TimeLine -->
            <div class="small-10 small-offset-1 cell">
              <div class="timeline">
                <div class="timeline-item">
                  <div class="timeline-icon">
                    <img src="" class="" height="22" width="22" alt="">
                  </div>
                  <div class="timeline-content right">
                    <p class="timeline-content-date">What Is QRL Mining <span class="timeline-content-month"></span></p>
                    <p>The QRL Mining Pool is a Stratum server mining on the QRL blockchain. QRL uses the Cryptonight mining algorithm to preform hashing functions. This pool combines workers together to allow a greater chance at winning a block</p>
                  </div>
                </div>
                <div class="timeline-item">
                  <div class="timeline-icon">
                    <img src="" class="" height="22" width="22" alt="">
                  </div>
                  <div class="timeline-content">
                    <p class="timeline-content-date">QRL (Quantum Resistant Ledger): <span class="timeline-content-month"></span></p>
                    <p>
                      <ul class="no-bullet">
                        <li>Coin Symbol: <strong>QRL</strong></li>
                        <li>Website: <a href="https://theqrl.org/" target="_blank">https://theqrl.org/</a></li>
                        <li>Block Explorer: <a href="https://explorer.theqrl.org" target="_blank">Explorer.theQRL.org</a></li>
                        <li> <a href="https://wallet.theqrl.org" target="_blank">QRL Wallet</a></li>
                        <li>GitHub: <a href="https://github.com/theQRL" target="_blank">TheQRL</a></li>
                        <li>Chat: <a href="https://discord.gg/RcR9WzX" target="_blank">Discord</a></li>
                        <li>Announcment: <a href="https://bitcointalk.org/index.php?topic=1730273.0" target="_blank">Bitcoin Talk</a></li>
                      </ul>
                    </p>
                  </div>
                  <div class="timeline-item">
                    <div class="timeline-icon">
                      <img src="" class="" height="22" width="22" alt="">
                    </div>
                    <div class="timeline-content right">
                      <p class="timeline-content-date"><span class="timeline-content-month"></span></p>
                      <p class="timeline-content-date">Why should I use a pool? <span class="timeline-content-month"></span></p>
                      <p>Mining is becoming more and more popular by the day and new people are joining everyday.  More importantly, large scale mining enterprises are entering the network with massive hashing power.  This ensures that single miners will very rarely (if ever) win a block.  A mining pool lets smaller miners band together to share their hashrate.  In this way, the pool can win blocks against the big miners and distribute to the pool members based upon their given power.</p>
                    </div>
                  </div>
                  <div class="timeline-item">
                    <div class="timeline-icon">
                      <img src="" class="" height="22" width="22" alt="">
                    </div>
                    <div class="timeline-content">
                      <p class="timeline-content-date">Why did you make a pool? <span class="timeline-content-month"></span></p>
                      <p>We want the QRL network to succeed.  We think that is best accomplished by having QRL enthusiasts be the backbone of the network and win the appropriate rewards.  We don't want botnets and business enterprises getting everything.  Plain and simple, we want the little guy to get their share as well.</p>
                    </div>
                  </div>
                  <div class="timeline-item">
                    <div class="timeline-icon">
                      <img src="" class="" height="22" width="22" alt="">
                    </div>
                    <div class="timeline-content right">
                      <p class="timeline-content-date">Mining seems complicated... <span class="timeline-content-month"></span></p>
                      <p>Mining software can be a bit complicated but our pool will help with all of that.  Take a look at the site for an array of helpful tutorials on getting your miner going.  If you are still having problems, jump into the <a href="https://discord.gg/ceTcsdv">discord chat</a>and we can walk you through the steps.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end timeline -->
            </div>
          </div>
          <div class="marketing-site-features grey-trans" data-equalizer>
            <h2 class="marketing-site-features-headline">QRL Mining Pool Features</h2>
            <hr>
            <p class="marketing-site-features-subheadline subheader"></p>
            <div class="grid-x grid-padding-x">
              <div class="small-12 medium-4 cell" data-equalizer-watch>
                <i class="fa" aria-hidden="true"></i>
                <h4 class="marketing-site-features-title">First QRL Pool</h4>
                <p class="marketing-site-features-desc"> While there may be other choices when it comes to pools, this is the <strong>FIRST</strong> QRL pool on the market. We have been mining QRL as a pool since the testnet release of pool software; some of us were even testing during QRL’s alpha phase. Our team was up and running long before that developing strategies and enhancements to reward our community further. Our first mover advantage makes us the most stable and developed pool you are going to get.</p>
              </div>
              <div class="small-12 medium-4 cell" data-equalizer-watch>
                <i class="fa" aria-hidden="true"></i>
                <h4 class="marketing-site-features-title">Community Developed </h4>
                <p class="marketing-site-features-desc">Founded on community involvement, we believe that we are stronger as a group. The development of this pool will be driven by the involvement and will of our community. We will have a variety of ways for members to vote and push for new enhancements that they care about. We are aiming to be an interactive community that empowers its members to make real changes.</p>
              </div>
              <div class="small-12 medium-4 cell" data-equalizer-watch>
                <i class="fa " aria-hidden="true"></i>
                <h4 class="marketing-site-features-title">Future Focused</h4>
                <p class="marketing-site-features-desc"> QRL will hard fork to PoS in Q3 2018 which may impact your decision to invest in equipment. Other pools are solely focused on QRL and will leave you hanging when the network moves to PoS, as they take their profits and leave. Our pool is focused on serving the community and ensuring their investment is maximized. As part of our guiding principles, we will focus on QRL mining in the beginning (we really do believe in the future of this coin) and then implement coin switching mechanisms into our pool. We will also develop tools to track price trends and news of other coins to give members a better understanding of the coin market. That way, when PoS rolls out, our pool will seamlessly transition to a modern, reward maximizing coin pool.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
<!-- footer -->
<footer class="footer">
    <ul class="no-bullet">
      <li>&copy; QRLmining 2018</li>
    </ul>
</footer>

      <!-- Sticky Social Bar -->
      <ul class="sticky-social-bar">
        <li class="social-icon">
          <a href="https://discord.gg/ceTcsdv">
            <i class="fa fi-social-discord" aria-hidden="true">
              <img src="assets/icons/discord-white.png" class="fa">
            </i>
            <span class="social-icon-text">Discord</span>
          </a>
        </li> 
        <li class="social-icon">
          <a href="https://twitter.com/MiningQrl">
            <i class="fa fi-social-twitter" aria-hidden="true"></i>
          <span class="social-icon-text">Twitter</span>
          </a>
        </li>
        <li class="social-icon">
          <a href="https://medium.com/@MiningQrl">
            <i class="fa fi-social-medium" aria-hidden="true"></i>
            <span class="social-icon-text">Medium</span>
          </a>
        </li>
        <li class="social-icon">
          <a href="http://www.reddit.com/r/QRL">
            <i class="fa fi-social-reddit" aria-hidden="true"></i>
            <span class="social-icon-text">Reddit</span>
          </a>
        </li>
      </ul>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.equalizer.js"></script>
    <script src="js/foundation.core.js"></script>
    <script src="js/foundation.util.mediaQuery.js"></script>
    <script src="js/foundation.util.imageLoader.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
