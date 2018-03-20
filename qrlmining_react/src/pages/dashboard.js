import React, { Component } from 'react';
import "../css/foundation.css";
import "../css/app.css";
import "../css/qrlmining.css";
import "../css/dashboard.css";


class Dashboard extends Component {
  render() {
    return (
	<div>
		<div id="siteInfo">
		{/* Description or information about this pool */}
</div>

<div class="row">
    <div class="col-md-4 stats">
        <h3>Network</h3>
        <div><i class="fa fa-tachometer"></i> Hash Rate: <span id="networkHashrate"></span></div>
        <div><i class="fa fa-clock-o"></i> Block Found: <span id="networkLastBlockFound"></span></div>
        <div><i class="fa fa-unlock-alt"></i> Difficulty: <span id="networkDifficulty"></span></div>
        <div><i class="fa fa-bars"></i> Blockchain Height: <span id="blockchainHeight"></span></div>
        <div><i class="fa fa-money"></i> Last Reward: <span id="networkLastReward"></span></div>
        <div><i class="fa fa-paw"></i> Last Hash: <a id="lastHash" target="_blank"></a></div>
    </div>

    <div class="col-md-4 stats">
        <h3>Our Pool</h3>
        <div><i class="fa fa-tachometer"></i> Hash Rate: <span id="poolHashrate"></span></div>
        <div><i class="fa fa-clock-o"></i> Block Found: <span id="poolLastBlockFound"></span></div>
        <div><i class="fa fa-users"></i> Connected Miners: <span id="poolMiners"></span></div>
        <div><i class="fa fa-gift"></i> Donations: <span id="poolDonations"></span></div>
        <div><i class="fa fa-money"></i> Total Pool Fee: <span id="poolFee"></span></div>
        <div><i class="fa fa-history"></i> Block Found Every: <span id="blockSolvedTime"></span> (est.)</div>
    </div>

    <div class="col-md-4 stats">
        <h3 id="marketHeader">Market</h3>
        <div class="marketFooter">Updated: <span id="marketLastUpdated"></span></div>
        <div class="marketFooter">Powered by <a href="https://www.cryptonator.com/">Cryptonator</a></div>
    </div>
</div>

<hr />

<div id="miningProfitCalc">
    <h3>Estimate Mining Profits</h3>
    <div id="calcHashHolder">
        <div class="input-group">
            <input type="number" class="form-control" id="calcHashRate" placeholder="Enter Your Hash Rate" />
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="calcHashDropdown">
                    <span id="calcHashUnit" data-mul="1">KH/s</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu" id="calcHashUnits">
                    <li><a href="#" data-mul="0">H/s</a></li>
                    <li><a href="#" data-mul="1">KH/s</a></li>
                    <li><a href="#" data-mul="2">MH/s</a></li>
                </ul>
            </div>
            <span class="input-group-addon">=</span>
            <span class="input-group-addon" id="calcHashResultsHolder"><span id="calcHashAmount"></span> <span id="calcHashSymbol"></span>/day</span>
        </div>
    </div>
</div>

<hr />

<div class="stats">
    <h3>Your Stats & Payment History</h3>

    <div class="input-group">
        <input class="form-control" id="yourStatsInput" type="text" placeholder="Enter Your Address" />
        <span class="input-group-btn"><button class="btn btn-default" type="button" id="lookUp">
            <span><i class="fa fa-search"></i> Lookup</span>
            <span><i class="fa fa-refresh fa-spin"></i> Searching...</span>
        </button></span>
    </div>

    <div id="addressError"></div>
    <div class="yourStats"><i class="fa fa-key"></i> Address: <span id="yourAddressDisplay"></span></div>
    <div class="yourStats"><i class="fa fa-bank"></i> Pending Balance: <span id="yourPendingBalance"></span></div>
    <div class="yourStats"><i class="fa fa-money"></i> Total Paid: <span id="yourPaid"></span></div>
    <div class="yourStats"><i class="fa fa-clock-o"></i> Last Share Submitted: <span id="yourLastShare"></span></div>
    <div class="yourStats"><i class="fa fa-tachometer"></i> Hash Rate: <span id="yourHashrateHolder"></span></div>
    <div class="yourStats"><i class="fa fa-cloud-upload"></i> Total Hashes Submitted: <span id="yourHashes"></span></div>

    <br class="yourStats" />

    <h4 class="yourStats">Payments</h4>
    <div class="yourStats table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><i class="fa fa-clock-o"></i> Time Sent</th>
                <th><i class="fa fa-paw"></i> Transaction Hash</th>
                <th><i class="fa fa-money"></i> Amount</th>
                <th><i class="fa fa-sitemap"></i> Mixin</th>
            </tr>
            </thead>
            <tbody id="payments_rows">

            </tbody>
        </table>
    </div>
    <p class="yourStats text-center">
        <button type="button" class="btn btn-default" id="loadMorePayments">Load More</button>
    </p>

</div>

{/* How to read scripts?
<script>


    currentPage = {
        destroy: function(){
            $('#networkLastBlockFound,#poolLastBlockFound,#yourLastShare,#marketLastUpdated').timeago('dispose');
            if (xhrAddressPoll) xhrAddressPoll.abort();
            if (addressTimeout) clearTimeout(addressTimeout);
            clearInterval(intervalMarketPolling);
            for (var marketPoll in xhrMarketGets){
                xhrMarketGets[marketPoll].abort();
            }
            if (xhrGetPayments) xhrGetPayments.abort();
        },
        update: function(){

            $('#networkLastBlockFound').timeago('update', new Date(lastStats.network.timestamp * 1000).toISOString());

            updateText('networkHashrate', getReadableHashRateString(lastStats.network.difficulty / 120) + '/sec');
            updateText('networkDifficulty', lastStats.network.difficulty.toString());
            updateText('blockchainHeight', lastStats.network.height.toString());
            updateText('networkLastReward', getReadableCoins(lastStats.network.reward, 4));
            updateText('lastHash', lastStats.network.hash.substr(0, 13) + '...').setAttribute('href',
                blockchainExplorer + lastStats.network.hash
            );

            updateText('poolHashrate', getReadableHashRateString(lastStats.pool.hashrate) + '/sec');

            if (lastStats.pool.lastBlockFound){
                var d = new Date(parseInt(lastStats.pool.lastBlockFound)).toISOString();
                $('#poolLastBlockFound').timeago('update', d);
            }
            else
                $('#poolLastBlockFound').removeAttr('title').data('ts', '').update('Never');

            //updateText('poolRoundHashes', lastStats.pool.roundHashes.toString());
            updateText('poolMiners', lastStats.pool.miners.toString());


            var totalFee = lastStats.config.fee;
            if (lastStats.config.doDonations){
                totalFee += lastStats.config.donation;
                totalFee += lastStats.config.coreDonation;
                var feeText = [];
                if (lastStats.config.donation > 0) feeText.push(lastStats.config.donation + '% to pool dev');
                if (lastStats.config.coreDonation > 0) feeText.push(lastStats.config.coreDonation + '% to core devs');
                updateText('poolDonations', feeText.join(', '));
            }
            else{
                updateText('poolDonations', '');
            }

            updateText('poolFee', totalFee + '%');


            updateText('blockSolvedTime', getReadableTime(lastStats.network.difficulty / lastStats.pool.hashrate));
            updateText('calcHashSymbol', lastStats.config.symbol);

            calcEstimateProfit();
        }
    };


    $('#networkLastBlockFound,#poolLastBlockFound,#yourLastShare,#marketLastUpdated').timeago();


    function getReadableTime(seconds){

        var units = [ [60, 'second'], [60, 'minute'], [24, 'hour'],
            [7, 'day'], [4, 'week'], [12, 'month'], [1, 'year'] ];

        function formatAmounts(amount, unit){
            var rounded = Math.round(amount);
            return '' + rounded + ' ' + unit + (rounded > 1 ? 's' : '');
        }

        var amount = seconds;
        for (var i = 0; i < units.length; i++){
            if (amount < units[i][0])
                return formatAmounts(amount, units[i][1]);
            amount = amount / units[i][0];
        }
        return formatAmounts(amount,  units[units.length - 1][1]);
    }

    function getReadableHashRateString(hashrate){
        var i = 0;
        var byteUnits = [' H', ' KH', ' MH', ' GH', ' TH', ' PH' ];
        while (hashrate > 1000){
            hashrate = hashrate / 1000;
            i++;
        }
        return hashrate.toFixed(2) + byteUnits[i];
    }




     Market data polling 

    var intervalMarketPolling = setInterval(updateMarkets, 300000); //poll market data every 5 minutes
    var xhrMarketGets = {};
    updateMarkets();
    function updateMarkets(){
        var completedFetches = 0;
        var marketsData = [];
        for (var i = 0; i < cryptonatorWidget.length; i++){
            (function(i){
                xhrMarketGets[cryptonatorWidget[i]] = $.get('https://api.cryptonator.com/api/ticker/' + cryptonatorWidget[i], function(data){
                    marketsData[i] = data;
                    completedFetches++;
                    if (completedFetches !== cryptonatorWidget.length) return;

                    var $marketHeader = $('#marketHeader');
                    $('.marketTicker').remove();
                    for (var f = marketsData.length - 1; f >= 0 ; f--){
                        var price = parseFloat(marketsData[f].ticker.price);

                        if (price > 1) price = Math.round(price * 100) / 100;
                        else price = marketsData[f].ticker.price;

                        $marketHeader.after('<div class="marketTicker">' + marketsData[f].ticker.base + ': <span>' + price + ' ' + marketsData[f].ticker.target + '</span></div>');
                    }
                    $('#marketLastUpdated').timeago('update', new Date(marketsData[0].timestamp * 1000).toISOString());
                }, 'json');
            })(i);
        }
    }





     Hash Profitability Calculator 

    $('#calcHashRate').keyup(calcEstimateProfit).change(calcEstimateProfit);

    $('#calcHashUnits > li > a').click(function(e){
        e.preventDefault();
        $('#calcHashUnit').text($(this).text()).data('mul', $(this).data('mul'));
        calcEstimateProfit();
    });

    function calcEstimateProfit(){
        try {
            var rateUnit = Math.pow(1000,parseInt($('#calcHashUnit').data('mul')));
            var inp2 = parseFloat($('#calcHashRate').val()) * rateUnit;
            var resl = ( lastStats.network.reward / coinUnits) / ((lastStats.network.difficulty / inp2) / 86400  );
            if (!isNaN(resl)) {
                updateText('calcHashAmount', (Math.round(resl * 100) / 100).toString());
                return;
            }
        }
        catch(e){ }
        updateText('calcHashAmount', '');
    }





     Stats by mining address lookup 

    function getPaymentCells(payment){
        return '<td>' + formatDate(payment.time) + '</td>' +
                '<td>' + formatPaymentLink(payment.hash) + '</td>' +
                '<td>' + getReadableCoins(payment.amount, 4, true) + '</td>' +
                '<td>' + payment.mixin + '</td>';
    }

    var xhrAddressPoll;
    var addressTimeout;

    $('#lookUp').click(function(){

        var address = $('#yourStatsInput').val().trim();
        if (!address){
            $('#yourStatsInput').focus();
            return;
        }

        $('#addressError').hide();
        $('.yourStats').hide();
        $('#payments_rows').empty();

        $('#lookUp > span:first-child').hide();
        $('#lookUp > span:last-child').show();


        if (xhrAddressPoll) xhrAddressPoll.abort();
        if (addressTimeout) clearTimeout(addressTimeout);

        function fetchAddressStats(longpoll){
            xhrAddressPoll = $.ajax({
                url: api + '/stats_address',
                data: {
                    address: address,
                    longpoll: longpoll
                },
                dataType: 'json',
                cache: 'false',
                success: function(data){

                    $('#lookUp > span:last-child').hide();
                    $('#lookUp > span:first-child').show();

                    if (!data.stats){
                        $('.yourStats').hide();
                        $('#addressError').text(data.error).show();

                        if (addressTimeout) clearTimeout(addressTimeout);
                        addressTimeout = setTimeout(function(){
                            fetchAddressStats(false);
                        }, 2000);

                        return;
                    }


                    $('#addressError').hide();
                    updateText('yourAddressDisplay', address);

                    if (data.stats.lastShare)
                        $('#yourLastShare').timeago('update', new Date(parseInt(data.stats.lastShare) * 1000).toISOString());
                    else
                        updateText('yourLastShare', 'Never');

                    updateText('yourHashrateHolder', (data.stats.hashrate || '0 H') + '/sec');
                    updateText('yourHashes', (data.stats.hashes || 0).toString());
                    updateText('yourPaid', getReadableCoins(data.stats.paid));
                    updateText('yourPendingBalance', getReadableCoins(data.stats.balance));

                    renderPayments(data.payments);

                    $('.yourStats').show();

                    docCookies.setItem('mining_address', address, Infinity);

                    fetchAddressStats(true);

                },
                error: function(e){
                    if (e.statusText === 'abort') return;
                    $('#lookUp').html(lookupBtnHtml);
                    $('#addressError').text('Connection error').show();

                    if (addressTimeout) clearTimeout(addressTimeout);
                    addressTimeout = setTimeout(function(){
                        fetchAddressStats(false);
                    }, 2000);
                }
            });
        }
        fetchAddressStats(false);
    });

    var address = docCookies.getItem('mining_address');

    if (address){
        $('#yourStatsInput').val(address);
        $('#lookUp').click();
    }

    $('#yourStatsInput').keyup(function(e){
        if(e.keyCode === 13)
            $('#lookUp').click();
    });

    var xhrGetPayments;
    $('#loadMorePayments').click(function(){
        if (xhrGetPayments) xhrGetPayments.abort();
        xhrGetPayments = $.ajax({
            url: api + '/get_payments',
            data: {
                time: $('#payments_rows').children().last().data('time'),
                address: address
            },
            dataType: 'json',
            cache: 'false',
            success: function(data){
                renderPayments(data);
            }
        });
    });

</script>
*/}
	</div>
    );
  }
}

export default Dashboard;