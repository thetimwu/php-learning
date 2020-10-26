<?php

namespace App\core;

use App\models\User;

abstract class DBModel extends Model
{

    abstract public static function tableName(): string;
    abstract public static function attributes(): array;
    abstract public static function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($att) => ":$att", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
                    VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function findOne($where) //[email=>tim@example.com, firstname=>tim]
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn ($att) => "$att = :$att", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(User::class);
    }
}
