<?php

$config = new config();
$config->setDbName('apisoft');
$config->setDrive('pgsql');
$config->setHost('localhost');
$config->setPort(5432);
$config->setUser('postgres');
$config->setPass('sqlx32');
$config->setDsn($config->getDrive() . ':host=' . $config->getHost() . ';port=' . $config->getPort() . ';dbname=' . $config->getDbName());