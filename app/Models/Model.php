<?php
namespace App\Models;

use App\Providers\EloquentBuilder;

class Model extends EloquentBuilder
{
    protected static $table;
    public static function all()
    {
        return self::selectAll(static::$table);
    }

    public static function create($values)
    {
        parent::insertModel(static::$table, $values);
    }

    public static function find($id)
    {
        return self::findModel(static::$table, $id);
    }

    public static function where($key, $value)
    {
        return parent::whereModel(static::$table, $key, $value);
    }

    public static function update($id, $values)
    {
        parent::updateModel(static::$table, $id, $values);
    }

    public static function delete($id)
    {
        parent::deleteModel(static::$table, $id);
    }
}