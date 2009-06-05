<?php



class sfSimpleCMSSlotMapBuilder {

	
	const CLASS_NAME = 'plugins.sfSimpleCMSPlugin.lib.model.map.sfSimpleCMSSlotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_simple_cms_slot');
		$tMap->setPhpName('sfSimpleCMSSlot');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('PAGE_ID', 'PageId', 'int' , CreoleTypes::INTEGER, 'sf_simple_cms_page', 'ID', true, null);

		$tMap->addPrimaryKey('CULTURE', 'Culture', 'string', CreoleTypes::VARCHAR, true, 7);

		$tMap->addPrimaryKey('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('VALUE', 'Value', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 