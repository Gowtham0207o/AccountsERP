<?php

class database
{
    private static $conn = null;

    public static function get_connection()
    {
        if (self::$conn === null) {

            $conn = new mysqli(
                get_config('db_server'),
                get_config('db_user'),
                get_config('db_pass'),
                get_config('db_name')
            );

            if ($conn->connect_error) {
                error_log('DB ERROR: ' . $conn->connect_error);
                throw new Exception('Database connection failed');
            }

            $conn->set_charset('utf8mb4');
            self::$conn = $conn;
        }

        return self::$conn;
    }
}
