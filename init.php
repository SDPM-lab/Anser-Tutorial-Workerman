<?php

require_once './vendor/autoload.php';

use SDPMlab\Anser\Service\ServiceList;
use SDPMlab\Anser\Orchestration\Saga\Cache\CacheFactory;
use SDPMlab\Anser\Orchestration\Saga\Cache\Redis\Config;

ServiceList::addLocalService(
    name: "ProductionService",
    address: "production-service",
    port: 8080,
    isHttps: false
);

ServiceList::addLocalService(
    name: "UserService",
    address: "user-service",
    port: 8080,
    isHttps: false
);

ServiceList::addLocalService(
    name: "OrderService",
    address: "order-service",
    port: 8080,
    isHttps: false
);

//定義常數 Log 位置
define("LOG_PATH", __DIR__ . DIRECTORY_SEPARATOR ."Logs" . DIRECTORY_SEPARATOR);

//定義 Orch 備援機制 Cache 連線資訊
CacheFactory::initCacheDriver(CacheFactory::CACHE_DRIVER_PREDIS, new Config(
    host: "anser_redis",
    port: 6379,
    db: 1,
    serverName: 'AnserTutorialService'
));
