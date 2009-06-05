
<?php echo use_helper('sfSimpleCMS') ?>


<?php slot('mainNavigation') ?>&nbsp;<?php end_slot() ?>

<?php slot('sfSimpleCMS_breadcrumb') ?>&nbsp;<?php end_slot() ?>

<h1>
  <?php sf_simple_cms_slot($page, 'slot1', '[insert welcome message here]') ?>
</h1>    


<h2>
  <?php sf_simple_cms_slot($page, 'slot2', '[insert welcome message here]') ?>
</h2>    


<h3>
  <?php sf_simple_cms_slot($page, 'slot3', '[insert welcome message here]') ?>
</h3>    


  <?php sf_simple_cms_slot($page, 'slot4', '[insert welcome message here]') ?>

<?php include_editor_tools($page) ?>
