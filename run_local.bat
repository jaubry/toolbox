docker image build -t toolbox_local -f Dockerfile.local .
docker rm -f toolbox_local
docker run -it -d -p 80:80 -p 9001:9001 -v //c/projets/sites/outils/2022_toolbox:/var/www/html --name toolbox_local toolbox_local