#!/usr/bin/env bash

#install node
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash
source ~/.nvm/nvm.sh
nvm install node  $1
nvm use node  $1

nvm run node  $1
