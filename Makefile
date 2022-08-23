
# install build-essential if you cannot run make commands
# example use: 
# make up

env:
	cp .env.example .env
	
up:
	./vendor/bin/sail up -d

stop:
	./vendor/bin/sail stop

migrate:
	./vendor/bin/sail php artisan migrate
	
down:
	./vendor/bin/sail down