# training-project-002
Basic training project for Name Feeder Technologies tainees

## Setup Guide
- Clone the project
- `cd training-project-002`
- `mv php/.config.php php/config.php`
- Fill the variables as below
```
define('DB_HOST', 'mysql');
define('DB', 'namefeeder_db');
define('USER', 'namefeeder_user');
define('PASSWORD', 'SuperSecretPassword1@#');
define('USER_ID_KEY', 'NameFeederUserId');
```
- `cp .env-example .env`
```
COMPOSE_PROJECT_NAME=training-app-002
DB_DATABASE=namefeeder_db
DB_USERNAME=namefeeder_user
DB_PASSWORD="SuperSecretPassword1@#"
```
- Start docker container using the below command
```
make up
```
- Run unit tests
```
make test
```
- Stop containers
```
make down
```
- Remove containers, images and volumes
```
make remove
```