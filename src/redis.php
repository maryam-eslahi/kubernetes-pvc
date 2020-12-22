<!DOCTYPE html>
<html>
<head>
    <title>Kubernetes Php Redis | Cloud Memory store</title>
</head>
<body>
<p>
	<?php
	//Create a redis server
	$redis = new Redis();
	//Connect to redis server, server config defined in environment variable(if the REDIS_HOST & REDIS_PORT variables have not been set, the default values '127.0.0.1' and '6379' will be set)
        $redis->connect(getenv('REDIS_HOST', '127.0.0.1'), getenv('REDIS_PORT', 6379));
      	echo 'Connection to server successful <br>';
	//set the data in redis string
	$redis->set('tutorial-name', 'Kubernetes Php Redis | Cloud Memory store');
        $redis->set('test2','mytest');
	//// Get the stored data and print it
	echo 'Value Stored string in redis: ' . $redis->get('tutorial-name');
        echo 'Value Stored string in redis: ' . $redis->get('test2');
	?>
</p>
</body>
</html>
