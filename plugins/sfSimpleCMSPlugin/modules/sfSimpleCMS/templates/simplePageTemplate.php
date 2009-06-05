<?php echo use_helper('sfSimpleCMS') ?>

<h2><?php sf_simple_cms_slot($page, 'title', '[insert title here]') ?></h2>

<?php if (sf_simple_cms_has_slot($page, 'slot1')): ?>
<div class="cms_head">
  <?php sf_simple_cms_slot($page, 'slot1', '[insert overview here]') ?>
</div>    
<?php endif; ?>

<div class="cms_main">
  <?php sf_simple_cms_slot($page, 'slot2', '[insert main content here]') ?>
</div>

<?php if (sf_simple_cms_has_slot($page, 'slot3')): ?>
<div class="cms_related">
  <h3>Related Content</h3>
  <?php sf_simple_cms_slot($page, 'slot3', '[insert related content here]') ?>
</div>
<?php endif; ?>

<?php if (sf_simple_cms_has_slot($page, 'slot4')): ?>
<div class="cms_references">
  <h3>References</h3>
  <?php sf_simple_cms_slot($page, 'slot4', '[insert references here]') ?>
</div>
<?php endif; ?>

<?php include_editor_tools($page) ?>