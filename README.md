# actividad61-lamp-crud

docker compose up

docker build -t anderpr/lamp-crud-app:1.0 .

docker rmi $(docker images -a -q) --force

docker compose down -v