<?php


abstract class Model
{

private $host= "localhost";
private $dbname="projetinsa";
private $username="phil";
private $password="insacvl2025";
protected $_connexion;
public $table ;
public $id;

public function getConnexion()
{
    $this->_connexion=null;
    try{
        $this->_connexion=new PDO(
            'mysql:host='.$this->host.
            ';dbname='.$this->dbname,
            $this->username,$this->password
        );

    }
    catch(PDOEXCEPTION $exception){
        echo "failure\n";
        echo "Err : ".$exception->getMessage();
    }
    return $this->_connexion;
}

public function getAll()
{
    $sql="select * from ". $this->table ;
    $query= $this->_connexion->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

public function getOne()
{
    $sql="select * from ". $this ->table ."where id=".$this->id;
    $query= $this->_connexion->prepare($sql);
    $query->execute();
    return $query->fetch();
}
}

#teste Model
/*$m=new Model();
$m->table="posts";
var_dump($m->getConnexion());
var_dump($m->getAll());*/

?>