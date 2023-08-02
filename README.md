# how to use kafka in php when using docker-compose
by using this project, you could use kafka in php. 
#how to use : 
# pull images and up project: 
```bash
docker-compose up -d
exit
```
# add kafka extention on php:
```bash
docker-compose exec php bash
apk add librdkafka
pecl install rdkafka
docker-php-ext-enable  rdkafka
exit
```
# create topic 
```bash
docker-compose exec kafka bash
#create topic 
kafka-topics.sh --create --bootstrap-server localhost:9092 --replication-factor 1 --partitions 1 --topic nasser
exit 
```
# open new terminal window for consumer: 
```bash
docker-compose exec php bash 
php kafka_example/consumer-high-level.php
```
# keep open this teminal and open new terminal for producer:
```bash
docker-compose exec php bash 
php kafka_example/producer-simple.php
```
