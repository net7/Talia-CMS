<?php

/**
 * Subclass for representing a row from the 'sf_simple_cms_slot' table.
 *
 * 
 *
 * @package plugins.sfSimpleCMSPlugin.lib.model
 */ 
class sfSimpleCMSSlot extends BasesfSimpleCMSSlot
{
  public function save($con = null)
  {
    parent::save($con);
    // update the updated_at date of the parent page
    $page = $this->getsfSimpleCMSPage();
    $page->setUpdatedAt(time());
    $page->save();
  }
}
