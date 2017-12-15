<?php


class Report{


public $usertype_id;
public $id;
public $name;
public $sql_statement;

private $mycall;


function __construct($id=""){

    $this->mycall = ServerCommunications::getInstance();

    if($id !="")
    {
        $syntax = "SELECT * FROM `report` WHERE timeplan_stage.idTimePlan_Stage ='$id' ";
        $Views = mysqli_query($this->mycall->start , $syntax) or die(mysqli_error($this->mycall->start));
        if($data = mysqli_fetch_array($Views))
          {
            $this->id = $data["id"];
            $this->name = $data["name"];
            $this->sql_statement = $data["sql_statement"];
            $this->usertype_id = $data["usertype_id"];
          }
    }

  }




}

?>