<?php

namespace app\models\HyperEntities;

use app\core\Database;
use app\core\Logger;

class HyperPharmacyModel extends HyperEntityModel
{
    public string $owner_name;
    public string $city;
    public string $phar_reg_no;
    public string $business_reg_id;
    public string $business_cert_name;
    public string $phar_cert_id;
    public string $phar_cert_name;
    public string $delivery_time;

    public function __construct($params = array()) {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public static function getByUsername(string $username): ?self
    {
        //loading the database
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $sql = "SELECT * FROM `pharmacy` WHERE `username` = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return new HyperPharmacyModel(array(
                    'username' => $row["username"],
                    'name' => $row["name"],
                    'ownerName' => $row["ownerName"],
                    'city' => $row["city"],
                    'phar_reg_no' => $row["pharmacyRegNo"],
                    'business_reg_id' => $row["BusinessRegId"],
                    'phar_cert_id' => $row["pharmacyCertId"],
                    'business_cert_name' => $row["BusinessRegCertName"],
                    'delivery_time' => $row["deliveryTime"],
                    'email' => $row["email"],
                    'address' => $row["address"],
                    'mobile' => $row["mobile"],
                ));
            }
        } catch (\Exception $e) {
            Logger::logError($e->getMessage());
            $conn->close();
        }

        return null;
    }

    public function verify(?bool $action): bool
    {
        //loading the database
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $sql = "UPDATE `pharmacy` SET `verified` = ".($action?? "NULL")." WHERE `username`='$this->username';";
            echo $sql;

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return true;
            } else {
                Logger::logError($stmt->error);
                return false;
            }
        } catch (\Exception $e) {
            Logger::logError($e->getMessage());
            return false;
        }
    }

    public function push(): bool
    {
        //loading the database
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $sql = "INSERT INTO `pharmacy` (
                        `username`, 
                        `name`, 
                        `ownerName`, 
                        `city`, 
                        `pharmacyRegNo`, 
                        `BusinessRegId`, 
                        `pharmacyCertId`, 
                        `verified`,
                        `deliveryTime`, 
                        `email`, 
                        `address`, 
                        `mobile`) 
            VALUES (
                    '$this->username', 
                    '$this->name', 
                    '$this->owner_name', 
                    '$this->city', 
                    '$this->phar_reg_no', 
                    '$this->business_reg_id',
                    '$this->phar_cert_id', 
                    '0',
                    '$this->delivery_time', 
                    '$this->email', 
                    '$this->address', 
                    '$this->mobile');";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return true;
            } else {
                Logger::logError($stmt->error);
                return false;
            }
        } catch (\Exception $e) {
            Logger::logError($e->getMessage());
            return false;
        }
    }

    public function update(): bool
    {
        //loading the database
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $sql = "UPDATE `pharmacy`
            SET `name`='$this->name',
                `ownerName`='$this->owner_name',
                `city`='$this->city',
                `pharmacyRegNo`='$this->phar_reg_no',
                `BusinessRegId`='$this->business_reg_id',
                `pharmacyCertId`='$this->phar_cert_id',
                `deliveryTime`='$this->delivery_time',
                `email`='$this->email',
                `address`='$this->address',
                `mobile`='$this->mobile',
            WHERE `username`='$this->username';";
            echo $sql;

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return true;
            } else {
                Logger::logError($stmt->error);
                return false;
            }
        } catch (\Exception $e) {
            Logger::logError($e->getMessage());
            return false;
        }
    }

    public function delete(): bool
    {
        //loading the database
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $sql = "DELETE FROM `pharmacy` WHERE `username`='$this->username';";
            echo $sql;

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                return true;
            } else {
                Logger::logError($stmt->error);
                return false;
            }
        } catch (\Exception $e) {
            Logger::logError($e->getMessage());
            return false;
        }
    }
}