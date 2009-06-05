<?php

/**
 * Subclass for performing query and update operations on the 'sf_simple_cms_page' table.
 *
 * 
 *
 * @package plugins.sfSimpleCMSPlugin.lib.model
 */ 
class sfSimpleCMSPagePeer extends BasesfSimpleCMSPagePeer
{
  public static function retrievePublicBySlug($slug, $culture = null, $con = null)
  {
    $c = new Criteria();
    $c->add(self::SLUG, $slug);
    $c->add(self::IS_PUBLISHED, true);
    $page = self::doSelectOne($c, $con);
    
    if($page && $culture)
    {
      // populate the slots for the given culture
      $slots = $page->getSlots($culture);
      if(!$slots)
      {
        // a page with no slot is not displayed in the frontend
        return null;
      }
    }

    return $page;
  }


  public static function retrieveBySlug($slug, $culture = null, $con = null)
  {
    $c = new Criteria();
    $c->add(self::SLUG, $slug);
    $page = self::doSelectOne($c, $con);
    
    if ($page && $culture) 
    {
      // populate the slots for the given culture
      $page->populateSlots($culture);
    }
    
    return $page;
  }

  public static function getAllOrderBySlug($con = null)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::SLUG);
    return self::doSelect($c, $con);
  }

  public static function getAllOrderByTree($con = null)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::TREE_LEFT);
    return self::doSelect($c, $con);
  }
  
  public static function getRoot()
  {
    $c = new Criteria();
    $c->add(self::TREE_LEFT, 1);
    
    return self::doSelectOne($c);
  }
  
  public static function getLevel1($include_unpublished_pages = false, $culture = null)
  {
    $root = self::getRoot();
    $c = new Criteria();
    $c->add(self::TREE_PARENT, $root->getId());
    $c->addAscendingOrderByColumn(self::TREE_LEFT);
    
    return self::doSelectWithTitle($c, null, $include_unpublished_pages);
  }
  
  public static function doSelectWithTitle(Criteria $c, $culture = null, $include_unpublished_pages = false, $con = null)
  {
    $dbMap = Propel::getDatabaseMap($c->getDbName());
    
    if ($con === null)
    {
      $con = Propel::getConnection($c->getDbName());
    }
    
    if ($culture === null)
    {
      $culture = sfContext::getInstance()->getUser()->getCulture();
    }

    // Set the correct dbName if it has not been overridden
    if ($c->getDbName() == Propel::getDefaultDB())
    {
      $c->setDbName(self::DATABASE_NAME);
    }
    
    self::addSelectColumns($c);
    $startcol = (self::NUM_COLUMNS - self::NUM_LAZY_LOAD_COLUMNS) + 1;
    
    $c->addSelectColumn(sfSimpleCMSSlotPeer::VALUE);
    if (!$include_unpublished_pages)
    {
      $c->add(self::IS_PUBLISHED, true);
    }
            
    // Start of the complicated stuff
    // ------------------------------
    
    // big hack to have the join operate on three conditions
    $c->addJoin(sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSPagePeer::ID.' AND '.sfSimpleCMSSlotPeer::CULTURE.' = ? AND '.sfSimpleCMSSlotPeer::NAME.' = \'title\'', Criteria::RIGHT_JOIN);
    // but now we need to populate the statement by hand
    
    $params = array();
    $sql = BasePeer::createSelectSql($c, $params);
    array_unshift($params, array('column' => sfSimpleCMSSlotPeer::CULTURE, 'table' => sfSimpleCMSSlotPeer::TABLE_NAME, 'value' => $culture));
    $stmt = $con->prepareStatement($sql);
    $stmt->setLimit($c->getLimit());
    $stmt->setOffset($c->getOffset());

    $i = 1;
    foreach($params as $param) 
    {
      $tableName = $param['table'];
      $columnName = $param['column'];
      $value = $param['value'];

      if ($value === null)
      {
        $stmt->setNull($i++);
      }
      else
      {
        $cMap = $dbMap->getTable($tableName)->getColumn($columnName);
        $setter = 'set' . CreoleTypes::getAffix($cMap->getCreoleType());
        $stmt->$setter($i++, $value);
      }
    }
    
    $rs = $stmt->executeQuery(ResultSet::FETCHMODE_NUM);

    // ----------------------------
    // End of the complicated stuff
    
    /*
    // The complicated code above is there just to add a join on the three conditions 
    // It could be achieved in a simpler way with these lines
    $c->addJoin(sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSPagePeer::ID, Criteria::RIGHT_JOIN);
    $c->add(sfSimpleCMSSlotPeer::CULTURE, $culture);
    $c->add(sfSimpleCMSSlotPeer::NAME, 'title');
    // But then pages with no title would not be visible in menus
    // So we do it with more code and it's both safe and functional
    */

    $results = array();

    while($rs->next()) 
    {
      $page = new sfSimpleCMSPage();
      $page->hydrate($rs);
      //$page->setCulture($culture);
      $page->setTitle($rs->getString($startcol));

      $results[] = $page;
    }
    return $results;
  }
  
  public static function getLatest($max = 5, $include_unpublished_pages = false)
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(self::UPDATED_AT);
    $c->setLimit($max);
    
    return self::doSelectWithTitle($c, null, $include_unpublished_pages);
  }
  
  public static function doSelectPublished(Criteria $criteria, $con = null)
  {
    $c = clone $criteria;
    $c->add(self::IS_PUBLISHED, true);
    
    return self::doSelect($c, $con);
  }
  
  public static function getAllPagesWithLevel($indent_string = ' - ')
  {
    $pages = self::getAllOrderByTree();
    $page_names = array();
    $level = 0;
    $previous = null;
    foreach ($pages as $page)
    {
      if ($previous)
      {
        if ($page->getParentIdValue() == $previous->getId())
        {
          $level++;
        }
        elseif ($previous->getRightValue() != $page->getLeftValue() + 1)
        {
          $level = $level - $page->getLeftValue() + $previous->getRightValue() + 1;
        }
      }
      $previous = $page;
      $page_names[$page->getSlug()] = str_repeat($indent_string, $level) . $page->getSlug();
    }
    return $page_names;
  }
  
}
