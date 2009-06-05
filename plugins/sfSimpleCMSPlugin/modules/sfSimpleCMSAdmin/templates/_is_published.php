<?php $is_published = $sf_simple_cms_page->getIsPublished() ?>
<?php $publisher_credential = sfConfig::get('app_sfSimpleCMS_publisher_credential', false); ?>
<?php if($publisher_credential && !$sf_context->getUser()->hasCredential($publisher_credential)): ?>
  <?php if ($is_published): ?>
    <?php echo image_tag('/sf/sf_admin/images/tick.png') ?>
  <?php endif; ?>  
<?php else: ?>
  <?php echo link_to(image_tag($is_published ? '/sf/sf_admin/images/save.png' : '/sf/sf_admin/images/cancel.png'), 'sfSimpleCMSAdmin/togglePublish?id='.$sf_simple_cms_page->getId()) ?>
<?php endif; ?>
