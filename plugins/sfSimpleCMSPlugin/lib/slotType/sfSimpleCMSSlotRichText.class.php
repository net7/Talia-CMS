<?php

/**
 * Rich text slot class, to be used by the sfSimpleCMSHelper.
 * The slot must contain valid HTML code.
 * Example:
 * <code>
 * // If the slot value is
 * Hello, <b>world</b>!
 * // Then the getSlotValue() method will return
 * Hello, <b>world</b>!
 * </code>
 */
class sfSimpleCMSSlotRichText extends sfSimpleCMSSlotText implements sfSimpleCMSSlotTypeInterface
{
  public function getSlotValue($slot)
  {
    return $slot->getValue();
  } 
  
  public function getSlotEditor($slot)
  {
    $options = array(
      'size' =>  '80x10',
      'id'   =>  'edit_textarea' . $slot->getName(),
      'tinymce_options' => sfConfig::get('app_sfSimpleCMS_tinymce_options', 'width: "100%"')
        );
    $script = '';
    if(sfConfig::get('app_sfSimpleCMS_rich_editing', false))
    {
      sfLoader::loadHelpers(array('Javascript'));
      sfContext::getInstance()->getResponse()->addJavascript('/sfSimpleCMSPlugin/js/tiny_mce_AJAX.js', 'last');
      $script = javascript_tag('setTextareaToTinyMCE("edit_textarea'. $slot->getName() .'");');
      $options['rich'] = 'TinyMCE';
    }
    
    return $script.textarea_tag('slot_content', $slot->getValue(), $options);
  }
}
