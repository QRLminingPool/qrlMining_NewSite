import React, { Component } from 'react';
import "../../css/foundation.css";
import "../../css/app.css";
import "../../css/qrlmining.css";

import discordwhite from '../../assets/icons/discord-white.png';

// This class creates a stickey social bar on the left of the screen, can be used on all pages
// Fix Issue with some of the icons not showing
class Stickysocial extends Component {
  render() {
    return (
		<ul className="sticky-social-bar">
        <li className="social-icon">
          <a href="https://discord.gg/ceTcsdv">
            <i className="fa fi-social-discord" aria-hidden="true">
              <img src={discordwhite} className="fa" alt="discordwhite" />
            </i>
            <span className="social-icon-text">Discord</span>
          </a>
        </li> 
        <li className="social-icon">
          <a href="https://twitter.com/MiningQrl">
            <i className="fa fi-social-twitter" aria-hidden="true"></i>
          <span className="social-icon-text">Twitter</span>
          </a>
        </li>
        <li className="social-icon">
          <a href="https://medium.com/@MiningQrl">
            <i className="fa fi-social-medium" aria-hidden="true"></i>
            <span className="social-icon-text">Medium</span>
          </a>
        </li>
        <li className="social-icon">
          <a href="http://www.reddit.com/r/QRL">
            <i className="fa fi-social-reddit" aria-hidden="true"></i>
            <span className="social-icon-text">Reddit</span>
          </a>
        </li>
      </ul>
    );
  }
}

export default Stickysocial;
  