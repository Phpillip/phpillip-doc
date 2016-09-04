# Phpillip Documentation

Phpillip is generating [its own documentation](http://phpillip.github.io/)!

## Requirements:

- PHP `>= 5.6`
- NodeJs `>= 0.10`
- [Pygments](http://pygments.org/)
- Make (optional)

## Installation

Install PHP and Javascript dependencies with make:

    make install

Or mannually:

    composer install
    npm install

    composer update phpillip/phpillip
    bin/console phpillip:doc:import

## Build the documentation

With make:

    make build

Or manually:

__Building assets:__

    npm run build

__Building website:__

    bin/console phpillip:build phpillip.github.io
