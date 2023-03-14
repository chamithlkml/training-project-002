up:
	./start_containers

test:
	docker exec -i app sh -c './vendor/bin/phpunit tests'

down:
	docker compose down

remove:
	./remove_containers
