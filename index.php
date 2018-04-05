<!DOCTYPE html>
<html>
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

    <script src="js/vendor/jquery.js"></script>




    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.0/jquery.timeago.min.js"></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>

    <script src="config.js"></script>
    <script src="custom.js"></script>
    <link href="custom.css" rel="stylesheet">

    <style>
        #coinName{
            text-transform: capitalize;
        }
        body {
            padding-top: 90px;
            padding-bottom: 80px;
            overflow-y: scroll;
        }
        .container{
            font-size: 1.2em;
        }
        #loading{
            font-size: 2em;
        }
        .stats {
            margin-bottom: 10px;
            margin-top: 5px;
            color: #d8d8d8;
        }
        .stats:last-child{
            width: auto;
        }
        .stats > h3 > i{
            font-size: 0.80em;
            width: 21px;
            color: #eaa221;
        }
        .stats > div{
            padding: 5px 0;
        }
        .stats > div > .fa {
            width: 25px;
        }
        .stats > div > span:first-of-type{
            font-weight: bold;
        }
        #stats_updated{
            opacity: 0;
            float: right;
            margin-left: 30px;
            color: #000000;
            line-height: 47px;
            font-size: 0.9em;
        }

        footer{
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
        }

        footer > div{
            margin: 10px auto;
            text-align: center;
        }

    </style>

    <link rel="stylesheet" href="css/qrlmining.css">
</head>
<body>
<script>


    var docCookies = {
        getItem: function (sKey) {
            return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
        },
        setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
            if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
            var sExpires = "";
            if (vEnd) {
                switch (vEnd.constructor) {
                    case Number:
                        sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
                        break;
                    case String:
                        sExpires = "; expires=" + vEnd;
                        break;
                    case Date:
                        sExpires = "; expires=" + vEnd.toUTCString();
                        break;
                }
            }
            document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
            return true;
        },
        removeItem: function (sKey, sPath, sDomain) {
            if (!sKey || !this.hasItem(sKey)) { return false; }
            document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + ( sDomain ? "; domain=" + sDomain : "") + ( sPath ? "; path=" + sPath : "");
            return true;
        },
        hasItem: function (sKey) {
            return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
        }
    };

    $.fn.update = function(txt){
        var el = this[0];
        if (el.textContent !== txt)
            el.textContent = txt;
        return this;
    };

    function updateTextClasses(className, text){
        var els = document.getElementsByClassName(className);
        for (var i = 0; i < els.length; i++){
            var el = els[i];
            if (el.textContent !== text)
                el.textContent = text;
        }
    }

    function updateText(elementId, text){
        var el = document.getElementById(elementId);
        if (el.textContent !== text){
            el.textContent = text;
        }
        return el;
    }


    var currentPage;
    var lastStats;

    function getReadableCoins(coins, digits, withoutSymbol){
        var amount = (parseInt(coins || 0) / coinUnits).toFixed(digits || coinUnits.toString().length - 1);
        return amount + (withoutSymbol ? '' : (' ' + lastStats.config.symbol));
    }

    function formatDate(time){
        if (!time) return '';
        return new Date(parseInt(time) * 1000).toLocaleString();
    }

    function formatPaymentLink(hash){
        return '<a target="_blank" href="' + transactionExplorer + hash + '">' + hash + '</a>';
    }

    function getPaymentRowElement(payment, jsonString){

        var row = document.createElement('tr');
        row.setAttribute('data-json', jsonString);
        row.setAttribute('data-time', payment.time);
        row.setAttribute('id', 'paymentRow' + payment.time);

        row.innerHTML = getPaymentCells(payment);

        return row;
    }


    function parsePayment(time, serializedPayment){
        var parts = serializedPayment.split(':');
        return {
            time: parseInt(time),
            hash: parts[0],
            amount: parts[1],
            fee: parts[2],
            mixin: parts[3],
            recipients: parts[4]
        };
    }

    function renderPayments(paymentsResults){

        var $paymentsRows = $('#payments_rows');

        for (var i = 0; i < paymentsResults.length; i += 2){

            var payment = parsePayment(paymentsResults[i + 1], paymentsResults[i]);

            var paymentJson = JSON.stringify(payment);

            var existingRow = document.getElementById('paymentRow' + payment.time);

            if (existingRow && existingRow.getAttribute('data-json') !== paymentJson){
                $(existingRow).replaceWith(getPaymentRowElement(payment, paymentJson));
            }
            else if (!existingRow){

                var paymentElement = getPaymentRowElement(payment, paymentJson);

                var inserted = false;
                var rows = $paymentsRows.children().get();
                for (var f = 0; f < rows.length; f++) {
                    var pTime = parseInt(rows[f].getAttribute('data-time'));
                    if (pTime < payment.time){
                        inserted = true;
                        $(rows[f]).before(paymentElement);
                        break;
                    }
                }
                if (!inserted)
                    $paymentsRows.append(paymentElement);
            }

        }
    }

    function pulseLiveUpdate(){
        var stats_update = document.getElementById('stats_updated');
        stats_update.style.transition = 'opacity 100ms ease-out';
        stats_update.style.opacity = 1;
        setTimeout(function(){
            stats_update.style.transition = 'opacity 7000ms linear';
            stats_update.style.opacity = 0;
        }, 500);
    }

    window.onhashchange = function(){
        routePage();
    };


    function fetchLiveStats() {
        $.ajax({
            url: api + '/live_stats',
            dataType: 'json',
            cache: 'false'
        }).done(function(data){
            pulseLiveUpdate();
            lastStats = data;
            updateIndex();
            currentPage.update();
        }).always(function () {
            fetchLiveStats();
        });
    }


    var xhrPageLoading;
    function routePage(loadedCallback) {

        if (currentPage) currentPage.destroy();
        $('#page').html('');
        $('#loading').show();

        if (xhrPageLoading)
            xhrPageLoading.abort();

        $('.hot_link').parent().removeClass('active');
        var $link = $('a.hot_link[href="' + (window.location.hash || '#') + '"]');

        $link.parent().addClass('active');
        var page = $link.data('page');

        xhrPageLoading = $.ajax({
            url: 'pages/' + page,
            cache: false,
            success: function (data) {
                $('#loading').hide();
                $('#page').show().html(data);
                currentPage.update();
                if (loadedCallback) loadedCallback();
            }
        });
    }

    function updateIndex(){
        updateText('coinName', lastStats.config.coin);
        updateText('poolVersion', lastStats.config.version);
    }

    $(function(){
        $.get(api + '/stats', function(data){
            lastStats = data;
            updateIndex();
            routePage(fetchLiveStats);
        });
    });
</script>

<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand"><span id="coinName"></span> Mining</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="active"><a class="hot_link" data-page="home.html" href="#">
                    <i class="fa fa-home"></i> Home
                </a></li>

                <li><a class="hot_link" data-page="getting_started.html" href="#getting_started">
                    <i class="fa fa-rocket"></i> Getting Started
                </a></li>

                <li><a class="hot_link" data-page="pool_blocks.html" href="#pool_blocks">
                    <i class="fa fa-cubes"></i> Pool Blocks
                </a></li>

                <li><a class="hot_link" data-page="payments.html" href="#payments">
                    <i class="fa fa-paper-plane-o"></i> Payments
                </a></li>

                <li><a class="hot_link" data-page="support.html" href="#support">
                    <i class="fa fa-comments"></i> Support
                </a></li>

            </ul>
           
        </div>

    </div>
</div>
<div class="grid-container full mining">
<div class="grid-x grid-padding-x">
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
        <div class="small-12 cell">
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

<footer>
    <div class="text-muted">
     <div id="stats_updated"> Updated &nbsp;<i class="fa fa-bolt"></i></div>
        Powered by <a target="_blank" href="//github.com/zone117x/node-cryptonote-pool"><i class="fa fa-github"></i> node-cryptonote-pool</a>
        <span id="poolVersion"></span>
        created by Matthew Little & open sourced under the <a href="http://www.gnu.org/licenses/gpl-2.0.html">GPL</a>
    </div>
</footer>
    <script src="js/foundation.equalizer.js"></script>
    <script src="js/foundation.core.js"></script>
    <script src="js/foundation.util.mediaQuery.js"></script>
    <script src="js/foundation.util.imageLoader.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</div>

</body>
</html>