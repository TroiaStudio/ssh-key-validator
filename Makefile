.PHONY: install tests

install:
	composer install

tests:
	vendor/bin/phpunit --bootstrap vendor/autoload.php tests