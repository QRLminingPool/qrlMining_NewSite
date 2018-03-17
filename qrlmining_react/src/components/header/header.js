import React, { Component } from 'react';

class Header extends Component {
  render() {
    return (
		<header>
			<div className="top-content-section">
				<div className="top-bar">
					<div className="top-bar-left">
						<ul className="menu">
							<li><a href="#">Home</a></li>
							<li><a href="#">Getting Started</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Pool Blocks</a></li>
							<li><a href="#0">Payments</a></li>
							<li><a href="pages/Contact.html">Contact Us</a></li>
						</ul>
					</div>
					<div className="top-bar-right">
						<ul className="menu"></ul>
					</div>
				</div>
			</div>
		</header>
    );
  }
}

export default Header;
  