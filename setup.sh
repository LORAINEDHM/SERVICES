export MINIKUBE_HOME=/Users/$(whoami)/goinfre
minikube start --vm-driver=virtualbox
eval $(minikube docker-env)

minikube addons enable metallb

kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.3/manifests/namespace.yaml
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.3/manifests/metallb.yaml
kubectl create secret generic -n metallb-system memberlist --from-literal=secretkey="$(openssl rand -base64 128)"

kubectl apply -f ./srcs/yaml/metallb-configmap.yaml

docker build -t nginx-img srcs/nginx
kubectl apply -f srcs/yaml/nginx.yaml

minikube dashboard &
