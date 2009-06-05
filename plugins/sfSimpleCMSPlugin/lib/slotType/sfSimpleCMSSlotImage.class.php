<?php

/**
 * Image slot class, to be used by the sfSimpleCMSHelper.
 * The slot must contain an array of image parameters, in YAML format
 * <code>
 * // If the slot value is
 * src:    /foo/bar.png
 * width:  200
 * height: 400
 * legend: Me, myself and I
 * url:    http://me.com
 * // Then the getSlotValue() method will return
 * <a href="http://me.com">
 * <img src="/foo/bar.png" alt="Me, myself and I" width="200" height="400" />Me, myself and I
 * <p class="image_legend">Me, myself and I</p>
 * </a>
 * </code>
 */
class sfSimpleCMSSlotImage implements sfSimpleCMSSlotTypeInterface
{
  public function getSlotValue($slot)
  {
    sfLoader::loadHelpers(array('Asset', 'Url', 'Tag'));
    $params = sfYaml::load($slot->getValue());
    $res = '';
    if(isset($params['legend']))
    {
      $res .= content_tag('p', $params['legend'], array('class' => 'image_legend'));
      $params['alt'] = $params['legend'];
      unset($params['legend']);
    }
    if(isset($params['url']))
    {
      $url = $params['url'];
      unset($params['url']);
    }
    if(!isset($params['src']))
    {
      return sprintf('<strong>Error</strong>: The value of slot %s in incorrect. The image has no source', $slot->getName());
    }
    $src = $params['src'];
    unset($params['src']);
    $res = image_tag($src, $params).$res;
    if(isset($url))
    {
      return link_to($res, $url);
    }
    else
    {
      return $res;
    }
  }

  public function getSlotEditor($slot)
  {
    $params = sfYaml::load($slot->getValue());
    return $this->getControlFor('src','Source', $params).
           $this->getControlFor('width','Width', $params).
           $this->getControlFor('height','Height', $params).
           $this->getControlFor('legend','Legend', $params).
           $this->getControlFor('url','URL', $params);
  }
  
  private function getControlFor($name, $label, $params)
  {
    sfLoader::loadHelpers(array('Form', 'Tag', 'I18N'));
    return content_tag('div', label_for($name, __($label)).input_tag($name, isset($params[$name]) ? $params[$name] : ''), array('class' =>  'image_slot_form'));
  }
  
  public function getSlotValueFromRequest($request)
  {
    $params = array();
    $params['src'] = $request->getParameter('src');
    $params['width'] = $request->getParameter('width');
    $params['height'] = $request->getParameter('height');
    $params['legend'] = $request->getParameter('legend');
    $params['url'] = $request->getParameter('url');
    
    return sfYaml::dump($params);
  }
}
