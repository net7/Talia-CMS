<?php

/**
 * PPH slot class, to be used by the sfSimpleCMSHelper.
 * The slot must contain valid HTML with embedded PHP tags
 * Example:
 * <code>
 * // If the slot value is
 * Hello, <?php echo 'world' ?>!
 * // Then the getSlotValue() method will return
 * Hello, world!
 * </code>
 */
class sfSimpleCMSSlotPhp extends sfSimpleCMSSlotText implements sfSimpleCMSSlotTypeInterface
{
  public function getSlotValue($slot)
  {
    ob_start();
    eval('?>'.$slot->getValue().'<?php ');
    return ob_get_clean();
  }
}
