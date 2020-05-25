.DEFAULT_GOAL := help

install: ## Install project
	@./scripts/install.sh

build: ## build image, usage: make build, make build image=nginx
	@./scripts/task.build.sh ${image}

start: ## Up docker containers, usage: make start
	docker-compose up -d

stop: ## Stops and removes the docker containers, usage: make stop
	docker-compose down

restart: ## Restart all containers, usage: make restart
	docker-compose restart

status: ## Show containers status, usage: make status
	docker-compose ps

log: ## Show container logs, usage: make log image=nginx
	docker-compose logs -f $(image)

composer: ## Run composer command
	@./scripts/task.composer.sh ${args}

ssh: ## Enter ssh container, usage : make ssh container=nginx
	docker run -ti ${container} sh

test: ## Run test
	@./scripts/tast.tests.sh

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'
