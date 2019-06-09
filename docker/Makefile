
TAG ?= $(shell git rev-parse --verify --short HEAD)

DOCKERFILES = $(shell find * -type f -name Dockerfile)
IMAGES = $(subst /Dockerfile,,$(DOCKERFILES))

.PHONY: help

# Help

help:
	@$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null \
		| awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' \
		| egrep -v -e '^[^[:alnum:]]' -e '^$@$$' | sort

$(addprefix .docker-set-,$(IMAGES)): .docker-set-%:
	$(eval registry		:= $(firstword $(subst /, ,$*)))
	$(eval repository	:= $(firstword $(subst /, ,$(subst $(registry)/,,$*))))
	$(eval image		:= $(lastword $(subst /, ,$*)))

$(addprefix build-,$(IMAGES)): build-%:
	docker build -t $*:$(TAG) -f $*/Dockerfile $*/context

$(addprefix push-,$(IMAGES)): push-%: tag-%
	docker push $*:$(TAG)

$(addprefix build-dev-,$(IMAGES)): build-dev-%: build-%
	docker tag $*:$(TAG) $*:dev
