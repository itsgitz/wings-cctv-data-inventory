run-db:
	docker-compose -f docker-compose.mariadb.yaml \
		up --build --force-recreate -d
	docker-compose -f docker-compose.mariadb.yaml \
		logs -f --tail 100
down-db:
	docker-compose -f docker-compose.mariadb.yaml \
		down -v; \
		docker system prune -f
