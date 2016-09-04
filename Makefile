all: build

# Install the projet
install: install-dep install-doc

# Install dependencies
install-dep:
	composer install
	npm install

# Update Phpillip
install-doc:
	composer update phpillip/phpillip
	bin/console phpillip:doc:import

# Build the project
build:
	npm run build
	bin/console phpillip:build phpillip.github.io
