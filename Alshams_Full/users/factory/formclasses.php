<?php

class Form 
{
	public $id;
	public $action;
	public $name;
	public $method;
	public $attributes;
	public $mycall;

	function __construct($id="")
	{
		$this->mycall = ServerCommunications::getInstance();
		$attributes[]=new attribute();

		if($id!="")
		{

			$sql="SELECT * FROM form where id='$id'";
			$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->id=$row['id'];
				$this->action=$row['action'];
				$this->name=$row['name'];
				$this->method=$row['method'];

			}
			$sql1="SELECT attribute.id, attribute.name,attribute.attribute_type_id from attribute,form, form_attribute where form_attribute.form_id='$this->id' and attribute.id=form_attribute.attribute_id";
			$result2=mysqli_query($this->mycall->start,$sql2) or die(mysqli_error($this->mycall->start));
			$i=0;
			while($row2= mysqli_fetch_array($result2))
			{
				$this->$attributes[$i]->id=$row2['id'];
				$this->$attributes[$i]->name=$row2['name'];
				$this->$attributes[$i]->type=$row2['attribute_type_id'];
				$i++;

			}
		}
	}
	
	function addform($form,$pageid)
	{

		$sql="INSERT INTO form(name,method,action,page_id)VALUES('$form->name','$form->method','$form->action','$pageid')";
		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));

	}

	function addAttribute($attribute,$formid)
	{
		$nameattribute=$attribute->name;
		$attributetype=$attribute->type;

		$sql="INSERT INTO attribute(name,attribute_type_id)VALUES('$nameattribute','$attributetype')";
		$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));

        $id=$attribute->getAttributeID($nameattribute);
        $sql1="INSERT INTO form_attribute(form_id,attribute_id)VALUES('$formid','$id')";
        $result1=mysqli_query($this->mycall->start,$sql1) or die(mysqli_error($this->mycall->start));

	}

		static function getAllFormsNames()
	{
				$call = ServerCommunications::getInstance();

		$sql="SELECT name from form";
		$result=mysqli_query($call->start,$sql) or die(mysqli_error($call->start));
		$i=0;

					while($row= mysqli_fetch_array($result))
			{
				$array[$i]=$row['name'];
				$i++;

			}
			return $array;

	}

			static function getAllFormsIDs()
	{
		$call = ServerCommunications::getInstance();
		$sql="SELECT id from form";
		$result=mysqli_query($call->start,$sql) or die(mysqli_error($call->start));
		$i=0;

					while($row= mysqli_fetch_array($result))
			{
				$array[$i]=$row['id'];
				$i++;

			}
			return $array;
	}

	function showForm($formName)
	{
		
		$sql0 = "SELECT form.action ,form.method, form.name FROM form,page  where page.id ='1' and  form.name = '$formName'";
		$result0=mysqli_query($this->mycall->start,$sql0) or die(mysqli_error($this->mycall->start));
		
	 		if($row0 = mysqli_fetch_array($result0))
	 		{
	 			$name = $row0['name'];
	 			$action = $row0['action'];
	 			$method = $row0['method'];
	 		}

	 		
		
		$sql = "SELECT attribute_type.name, attribute.name FROM attribute_type,form_attribute,attribute,form  where form.name = '$formName' AND form.id = form_attribute.form_id AND attribute.id = form_attribute.id AND attribute.attribute_type_id = attribute_type.id";
		
	 	$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
	 	$i=0;
	 	while($row = mysqli_fetch_array($result))
	 	{

	 		if($row[0] == 'textarea')
	 		{
	 			$formElements = array($row[0]=>array('name'=>$row[1], 'value'=>''));
	 		}
	 		else{
	 			$formElements = array($row[0]=>array('name'=>$row[1]));
	 		}

	 		if($row[0] == 'selectbox')
	 		{
	 			$x =0;
	 			$optArray = array();
	 			$sql2 = "SELECT * FROM project_type";
		   		 $result2=mysqli_query($this->mycall->start,$sql2) or die(mysqli_error($this->mycall->start));

	 			while ($row2 = mysqli_fetch_array($result2)) {
	 				$optArray[$x] = $row2[1];
	 				$x++;	
	 			}

	 			$outArray = $optArray;
	 			$formElements = array($row[0]=>array('name'=>$row[1], 'options'=>$outArray));		
	 		}
	 		
	 		$fg[$i]=new formGenerator($formElements);
	 		
	 		$fg[$i]->setName($name);

	 		$fg[$i]->setMethod($method);
	 	// 	// add element labels
			// $fg[$i]->addFormPart('<table "style=float:left;"><tr><td> <td></tr></table>');
			// // add a table to the form code
			// $fg[$i]->addFormPart('<table>');
			// // add a table row as element header
			// $fg[$i]->addElementHeader('<tr><td>');
			// // add closing tags
			// $fg[$i]->addElementFooter('</td></tr>');
			// generate form
			$fg[$i]->createForm($action);
			// add a closing </table> tag
			// $fg[$i]->addFormPart('</table>');
			// display the form
			$i++;
			// echo $fg->getFormCode();

	 	}
			return $fg;	 		 	
	}
}
class Attribute 
{
	public $id;
	public $name;
	public $type;
	public $mycall;

	
	function __construct($id="")
	{
		$this->mycall = ServerCommunications::getInstance();

		if($id!="")
		{
			$sql = "SELECT * From attribute where id = '$id'";
			$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
			if($row = mysqli_fetch_array($result))
			{
				$this->id=$row['id'];
				$this->name=$row['name'];
				$this->type=$row['attribute_type_id'];   //henaaaaaaaa
			}
		}
	}

	function getAttributeID($attributeName)
	{
		    $name = "%".$attributeName."%";

		$sql="SELECT id from attribute where name like '$name'";
	    $result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
	    			if($row = mysqli_fetch_array($result))
			{
				$this->id=$row['id'];

			}
			return $this->id;

	}

}

class AttributeType{
	public $id;
	public $type;
	public $mycall;


	function __construct($id="")
	{	
		$this->mycall = ServerCommunications::getInstance();
				if($id!="")
		{
			$sql="SELECT * from attribute_type where id='$id'";
		    $result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));
		    			if($row = mysqli_fetch_array($result))
			{
				$this->id=$row['id'];
				$this->type=$row['name'];
			}

		}

	}
	static function getAllTypes()
	{
				$call = ServerCommunications::getInstance();

		$sql="SELECT name from attribute_type";
		$result=mysqli_query($call->start,$sql) or die(mysqli_error($call->start));
		$i=0;

					while($row= mysqli_fetch_array($result))
			{
				$array[$i]=$row['name'];
				$i++;

			}
			return $array;
	}

		static function getAllTypesIDs()
	{
				$call = ServerCommunications::getInstance();

		$sql="SELECT id from attribute_type";
		$result=mysqli_query($call->start,$sql) or die(mysqli_error($call->start));
		$i=0;

					while($row= mysqli_fetch_array($result))
			{
				$array[$i]=$row['id'];
				$i++;

			}
			return $array;
	}

}

class Page{
	public $id;
	public $header;
	public $footer;
	public $forms;
		function __construct($id="")
	{
				$this->mycall = ServerCommunications::getInstance();
				$this->forms[] = new Form();

				if($id!="")
				{
					$sql = "SELECT * FROM page where id='$id'";
					$result=mysqli_query($this->mycall->start,$sql) or die(mysqli_error($this->mycall->start));


			if($row = mysqli_fetch_array($result))
			{
				$this->id=$row['id'];
				$this->header=$row['header'];
				$this->footer=$row['footer'];


			}
			$sql2="SELECT * FROM form where page_id='$id'";
			$result2=mysqli_query($this->mycall->start,$sql2) or die(mysqli_error($this->mycall->start));
						$i=0;
			while($row2= mysqli_fetch_array($result2))
			{
				$this->$forms[$i]->id=$row2['id'];
				$this->$forms[$i]->name=$row2['name'];
				$this->$forms[$i]->action=$row2['action'];
			    $this->$forms[$i]->method=$row2['method'];


				$i++;

			}
				}
	}

	static function getAllPagesNames()
	{
				$call = ServerCommunications::getInstance();
		$sql="SELECT name from page";
		$result=mysqli_query($call->start,$sql) or die(mysqli_error($call->start));
		$i=0;

					while($row= mysqli_fetch_array($result))
			{
				$array[$i]=$row['name'];
				$i++;

			}
			return $array;
	}

		static function getAllPagesIDs()
	{
				$call = ServerCommunications::getInstance();
		$sql="SELECT id from page";
		$result=mysqli_query($call->start,$sql) or die(mysqli_error($call->start));
		$i=0;

					while($row= mysqli_fetch_array($result))
			{
				$array[$i]=$row['id'];
				$i++;

			}
			return $array;
	}

}



?>