#!/usr/bin/env bash

git clone https://github.com/sanchezcarlosjr/uabc_db_graduated.git
cd docker-uabc_db_graduated-lamp
cp sample.env .env
docker-compose up -d
echo "Visit http://localhost"