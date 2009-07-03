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

<?php $google_id = sfConfig::get('app_discovery_googleAnalyticsId', ''); ?>

<?php if($google_id != '') { ?>

<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
  try {
    var pageTracker = _gat._getTracker("<?php echo $google_id ?>");
    pageTracker._trackPageview();
  } catch(err) {}
</script>

<?php } ?>
</body>
</html>
