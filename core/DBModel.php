<?php

namespace App\core;

abstract class DBModel extends Model
{

    abstract public static function tableName(): string;
    abstract public static function attributes(): array;

    public function save()
    {
        $tableName = self::tableName();
        $attributes = self::attributes();
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
}
