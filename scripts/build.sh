#!/usr/bin/env bash

echo "********** build.sh - Inicio ejecución **********"
echo "... Borrando y recreando dist/ ..."
rm -rf ./dist/
mkdir ./dist/

echo "... Copiando contenido de src/ a dist/ ..."
cp -r ./src/.env ./dist/
cp -r ./src/* ./dist/
echo "********** build.sh - Fin ejecución **********"