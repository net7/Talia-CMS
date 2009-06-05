<?php
// Author: Alessio Piccioli <mailto:piccioli@netseven.it>
// Date: 2008/04

// Helper for icon image code (web/images/icons)
// http://dryicons.com/free-icons/preview/aesthetica/

function icon_both ($type,$name,$size='small') {
  // Size definition
  $sizes=array(
	       'small'=>'16x16',
	       'normal'=>'24x24',
	       'large'=>'32x32',
	       'huge'=>'48x48',
	       );

  // Set small if wrong size
  if ( ! in_array($size,array_keys($sizes)) ) {
    $size='small';
  }

  $abs_name = '/sfIconPlugin/images/icons/'.$sizes[$size].'/'.$name ;
  if ($type=='tag') {
    return image_tag ($abs_name);
  }
  else if ($type='path') {
    return image_path ($abs_name);
  }
}

function icon_tag ($name,$size='small') {
  return icon_both('tag',$name,$size);
}
function icon_path ($name,$size='small') {
  return icon_both('path',$name,$size);
}


function icon_add_tag($size='small') {
  return icon_tag('add',$size);
}

// TODO: ADD ALL SHORTCUT FOR ALL IMAGES

?>
