COMPOSE_ENV = env COMPOSE_PROJECT_NAME=bpi \
				  COMPOSE_FILE=docker-compose.yml

build: dc-build dc-up run-sql

dc-build:
	$(COMPOSE_ENV) docker-compose build

dc-up:
	$(COMPOSE_ENV) docker-compose up -d --force-recreate

run-sql:
	docker cp companies.sql bpi_mysql_1:/tmp
	docker exec bpi_mysql_1 sh -c 'mysql -udbuser -pdbpass dbname < /tmp/companies.sql'
