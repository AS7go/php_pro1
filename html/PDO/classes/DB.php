<?php

# Singelton

class DB
{
    const DB_HOST = 'db';
    const DB_NAME = 'autoparc';
    const DB_USER = 'root';
    const DB_PASS = 'secret';
    const DNS = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME;
    const OPTS=[
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ];

    protected static PDO|null $connection = null;

    public static function connect(): PDO
    {
        if (is_null(static::$connection)){
            d('init');
            static::$connection=new PDO(
                static::DNS,
                static::DB_USER,
                static::DB_PASS,
                static::OPTS
            );

        }
        return static::$connection;
    }
}