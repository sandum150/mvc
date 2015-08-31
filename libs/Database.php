<?php
class Database extends PDO{
    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME , $DB_USER, $DB_PASS);
//        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * insert
     * @param string $table a name of the table
     * @param string $data an associative array
     */
    public function insert($table, $data)
    {
        ksort($data);

        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':'.implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");

        foreach($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    /**
     * update
     * @param string $table a name of the table
     * @param string $data an associative array
     * @param string $where The WHERE query part
     */
    public function update($table, $data, $where)
    {
        ksort($data);

        $fieldDetails = NULL;
        foreach($data as $key =>$value){
            $fieldDetails .= "$key = :$key, ";
        }
        $fieldDetails = rtrim($fieldDetails, ", ");

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }
}