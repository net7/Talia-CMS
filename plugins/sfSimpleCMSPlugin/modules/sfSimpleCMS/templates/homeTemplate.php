<?php echo use_helper('sfSimpleCMS') ?>

<?php slot('sfSimpleCMS_breadcrumb') ?>&nbsp;<?php end_slot() ?>

<div class="cms_title">
  <?php sf_simple_cms_slot($page, 'slot1', '[insert welcome message here]') ?>
</div>    

<?php if (sf_simple_cms_has_slot($page, 'slot3')): ?>
<div class="cms_updates">
  <?php sf_simple_cms_slot($page, 'slot3', '[insert updates here]') ?>
</div>
<?php endif; ?>  

<div class="cms_presentation">
  <?php sf_simple_cms_slot($page, 'slot2', '[insert presentation here]') ?>
</div>

<?php if (sf_simple_cms_has_slot($page, 'slot4')): ?>
<div class="cms_about">
  <h3>About this site</h3>
  <?php sf_simple_cms_slot($page, 'slot4', '[insert about content here]') ?>
</div>
<?php endif; ?>

<?php include_editor_tools($page) ?>