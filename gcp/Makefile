
# For interactive prompt

SHELL = /bin/bash

# Help

help:
	@$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null \
		| awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' \
		| egrep -v -e '^[^[:alnum:]]' -e '^$@$$' | sort

#
# DM_TARGETS function to generate deployment manager targets
#
# Params:
# $(1): Project id, Google Cloud project id where to deploy.
#	$(2): YAML definition to deploy, relative to deployments path without `.yaml`.
#	$(3): Deployments path, where the yaml resides.
#       Can be empty, defaults to: ${DEFAULT_DEPLOYMENTS_PATH}/${project_id}.
#
# Public targets:
#	dm-update-$(project-id)-$(yaml-definition): Update action with deplyoment manager.
#	dm-create-$(project-id)-$(yaml-definition): Create action with deployment manager.
#
# Private targets:
#	.set-$(project-id)-$(yaml-definition): Sets the deployment variables needed for the deploy.
#	.dm-preview-$(project-id)-$(yaml-definition): Preview action with deployment manager
#

define DM_TARGETS

SHELL = /bin/bash
 
PHONY += .set-$(1)-$(2) .dm-preview-$(1)-$(2)
PHONY += dm-update-$(1)-$(2) dm-create-$(1)-$(2)

.set-$(1)-$(2):
	$(eval project_id	:= $(1))
	$(eval dm_name		:= ${project_id}-$(2))
	$(eval dm_config	:= $(if $(3), $(3)/${dm_name}.yaml, ${DEFAULT_DEPLOYMENTS_PATH}/${project_id}/$(2).yaml))

dm-create-$(1)-$(2): .set-$(1)-$(2)
	gcloud deployment-manager deployments \
		create ${dm_name} \
		--config ${dm_config} \
		--project ${project_id}

.dm-preview-$(1)-$(2): .set-$(1)-$(2)
	gcloud deployment-manager deployments \
		update ${dm_name} \
		--config ${dm_config} \
		--project ${project_id} \
		--preview

dm-update-$(1)-$(2): .set-$(1)-$(2) .dm-preview-$(1)-$(2)
	@echo -n "Ready to update, are you sure? Ctrl+C to cancel " \
		&& read ans
	gcloud deployment-manager deployments \
		update ${dm_name} \
		--project ${project_id}

endef

# Default settings

DEFAULT_REGION := europe-west1
DEFAULT_DEPLOYMENTS_PATH := ./deployments

gcloud-config-bigotes-pro:
	gcloud config set project bigotes-pro
	gcloud config set compute/region ${DEFAULT_REGION}

# Targets

$(eval $(call DM_TARGETS,rael-base,bigotes-pro-project))

$(eval $(call DM_TARGETS,bigotes-pro,base-network))
$(eval $(call DM_TARGETS,bigotes-pro,cdn-bucket))
$(eval $(call DM_TARGETS,bigotes-pro,root-bucket))