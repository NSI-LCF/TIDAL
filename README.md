# TIDAL - v1.0

## Installation

If you want to use Docker, you can just do:
```sh
docker-compose up -d --build
```
It will create everything you need, exposing on port 80 (by default) the web and the port 8080 for phpMyAdmin

By default, there are two users:
```
admin:admin
test:test
```

You should take a look to the .env file and change the default password to something more secure.
