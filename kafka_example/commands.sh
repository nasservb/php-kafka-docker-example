# create topic
kafka-topics.sh --create --bootstrap-server localhost:9092 --replication-factor 1 --partitions 1 --topic nasser

#create output log compacted topic
kafka-topics.sh --create --bootstrap-server localhost:9092 --replication-factor 1 --partitions 1 --topic nasser --config cleanup.policy=compact 

#launch a kafka comsumer 
kafka-console-consumer.sh --bootstrap-server localhost:9092 \
	--topic nasser \
	--from-beginning \
	--formatter kafka.tools.DefaultMessageFormatter \
	--property print.key=true \
	--property print.value=true \
	--property key.deserializer=org.apache.kafka.common.serialization.StringDeserializer \
	--property value.deserializer=org.apache.kafka.common.serialization.StringDeserializer 
		 
kafka-console-producer.sh --broker-list  localhost:9092 --topic nasser
