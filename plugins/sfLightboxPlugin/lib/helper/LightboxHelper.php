<?php

/**
 * @package sfLightboxPlugin
 * 
 * @author COil <qrf_coil[at]yahoo[dot]fr>
 * @since   1.0.0 -  5 feb 07
 * @version 1.0.6 - 14 feb 08
 * 
 * Original library by
 * @author Lokesh Dhakar
 *   http://www.huddletogether.com/projects/lightbox2/ - V2.03.3 - 21 jun 07 
 * 
 * @author Demental
 * Lightbox modalbox modification by Demental  
 *   http://demental.info/blog/index.php?post/2007/01/11/75-introducing-modalbox
 */

/**
 * Returns an image link to use the lightbox function for 1 image.
 *
 * @param string $thumbnail Name of thumbnail to display
 * @param string $image     Name of full size image to display
 * @param array  $options   Options of the link
 * 
 * @author COil
 * @since 1.0.0 - 5 feb 07
 */
function light_image($link_content, $image, $link_options = array(), $image_options = array(), $li = false, $link_type = 'IMAGE')
{
  _addLbRessources();
  $link_options  = _parse_attributes($link_options);
  $image_options = _parse_attributes($image_options);    

  // Lightbox specific
  $link_options['rel'] = isset($link_options['rel']) ? $link_options['rel'] : 'lightbox';

  // Resources type
  switch ($link_type)
  {
    case 'IMAGE':
      $link_content = image_tag($link_content, $image_options);
      break; 
  }

  return ($li ? '<li>' : ''). link_to($link_content, image_path($image, true), $link_options). ($li ? '</li>' : '');
}

/**
 * Returns a text link to use the lightbox function for 1 image.
 */
function light_image_text($text, $image, $link_options = array(), $image_options= array(), $li = false)
{
  return light_image($text, $image, $link_options, $image_options, $li, $link_type = 'TEXT');
}

/**
 * Returns image links to use the lightbox slideshow function.
 *
 * @param array  $resources Resources content
 * @param string $images    Array of images to display  
 * @param array  $link_options['slide'] Name of the lightbox slide, 'slide' by default
 * 
 * @author COil
 * @since 1.0.0 - 5 feb 07
 */
function _light_slide_show($resources, $images, $link_options = array(), $li = false, $link_type)
{
  _addLbRessources();
  $link_options = _parse_attributes($link_options);

  // Lightbox specific
  $link_options['rel'] = 'lightbox['. ((isset($link_options['slidename']) ? $link_options['slidename'] : 'slide')) .']';
  unset($link_options['slidename']);
  $value = '';

  if ($resources)
  {
    $title = $link_options['title'];

    switch ($link_type)
    {

      // Image to a slideshow 
      case 'TEXT':
        $cpt = 1;
        foreach ($images as $image) {
          $image['options']['rel'] = $link_options['rel'];
          $link_options['title'] = isset($image['options']['title']) && $image['options']['title'] ? $image['options']['title'] : $title;
          $text = ($cpt == 1) ? $resources : image_tag(sfConfig::get('sf_lightbox_images_dir'). 'blank.gif', true);
          $value .= light_image_text($text, $image['image'], $link_options, $image['options']);
          $cpt++;
        }
        break;

      // Image to a slideshow 
      case 'IMAGE':
        $cpt = 1;
        foreach ($images as $image) {
          $image['options']['rel'] = $link_options['rel'];
          $link_options['title'] = isset($image['options']['title']) && $image['options']['title'] ? $image['options']['title'] : $title;
          $thumb = ($cpt == 1) ? $resources : sfConfig::get('sf_lightbox_images_dir'). 'blank.gif';
          $value .= light_image($thumb, $image['image'], $link_options, $image['options'], $li);
          $cpt++;
        }
        break;
      
      // Set of thumb to a slideshow 
      case 'IMAGES':
        foreach ($images as $image) {
          $image['options']['rel'] = $link_options['rel'];
          $link_options['title'] = isset($image['options']['title']) && $image['options']['title'] ? $image['options']['title'] : $title;
          $value .= light_image($image['thumbnail'], $image['image'], $link_options, $image['options'], $li);
        }
        break;
    }
  }
  return $value;
}  

/**
 * Old function prototype to avoid bc break. Display a set of image to display
 * a lightbox slideshow.
 *
 * @author lvernet
 * @since  14 feb 08
 */
function light_slideshow($images, $link_options = array(), $li = false)
{
  return _light_slide_show($images, $images, $link_options, $li, 'IMAGES');
}

/**
 * Image link to a lighbox slideshow.
 * 
 * @param $image  string The image on witch will be associated the slideshow
 * @param $images array  An associative array with the name of the thumbnail
 * as key and the image to display as the value
 * 
 * @param array   $link_options['slide'] Name of the lightbox slide, 'slide' by default
 * @param boolean $list                  Tells if images should be displayed inside li tags
 *
 * @author COil
 * @since 1.0.6 - 12 feb 08
 */
function light_slide_image($image, $images, $link_options = array(), $li = false)
{
  return _light_slide_show($image, $images, $link_options, $li, 'IMAGE');
}

/**
 * Text link for a lighbox slideshow.
 * 
 * @param $text   string Text for the link
 * @param $images array  An associative array with the name of the thumbnail
 * as key and the image to display as the value
 * 
 * @param array   $link_options['slide'] Name of the lightbox slide, 'slide' by default
 * @param boolean $list                  Tells if images should be displayed inside li tags
 *
 * @author COil
 * @since 1.0.6 - 12 feb 08
 */
function light_slide_text($text, $images, $link_options = array(), $li = false)
{
  return _light_slide_show($text, $images, $link_options, $li, 'TEXT');
}

/**
 * Return a link_to a lightbox modal popup.
 * 
 * @author Demental
 * @since 1.0.0 - 7 feb 2007
 */
function light_modallink($text, $link, $options = array())
{
  _addLbRessources(true);
  $options = _parse_attributes($options);

  $options['rel'] = 'modalbox';
  $options['class'] = isset($options['class']) ? $options['class'] : '';

  if (!$options['class'])
  {
    if(key_exists('speed', $options))
    {
      $options['class'] .= 'resizespeed_'. $options['speed'];
      unset($options['speed']);
    }

    if(key_exists('size', $options))
    {
      $options['class'] .= ($options['class'] ? ' ' : ''). 'blocksize_'.$options['size'];
      unset($options['size']);
    }
  }

  return link_to($text, $link, $options);
}

/**
 * Private function that adds the lightbox resources for the public helpers
 * 
 * @access private
 * @author COil
 * @since 1.0.0 - 5 feb 2007
 */
function _addLbRessources($modal = false)
{
  // Prototype & scriptaculous
  $response = sfContext::getInstance()->getResponse();
  $response->addJavascript(sfConfig::get('sf_prototype_web_dir'). '/js/prototype');
  $response->addJavascript(sfConfig::get('sf_prototype_web_dir'). '/js/effects');
  $response->addJavascript(sfConfig::get('sf_prototype_web_dir'). '/js/builder');
  
  // Lightbox specific
  $response->addJavascript(sfConfig::get('sf_lightbox_js_dir'). 'lightbox.js');
  $response->addStylesheet(sfConfig::get('sf_lightbox_css_dir'). 'lightbox.css');      

  if ($modal)
  {
    $response->addJavascript(sfConfig::get('sf_lightbox_js_dir'). 'modalbox.js');
    $response->addStylesheet(sfConfig::get('sf_lightbox_css_dir'). 'modalbox.css');
  }
  
  // Register lightbox use for the body filter
  sfConfig::add(array('sf_lightbox_is_loaded' => true));
}