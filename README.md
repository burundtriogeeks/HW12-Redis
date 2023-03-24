# HW12-Redis

## Eviction test

Use command

```
docker run -it --rm --name php-script --network hw12-redis_app-tier -v "$PWD/app":/usr/src/myapp -w /usr/src/myapp php:8.1-fpm php eviction.php
```

to run eviction test

## Rsults of Eviction test

### volatile-lru 

![volatile-lru ](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/volatile-lru.png?raw=true)

### allkeys-lru 

![allkeys-lru ](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/allkeys-lru.png?raw=true)

### volatile-lfu 

![volatile-lfu ](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/volatile-lfu.png?raw=true)

### allkeys-lfu

![allkeys-lfu](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/allkeys-lfu.png?raw=true)

### volatile-random

![volatile-random](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/volatile-random.png?raw=true)

### allkeys-random

![allkeys-random](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/allkeys-random.png?raw=true)

### volatile-ttl

![volatile-ttl](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/volatile-ttl.png?raw=true)

### noeviction

![noeviction](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/noeviction.png?raw=true)

## Probabilistic cache

Use command

```
docker run -it --rm --name php-script --network hw12-redis_app-tier -v "$PWD/app":/usr/src/myapp -w /usr/src/myapp php:8.1-fpm php wrapper.php
```

to run probabilistic cache test

![wrapper](https://github.com/burundtriogeeks/HW12-Redis/blob/main/result/predictive%20cache.png?raw=true)
