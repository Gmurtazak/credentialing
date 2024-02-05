<?php

namespace App\Support\Services;

use Illuminate\Support\Facades\Redis;
use Predis\PredisException;

/**
 * Class CacheService
 * @package Support\Services
 */
class CacheService
{

    /**
     * Delete data against hash
     *
     * @param string $hash
     */
    public function delete($hash)
    {
        try {
            Redis::del($hash);
        } catch (PredisException $exception) {
        }
    }
    /**
     * Get value from redis by key
     *
     * @param string $key
     *
     * @return array
     */
    public function getByKey($key)
    {
        $value = '';
        try {
            $value = Redis::get($key);
        } catch (PredisException $exception) {
        }
        return json_decode($value, true);
    }

    /**
     * Set value in redis against key
     *
     * @param string $key
     * @param array|\Illuminate\Database\Eloquent\Collection $value
     */
    public function setByKey(string $key, array|\Illuminate\Database\Eloquent\Collection $value)
    {
        try {
            Redis::set($key, json_encode($value));
            Redis::expire($key, config('cache.duration'));
        } catch (PredisException $exception) {
            dd($exception->getMessage());
        }

    }

    /**
     *
     */
    public function deleteAll()
    {
        Redis::flushDB();
        Redis::flushDB();
    }
}
