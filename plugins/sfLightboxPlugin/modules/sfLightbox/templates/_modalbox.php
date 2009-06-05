<hr/>
<br/><br/><br/>
<h1>MODAL BOX</h1>
<hr/>

<?php 
// Modal Lightbox plugin test
$link_options = array(
    'title' => 'sfLightboxPlugin',
    'size'  => '550x200',
    'speed' => '6'
);

// or
//$link_options='title=sfLightboxPlugin size=450x180 speed=5';
//$link_options='title="sfLightboxPlugin" class=resizespeed_5 blocksize_450x180';
 
echo light_modallink(
  '&raquo; Link to test the modal box &laquo;', 
  'sfLightbox/modal', 
  $link_options
);