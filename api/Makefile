#!/bin/bash

UID = $(shell id -u)
DOCKER_BE = chaski-be

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

build: ## Rebuilds all the containers
	userid=${UID} docker-compose build

up: ## Up the containers
	userid=${UID} docker-compose up -d

stop: ## Stop the containers
	userid=${UID} docker-compose stop

rebuild: ## Restart the containers
	$(MAKE) stop && $(MAKE) build

bash: ## bash into the be container
	userid=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bash
