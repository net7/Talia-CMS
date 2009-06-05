
<?php echo use_helper('sfSimpleCMS') ?>


<div class="post">

<?php slot('mainNavigation') ?>&nbsp;<?php end_slot() ?>

<?php slot('sfSimpleCMS_breadcrumb') ?>&nbsp;<?php end_slot() ?>

<h1 class="title">
  <?php sf_simple_cms_slot($page, 'slot1', '[insert welcome message here]') ?>
</h1>    


<div class="entry">
  <?php sf_simple_cms_slot($page, 'slot2', '[insert presentation here]') ?>
</div>

</div>

<?php include_editor_tools($page) ?>
