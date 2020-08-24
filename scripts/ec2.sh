#!/bin/sh

eval $(egrep -v '^#' .env | xargs)

ssh -i $KEY_PATH ec2-user@$PUBLIC_IP_ADDRESS 


