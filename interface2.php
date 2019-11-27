<?php

require_once 'designptrn.php';


interface IObservable
{
  function addObserver( $observer );
}

?>