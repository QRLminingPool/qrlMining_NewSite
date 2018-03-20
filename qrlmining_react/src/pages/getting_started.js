import React, { Component } from 'react';

import "../css/foundation.css";
import "../css/app.css";
import "../css/qrlmining.css";
import "../css/getting_started.css";

class GettingStarted extends Component {
  render() {
    return (
	<div>
		<h3>Connection Details</h3>
		<div className="stats">
			<div><i className="fa fa-cloud"></i> Mining Pool Address: <span id="miningPoolHost"></span></div>
		</div>

		<h4>Mining Ports</h4>
		<div id="miningPorts" className="row">
			<div className="stats">
				<div><i className="fa fa-tachometer"></i> Port: <span className="miningPort"></span></div>
				<div><i className="fa fa-unlock-alt"></i> Starting Difficulty: <span className="miningPortDiff"></span></div>
				<div><i className="fa fa-question"></i> Description: <span className="miningPortDesc"></span></div>
			</div>
		</div>

		<hr />

		<h3>For <i className="fa fa-windows"></i> Windows users new to mining</h3>
		<p className="getting_started_windows">
			You can <a className="btn btn-default btn-sm" target="_blank" id="easyminer_link"><i className="fa fa-download"></i> Download</a>
			and run <a target="_blank" href="https://github.com/zone117x/cryptonote-easy-miner">cryptonote-easy-miner</a> <i className="fa fa-github"></i>
			which will automatically generate your wallet address and run CPUMiner with the proper parameters.
		</p>

		<hr />

		<h3>Wallet & Daemon Software</h3>
		<p>
			<ul>
			<li><a target="_blank" href="http://monero.cc/getting-started/">Getting started with Monero</a></li>
			<li>Monero information and news on its <a href="https://bitcointalk.org/index.php?topic=583449.0">BitcoinTalk announcement thread</a></li>
			</ul>
		</p>

		<hr />

		<h3>Mining Apps</h3>
		<div className="yourStats table-responsive">
			<table className="table">
			<thead>
			<tr>
				<th><i className="fa fa-book"></i> App Name</th>
				<th><i className="fa fa-car"></i> Architecture</th>
				<th><i className="fa fa-download"></i> Downloads</th>
				<th><i className="fa fa-comments"></i> Discussion</th>
				<th><i className="fa fa-file-code-o"></i> Source Code</th>
			</tr>
			</thead>
			<tbody id="mining_apps">
			<tr>
				<td className="miningAppTitle">CPUMiner (forked by LucasJones & Wolf)</td>
				<td>CPU</td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=632724">BitcoinTalk</a></td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=632724">BitcoinTalk</a></td>
				<td><a target="_blank" href="https://github.com/wolf9466/cpuminer-multi">Github</a></td>
			</tr>
			<tr>
				<td colspan="5">
					<span>Example:</span>
					<code>minerd -a cryptonight -o stratum+tcp://<span className="exampleHost"></span>:<span className="examplePort"></span> -u <span className="exampleAddress">YOUR_WALLET_ADDRESS</span> -p x</code>
				</td>
			</tr>
			<tr>
				<td className="miningAppTitle">YAM Miner (by yvg1900)</td>
				<td>CPU</td>
				<td><a target="_blank" href="https://mega.co.nz/#F!UlkU0RyR!E8n4CFkqVu0WoOnsJnQkSg">MEGA</a></td>
				<td><a target="_blank" href="https://twitter.com/yvg1900">Twitter</a></td>
				<td>Proprietary <i className="fa fa-frown-o"></i></td>
			</tr>
			<tr>
				<td colspan="5">
					<span>Example:</span>
					<code>yam -c x -M stratum+tcp://<span className="exampleAddress">YOUR_WALLET_ADDRESS</span>:x@<span className="exampleHost"></span>:<span className="examplePort"></span>/xmr</code>
				</td>
			</tr>
			<tr>
				<td className="miningAppTitle">Claymore CPU Miner</td>
				<td>CPU</td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=647251.0">BitcoinTalk</a></td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=647251.0">BitcoinTalk</a></td>
				<td>Proprietary <i className="fa fa-frown-o"></i></td>
			</tr>
			<tr>
				<td colspan="5">
					<span>Example:</span>
					<code>NsCpuCNMiner64 -o stratum+tcp://<span className="exampleHost"></span>:<span className="examplePort"></span> -u <span className="exampleAddress">YOUR_WALLET_ADDRESS</span> -p x</code>
				</td>
			</tr>
			<tr>
				<td className="miningAppTitle">Claymore GPU Miner</td>
				<td>OpenCL (AMD)</td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=638915.0">BitcoinTalk</a></td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=638915.0">Discussion</a></td>
				<td>Proprietary <i className="fa fa-frown-o"></i></td>
			</tr>
			<tr>
				<td colspan="5">
					<span>Example:</span>
					<code>NsGpuCNMiner -o stratum+tcp://<span className="exampleHost"></span>:<span className="examplePort"></span> -u <span className="exampleAddress">YOUR_WALLET_ADDRESS</span> -p x</code>
				</td>
			</tr>
			<tr>
				<td className="miningAppTitle">ccminer (forked by tsiv)</td>
				<td>CUDA (Nvidia)</td>
				<td><a target="_blank" href="https://github.com/tsiv/ccminer-cryptonight/releases">Github</a></td>
				<td><a target="_blank" href="https://bitcointalk.org/index.php?topic=656841.msg7487737#msg7487737">BitcoinTalk</a></td>
				<td><a target="_blank" href="https://github.com/tsiv/ccminer-cryptonight">Github</a></td>
			</tr>
			<tr>
				<td colspan="5">
					<span>Example:</span>
					<code>ccminer -o stratum+tcp://<span className="exampleHost"></span>:<span className="examplePort"></span> -u <span className="exampleAddress">YOUR_WALLET_ADDRESS</span> -p x</code>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		
		
		{/* We need to load this script in the .js file.  Not sure yet how to do this
		<script>
    currentPage = {
        destroy: function(){

        },
        update: function(){

            var portsJson = JSON.stringify(lastStats.config.ports);
            if (lastPortsJson !== portsJson) {
                lastPortsJson = portsJson;
                var $miningPortChildren = [];
                for (var i = 0; i < lastStats.config.ports.length; i++) {
                    var portData = lastStats.config.ports[i];
                    var $portChild = $(miningPortTemplate);
                    $portChild.find('.miningPort').text(portData.port);
                    $portChild.find('.miningPortDiff').text(portData.difficulty);
                    $portChild.find('.miningPortDesc').text(portData.desc);
                    $miningPortChildren.push($portChild);
                }
                $miningPorts.empty().append($miningPortChildren);
            }

            updateTextClasses('exampleHost', poolHost);
            updateTextClasses('examplePort', lastStats.config.ports[0].port.toString());

        }
    };

    document.getElementById('easyminer_link').setAttribute('href', easyminerDownload);
    document.getElementById('miningPoolHost').textContent = poolHost;

    var lastPortsJson = '';
    var $miningPorts = $('#miningPorts');
    var miningPortTemplate = $miningPorts.html();
    $miningPorts.empty();

</script>
		*/}
	</div>
    );
  }
}

export default GettingStarted;