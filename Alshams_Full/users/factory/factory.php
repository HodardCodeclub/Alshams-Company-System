      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

// include_once("../common_assets/DB_Commands/Connect_DB.php");
// class textinput
class textinput{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalidnumberofattributes');
        }
        $this->html='<input type="text" class="form-control" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}

// class paragraph
class paragraph{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalidnumberofattributes');
        }
        $this->html='<p class="form-control">';
        foreach($attributes as $attribute=>$value){
            $this->html.=$value;
        }
        $this->html.='</p>';
    }
    public function getHTML(){
        return $this->html;
    }
}

// class header
class header{
    
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalidnumberofattributes');
        }
        $this->html='<h3>';
        foreach($attributes as $attribute=>$value){
            $this->html.=$value;
        }
        $this->html.='</h3>';
    }
    public function getHTML(){
        return $this->html;
    }
}

// class dateinput
class dateinput{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="date" class="form-control"';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}

// class passwordinput
class passwordinput{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="password" class="form-control" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}

// class hiddeninput
class hiddeninput{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="hidden" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class fileinput
class fileinput{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="file" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class imageinput
class imageinput{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="image" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class radiobutton
class radiobutton{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="radio" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class checkbox
class checkbox{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="checkbox" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class button
class button{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="button" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class submitbutton
class submitbutton{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }

        $this->html='<input type="submit" class="form-control"';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class resetbutton
class resetbutton{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<input type="reset" ';
        foreach($attributes as $attribute=>$value){
            $this->html.=$attribute.'="'.$value.'" ';
        }
        $this->html.='/>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class textarea
class textarea{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<textarea class="form-control" ';
        $textvalue;
        foreach($attributes as $attribute=>$value){
            ($attribute!='value')?$this->html.=$attribute.'="'.$value.'" ':$textvalue=$value;
        }
         $this->html=preg_replace("/'? $/",'"> ',$this->html);
        $this->html.=$textvalue.'</textarea>';
    }
    public function getHTML(){
        return $this->html;
    }
}
// class selectbox
class selectbox{
    private $html;
    public function __construct($attributes=array()){
        if(count($attributes)<1){
            throw new Exception ('Invalid number of attributes');
        }
        $this->html='<select class="form-control"';
        $options="";
        foreach($attributes as $attribute=>$value){
            if($attribute!='options'){
                $this->html.=$attribute.'="'.$value.'" ';
            }
            else{
                foreach($value as $values=>$label){
                    $options.='<option value="'.$values.'">'.$label.'</option>';
                }
            }
        }
        
        $this->html=preg_replace("/'? $/",'">',$this->html);
        $this->html.=$options.'</select>';
    }
    public function getHTML(){
        return $this->html;
    }
}

// abstract class formElementFactory
abstract class formElementFactory{
    private function __construct(){}
    public static function createElement($type,$attributes=array()){
        if(!class_exists($type)||!is_array($attributes)){
            throw new Exception('Invalid method parameters');
        }
        // instantiate a new form element object
        $formElement=new $type($attributes);
        // return HTML of form element code
        return $formElement->getHTML();
    }
}

class formGenerator{
    // data member declaration
    private $elements=array(); // array of form elements
    private $output=""; // dynamic output
    private $elementHeader=""; // element header
    private $elementFooter='<br />'; // element footer
    private $name=''; // form name
    private $method=''; // form method
    private $action = ''; // form action

    // constructor
    public function __construct($elements=array()){
        if(count($elements)<1){
            throw new Exception('Invalid number of elements');
        }
        // data member initialization
        $this->elements=$elements;
        // $this->action=$_SERVER['PHP_SELF'];
       
    }
    // create form code
    public function createForm($action){
        $this->output.='<form name="'.$this->name.'"
action="'.$action.'" method="'.$this->method.'">';
        foreach($this->elements as $element=>$attributes){
            // call the abstract class formElementFactory
            $this->output.=$this->elementHeader.formElementFactory::createElement($element,$attributes).$this->elementFooter;
        }
        $this->output.='</form>';
    }
    // add form part
    public function addFormPart($html='<br />'){
        $this->output.=$html;
    }
    // add element header
    public function addElementHeader($header){
        $this->elementHeader=$header;
    }
    // add element footer
    public function addElementFooter($footer){
        $this->elementFooter=$footer;
    }
    // set form name
    public function setName($name){
        $this->name=$name;
    }
    // set form action
    public function setAction($action){
        $this->action=$action;
    }
    // set form method
    public function setMethod($method){
        if($method!='POST'&&$method!='GET'){
            throw new Exception('Invalid form method');
        }
        $this->method=$method;
    }
    // get dynamic form output
    public function getFormCode(){
        return $this->output;
    }
}


// $formElements=array('submitbutton'=>array
// ('name'=>'ayhaga','value'=>'zorar'),'passwordinput'=>array
// ('name'=>'password','maxlength'=>'20'),'selectbox'=>array
// ('name'=>'login','options'=>array('option1','option2')));


?>