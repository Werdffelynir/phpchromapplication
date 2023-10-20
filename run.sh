#!/bin/bash

LOC_HOST="localhost"
LOC_PORT="8013"
LOC_DIR="./web"
LOC_SIZE="800,600"
LOC_POSITION="500,100"
APP_ROUTER="init.php"

php -S $LOC_HOST:$LOC_PORT -t $LOC_DIR $APP_ROUTER & \

chromium --app=http://$LOC_HOST:$LOC_PORT \
	--incognito \
	--window-size=$LOC_SIZE \
	--window-position=$LOC_POSITION \
	2>/dev/null









