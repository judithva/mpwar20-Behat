all: help
#    |__   __|      __|__   __|
#       | | __     /  __| |
#       | |/ _ \   \   \| |
#       | |  __/ |__/  /| |
#       |_|\___|\_____/ |_|

.PHONY : help
help : Makefile
		@sed -n 's/^##\s//p' $<

SHELL := /bin/bash
ROOT_DIR := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
UID=$(shell id -u)

define docker_phpcli_run
        docker-compose -f docker-compose.cli.yml run \
                --rm \
                --no-deps \
                --entrypoint=/bin/bash \
                -e HOST_USER=${UID} \
                -e TERM=xterm-256color \
                php-cli -c "$1"
endef

##    interactive:                      runs a container with an interactive shell
.PHONY : interactive
interactive:
		-@docker-compose -f docker-compose.cli.yml run \
                --rm \
                --no-deps \
                -e HOST_USER=${UID} \
                -e TERM=xterm-256color \
                php-cli /bin/zsh -l