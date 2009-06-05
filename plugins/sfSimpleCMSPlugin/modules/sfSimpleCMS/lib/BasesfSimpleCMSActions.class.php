<?php

class BasesfSimpleCMSActions extends sfActions
{  
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

  public function executeIndex()
  {
    $this->redirect(sfSimpleCMSTools::urlForPage(sfConfig::get('app_sfSimpleCMS_default_page', 'home'), '', $this->getCulture()));
  }
  
  protected function checkEditorCredential()
  {
    $editor_credentials = sfConfig::get('app_sfSimpleCMS_editor_credential', false);
    if($editor_credentials && !$this->getUser()->hasCredential($editor_credentials))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
      throw new sfStopException();
    }
  }

  protected function checkPublisherCredential()
  {
    $publisher_credentials = sfConfig::get('app_sfSimpleCMS_publisher_credential', false);
    if($publisher_credentials  && !$this->getUser()->hasCredential($publisher_credentials ))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
      throw new sfStopException();
    }
  }
  
  public function executeShow()
  {
    $culture = $this->getCulture();
    
    $editor_credentials = sfConfig::get('app_sfSimpleCMS_editor_credential', false);
    if($this->getRequestParameter('edit') == 'true')
    {
      $this->checkEditorCredential();
      $page = sfSimpleCMSPagePeer::retrieveBySlug($this->getRequestParameter('slug', sfConfig::get('app_sfSimpleCMS_default_page', 'home')), $culture);
    }
    else
    {
      $page = sfSimpleCMSPagePeer::retrievePublicBySlug($this->getRequestParameter('slug', sfConfig::get('app_sfSimpleCMS_default_page', 'home')), $culture);
    }

    $this->forward404Unless($page);
    
    $this->page = $page;
    $this->culture = $culture;
    $this->getRequest()->setAttribute('culture', $culture);
    $this->setTemplate($this->page->getTemplate());
    $this->getResponse()->setTitle($this->page->getTitle());
    if(sfConfig::get('app_sfSimpleCMS_use_bundled_layout', true))
    {
      $this->setLayout(sfLoader::getTemplateDir('sfSimpleCMS', 'layout.php').'/layout');
      if(sfConfig::get('app_sfSimpleCMS_use_bundled_stylesheet', true))
      {
        $this->getResponse()->addStylesheet('/sfSimpleCMSPlugin/css/CMSTemplates.css', 'last');
      }
    }

    return 'Template';
  }

  public function executeUpdateSlot()
  {
    $this->checkEditorCredential();
    
    $page = sfSimpleCMSPagePeer::retrieveBySlug($this->getRequestParameter('slug'));
    $this->forward404Unless($page);

    $culture = $this->getCulture();
    $ret = '';
    
    $slot_name = $this->getRequestParameter('slot');
    $old_slot_object = $page->getSlot($slot_name, $culture);
    
    $slot_type_name = $this->getRequestParameter('slot_type', 'Text');
    $slot_type_class = 'sfSimpleCMSSlot'.$slot_type_name;
    $slot_type = new $slot_type_class();
    
    $slot_value = $slot_type->getSlotValueFromRequest($this->getRequest());

    if(($old_slot_object && $slot_type_name != $old_slot_object->getType()) 
      || 
      (!$old_slot_object && $slot_type_name != 'Text'))
    {
      // The slot type has changed, so we must reload the page to get the correct editor
      $ret .= '<script type="text/javascript">window.location.reload();</script>';
    }
    
    $slot = $page->setSlot($slot_name, $culture, $slot_type_name, $slot_value);
    $page->save();
    
    if($slot_value)
    {
      $ret .= $slot_type->getSlotValue($slot);
    }
    else
    {
      $ret .= sfConfig::get('app_sfSimpleCMS_default_text');
    }
    
    return $this->renderText($ret);
  }

  public function executeTogglePublish()
  {
    $this->checkPublisherCredential();
    
    $slug = $this->getRequestParameter('slug');
    $page = sfSimpleCMSPagePeer::retrieveBySlug($slug);
    $this->forward404Unless($page);
    
    $this->checkPublisherCredential();
    
    $page->setIsPublished(!$page->getIsPublished());
    $page->save();

    $query_string = 'edit=true'.($this->getRequestParameter('preview', false) == 'true' ? '&preview=true' : '');
    $this->redirect(sfSimpleCMSTools::urlForPage($slug, $query_string, $this->getRequestParameter('sf_culture')));
  }
  
  public function validateUpdate()
  {
    $validate = true;
    $this->page = sfSimpleCMSPagePeer::retrieveByPk($this->getRequestParameter('page_id'));
    $newSlugPage = sfSimpleCMSPagePeer::retrieveBySlug($this->getRequestParameter('new_slug'));
    if($newSlugPage && $newSlugPage->getId() != $this->page->getId())
    {
      $validate = false;
      $this->getRequest()->setError('new_slug', 'A page with this path already exits');
    }
    $this->relative_page = sfSimpleCMSPagePeer::retrieveBySlug($this->getRequestParameter('position'));
    $this->positionType = $this->getRequestParameter('position_type');
    if ($this->positionType && $this->relative_page && $this->relative_page->isRoot() && $this->positionType != 'under')
    {
      $validate = false;
      $this->getRequest()->setError('position', 'Attempting to move a page at the same level as the home page. Please make sure to select a position under the root node.');
    }
    
    return $validate;
  }
  
  public function handleErrorUpdate()
  {
    $this->getRequest()->setParameter('slug', $this->page->getSlug());
    $this->getRequest()->setParameter('edit', 'true');
    $this->forward('sfSimpleCMS', 'show');
  }
  
  public function executeUpdate()
  {
    $this->forward404Unless($this->getRequest()->getMethod() == sfRequest::POST);
    $this->forward404Unless($this->page);
    $this->checkEditorCredential();
    
    $culture = $this->getCulture();
    
    if ($this->relative_page)
    {
      if($this->positionType == 'under')
      {
        $this->page->moveToFirstChildOf($this->relative_page);
      }
      else
      {
        $this->page->moveToNextSiblingOf($this->relative_page);
      }
    }
    if($title = $this->getRequestParameter('title'))
    {
      $this->page->setSlot('title', $culture, 'Text', $title);
    }
    
    $this->page->setSlug($this->getRequestParameter('new_slug'));
    $this->page->setTemplate($this->getRequestParameter('template'));
    $this->page->save();

    $this->redirect(sfSimpleCMSTools::urlForPage($this->page->getSlug(), 'edit=true', $culture));
    
  }

  public function validateCreate()
  {
    $validate = true;
    $this->relative_page = sfSimpleCMSPagePeer::retrieveBySlug($this->getRequestParameter('create_position'));
    $this->positionType = $this->getRequestParameter('position_type');
    if ($this->positionType && $this->relative_page && $this->relative_page->isRoot() && $this->positionType != 'under')
    {
      $validate = false;
      $this->getRequest()->setError('create_position', 'Attempting to create a page at the same level as the home page. Please make sure to select a position under the root node.');
    }
    
    return $validate;
  }
  
  public function handleErrorCreate()
  {
    $this->getRequest()->setParameter('slug', $this->getRequestParameter('slug'));
    $this->getRequest()->setParameter('edit', 'true');
    $this->forward('sfSimpleCMS', 'show');
  }
  
  public function executeCreate()
  {
    $this->forward404Unless($this->getRequest()->getMethod() == sfRequest::POST);
    $this->checkEditorCredential();

    $culture = $this->getCulture();
    
    $page = new sfSimpleCMSPage();
    if ($this->positionType == 'under')
    {
      $page->insertAsFirstChildOf($this->relative_page);
    }
    else
    {
      $page->insertAsNextSiblingOf($this->relative_page);
    }
    $page->setSlug($this->getRequestParameter('create_slug'));
    $page->setTemplate($this->getRequestParameter('template'));
    $page->save();

    $this->redirect(sfSimpleCMSTools::urlForPage($page->getSlug(), 'edit=true', $culture));
  }
  
  public function executeDelete()
  {
    $this->checkEditorCredential();

    $culture = $this->getCulture();
    $page = sfSimpleCMSPagePeer::retrieveBySlug($this->getRequestParameter('slug'));
    $this->forward404Unless($page);

    $page->delete();

    $this->redirect(sfSimpleCMSTools::urlForPage(sfConfig::get('app_sfSimpleCMS_default_page', 'home'), 'edit=true', $culture));
  }

}
