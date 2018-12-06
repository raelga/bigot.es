
GCP_PROJECT ?= bigotes-pro
GCP_REGION ?= europe-west1

REGISTRY ?= eu.gcr.io/${GCP_PROJECT}
TAG ?= $(shell git rev-parse --verify --short HEAD)

DOCKERFILES = $(shell find * -type f -name Dockerfile)
IMAGES = $(subst /,\:,$(subst /Dockerfile,,$(DOCKERFILES)))

.PHONY: help

# Help

help:
	@$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null \
		| awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' \
		| egrep -v -e '^[^[:alnum:]]' -e '^$@$$' | sort


gcloud-config-bigotes-pro-docker:
	@gcloud config set project ${GCP_PROJECT}
	@gcloud config set compute/region ${GCP_REGION}
	@gcloud auth configure-docker

$(addprefix build-,$(IMAGES)): build-%:
	docker build -t $*:$(TAG) $*

$(addprefix tag-,$(IMAGES)): tag-%:
	docker tag $*:$(TAG) $(REGISTRY)/$*:$(TAG)

$(addprefix push-,$(IMAGES)): push-%: tag-%
	docker push $(REGISTRY)/$*:$(TAG)
