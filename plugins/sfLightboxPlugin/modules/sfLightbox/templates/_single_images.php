<h1>Single images</h1>
<hr/>
<br/>
<h2>&nbsp;&nbsp;&raquo; On an image link</h2>
<?php

$image_options = array('title' => 'Optional caption Image 1.');

// Test light_image
echo light_image(
    'http://www.huddletogether.com/projects/lightbox2/images/thumb-1.jpg', 
    'http://www.huddletogether.com/projects/lightbox2/images/image-1.jpg', 
    $image_options
);

echo '&nbsp;&nbsp;';

$image_options = array('title' => 'Optional caption Image 2.');
echo light_image(
    'http://www.huddletogether.com/projects/lightbox2/images/thumb-2.jpg', 
    'http://www.huddletogether.com/projects/lightbox2/images/image-2.jpg', 
    $image_options
);

?>

<br/><br/>
<h2>&nbsp;&nbsp;&raquo; On a standart text link</h2>

<?php echo light_image_text(
  '&raquo; Click me to see the image !! &laquo;', 
  'http://www.huddletogether.com/projects/lightbox2/images/image-2.jpg'
);