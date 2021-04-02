#!/bin/bash

# Parse arguments
# Adapted from Argbash (https://argbash.io/generate) generator
print_help() {
    printf 'Usage: %s [-a|--arg]\n' "$0"
    printf "\t%s\n" "-p|--prod: Changes environment stage from develop to production"
    printf "\t%s\n" "-c|--cache: Clear and generate cache"
}

default_parameters_values() {
    STAGE="develop"
}

parse_commandline() {
    while test $# -gt 0; do
        _key="$1"
        case "$_key" in
        -p | --prod)
            STAGE="prod"
            ;;
        -c | --cache)
            STAGE="cache"
            clear_laravel_cache
            generate_laravel_cache
            ;;
        -h | --help)
            print_help
            exit 0
            ;;
        -h*)
            print_help
            exit 0
            ;;
        esac
        shift
    done
}

clear_laravel_cache() {
    php artisan cache:clear
    php artisan view:clear
    php artisan config:clear
    php artisan route:clear
}

generate_laravel_cache() {
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
}

default_parameters_values
parse_commandline "$@"

if [ ${STAGE} = "develop" ]; then
    printf "Install composer packages in ${STAGE}\n"
    composer install
    printf "Install npm packages in ${STAGE}\n"
    npm install
    if [ ! -f ".env" ]; then
        printf "Create .env file and generate APP_KEY\n"
        cp .env.example .env
        printf "\nGenerate APP_KEY\n"
        php artisan key:generate
    fi
fi

if [ ${STAGE} = "prod" ]; then
    printf "Install composer packages in ${STAGE}"
    composer install --optimize-autoloader --no-dev
    printf "Install npm packages in ${STAGE}"
    npm install
fi

clear_laravel_cache
generate_laravel_cache
