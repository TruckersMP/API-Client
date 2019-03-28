<?php

/**
 * Example of caching API request with phpFastCache
 *
 * @see http://www.phpfastcache.com/
 */

use phpFastCache\CacheManager;
use TruckersMP\Helpers\Client;

// Setup File Path on your config files
CacheManager::setup([
                        "path" => '/path/to/your/cache/folder',
                    ]);

// In your class, function, you can call the Cache
$InstanceCache = CacheManager::getInstance('files');

$client = new Client();

/**
 * Try to get $products from Caching First
 * product_page is "identity keyword";
 */
$key           = "player_" . $player_id;
$CachedRequest = $InstanceCache->getItem($key);

if (is_null($CachedRequest->get())) {
    $request = $client->player($player_id);

    $CachedRequest->set($request)->expiresAfter(5);//in seconds, also accepts Datetime
    $InstanceCache->save($CachedRequest); // Save the cache item just like you do with doctrine and entities
}

var_dump($CachedRequest->get());
