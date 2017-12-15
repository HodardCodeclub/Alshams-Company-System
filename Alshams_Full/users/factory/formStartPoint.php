<?php
include_once("../common_assets/DB_Commands/Connect_DB.php"); 
include_once("formclasses.php"); 
include_once("factory.php");  

$mycall = ServerCommunications::getInstance();

if ( isset($_POST['createform']))
{
	$name = $_POST['formname'];
	$method=$_POST['method'];
	$action = $_POST['action'];
     $pageid = $_POST['pageid'];

    $form=new Form("");
    $form->name=$name;
    $form->method=$method;
    $form->action=$action;

    $form->addform($form,$pageid);
}

if(isset($_POST['addattribute']))
{
	$nameattribute = $_POST['attributename'];
    $form = $_POST['form'];
    $attributetype = $_POST['attributetype'];

    $attribute=new Attribute("");
    $attribute->name=$nameattribute;
    $attribute->type=$attributetype;

    $formobj=new Form("");

    $formobj->addAttribute($attribute,$form);
}

?>