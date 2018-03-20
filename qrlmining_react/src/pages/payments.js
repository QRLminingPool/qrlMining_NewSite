import React, { Component } from 'react';
import "../css/foundation.css";
import "../css/app.css";
import "../css/qrlmining.css";
import "../css/payments.css";


class Payments extends Component {
  render() {
    return (
	<div>
		<div className="paymentsStatHolder">
			<span className="bg-primary">Total Payments: <span id="paymentsTotal"></span></span>
			<span className="bg-info">Total Miners Paid: <span id="paymentsTotalPaid"></span></span>
			<span className="bg-info">Minimum Payment Threshold: <span id="paymentsMinimum"></span></span>
			<span className="bg-info">Denomination Unit: <span id="paymentsDenomination"></span></span>
		</div>

		<hr />

		<div className="table-responsive">
			<table className="table table-hover table-striped">
			<thead>
				<tr>
				<th><i className="fa fa-clock-o"></i> Time Sent</th>
				<th><i className="fa fa-paw"></i> Transaction Hash</th>
				<th><i className="fa fa-money"></i> Amount</th>
				<th><i className="fa fa-tag"></i> Fee</th>
				<th><i className="fa fa-sitemap"></i> Mixin</th>
				<th><i className="fa fa-group"></i> Payees</th>
			</tr>
			</thead>
			<tbody id="payments_rows">

			</tbody>
			</table>
		</div>

		<p className="text-center">
			<button type="button" className="btn btn-default" id="loadMorePayments">Load More</button>
		</p>
		
		{/* How to react Scripts properly?
<script>
    currentPage = {
        destroy: function(){
            if (xhrGetPayments) xhrGetPayments.abort();
        },
        update: function(){
            updateText('paymentsTotal', lastStats.pool.totalPayments.toString());
            updateText('paymentsTotalPaid', lastStats.pool.totalMinersPaid.toString());
            updateText('paymentsMinimum', getReadableCoins(lastStats.config.minPaymentThreshold, 3));
            updateText('paymentsDenomination', getReadableCoins(lastStats.config.denominationUnit, 3));
            renderPayments(lastStats.pool.payments);
        }
    };


    var xhrGetPayments;
    $('#loadMorePayments').click(function(){
        if (xhrGetPayments) xhrGetPayments.abort();
        xhrGetPayments = $.ajax({
            url: api + '/get_payments',
            data: {
                time: $('#payments_rows').children().last().data('time')
            },
            dataType: 'json',
            cache: 'false',
            success: function(data){
                renderPayments(data);
            }
        });
    });


    function getPaymentCells(payment){
        return '<td>' + formatDate(payment.time) + '</td>' +
                '<td>' + formatPaymentLink(payment.hash) + '</td>' +
                '<td>' + getReadableCoins(payment.amount, 4, true) + '</td>' +
                '<td>' + getReadableCoins(payment.fee, 4, true) + '</td>' +
                '<td>' + payment.mixin + '</td>' +
                '<td>' + payment.recipients + '</td>';
    }

</script>
		*/}		
		
	</div>
    );
  }
}

export default Payments;