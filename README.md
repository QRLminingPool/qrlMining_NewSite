# qrlMining_NewSite

This will be the site we host the pool and the main page for qrlmining.com

## Branch This repo and add your features
Please build in a branch and merge any working features to master.

## To-Do list

##### Site -
- [ ] Fill Content

##### Server
- [ ] Get ReactJS working
- [ ] Setup site to use react-foundation
- [ ] Get API info scraping and storage setup
	- [ ] List of API's we are going to scrape
	- [ ] Feed into D3 or similar and make graphs and pretty things
- [ ] Move into production env. harden and secure server

##### Hosting and analytics
- [ ] SEO presence from Google webmaster
- [ ] Import analytics and tracking via google/analytics
- [ ] Edit DNS settings to point to production server
- [ ] ...

* * *

## WebSite Setup

There is a conf file in the web server root. you will find configuration files there.

### Move Conf files
Create a folder in your home directory called .email and set the owner to apache2 user

`mkdir ~/.home/.email`

Now copy the files into this directory
* emQRLminingList.sh
* rmQRLminingList.sh
* Welcome.html
	\*This is where the pretty email lives. 

Then set permissions in the folder

`sudo chown www-data:www-data ~/home/.mail -R`


Now set the variables accordingly.

We need to assign our mailGun API-key to each command in emQRLminingList and rmQRLminingList.sh

We also need to update the PHP script to where our folder lives. Username...


* * *

## Pool Configuration Instructions for QRL

## Dependencies
```bash
sudo apt-get install libssl-dev libboost-all-dev git screen 
```


### NodeJS

Following [this](https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-16-04) guide install nodeJS via `nvm`

```bash
sudo apt-get update
sudo apt-get install build-essential libssl-dev
```
Grab nvm and install

```bash
curl -sL https://raw.githubusercontent.com/creationix/nvm/v0.33.8/install.sh -o install_nvm.sh

bash install_nvm.sh
```

It will install the software into a subdirectory of your home directory at ~/.nvm. It will also add the necessary lines to your ~/.profile file to use the file.

To use log out or run
```bash
source ~/.profile
```

Install your version of node and use it

```bash
nvm install 0.10

nvm use 0.10
nvm alias default 0.10
nvm use default
```

### Redis

```bash
wget http://download.redis.io/redis-stable.tar.gz
tar xvzf redis-stable.tar.gz
cd redis-stable
make
make install
```

#### Secure redis firewall

```bash
# first, dont lock your self out
sudo ufw enable openssh
# now block external redis connections
sudo ufw deny 6379
sudo ufw deny 16379
sudo ufw deny 26379

# Enable UFW
sudo ufw enable

# Check UFW
sudo ufw status
```

#### Install Redis properly

Create a directory where to store your Redis config files and your data:

```bash
sudo mkdir /etc/redis
sudo mkdir /var/redis
```

Copy the init script

```bash
sudo cp utils/redis_init_script /etc/init.d/redis_6379
```

Edit the script

```bash
sudo nano /etc/init.d/redis_6379
```
Make sure to modify REDISPORT accordingly to the port you are using. Both the pid file path and the configuration file name depend on the port number.





## Pool Config

Clone the repo found at [Github](https://github.com/cyyber/node-cryptonote-pool.git)

```bash
git clone https://github.com/cyyber/node-cryptonote-pool.git qrlPool

cd qrlPool
npm update
```

This will take awhile to run. Grab a coffee.

### Config files

Copy the config_example.json file to config.json then overview each options and change any to match your preferred setup.



* * * 

## Instructions from Cyyber 
I git these fro [this](https://github.com/theQRL/QRL/issues/902#issuecomment-372001020) conversation.



Here is the node-cryptonote-pool which has been modified to work with [QRL codebase](https://github.com/cyyber/node-cryptonote-pool/)

Following is the customized QRL config.json file for cryptonote-pool (make sure to update pool address)
[QRLpool config.json](https://github.com/jleni/qrl_dpool/blob/master/config.json)


You need atleast two nodes, to set it up correctly.
One of the node will be a mining node, but will not be running grpcProxy.py.
You can directly start that node using command
`qrl --randomizeSlaveXMSS`

The another node should be a node with pool service enabled.
You may use following command into the 2nd node (running pool service).

`qrl wallet_gen`
`qrl -r --host 104.237.3.185 slave_tx_generate`
(make sure you enter access_type 1 )
move the newly generated slaves.json into ~/.qrl/
`qrl -r --host 104.237.3.185 slave_tx_generate --otsidx 1`
(make sure you enter access_type 0 )
rename this file from slaves.json to payment_slaves.json and move it to ~/.qrl/

Now run your node, wait for the 2nd node to start mining. As soon as it successfully starts mining, you need to stop the node. Override config mining_enabled to False

This will stop your node from mining alone.

Restart the node.

In order to override config. you can copy the config.yml from
https://github.com/theQRL/QRL

The default config.yaml is already mentioned there.

You can create the file ~/.qrl/config.yml
and override any of the above mentioned settings.

Once you have done this, there is no need to keep running the 1st node that you started. You can surely shut it down and let the pool continue mining.

