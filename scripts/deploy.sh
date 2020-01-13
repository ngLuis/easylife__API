#!/usr/bin/env bash

echo "********** deploy.sh - Inicio ejecución **********"
echo "... Borrando y recreando htdocs/api/ ..."
rm -rf C:/xampp/htdocs/api
mkdir C:/xampp/htdocs/api

echo "... Copiando contenido de dist/ a htdocs/api/ ..."
cp -r ./dist/* C:/xampp/htdocs/api
cp -r ./dist/.* C:/xampp/htdocs/api
echo "********** deploy.sh - Fin ejecución **********"