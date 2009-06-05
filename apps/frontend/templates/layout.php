<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>

<body>
<div id="page_ext">
  <div id="page_int">
    
   <?php include_partial('global/header') ?>    

<?php if(!isset($page)) {
  $culture=$sf_user->getCulture();
  $page=sfSimpleCMSPagePeer::retrieveBySlug('home');
} 
?>

   <?php include_partial('global/navBar',array('page' => $page, 'culture' => $culture));  ?>    
    
    
    
    
    <!-- CONTENT -->
    <div class="floatclear"></div>
    
    <div id="content" class="divided grey">
      <div id="visore">
        <?php echo $sf_data->getRaw('sf_content') ?>
      </div>
    </div>
    <!-- CONTENT -->
    
   <?php include_component('sfSimpleCMS', 'mainNavigation', array('page' => $page, 'culture' => $culture)); ?>

    <!--[if !IE]>scrol<![endif]-->
  </div>
  <!-- page_int -->
</div>
<!-- page_ext -->
</body>
</html>
