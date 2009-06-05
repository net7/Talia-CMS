<?php

/**
 * Modular slot class, to be used by the sfSimpleCMSHelper.
 * The slot must contain a valid list of components and/or partials in YAML format.
 * Example:
 * <code>
 * // If the slot value is
 * mycomponent:
 *   component: mymodule/myaction
 *   foo:       bar
 * mypartial:
 *   partial:   mymodule/myotheraction
 *   foo:       bar
 * // Then the getSlotValue() method will return the result of a call to
 * get_component('mymodule', 'myaction', array('foo' => 'bar'));
 * get_partial('mymodule', 'myotheractionaction', array('foo' => 'bar'));
 * </code>
 */
class sfSimpleCMSSlotModular extends sfSimpleCMSSlotText implements sfSimpleCMSSlotTypeInterface
{
  public function getSlotValue($slot)
  {
    sfLoader::loadHelpers(array('Partial'));
    $components = sfYaml::load($slot->getValue());
    $res = '';
    foreach($components as $name => $params)
    {
      if(!isset($params['component']) && !isset($params['partial']))
      {
        return sprintf('<strong>Error</strong>: The value of slot %s in incorrect. Component %s has no \'component\' or \'partial\' key.', $slot->getName(), $name);
      }
      
      if (isset($params['component']))
      {
        // component
        list($module, $action) = split('/', $params['component']);
        unset($params['component']);
        $res .= get_component($module, $action, $params);
      }
      else
      {
        // partial
        $res .= get_partial($params['partial'], $params);
        unset($params['partial']);
      }
    }
    
    return $res;
  }
}
