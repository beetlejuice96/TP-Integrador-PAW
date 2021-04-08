#!/bin/bash

while true; do
	git pull origin main
	docker image prune -f
	sleep 30
done
