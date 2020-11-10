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

class QueryBuilder extends Database
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new Database();
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
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
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
    public function select($table, $columns)
    {
        $select = [];
        foreach ($columns as $key => $value)
        {
            $select[] = "$key=:$key";
        }
        $stmt = $this->pdo->prepare("SELECT {$select} FROM {$table}");
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
    public function find($table, $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id}");
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
    public function findOrFail($table, $id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id}");
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
        catch (\Exception $e)
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
    public function where($table, $key, $value)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE $key=' $value'");
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
    public function whereNull($table, $id, $key)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id} AND $key= NULL");
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
    public function whereNotNull($table, $id, $key)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id} AND $key= NOT NULL");
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
    public function whereIn($table, $id, $key, $value)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id={$id} AND WHERE {$key} IN {$value}");
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
    public function insert($table, $params)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(' ,', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );

        $this->pdo->prepare($sql)->execute($params);
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
    public function update($table, $id, $params)
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
        $this->pdo->prepare($sql)->execute($params);
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
    public function delete($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE id={$id}");
        $stmt->execute();
    }
}
