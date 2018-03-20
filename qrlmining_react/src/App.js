import React, { Component } from 'react';
import {
	BrowserRouter as Router,
	Route,
    Link
} from 'react-router-dom';

import Header from "./components/header/header";
import Footer from "./components/footer/footer";
import Stickysocial from "./components/social/stickysocial";
import Homepage from "./pages/home";
import Contact from "./pages/contact";
import GettingStarted from "./pages/getting_started";
import PoolBlocks from "./pages/pool_blocks";
import Payments from "./pages/payments";
import Dashboard from "./pages/dashboard";

import "./css/foundation.css";
import "./css/app.css";
import "./css/qrlmining.css";

class App extends Component {
  render() {
    return (
	  <Router>
      <div className="App">
		<Header />
		<Stickysocial />
		
		<Route exact path='/' component={Homepage} />
		<Route exact path='/Dashboard' component={Dashboard} />
		<Route exact path='/Contact' component={Contact} />
		<Route exact path='/GettingStarted' component={GettingStarted} />
		<Route exact path='/PoolBlocks' component={PoolBlocks} />
		<Route exact path='/Payments' component={Payments} />
		
		{/* Adding Footer here, could be added at the top for easy reading though */}
		<Footer />
       
		<script src="js/vendor/jquery.js"></script>
		<script src="js/foundation.equalizer.js"></script>
		<script src="js/foundation.core.js"></script>
		<script src="js/foundation.util.mediaQuery.js"></script>
		<script src="js/foundation.util.imageLoader.js"></script>
		<script src="js/vendor/what-input.js"></script>
		<script src="js/vendor/foundation.js"></script>
		<script src="js/app.js"></script>
      </div>
	  </Router>
    );
  }
}

export default App;
