<?php
$conf = new RdKafka\Conf();

//to enable debug mode, uncomment the line below
//$conf->set('log_level', (string) LOG_DEBUG);
//$conf->set('debug', 'all');
$producer = new RdKafka\Producer($conf);
$producer->addBrokers("kafka:9092");

$topic = $producer->newTopic("nasser");

$topic->produce(RD_KAFKA_PARTITION_UA, 0, "Message simple");
$producer->flush(10000);
