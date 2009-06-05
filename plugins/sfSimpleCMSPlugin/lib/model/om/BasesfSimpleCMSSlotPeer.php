<?php


abstract class BasesfSimpleCMSSlotPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_simple_cms_slot';

	
	const CLASS_DEFAULT = 'plugins.sfSimpleCMSPlugin.lib.model.sfSimpleCMSSlot';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PAGE_ID = 'sf_simple_cms_slot.PAGE_ID';

	
	const CULTURE = 'sf_simple_cms_slot.CULTURE';

	
	const NAME = 'sf_simple_cms_slot.NAME';

	
	const TYPE = 'sf_simple_cms_slot.TYPE';

	
	const VALUE = 'sf_simple_cms_slot.VALUE';

	
	const CREATED_AT = 'sf_simple_cms_slot.CREATED_AT';

	
	const UPDATED_AT = 'sf_simple_cms_slot.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PageId', 'Culture', 'Name', 'Type', 'Value', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSSlotPeer::CULTURE, sfSimpleCMSSlotPeer::NAME, sfSimpleCMSSlotPeer::TYPE, sfSimpleCMSSlotPeer::VALUE, sfSimpleCMSSlotPeer::CREATED_AT, sfSimpleCMSSlotPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('page_id', 'culture', 'name', 'type', 'value', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PageId' => 0, 'Culture' => 1, 'Name' => 2, 'Type' => 3, 'Value' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (sfSimpleCMSSlotPeer::PAGE_ID => 0, sfSimpleCMSSlotPeer::CULTURE => 1, sfSimpleCMSSlotPeer::NAME => 2, sfSimpleCMSSlotPeer::TYPE => 3, sfSimpleCMSSlotPeer::VALUE => 4, sfSimpleCMSSlotPeer::CREATED_AT => 5, sfSimpleCMSSlotPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('page_id' => 0, 'culture' => 1, 'name' => 2, 'type' => 3, 'value' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfSimpleCMSPlugin/lib/model/map/sfSimpleCMSSlotMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfSimpleCMSPlugin.lib.model.map.sfSimpleCMSSlotMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfSimpleCMSSlotPeer::getTableMap();
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
		return str_replace(sfSimpleCMSSlotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::PAGE_ID);

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::CULTURE);

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::NAME);

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::TYPE);

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::VALUE);

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::CREATED_AT);

		$criteria->addSelectColumn(sfSimpleCMSSlotPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(sf_simple_cms_slot.PAGE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_simple_cms_slot.PAGE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleCMSSlotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleCMSSlotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfSimpleCMSSlotPeer::doSelectRS($criteria, $con);
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
		$objects = sfSimpleCMSSlotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfSimpleCMSSlotPeer::populateObjects(sfSimpleCMSSlotPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlotPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleCMSSlotPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfSimpleCMSSlotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfSimpleCMSSlotPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfSimpleCMSPage(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleCMSSlotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleCMSSlotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSPagePeer::ID);

		$rs = sfSimpleCMSSlotPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfSimpleCMSPage(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfSimpleCMSSlotPeer::addSelectColumns($c);
		$startcol = (sfSimpleCMSSlotPeer::NUM_COLUMNS - sfSimpleCMSSlotPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfSimpleCMSPagePeer::addSelectColumns($c);

		$c->addJoin(sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSPagePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfSimpleCMSSlotPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfSimpleCMSPagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfSimpleCMSPage(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfSimpleCMSSlot($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfSimpleCMSSlots();
				$obj2->addsfSimpleCMSSlot($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfSimpleCMSSlotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfSimpleCMSSlotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSPagePeer::ID);

		$rs = sfSimpleCMSSlotPeer::doSelectRS($criteria, $con);
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

		sfSimpleCMSSlotPeer::addSelectColumns($c);
		$startcol2 = (sfSimpleCMSSlotPeer::NUM_COLUMNS - sfSimpleCMSSlotPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfSimpleCMSPagePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfSimpleCMSPagePeer::NUM_COLUMNS;

		$c->addJoin(sfSimpleCMSSlotPeer::PAGE_ID, sfSimpleCMSPagePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfSimpleCMSSlotPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfSimpleCMSPagePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfSimpleCMSPage(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfSimpleCMSSlot($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfSimpleCMSSlots();
				$obj2->addsfSimpleCMSSlot($obj1);
			}

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
		return sfSimpleCMSSlotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlotPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleCMSSlotPeer', $values, $con);
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


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfSimpleCMSSlotPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleCMSSlotPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlotPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfSimpleCMSSlotPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfSimpleCMSSlotPeer::PAGE_ID);
			$selectCriteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $criteria->remove(sfSimpleCMSSlotPeer::PAGE_ID), $comparison);

			$comparison = $criteria->getComparison(sfSimpleCMSSlotPeer::CULTURE);
			$selectCriteria->add(sfSimpleCMSSlotPeer::CULTURE, $criteria->remove(sfSimpleCMSSlotPeer::CULTURE), $comparison);

			$comparison = $criteria->getComparison(sfSimpleCMSSlotPeer::NAME);
			$selectCriteria->add(sfSimpleCMSSlotPeer::NAME, $criteria->remove(sfSimpleCMSSlotPeer::NAME), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlotPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfSimpleCMSSlotPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfSimpleCMSSlotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfSimpleCMSSlotPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfSimpleCMSSlot) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
				$vals[2][] = $value[2];
			}

			$criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $vals[0], Criteria::IN);
			$criteria->add(sfSimpleCMSSlotPeer::CULTURE, $vals[1], Criteria::IN);
			$criteria->add(sfSimpleCMSSlotPeer::NAME, $vals[2], Criteria::IN);
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

	
	public static function doValidate(sfSimpleCMSSlot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfSimpleCMSSlotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfSimpleCMSSlotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfSimpleCMSSlotPeer::DATABASE_NAME, sfSimpleCMSSlotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfSimpleCMSSlotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $page_id, $culture, $name, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $page_id);
		$criteria->add(sfSimpleCMSSlotPeer::CULTURE, $culture);
		$criteria->add(sfSimpleCMSSlotPeer::NAME, $name);
		$v = sfSimpleCMSSlotPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BasesfSimpleCMSSlotPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfSimpleCMSPlugin/lib/model/map/sfSimpleCMSSlotMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfSimpleCMSPlugin.lib.model.map.sfSimpleCMSSlotMapBuilder');
}
