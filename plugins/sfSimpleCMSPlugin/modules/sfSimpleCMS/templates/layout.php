<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php echo include_http_metas() ?>
    <?php echo include_metas() ?>
    <?php echo include_title() ?>
    <?php include_slot('auto_discovery_link_tag') ?>
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <div id="cms">
      <div id="head">
        <div id="site_name">
          <?php if(!include_slot('sfSimpleCMS_home_link')): ?>
            <?php echo link_to(
              sfConfig::get('app_sfSimpleCMS_home_link', 'My Swell site'),
              sfSimpleCMSTools::urlForPage(sfConfig::get('app_sfSimpleCMS_default_page', 'home')),
              array('class' => 'cms_page_navigation')) ?>  
          <?php endif; ?>
    
          <?php if(!include_slot('sfSimpleCMS_tagline')): ?>
            <div id="site_tagline">
              <?php echo sfConfig::get('app_sfSimpleCMS_tagline', 'All there is to know about [you name it]') ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    
      <?php if(!include_slot('sfSimpleCMS_main_navigation')): ?>
        <div id="mainNavigation">
          <?php include_component('sfSimpleCMS', 'mainNavigation', array('page' => $page, 'culture' => $culture)); ?>
        </div>
      <?php endif; ?>  
      
      <div id="content" class="<?php echo $page->getTemplate() ?>" >
        <?php if(!include_slot('sfSimpleCMS_breadcrumb')): ?>
          <?php include_component('sfSimpleCMS', 'breadcrumb', array('page' => $page, 'culture' => $culture)) ?>
        <?php endif; ?>
        
        <?php echo $sf_data->getRaw('sf_content') ?>
      </div>
    </div>
    <?php if(!include_slot('sfSimpleCMS_footer_message')): ?>
      <div id="footer_message">
        <?php echo sfConfig::get('app_sfSimpleCMS_footer_message', 'Powered by <b>sfSimpleCMS</b> and '.link_to(image_tag('/sfSimpleCMSPlugin/images/symfony_button.gif', 'align=absmiddle'), 'http://www.symfony-project.com')) ?>
      </div>
    <?php endif; ?>
  </body>
</html>