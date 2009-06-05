<?php

/**
 * Simple text slot class, to be used by the sfSimpleCMSHelper.
 * The slot must contain text, and is simply formatted in HTML
 * By transforming carriage returns into <br/> and URLs into hyperlinks. 
 * Example:
 * <code>
 * // If the slot value is
 * Hello, world. 
 * My address is http://www.example.com
 * // Then the getSlotValue() method will return
 * Hello, world.<br />
 * My address is <a href="http://www.example.com">http://www.example.com</a>
 * </code>
 */
class sfSimpleCMSSlotText implements sfSimpleCMSSlotTypeInterface
{
  public function getSlotValue($slot)
  {
    sfLoader::loadHelpers(array('Text', 'Tag'));
    return auto_link_text(strip_tags($slot->getValue()));  
  } 
  
  public function getSlotEditor($slot)
  {
    return textarea_tag('slot_content', $slot->getValue(), 'size=80x10 id=edit_textarea'. $slot->getName());
  }
  
  public function getSlotValueFromRequest($request)
  {
    return $request->getParameter('slot_content');
  }
}
