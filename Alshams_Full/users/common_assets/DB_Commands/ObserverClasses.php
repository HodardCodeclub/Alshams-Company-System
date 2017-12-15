<?php
include_once('project_Manager.class.php');

abstract class Observer {
    abstract function update(Notification $notification);
}

abstract class Notification {
    abstract function attach(Observer $observer);
    abstract function detach(Observer $observer);
    abstract function notify();
}
class MessageSimulater extends Observer {
    public function __construct() {
    }
    public function update(Notification $notification) {

      	$notification->getMessages();
    }
}


// function writeln($line_in) {
//     echo $line_in."<br/>";
// }
class WarningNotification extends Notification {
    private $message;
    private $observers = array();
    function __construct() {
    }
     public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
   return $this;
  }

    function attach(Observer $observer) {
      $this->observers[] = $observer;
    }
    function detach(Observer $observer) {
      foreach($this->observers as $list => $value) {
        if ($value == $observer) { 
          unset($this->observers[$list]);
        }
      }
    }
    function notify() {
      foreach($this->observers as $obs) {
        $obs->update($this);
      }
    }
    function updateMessages($stages) {

    date_default_timezone_set("Africa/Cairo");
    $date=date("d-m-Y");
    $current=strtotime($date);

            $mydate=strtotime($stages->to);
    if($current>$mydate)
          {
       $this->message = "deadline Exceeded";
       $this->notify();
           }
 else if($current==$mydate)
 {
 	   $this->message = "deadline Date";
       $this->notify();

 }
 else
 {
 	   $this->message = "deadline is not reached";
       $this->notify();

 }
    	  
    	     }
    function getMessages() {
      return $this->message;
    }
}
  // $MessageSimulater = new MessageSimulater();//observer
  // $WarningNotification = new WarningNotification();//subject
  // $WarningNotification->attach($MessageSimulater);
  // $WarningNotification->updateMessages('abstract factory, decorator, visitor');
  // $WarningNotification->updateMessages('abstract factory, observer, decorator');
  // $WarningNotification->detach($MessageSimulater);
  // $WarningNotification->updateMessages('abstract factory, observer, paisley');

// $array=project_Manager::ViewProjectState("shroouk compound");

// $MessageSimulater = new MessageSimulater();//observer
// $WarningNotification = new WarningNotification();//subject
// $WarningNotification->attach($MessageSimulater);
// $WarningNotification->updateMessages($array);
// $message=$WarningNotification->__get("message");
// echo $message;

?>