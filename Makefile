all: build

# Install dependencies
install:
	composer install
	npm install

# Build the project
build:
	gulp
	bin/console phpillip:doc:import
	bin/console phpillip:build phpillip.github.io
