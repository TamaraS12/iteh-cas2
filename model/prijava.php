<?php

class Prijava{

public $id;
public $katedra;
public $predmet;
public $sala;
public $datum;

public function _construct($id=null,$predmet=null,$katedra=null,$sala=null,$datum=null){

  $this->id= $id;
  $this->predmet= $predmet;
  $this->katedra= $katedra;
  $this->sala= $sala;
  $this->datum= $datum;
}

public static function getAll($conn){

 $query= "SELECT * FROM prijave";
 return $conn->query($query);
}

public static function getById($id, mysqli $conn){

    $query= "SELECT * FROM prijave WHERE id= $id";
    $rezultat= $conn->query($query);
    $myArray= array();
    if($rezultat){
        while($red= $rezultat->fetch_array()){
            $myArray[]= $red;
         }
    }
    
    return $myArray;
}

public function deleteById(mysqli $conn){

    $query= "DELETE FROM prijava WHERE id= $this->id";
    return $conn->query($query);
}

public static function add(Prijava $prijava, mysqli $conn){

    $q="INSERT INTO prijave(predmet,katedra,sala,datum) VALUES('$prijava->predmet','$prijava->katedra','$prijava->sala','$prijava->datum')";
    return $conn->query($q);
}

public function update(msqli $conn){

    $query="UPDATE prijave set predmet= '$this->predmet', katedra= '$this->katedra', sala='$this->sala', datum='$this->datum'";
    return $conn->query($query);
}
  
}




?>