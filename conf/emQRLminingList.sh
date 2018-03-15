#!/bin/bash
#
# Place this file in your users home directory
#
# Takes the first VAR passed to the script and assigns to $email
email=$1
message=("Early bird gets the worm. Welcome to the list"

)
validateEmail(){
# replace the API key with your valid API from mailgun
curl -G --user 'api:key-{NUMBERS HERE}' \
-G https://api.mailgun.net/v3/mg.qrlmining.com/validate \
--data-urlencode address='$email'
}
sendMail(){
# replace the API key with your valid API from mailgun
curl -s --user 'api:key-{NUMBERS HERE}' \
	 https://api.mailgun.net/v3/mg.qrlmining.com/messages \
	-F from='QRL Mining Pool <pool@mg.qrlmining.com>' \
	-F to=$email \
	-F subject='Welcome To QRL Mining Pool' \
	-F text="${message[*]}"
}
addList(){
# replace the API key with your valid API from mailgun
curl -s --user 'api:key-{NUMBERS HERE}' \
    https://api.mailgun.net/v3/lists/qrlmining@mg.qrlmining.com/members \
    -F subscribed=True \
    -F address=$email 
}
# validating email
validateEmail
logger 'validating...'
logger $email
# then adds the email to mail list
addList
logger 'adding to list'
# This little function sends the email
sendMail
logger 'MailGun kaPow'