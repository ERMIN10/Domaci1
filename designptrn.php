<?php


require_once './interface1.php';
require_once './interface2.php';

//Uzorak posmatraca - kod definise cetiri elementa: dva interfejsa IObserver i IObservable - dvije klase UserList i UserListLogger



class UserList implements IObservable
{
  private $_observers = array();
 
  public function addCustomer( $name )
  {
    foreach( $this->_observers as $obs )
      $obs->onChanged( $this, $name );
  }
 
  public function addObserver( $observer )
  {
    $this->_observers []= $observer;
  }
}
 
class UserListLogger implements IObserver
{
  public function onChanged( $sender, $args )
  {
    echo( "'$args' added to user list\n" );
  }
}
 
$list = new UserList();
$list->addObserver( new UserListLogger());
$list->addCustomer( "Design Patern" );

/*
Jedan objekat dodaje metodu koja omogucava drugom objektu - posmatracu da sam reaguje. 
Kada se posmatracki objekat promijeni, on salje poruku registrovanim posmatracima.
Rezultat je da predmeti razgovaraju jedni sa drugim. 
*/

?>