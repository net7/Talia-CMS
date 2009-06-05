<?php

class BasesfSimpleCMSComponents extends sfComponents
{
  public function executeEditorTools()
  {
    $this->page_names = sfSimpleCMSPagePeer::getAllPagesWithLevel();
    $this->slug = $this->getRequestParameter('slug');
    $this->culture = $this->getRequestParameter('sf_culture', sfConfig::get('app_sfSimpleCMS_default_culture', 'en'));
    $publisher_credentials = sfConfig::get('app_sfSimpleCMS_publisher_credential', false);
    $this->is_publisher = (!$publisher_credentials  || $this->getUser()->hasCredential($publisher_credentials));
  }
  
  public function executeMainNavigation()
  {
    $include_unpublished_pages = $this->getRequestParameter('edit') == 'true';
    $this->culture = $this->getCulture();
    $this->level1_nodes = sfSimpleCMSPagePeer::getlevel1($include_unpublished_pages, $this->culture);
  }

  public function executeBreadcrumb()
  {
    $this->pages = $this->page->getPath('doSelectWithTitle');
  }
  
  public function executeLatestPages()
  {
    $include_unpublished_pages = $this->getRequestParameter('edit') == 'true';
    $this->pages = sfSimpleCMSPagePeer::getLatest(sfConfig::get('app_sfSimpleCMS_max_pages_in_list', 5), $include_unpublished_pages);
    $this->culture = $this->getCulture();
  }
    
  protected function getCulture()
  {
    if(sfConfig::get('app_sfSimpleCMS_use_l10n', false))
    {
      return $this->getRequestParameter('sf_culture', sfConfig::get('app_sfSimpleCMS_default_culture', 'en'));
    }
    else
    {
      return sfConfig::get('app_sfSimpleCMS_default_culture', 'en');
    }
  }
  
  protected function checkEditorCredential()
  {
    $editor_credentials = sfConfig::get('app_sfSimpleCMS_editor_credential', false);
    return $editor_credentials ? $this->getUser()->hasCredential($editor_credentials) : true;
  }
    
  public function executeEmbed()
  {
    $culture = $this->getCulture();
    
    if($this->getRequestParameter('edit') == 'true')
    {
      if(!$this->checkEditorCredential())
      {
        $this->CMS_error_msg = 'You need the editor credential to edit this content';
        return;
      }
      $page = sfSimpleCMSPagePeer::retrieveBySlug($this->slug, $culture);
    }
    else
    {
      $page = sfSimpleCMSPagePeer::retrievePublicBySlug($this->slug, $culture);
    }

    if (!$page)
    {
      $this->CMS_error_msg = sprintf('The page %s does not exist in culture %c', $this->slug, $culture);
      return;
    }
    
    $this->page = $page;
    $this->culture = $culture;
    $this->getRequest()->setAttribute('culture', $culture);
    $this->templatePath = sfLoader::getTemplatePath('sfSimpleCMS', $this->page->getTemplate().'Template.php');
    sfConfig::set('app_sfSimpleCMS_disable_editor_toolbar', true);
  }
}
