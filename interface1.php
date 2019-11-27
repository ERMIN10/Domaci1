<?php

require_once 'designptrn.php';

interface IObserver
{
  function onChanged( $sender, $args );
}
?>