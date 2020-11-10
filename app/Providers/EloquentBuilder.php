<?php
/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for Query Builder
 */

namespace App\Providers;

class EloquentBuilder extends Provider
{
    private $pdo;
    public function __construct(Database $database)
    {
        $this->pdo = $database;
//        dd($this->pdo);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for select all from table
     *
     * @param $table
     * @return mixed
     */
    public function selectAll($table)
    {
//        dd($this->pdo);
        $pdo = new \PDO("mysql:host=localhost;dbname=footman_2;", "root", "");
        $stmt = $pdo->prepare("select * from {$table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for get all from table
     *
     * @param $table
     * @return mixed
     */
    public function get($table)
    {
        return $this->selectAll($table);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for select from table
     *
     * @param $table
     * @param $columns
     * @return mixed
     */
    public function selectModel($table, $columns)
    {
        $select = [];
        foreach ($columns as $key => $value)
        {
            $select[] = "$key=:$key";
        }
        $stmt = self::$pdo->prepare("SELECT {$select} FROM {$table}");
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for find id
     *
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findModel($table, $id)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM {$table} WHERE id={$id}");
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for findOrFail id
     *
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOrFailModel($table, $id)
    {
        try {
            $stmt = self::$pdo->prepare("SELECT * FROM {$table} WHERE id={$id}");
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
        catch (\PDOException $e)
        {
            dd($e->getMessage());
        }
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for conditional to database
     *
     * @param $table
     * @param $key
     * @param $value
     * @return mixed
     */
    public function whereModel($table, $key, $value)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM {$table} WHERE $key=' $value'");
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 11/10/2020 10:24 AM by ahmad montazeri
     * Modified At:.
     *
     * this method for whereNull
     *
     * @param $table
     * @param $id
     * @param $key
     * @return mixed
     */
    public function whereNullModel($table, $id, $key)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM {$table} WHERE id={$id} AND $key= NULL");
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 11/10/2020 10:24 AM by ahmad montazeri
     * Modified At:.
     *
     * this method for whereNotNull
     *
     * @param $table
     * @param $id
     * @param $key
     * @return mixed
     */
    public function whereNotNullModel($table, $id, $key)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM {$table} WHERE id={$id} AND $key= NOT NULL");
        $stmt->excute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 11/10/2020 10:24 AM by ahmad montazeri
     * Modified At:.
     *
     * this method for whereIn
     *
     * @param $table
     * @param $id
     * @param $key
     * @param $value
     * @return mixed
     */
    public function whereInModel($table, $id, $key, $value)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM {$table} WHERE id={$id} AND WHERE {$key} IN {$value}");
        $stmt->excute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for insert into data to database
     * @param $table
     * @param $params
     */
    public function insertModel($table, $params)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(' ,', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );

        self::$pdo->prepare($sql)->execute($params);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for update data
     *
     * @param $table
     * @param $id
     * @param $params
     */
    public function updateModel($table, $id, $params)
    {
        $maked = [];
        foreach ($params as $key => $value) {
            $maked[] = "$key=:$key";
        }
        $sql = sprintf(
            "update %s set %s where id=$id",
            $table,
            implode(', ', $maked)
        );
        self::$pdo->prepare($sql)->execute($params);
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * @param $table
     * @param $id
     */
    public function deleteModel($table, $id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM {$table} WHERE id={$id}");
        $stmt->execute();
    }
}
new EloquentBuilder(new Database());