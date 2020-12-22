##Php Redis Application on Kubernetes

Sample Application that shows how to run Php and Redis Application on kubernetes cluster
### Run the application

Build docker images using 

`docker build -t redis-local -f Dockerfile-redis .`

`docker build -t php-apache-gke -f Dockerfile-php .`

Deploy your Deployment and Services using

`kubectl apply -f redis.yaml`

`kubectl apply -f php-apache.yaml`

Make sure they are running using `kubectl get pods` and `kubectl get services`

Build your Docker images and push it to any container registry

`docker build -t php-apache-gke:latest -f Dockerfile-php .`

`docker tag IMAGE_ID DOCKER_HUB_USERNAME/php-apache-gke:latest`

`docker push DOCKER_HUB_USERNAME/php-apache-gke:latest`

`docker build -t redis-local:latest -f Dockerfile-redis .`

`docker tag IMAGE_ID DOCKER_HUB_USERNAME/redis-local:latest`

`docker push DOCKER_HUB_USERNAME/redis-local:latest`

Now we have pushed our image to dockerhub, you can use any other container registry like google cloud container registry.

Create a configmap in your cluster to store your insatance connection details using

`kubectl create configmap redishost --from-literal=REDIS_HOST=redis --from-literal=REDIS_PORT=6379`

One final change before deployment, Change image in `php-apache.yaml` and `redis.yaml` to the image you push to the registry, remove line imagePullPolicy: Never and change Service type for `php-apache` from NodePort to LoadBalancer

Now you can Deploy your deployment and Service using 

`kubectl apply -f php-apache.yaml`

`kubectl apply -f redis.yaml`

To test Deployment use `kubectl get pods` it will show your pod running
