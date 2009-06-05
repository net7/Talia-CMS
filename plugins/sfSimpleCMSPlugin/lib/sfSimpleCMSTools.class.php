<?php

class sfSimpleCMSTools
{
  public static function urlForPage($slug, $query_string = '', $culture = '')
  {
    if(sfConfig::get('app_sfSimpleCMS_use_l10n', false))
    {
      $culture_parameter = $culture ? $culture : sfContext::getInstance()->getRequest()->getParameter('sf_culture');
      $culture_query = '&sf_culture='.$culture_parameter;
    }
    else
    {
      $culture_query = '';
    }
    $routed_url = sfContext::getInstance()->getController()->genUrl('sfSimpleCMS/show?slug=-PLACEHOLDER-'.$culture_query, true);
    return str_replace('-PLACEHOLDER-', $slug, $routed_url).($query_string ? '?'.$query_string : '');
  }
}