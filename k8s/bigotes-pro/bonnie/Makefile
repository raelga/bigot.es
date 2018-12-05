CLUSTER_NAME := bonnie
PROJECT := bigotes-pro
ZONE := europe-west1-b

kubectl-config:
	gcloud container clusters get-credentials $(CLUSTER_NAME) --project $(PROJECT) --zone ${ZONE}

kubectl-busybox: kubectl-config
	kubectl create -f https://k8s.io/examples/admin/dns/busybox.yaml