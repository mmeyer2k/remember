<?php 

declare(strict_types=1);

namespace App\Models;

class Remember
{
    private static $instance = null;

    private static $attrs = [];

    private function __construct()
    {

    }

    /**
     * @return Remember
     */
    public static function getInstance(): self
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Set a variable
     *
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value)
    {
        self::$attrs[$key] = $value;
    }

    /**
     * Get a variable
     *
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        if (!isset(self::$attrs[$key])) {
            throw new \Exception("Could not remember [$key]");
        }

        return self::$attrs[$key];
    }

    /**
     * Check if value is in memory
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset(self::$attrs[$key]);
    }
}
