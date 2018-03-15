#!/bin/bash

# Takes the first VAR passed to the script and assigns to $email
email=$1
message=""

validateEmail(){
# replace the API key with your valid API from mailgun, this wont work
curl -G --user 'api:key-{NUMBERS HERE}' \
-G https://api.mailgun.net/v3/mg.qrlmining.com/validate \
--data-urlencode address='$email'
}

remList(){
# replace the API key with your valid API from mailgun
curl -s --user 'api:YOUR_API_KEY' -X DELETE \
    https://api.mailgun.net/v3/lists/qrlmining@mg.qrlmining.com/members/$email
}
# validating email
validateEmail
logger 'validating...'
# then adds the email to mail list
rmList
logger 'removing from list'
# This little function sends the email
