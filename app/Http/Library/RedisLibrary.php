<?php
/**
 * RedisLibrary.php
 * @author Jhonn Carlo Valderama Rubico
 * @created 12.08.2019
 * @version 1.0
 */
namespace App\Http\Library;

use Predis\Client;

class RedisLibrary
{
    /**
     * Redis instance.
     * @var Predis\Client $oRedisInstance
     */ 
    private static $oRedisInstance;

    /**
     * Set the instance of redis client.
     * @return redis object
     */
    private static function getInstance()
    {
        if (self::$oRedisInstance === null) {
            self::$oRedisInstance = new Client();
        }
        return self::$oRedisInstance;
    }

    /**
     * Insert a redis key in the database.
     * @param string $sKey
     * @param mixed $mValue
     * @param bool $bIsTTL
     * @param int $iCacheTime
     */
    public static function set($sKey, $mValue, $bIsTTL=false, $iCacheTime=60)
    {
        self::$oRedisInstance = self::getInstance();
        self::$oRedisInstance->set($sKey, $mValue);
        if ($bIsTTL === true) {
            self::$oRedisInstance->expire($sKey, $iCacheTime * 60);
        }
    }

    /**
     * Get current data in the redis server based on key.
     * @param string $sKey
     * @return object dataset
     */
    public static function get($sKey)
    {
         self::$oRedisInstance = self::getInstance();
         return self::$oRedisInstance->get($sKey);
    }

    /**
     * Delete a dataset in the redis server based on key.
     * @param string $sKey
     * @return int (1 for success, 0 for failed)
     */
    public static function delete($sKey)
    {
        self::$oRedisInstance = self::getInstance();
        return self::$oRedisInstance->del($sKey);
    }
}
