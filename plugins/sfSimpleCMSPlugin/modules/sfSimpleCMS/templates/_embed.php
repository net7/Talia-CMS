<?php if (isset($CMS_error_msg)): ?>
  <?php if (sfConfig::get('sf_debug')): ?>
    <?php echo $CMS_error_msg ?>
  <?php endif; ?>
<?php else: ?>  
  <?php include $templatePath ?>
<?php endif; ?>
