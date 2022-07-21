#!/bin/bash

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

build: ## Rebuilds all the containers
	docker-compose build

up: ## Up the containers
	docker-compose up -d

stop: ## Stop the containers
	docker-compose stop

rebuild: ## Restart the containers
	$(MAKE) stop && $(MAKE) build

bash-elk: ## bash into the be container
	docker exec -it bash
