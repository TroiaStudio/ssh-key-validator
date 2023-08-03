.PHONY: install tests qa cs csf phpstan

install:
	composer install

qa: phpstan cs

cs:
ifdef GITHUB_ACTION
	vendor/bin/phpcs --standard=ruleset.xml --encoding=utf-8 --colors -nsp -q --report=checkstyle src tests
else
	vendor/bin/phpcs --standard=ruleset.xml --encoding=utf-8 --colors -nsp src tests
endif

csf:
	vendor/bin/phpcbf --standard=ruleset.xml --encoding=utf-8 --colors -nsp src tests

phpstan:
	vendor/bin/phpstan analyse -c phpstan.neon

tests:
	vendor/bin/phpunit --bootstrap vendor/autoload.php tests