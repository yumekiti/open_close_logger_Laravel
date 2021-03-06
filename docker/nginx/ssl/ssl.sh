if (cat ./docker/docker-compose.yml | grep /nginx/conf.d > /dev/null 2>&1); then
    cd ./docker/nginx/ssl/ && \
    openssl req -x509 -nodes -new -keyout server.key -out server.crt -days 365 && \
    cd ../../ && \
    sed -i -e "s/build: .\/nginx\//build: .\/nginx\/ssl\//g" docker-compose.yml ; \
    sed -i -e "11d" docker-compose.yml ; \
    cd ../
else
    echo "ssl done"
fi