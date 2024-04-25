<?php

class DB
{
    public const HOST = "localhost";
    public const DBNAME = "services";
    public const USERNAME = "root";
    public const PASSWORD = "";

    protected static $_stmt = null;

    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USERNAME, self::PASSWORD, []);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $conn;
    }

    public static function query($sql, $params = array())
    {
        try {
            self::$_stmt = self::getConnection()->prepare($sql);

            if (empty($params)) {
                self::$_stmt->execute();
            } else {
                self::$_stmt->execute($params);
            }

            return self::$_stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getStmt()
    {
        return self::$_stmt;
    }

    // Fetch all services from the database
    public static function getServices()
    {
        $sql = "SELECT * FROM services";
        $stmt = self::query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch all cities from the database
    public static function getCities()
    {
        $sql = "SELECT * FROM cities";
        $stmt = self::query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Insert an image for a provider
    public static function insertProviderImage($providerId, $imageName)
    {
        $sql = "INSERT INTO provider_images (provider_id, image_name) VALUES (?, ?)";
        self::query($sql, [$providerId, $imageName]);
    }

    // Get all images for a provider
    public static function getProviderImages($providerId)
    {
        $sql = "SELECT * FROM provider_images WHERE provider_id = ?";
        $stmt = self::query($sql, [$providerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
