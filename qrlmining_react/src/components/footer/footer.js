import React, { Component } from 'react';

class Footer extends Component {
  render() {
    return (
		<footer className="social-footer">
			<div className="social-footer-left">
				<a href="#"><img className="logo" src="./assets/qrl_Pool-logo.png"></img> </a> 
				<br />
				<p>The QRL logo is the sole property of TheQRL</p>
			</div>
  
			<div className="social-footer-icons">
				<ul className="menu simple">&copy; QRLmining 2018</ul>
			</div>
		</footer>
    );
  }
}

export default Footer;