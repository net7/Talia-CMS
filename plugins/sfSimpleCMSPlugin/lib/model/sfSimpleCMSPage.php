<?php

/**
 * Subclass for representing a row from the 'sf_simple_cms_page' table.
 *
 * 
 *
 * @package plugins.sfSimpleCMSPlugin.lib.model
 */ 
class sfSimpleCMSPage extends BasesfSimpleCMSPage
{
  protected $localizations = null,
            $title         = '',
            $slots         = array();
  
  public function __toString($culture = '')
  {
    $title = $this->getTitle($culture);
    return $title ? $title : '['.$this->getSlug().']';
  }
  
  public function getSlots($culture = null)
  {
    if(!$this->slots)
    {
      $this->populateSlots($culture);
    }
    return $this->slots;
  }

  public function populateSlots($culture)
  {
    $c = new Criteria();
    $c->add(sfSimpleCMSSlotPeer::CULTURE, $culture);
    $related_slots = $this->getsfSimpleCMSSlots($c);
    $slots = array();
    foreach($related_slots as $slot)
    {
      $slots[$slot->getName()] = $slot;
    }
    $this->slots = $slots;
  }

  public function hasSlots($culture)
  {
    return count($this->getSlots($culture));
  }
  
  public function getSlot($name, $culture = null)
  {
    $slots = $this->getSlots($culture);
    return isset($slots[$name]) ? $slots[$name] : null;
  }

  public function getSlotValue($name, $culture = null)
  {
    $slot = $this->getSlot($name, $culture);

    return $slot ? $slot->getValue() : null;
  }
  
  public function getTitle($culture = null)
  {
    if(!$this->title)
    {
      $this->title = $this->getSlotValue('title', $culture);
    }
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }
  
  public function setSlot($name, $culture, $type, $value)
  {
    $slot = $this->getSlot($name, $culture);
    if(!$slot)
    {
      $slot = new sfSimpleCMSSlot();
      $slot->setName($name);
      $slot->setPageId($this->getId());
      $slot->setCulture($culture);
    }
    $slot->setType($type);
    $slot->setValue($value);
    $slot->save();
    
    $this->slots[$name] = $slot;
    
    return $slot; 
  }

  public function getSlugWithLevel()
  {
    return str_repeat(' - ', $this->getLevel()).$this->getSlug();
  }
  
  public function hasLocalization($culture)
  {
    $localizations = $this->getLocalizations();
    return in_array($culture, $localizations);
  }
  
  public function getLocalizations()
  {
    if($this->localizations === null)
    {
      $c = new Criteria();
      $c->clearSelectColumns();
      $c->addSelectColumn(sfSimpleCMSSlotPeer::CULTURE);
      $c->add(sfSimpleCMSSlotPeer::PAGE_ID, $this->getId());
      $c->setDistinct();
      $rs = sfSimpleCMSSlotPeer::doSelectRS($c);
      if($rs->getRecordCount() == 0) return array();
      $localizations = array();
      foreach ($rs as $set)
      {
        $localizations[] = $set[0];
      }
      
      $this->localizations = $localizations;
    }
    
    return $this->localizations;
  }
}

$columns_map = array('left'   => sfSimpleCMSPagePeer::TREE_LEFT,
                     'right'  => sfSimpleCMSPagePeer::TREE_RIGHT,
                     'parent' => sfSimpleCMSPagePeer::TREE_PARENT,
                     'scope'  => sfSimpleCMSPagePeer::TOPIC_ID);

sfPropelBehavior::add('sfSimpleCMSPage', array('actasnestedset' => array('columns' => $columns_map)));