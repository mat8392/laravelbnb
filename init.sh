#!/bin/bash

#set to safer abort if failed
set -e

#copy sample.env to .env
cp sample.env .env

#checking public network
PUBLIC_NET=public-net
if [ -z $(docker network ls --filter name=^${PUBLIC_NET}$ --format="{{ .Name }}") ] ; then 
     docker network create ${PUBLIC_NET} ;
     echo "Creating Docker ${PUBLIC_NET}"
fi
echo "Docker ${PUBLIC_NET} Created"

PRIVATE_NET=private-net
if [ -z $(docker network ls --filter name=^${PRIVATE_NET}$ --format="{{ .Name }}") ] ; then 
     docker network create ${PRIVATE_NET} ; 
     echo "Creating Docker ${PRIVATE_NET}"
fi
echo "Docker ${PRIVATE_NET} Created"
