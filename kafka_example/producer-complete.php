<?php

$conf = new RdKafka\Conf();

//to enable debug mode, uncomment the line below
//$conf->set('log_level', (string) LOG_DEBUG);
//$conf->set('debug', 'all');
$producer = new RdKafka\Producer($conf);
$producer->addBrokers("kafka:9092");

$topic = $producer->newTopic("nasser");

for ($i = 0; $i < 10; $i++) {
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, "Message $i");
    $producer->poll(0);
}

for ($flushRetries = 0; $flushRetries < 10; $flushRetries++) {
    $result = $producer->flush(10000);
    if (RD_KAFKA_RESP_ERR_NO_ERROR === $result) {
        break;
    }
}

if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
    throw new \RuntimeException('Was unable to flush, messages might be lost!');
}

