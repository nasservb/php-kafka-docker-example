# how to use kafka in php when using docker-compose
by using this project, you could use kafka in php. 
#how to use : 
```bash
docker-compose up -d
docker-compose exec kafka bash 
#create topic 
kafka-topics.sh --create --bootstrap-server localhost:9092 --replication-factor 1 --partitions 1 --topic nasser
exit 

docker-compose exec php bash 
php kafka_example/consumer-high-level.php
#keep open this teminal and open new terminal 
docker-compose exec php bash 
php kafka_example/producer-simple.php
```
