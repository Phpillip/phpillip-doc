# Phpillip Documentation

Phpillip is generating [its own documentation](http://phpillip.github.io/)!

## Installation

Install PHP and Javascript dependencies:

    composer install
    npm install

## Build

__Building assets:__

    gulp

__Building website:__

    bin/console phpillip:doc:import
    bin/console phpillip:build phpillip.github.io
