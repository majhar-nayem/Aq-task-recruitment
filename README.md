# Application Running Process

## Run with Docker

step 1: ```git clone https://github.com/majhar-nayem/Aq-task-recruitment.git```

step 2: run cmd ```./vendor/bin/sail up```
step 3:  run cmd ```./vendor/bin/sail artisan migrate```

## Without Docker

step 1: ```git clone https://github.com/majhar-nayem/Aq-task-recruitment.git```

step 2: run cmd ```composer install```

step 3: check and update .env 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=aqtask
DB_USERNAME=sail
DB_PASSWORD=password
```

step 4: run cmd ```php artisan migrate```

step 5: run cmd ```php artisan serve```


# API Endpoints

# Task 1

```{base_url}/api/task1/packet-data post body: {packet: string}```

```{base_url}/api/task1/packet-data get``` to get saved data

# Task 2

```{base_url}/api/task2/packet-data post body: {packet: string}```

```{base_url}/api/task2/packet-data get``` to get saved data
