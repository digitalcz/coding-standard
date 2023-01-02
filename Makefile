SHELL:=/bin/bash

PHP_CONTAINER_NAME:=digitalcz-coding-standard

up: ## Bring up project containers
	@docker-compose up -d

stop: ## Bring up project containers
	@docker-compose stop

php: ## Gets inside PHP container shell
	@docker exec -it ${PHP_CONTAINER_NAME} bash

composer: ## Runs Composer install
	@docker exec ${PHP_CONTAINER_NAME} composer install
