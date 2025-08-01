.PHONY: up down test

up:
	docker-compose up --build -d

down:
	docker-compose down

test:
	docker-compose exec app ./vendor/bin/phpunit

cache-clear:
	docker-compose exec app php bin/console cache:clear

cache-warmup:
	docker-compose exec app php bin/console cache:warmup

migrate:
	docker-compose exec app php bin/console doctrine:migrations:migrate

migrations-diff:
	docker-compose exec app php bin/console doctrine:migrations:diff

routes:
	docker-compose exec app php bin/console debug:router
