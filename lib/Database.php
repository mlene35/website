<?php

class Database
{
    protected static $instance = null;
    /** @var PDO */
    protected $connection = null;

    /** @var PDOStatement */
    protected $result = null;
    /**
     * Private ctor so nobody else can instance it
     *
     */
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
    /**
     * Baut eine Verbindung auf, mit fehlerbehandlung
     *
     * @return $this
     */
    public function connect()
    {
        if (is_null($this->connection)) {
            try{
                $this->connection = new PDO('mysql:host=127.0.0.1;dbname=mlen', 'root', 'test');
            } catch (PDOException $e){
                var_dump('Exception ' . $e->getMessage());
                die();
            }
        }
        return $this;
    }

    public function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connect();
        }
        return $this->connection;
    }

    //Die Loesch-Funktiom
    public function delete($galleryimage,$id)
    {
        $sqlDelete = "DELETE FROM " . $galleryimage . " WHERE id= :id";
        $this->query($sqlDelete, array('id' => $id));
    }

    public function query($sql, array $params = array()){
        $connection = $this->getConnection();

        $this->result = $connection->prepare($sql);

        $this->result->execute($params);
        //check for mysql errors
        if (!$this->result) {
            var_dump($connection->errorInfo());
            throw new Exception(sprintf(
                    'Query failed for query "%s"',
                    $sql
                )
            );
        }
        return $this;
    }

    public function update($tableName, array $data, array $where = array())
    {
        $sql = "UPDATE `" . $tableName . "` SET";

        $sqlParts = array();
        foreach($data as $column => $value){
            $sqlParts[] = $column . ' = :' .$column;
        }
        $sql .= ' ' . implode(',', $sqlParts);

        if($where){
            $sql .= ' WHERE ';
            foreach($where as $key => $value){
                $sql .= $key . '= :' . $key;
            }
        }
        $data = array_merge($data, $where);
        $this->query($sql, $data);
    }

    /*
        UPDATE gallery_image SET title = "test title", alt = "test alt" WHERE id = 5

     */

    public function getResult(){
        return $this->result;
    }

    public function fetchArray(){
        return $this->getResult()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchRow(){
        $result = $this->fetchArray();
        if(!$result){
            return false;
        }
        return reset($result);
    }
}