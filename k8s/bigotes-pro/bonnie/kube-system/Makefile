CLUSTER_NAME := bonnie
PROJECT := bigotes-pro
ZONE := europe-west1-b

kubectl-config:
	gcloud container clusters get-credentials $(CLUSTER_NAME) --project $(PROJECT) --zone ${ZONE}

kubectl-bootstrap-coreDNS:
	kubectl apply --as=admin --as-group=system:masters -f rbac/coreDNS.yaml
	kubectl apply -f deployments/coreDNS.yaml
	kubectl apply -f configmaps/coreDNS.yaml
	kubectl apply -f services/coreDNS.yaml
	kubectl scale --replicas=0 deployment/kube-dns-autoscaler --namespace=kube-system
	kubectl scale --replicas=0 deployment/kube-dns --namespace=kube-system

kubectl-bootstrap-traefik:
	kubectl apply --as=admin --as-group=system:masters -f rbac/traefik.yaml
	kubectl apply -f deployments/traefik.yaml
	kubectl apply -f services/traefik.yaml
	kubectl apply -f pdb/traefik.yaml