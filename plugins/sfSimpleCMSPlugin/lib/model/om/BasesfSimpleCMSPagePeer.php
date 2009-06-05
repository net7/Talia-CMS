<?php


abstract class BasesfSimpleCMSPagePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_simple_cms_page';

	
	const CLASS_DEFAULT = 'plugins.sfSimpleCMSPlugin.lib.model.sfSimpleCMSPage';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_simple_cms_page.ID';

	
	const SLUG = 'sf_simple_cms_page.SLUG';

	
	const TREE_LEFT = 'sf_simple_cms_page.TREE_LEFT';

	
	const TREE_RIGHT = 'sf_simple_cms_page.TREE_RIGHT';

	
	const TREE_PARENT = 'sf_simple_cms_page.TREE_PARENT';

	
	const TOPIC_ID = 'sf_simple_cms_page.TOPIC_ID';

	
	const TEMPLATE = 'sf_simple_cms_page.TEMPLATE';

	
	const IS_PUBLISHED = 'sf_simple_cms_page.IS_PUBLISHED';

	
	const CREATED_AT = 'sf_simple_cms_page.CREATED_AT';

	
	const UPDATED_AT = 'sf_simple_cms_page.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Slug', 'TreeLeft', 'TreeRight', 'TreeParent', 'TopicId', 'Template', 'IsPublished', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfSimpleCMSPagePeer::ID, sfSimpleCMSPagePeer::SLUG, sfSimpleCMSPagePeer::TREE_LEFT, sfSimpleCMSPagePeer::TREE_RIGHT, sfSimpleCMSPagePeer::TREE_PARENT, sfSimpleCMSPagePeer::TOPIC_ID, sfSimpleCMSPagePeer::TEMPLATE, sfSimpleCMSPagePeer::IS_PUBLISHED, sfSimpleCMSPagePeer::CREATED_AT, sfSimpleCMSPagePeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'slug', 'tree_left', 'tree_right', 'tree_parent', 'topic_id', 'template', 'is_published', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Slug' => 1, 'TreeLeft' => 2, 'TreeRight' => 3, 'TreeParent' => 4, 'TopicId' => 5, 'Template' => 6, 'IsPublished' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
		BasePeer::TYPE_COLNAME => array (sfSimpleCMSPagePeer::ID => 0, sfSimpleCMSPagePeer::SLUG => 1, sfSimpleCMSPagePeer::TREE_LEFT => 2, sfSimpleCMSPagePeer::TREE_RIGHT => 3, sfSimpleCMSPagePeer::TREE_PARENT => 4, sfSimpleCMSPagePeer::TOPIC_ID => 5, sfSimpleCMSPagePeer::TEMPLATE => 6, sfSimpleCMSPagePeer::IS_PUBLISHED => 7, sfSimpleCMSPagePeer::CREATED_AT => 8, sfSimpleCMSPagePeer::UPDATED_AT => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'slug' => 1, 'tree_left' => 2, 'tree_right' => 3, 'tree_parent' => 4, 'topic_id' => 5, 'template' => 6, 'is_published' => 7, 'created_at' => 8, 'updated_at' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfSimpleCMSPlugin/lib/model/map/sfSimpleCMSPageMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfSimpleCMSPlugin.lib.model.map.sfSimpleCMSPageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfSimpleCMSPagePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(sfSimpleCMSPagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::ID);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::SLUG);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::TREE_LEFT);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::TREE_RIGHT);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::TREE_PARENT);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::TOPIC_ID);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::TEMPLATE);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::IS_PUBLISHED);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::CREATED_AT);

		$criteria->addSelectColumn(sfSimpleCMSPagePeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(sf_simple_cms_page.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_simple_cms_page.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleCMSPagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleCMSPagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfSimpleCMSPagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = sfSimpleCMSPagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfSimpleCMSPagePeer::populateObjects(sfSimpleCMSPagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSPagePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleCMSPagePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfSimpleCMSPagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfSimpleCMSPagePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleCMSPagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleCMSPagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfSimpleCMSPagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfSimpleCMSPagePeer::addSelectColumns($c);
		$startcol2 = (sfSimpleCMSPagePeer::NUM_COLUMNS - sfSimpleCMSPagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfSimpleCMSPagePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfSimpleCMSPagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSPagePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleCMSPagePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(sfSimpleCMSPagePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfSimpleCMSPagePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleCMSPagePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSPagePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleCMSPagePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(sfSimpleCMSPagePeer::ID);
			$selectCriteria->add(sfSimpleCMSPagePeer::ID, $criteria->remove(sfSimpleCMSPagePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfSimpleCMSPagePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleCMSPagePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(sfSimpleCMSPagePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(sfSimpleCMSPagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfSimpleCMSPage) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfSimpleCMSPagePeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(sfSimpleCMSPage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfSimpleCMSPagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfSimpleCMSPagePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(sfSimpleCMSPagePeer::DATABASE_NAME, sfSimpleCMSPagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfSimpleCMSPagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(sfSimpleCMSPagePeer::DATABASE_NAME);

		$criteria->add(sfSimpleCMSPagePeer::ID, $pk);


		$v = sfSimpleCMSPagePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(sfSimpleCMSPagePeer::ID, $pks, Criteria::IN);
			$objs = sfSimpleCMSPagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfSimpleCMSPagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfSimpleCMSPlugin/lib/model/map/sfSimpleCMSPageMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfSimpleCMSPlugin.lib.model.map.sfSimpleCMSPageMapBuilder');
}
