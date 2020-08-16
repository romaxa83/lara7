 .SILENT:

 include .env

#=============VARIABLES================
app_name = lara7
php_container = ${APP_NAME}_php-fpm
node_container = ${APP_NAME}_node
db_container = ${APP_NAME}_db
postgis_container = ${APP_NAME}_postgis
logstash_container = ${APP_NAME}_postgis
#======================================

#=====MAIN_COMMAND=====================

init: down-clear \
 		build up \
# 		app-init info

up: up_docker memory info

rebuild: down build up_docker memory info

up_docker:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

# флаг -v удаляет все volume (очищает все данные)
down-clear:
	docker-compose down -v --remove-orphans

build:
	docker-compose build

#=====COMMAND_FOR_APP====================================

app-init: composer-install project-init app-permissions

composer-install:
	docker-compose run --rm php-cli composer install

composer-update:
	docker-compose run --rm php-cli composer update

project-init:
	docker-compose run --rm php-cli php artisan key:generate
	docker-compose run --rm php-cli php artisan ide-helper:generate
	docker-compose run --rm php-cli php artisan ide-helper:meta
	docker-compose run --rm php-cli php artisan migrate
	docker-compose run --rm php-cli php artisan admin:create
	docker-compose run --rm php-cli php artisan db:seed
	docker-compose run --rm node npm install
	docker-compose run --rm node npm run dev
# 	docker-compose run --rm php artisan ui vue --auth

app-permissions:
	sudo chmod 777 -R storage

perm:
	sudo chmod 777 -R app/Http/Livewire
	sudo chmod 777 -R resources/views/livewire


#=======INTO_CONTAINER===================================

php_bash:
	docker exec -it $(php_container) bash

node_bash:
	docker exec -it $(node_container) sh

db_bash:
	docker exec -it $(db_container) sh

logstash_bash:
	docker exec -it $(db_container) bash

postgis_bash:
	docker exec -it $(postgis_container) bash
#=======INFO===================================

info:
	echo ${APP_URL};

# for elasticsearch
memory:
	sudo sysctl -w vm.max_map_count=262144






