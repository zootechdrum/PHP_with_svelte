<?php
class Databasesql
{
    private $host = DB_HOST_SQL;
    private $user = DB_USER_SQL;
    private $pass =  DB_USER_PASS_SQL;
    private $dbname = DB_USER_NAME_SQL;
    private $dblib = DB_SQLLIB;
    private $dbh;
    //Used when creating a statement
    private $stmt;
    //Variable to use in the case we have any errors
    private $error;


    public function __construct()
    {
        $dsn = $dsn = $this->dblib . $this->host . ';' . $this->dbname;
        //dblib is used for production purposes only. Use sqlsrv for Xampp
        // $this->dbh = new PDO('dblib:host=192.168.1.6;dbname=Snapshot', "sa", "windows");


        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}