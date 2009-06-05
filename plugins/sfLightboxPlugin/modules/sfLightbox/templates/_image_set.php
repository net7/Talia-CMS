<br/><br/><br/>
<h1>Image set</h1>
<hr/>
<br/>
<h2>&nbsp;&nbsp;&raquo; For all images of the set</h2>

<?php

// To display a slide show of several images
$images[] = array(
    'thumbnail' => 'http://www.huddletogether.com/projects/lightbox2/images/thumb-3.jpg',
    'image'     => 'http://www.huddletogether.com/projects/lightbox2/images/image-3.jpg',
    'options'   => array('title' => 'Roll over and click right side of image to move forward.')
);

$images[] = array(
    'thumbnail' => 'http://www.huddletogether.com/projects/lightbox2/images/thumb-4.jpg',
    'image'     => 'http://www.huddletogether.com/projects/lightbox2/images/image-4.jpg',
    'options'   => array('title' => 'Alternatively you can press the right arrow key.')
);

$images[] = array(
    'thumbnail' => 'http://www.huddletogether.com/projects/lightbox2/images/thumb-5.jpg',
    'image'     => 'http://www.huddletogether.com/projects/lightbox2/images/image-5.jpg',
    'options'   => array('title' => 'The script preloads the next image in the set as you\'re viewing.')
);

$images[] = array(
    'thumbnail' => 'http://www.huddletogether.com/projects/lightbox2/images/thumb-6.jpg',
    'image'     => 'http://www.huddletogether.com/projects/lightbox2/images/image-6.jpg',
    'options'   => array('title' => 'Press Esc to close')
);

$link_options = array(
    'title'     => 'Lightbox2',
    'slidename' => 'lightbox',
);    


echo light_slideshow($images, $link_options);
?>

<br/><br/>
<h2>&nbsp;&nbsp;&raquo; For all images of the set as an html list</h2>

<ul>
<?php 

$link_options = array(
    'title'     => 'Lightbox2-list',
    'slidename' => 'lightbox_list',
);    
  
  echo light_slideshow($images, $link_options, true); ?>
</ul>

<br/><br/>
<br/>
<h2>&nbsp;&nbsp;&raquo; On one image (of the set or not)</h2>

<?php
$link_options = array(
    'title'     => 'Lightbox2-image',
    'slidename' => 'image_link_to_lightbox_slideshow',
);  

echo light_slide_image(
  'http://gallery.coilblog.com/d/16-2/big_eyes_cat.jpg',
  $images, 
  $link_options); 
?>

<br/><br/>
<br/>
<h2>&nbsp;&nbsp;&raquo; On a text link</h2>

<?php 

$link_options = array(
    'title'     => 'Lightbox2-tewt',
    'slidename' => 'text_link_to_lightbox_slideshow',
);  

echo light_slide_text('Click me to show the slide !!', $images, $link_options);