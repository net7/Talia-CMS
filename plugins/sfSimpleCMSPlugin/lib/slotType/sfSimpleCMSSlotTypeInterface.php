<?php

interface sfSimpleCMSSlotTypeInterface
{
  public function getSlotValue($slot);
  
  public function getSlotEditor($slot);
  
  public function getSlotValueFromRequest($request);
}
