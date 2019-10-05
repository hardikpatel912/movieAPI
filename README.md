# movieAPI

Get Movie Data

## Getting Started

Please follow the instructions below to setup in the local environment.

### Prerequisites

Take clone of the repository and go inside that directory then install dependencies by running below command.

```
composer install
```

Setting up in the local machine you need to execute below command.

```
php artisan serve
```

Try to execute below url in Client like Postman HTTP client

```
http://localhost:8000/api/movie
```

parameter

```
genre: animation
time: 12:00
```

Expected result would be

```
[
    {
        "print_string": "Zootopia, Showing at 07 pm",
        "rating": 92
    },
    {
        "print_string": "Shaun The Sheep, Showing at 07 pm",
        "rating": 80
    }
]
```

### To Run the Unit Test

execute this command on terminal

```
vendor/bin/phpunit
```

### For calling API from terminal

After starting local server execute below line from terminal with passing parameters

```
curl -i -X POST -H "Content-Type:application/json" http://127.0.0.1:8000/api/movie -d '{"genre":"animation","time":"12:00"}'
```

expected result will be 

```
[{"print_string":"Zootopia, Showing at 07 pm","rating":92},{"print_string":"Shaun The Sheep, Showing at 07 pm","rating":80}]
```
