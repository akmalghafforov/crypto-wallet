SHELL := /bin/bash

ifeq ($(wildcard ./vendor/bin/sail),./vendor/bin/sail)
ARTISAN := ./vendor/bin/sail artisan
else
ARTISAN := php artisan
endif

.PHONY: help artisan migrate fresh seed tinker test keygen cache-clear optimize-clear route-list queue-work

help:
	@echo "Available targets:"
	@echo "  make artisan cmd='route:list'   Run any artisan command"
	@echo "  make migrate                    Run migrations"
	@echo "  make fresh                      Fresh migrate with seed"
	@echo "  make seed                       Run database seeders"
	@echo "  make tinker                     Open artisan tinker"
	@echo "  make test                       Run tests"
	@echo "  make keygen                     Generate app key"
	@echo "  make cache-clear                Clear app cache"
	@echo "  make optimize-clear             Clear compiled/cache files"
	@echo "  make route-list                 Show route list"
	@echo "  make queue-work                 Start queue worker"

artisan:
	@if [ -z "$(cmd)" ]; then \
		echo "Usage: make artisan cmd='your:command --option=value'"; \
		exit 1; \
	fi
	@$(ARTISAN) $(cmd)

migrate:
	@$(ARTISAN) migrate

fresh:
	@$(ARTISAN) migrate:fresh --seed

seed:
	@$(ARTISAN) db:seed

tinker:
	@$(ARTISAN) tinker

test:
	@$(ARTISAN) test

keygen:
	@$(ARTISAN) key:generate

cache-clear:
	@$(ARTISAN) cache:clear

optimize-clear:
	@$(ARTISAN) optimize:clear

route-list:
	@$(ARTISAN) route:list

queue-work:
	@$(ARTISAN) queue:work
