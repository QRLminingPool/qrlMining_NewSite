#!/bin/bash

# Takes the first VAR passed to the script and assigns to $email
email=$1
message="Here is my message from the headder, lets see it work"
DATE=`date +%Y-%m-%d`

validateEmail(){
curl -G --user 'api:key-25b5080c7714b6ac5798d5a138ff2a81' \
-G https://api.mailgun.net/v3/mg.qrlmining.com/validate \
--data-urlencode address='$email'
}

sendMail(){
curl -s --user 'api:key-25b5080c7714b6ac5798d5a138ff2a81' \
	 https://api.mailgun.net/v3/mg.qrlmining.com/messages \
	-F from='QRL Mining Pool <pool@mg.qrlmining.com>' \
	-F to=$email \
	-F subject='Welcome To QRL Mining Pool' \
	-F text=$message

}
addList(){
curl -s --user 'api:key-25b5080c7714b6ac5798d5a138ff2a81' \
    https://api.mailgun.net/v3/lists/qrlmining@mg.qrlmining.com/members \
    -F subscribed=True \
    -F address=$email 
}

# validating email
validateEmail
# then adds the email to mail list
addList
# This little function sends the email
sendMail
