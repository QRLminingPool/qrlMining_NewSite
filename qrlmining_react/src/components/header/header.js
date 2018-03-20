import React, { Component } from 'react';
import {Link} from 'react-router-dom';

class Header extends Component {
  render() {
    return (
		<header>
			<div className="top-content-section">
				<div className="top-bar">
					<div className="top-bar-left">
						<ul className="menu">
							<li>
							 <Link to="/">Home</Link>
							</li>
							<li>
							 <Link to="/Dashboard">Dashboard</Link>
							</li>
							<li>
							 <Link to="/GettingStarted">Getting Started</Link>
							</li>
							<li><a href="#">FAQ</a></li>
							<li>
							 <Link to="/PoolBlocks">Pool Blocks</Link>
							</li>
							<li><Link to="/Payments">Payments</Link></li>
							<li>
							 <Link to="/Contact">Contact Us</Link>
							</li>
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
  