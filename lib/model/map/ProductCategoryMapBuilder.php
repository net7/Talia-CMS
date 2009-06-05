<?php



class ProductCategoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProductCategoryMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('product_category');
		$tMap->setPhpName('ProductCategory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LABEL', 'Label', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TREE_LEFT', 'TreeLeft', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TREE_RIGHT', 'TreeRight', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TREE_PARENT', 'TreeParent', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TOPIC_ID', 'TopicId', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 