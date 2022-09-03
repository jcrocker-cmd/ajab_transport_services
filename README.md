<!-- FIRST COMMAND  -->
start docker daemon
run command:
``docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    ``
<!-- RUN YOUR FIRST PROJECT WITH ONE COMMAND -->
'make init'

#Run your project in step by step command (Steps Below!)

<!-- Copy env example  -->
'make env'

<!-- Start your container in Docker -->
'make up'

<!-- Migrate your table in your containarized Database-->
'make migrate'

<!-- Generate Keygen in your Laravel Project -->
'make keygen'


###### NOTE ######
THIS COMMANDS ARE FOUND IN MAKEFILE INSIDE YOUR LARAVAL PROJECT
YOU CAN INTEGRATE ANOTHER COMMAND IF NEEDED.