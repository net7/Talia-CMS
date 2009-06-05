<?php

if (sfConfig::get('app_sfSimpleCMS_routes_register', true) && in_array('sfSimpleCMS', sfConfig::get('sf_enabled_modules')))
{
  $r = sfRouting::getInstance();
  // preprend our routes
  $r->prependRoute('sf_cms_delete', '/cms_delete/:sf_culture/:slug', array('module' => 'sfSimpleCMS', 'action' => 'delete'), array('slug' => '.*'));
  $r->prependRoute('sf_cms_toggle_publish', '/cms_publish/:slug', array('module' => 'sfSimpleCMS', 'action' => 'togglePublish'), array('slug' => '.*'));
  if(sfConfig::get('app_sfSimpleCMS_use_l10n', false))
  {
    $r->prependRoute('sf_cms_show', '/cms/:sf_culture/:slug', array('module' => 'sfSimpleCMS', 'action' => 'show'), array('slug' => '.*'));
  }
  else
  {
    $r->prependRoute('sf_cms_show', '/cms/:slug', array('module' => 'sfSimpleCMS', 'action' => 'show'), array('slug' => '.*'));
  }
}