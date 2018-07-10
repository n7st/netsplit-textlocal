#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

# Install git (the php image doesn't have it) which is required by composer
sudo apt-get update -yqq
sudo apt-get install git -yqq
sudo apt-get install curl -yq

# Install phpunit, the tool that we will use for testing
sudo curl --location --output /usr/local/bin/phpunit https://phar.phpunit.de/phpunit.phar
sudo chmod +x /usr/local/bin/phpunit

sudo docker-php-ext-install curl
