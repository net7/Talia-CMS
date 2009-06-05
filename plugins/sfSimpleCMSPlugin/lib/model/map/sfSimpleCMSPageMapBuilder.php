<?php



class sfSimpleCMSPageMapBuilder {

	
	const CLASS_NAME = 'plugins.sfSimpleCMSPlugin.lib.model.map.sfSimpleCMSPageMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_simple_cms_page');
		$tMap->setPhpName('sfSimpleCMSPage');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TREE_LEFT', 'TreeLeft', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TREE_RIGHT', 'TreeRight', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('TREE_PARENT', 'TreeParent', 'int', CreoleTypes::INTEGER, 'sf_simple_cms_page', 'ID', false, null);

		$tMap->addColumn('TOPIC_ID', 'TopicId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TEMPLATE', 'Template', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 