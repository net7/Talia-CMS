<?php


abstract class BasesfSimpleCMSSlot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $page_id;


	
	protected $culture;


	
	protected $name;


	
	protected $type = 'Text';


	
	protected $value;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $asfSimpleCMSPage;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPageId()
	{

		return $this->page_id;
	}

	
	public function getCulture()
	{

		return $this->culture;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getValue()
	{

		return $this->value;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setPageId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->page_id !== $v) {
			$this->page_id = $v;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::PAGE_ID;
		}

		if ($this->asfSimpleCMSPage !== null && $this->asfSimpleCMSPage->getId() !== $v) {
			$this->asfSimpleCMSPage = null;
		}

	} 
	
	public function setCulture($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->culture !== $v) {
			$this->culture = $v;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::CULTURE;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::NAME;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v || $v === 'Text') {
			$this->type = $v;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::TYPE;
		}

	} 
	
	public function setValue($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->value !== $v) {
			$this->value = $v;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::VALUE;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = sfSimpleCMSSlotPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->page_id = $rs->getInt($startcol + 0);

			$this->culture = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->type = $rs->getString($startcol + 3);

			$this->value = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfSimpleCMSSlot object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlot:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfSimpleCMSSlotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfSimpleCMSSlotPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlot:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSSlot:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfSimpleCMSSlotPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfSimpleCMSSlotPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfSimpleCMSSlotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfSimpleCMSSlot:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->asfSimpleCMSPage !== null) {
				if ($this->asfSimpleCMSPage->isModified()) {
					$affectedRows += $this->asfSimpleCMSPage->save($con);
				}
				$this->setsfSimpleCMSPage($this->asfSimpleCMSPage);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfSimpleCMSSlotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += sfSimpleCMSSlotPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->asfSimpleCMSPage !== null) {
				if (!$this->asfSimpleCMSPage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfSimpleCMSPage->getValidationFailures());
				}
			}


			if (($retval = sfSimpleCMSSlotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfSimpleCMSSlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPageId();
				break;
			case 1:
				return $this->getCulture();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getType();
				break;
			case 4:
				return $this->getValue();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfSimpleCMSSlotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPageId(),
			$keys[1] => $this->getCulture(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getType(),
			$keys[4] => $this->getValue(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfSimpleCMSSlotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPageId($value);
				break;
			case 1:
				$this->setCulture($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setType($value);
				break;
			case 4:
				$this->setValue($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfSimpleCMSSlotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPageId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCulture($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfSimpleCMSSlotPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfSimpleCMSSlotPeer::PAGE_ID)) $criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $this->page_id);
		if ($this->isColumnModified(sfSimpleCMSSlotPeer::CULTURE)) $criteria->add(sfSimpleCMSSlotPeer::CULTURE, $this->culture);
		if ($this->isColumnModified(sfSimpleCMSSlotPeer::NAME)) $criteria->add(sfSimpleCMSSlotPeer::NAME, $this->name);
		if ($this->isColumnModified(sfSimpleCMSSlotPeer::TYPE)) $criteria->add(sfSimpleCMSSlotPeer::TYPE, $this->type);
		if ($this->isColumnModified(sfSimpleCMSSlotPeer::VALUE)) $criteria->add(sfSimpleCMSSlotPeer::VALUE, $this->value);
		if ($this->isColumnModified(sfSimpleCMSSlotPeer::CREATED_AT)) $criteria->add(sfSimpleCMSSlotPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfSimpleCMSSlotPeer::UPDATED_AT)) $criteria->add(sfSimpleCMSSlotPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfSimpleCMSSlotPeer::DATABASE_NAME);

		$criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $this->page_id);
		$criteria->add(sfSimpleCMSSlotPeer::CULTURE, $this->culture);
		$criteria->add(sfSimpleCMSSlotPeer::NAME, $this->name);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getPageId();

		$pks[1] = $this->getCulture();

		$pks[2] = $this->getName();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setPageId($keys[0]);

		$this->setCulture($keys[1]);

		$this->setName($keys[2]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setType($this->type);

		$copyObj->setValue($this->value);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setPageId(NULL); 
		$copyObj->setCulture(NULL); 
		$copyObj->setName(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new sfSimpleCMSSlotPeer();
		}
		return self::$peer;
	}

	
	public function setsfSimpleCMSPage($v)
	{


		if ($v === null) {
			$this->setPageId(NULL);
		} else {
			$this->setPageId($v->getId());
		}


		$this->asfSimpleCMSPage = $v;
	}


	
	public function getsfSimpleCMSPage($con = null)
	{
		if ($this->asfSimpleCMSPage === null && ($this->page_id !== null)) {
						include_once 'plugins/sfSimpleCMSPlugin/lib/model/om/BasesfSimpleCMSPagePeer.php';

			$this->asfSimpleCMSPage = sfSimpleCMSPagePeer::retrieveByPK($this->page_id, $con);

			
		}
		return $this->asfSimpleCMSPage;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfSimpleCMSSlot:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfSimpleCMSSlot::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 