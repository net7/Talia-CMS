<?php


abstract class BasesfSimpleCMSPage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $slug;


	
	protected $tree_left;


	
	protected $tree_right;


	
	protected $tree_parent;


	
	protected $topic_id;


	
	protected $template;


	
	protected $is_published;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $asfSimpleCMSPageRelatedByTreeParent;

	
	protected $collsfSimpleCMSPagesRelatedByTreeParent;

	
	protected $lastsfSimpleCMSPageRelatedByTreeParentCriteria = null;

	
	protected $collsfSimpleCMSSlots;

	
	protected $lastsfSimpleCMSSlotCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getTreeLeft()
	{

		return $this->tree_left;
	}

	
	public function getTreeRight()
	{

		return $this->tree_right;
	}

	
	public function getTreeParent()
	{

		return $this->tree_parent;
	}

	
	public function getTopicId()
	{

		return $this->topic_id;
	}

	
	public function getTemplate()
	{

		return $this->template;
	}

	
	public function getIsPublished()
	{

		return $this->is_published;
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::ID;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::SLUG;
		}

	} 
	
	public function setTreeLeft($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_left !== $v) {
			$this->tree_left = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::TREE_LEFT;
		}

	} 
	
	public function setTreeRight($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_right !== $v) {
			$this->tree_right = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::TREE_RIGHT;
		}

	} 
	
	public function setTreeParent($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_parent !== $v) {
			$this->tree_parent = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::TREE_PARENT;
		}

		if ($this->asfSimpleCMSPageRelatedByTreeParent !== null && $this->asfSimpleCMSPageRelatedByTreeParent->getId() !== $v) {
			$this->asfSimpleCMSPageRelatedByTreeParent = null;
		}

	} 
	
	public function setTopicId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->topic_id !== $v) {
			$this->topic_id = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::TOPIC_ID;
		}

	} 
	
	public function setTemplate($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->template !== $v) {
			$this->template = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::TEMPLATE;
		}

	} 
	
	public function setIsPublished($v)
	{

		if ($this->is_published !== $v) {
			$this->is_published = $v;
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::IS_PUBLISHED;
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
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::CREATED_AT;
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
			$this->modifiedColumns[] = sfSimpleCMSPagePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->slug = $rs->getString($startcol + 1);

			$this->tree_left = $rs->getInt($startcol + 2);

			$this->tree_right = $rs->getInt($startcol + 3);

			$this->tree_parent = $rs->getInt($startcol + 4);

			$this->topic_id = $rs->getInt($startcol + 5);

			$this->template = $rs->getString($startcol + 6);

			$this->is_published = $rs->getBoolean($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_at = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfSimpleCMSPage object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSPage:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfSimpleCMSPagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfSimpleCMSPagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfSimpleCMSPage:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfSimpleCMSPage:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfSimpleCMSPagePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(sfSimpleCMSPagePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfSimpleCMSPagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfSimpleCMSPage:save:post') as $callable)
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


												
			if ($this->asfSimpleCMSPageRelatedByTreeParent !== null) {
				if ($this->asfSimpleCMSPageRelatedByTreeParent->isModified()) {
					$affectedRows += $this->asfSimpleCMSPageRelatedByTreeParent->save($con);
				}
				$this->setsfSimpleCMSPageRelatedByTreeParent($this->asfSimpleCMSPageRelatedByTreeParent);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfSimpleCMSPagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfSimpleCMSPagePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfSimpleCMSPagesRelatedByTreeParent !== null) {
				foreach($this->collsfSimpleCMSPagesRelatedByTreeParent as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfSimpleCMSSlots !== null) {
				foreach($this->collsfSimpleCMSSlots as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->asfSimpleCMSPageRelatedByTreeParent !== null) {
				if (!$this->asfSimpleCMSPageRelatedByTreeParent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfSimpleCMSPageRelatedByTreeParent->getValidationFailures());
				}
			}


			if (($retval = sfSimpleCMSPagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfSimpleCMSSlots !== null) {
					foreach($this->collsfSimpleCMSSlots as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfSimpleCMSPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSlug();
				break;
			case 2:
				return $this->getTreeLeft();
				break;
			case 3:
				return $this->getTreeRight();
				break;
			case 4:
				return $this->getTreeParent();
				break;
			case 5:
				return $this->getTopicId();
				break;
			case 6:
				return $this->getTemplate();
				break;
			case 7:
				return $this->getIsPublished();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfSimpleCMSPagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSlug(),
			$keys[2] => $this->getTreeLeft(),
			$keys[3] => $this->getTreeRight(),
			$keys[4] => $this->getTreeParent(),
			$keys[5] => $this->getTopicId(),
			$keys[6] => $this->getTemplate(),
			$keys[7] => $this->getIsPublished(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfSimpleCMSPagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSlug($value);
				break;
			case 2:
				$this->setTreeLeft($value);
				break;
			case 3:
				$this->setTreeRight($value);
				break;
			case 4:
				$this->setTreeParent($value);
				break;
			case 5:
				$this->setTopicId($value);
				break;
			case 6:
				$this->setTemplate($value);
				break;
			case 7:
				$this->setIsPublished($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfSimpleCMSPagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSlug($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTreeLeft($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTreeRight($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTreeParent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTopicId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTemplate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsPublished($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfSimpleCMSPagePeer::DATABASE_NAME);

		if ($this->isColumnModified(sfSimpleCMSPagePeer::ID)) $criteria->add(sfSimpleCMSPagePeer::ID, $this->id);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::SLUG)) $criteria->add(sfSimpleCMSPagePeer::SLUG, $this->slug);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::TREE_LEFT)) $criteria->add(sfSimpleCMSPagePeer::TREE_LEFT, $this->tree_left);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::TREE_RIGHT)) $criteria->add(sfSimpleCMSPagePeer::TREE_RIGHT, $this->tree_right);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::TREE_PARENT)) $criteria->add(sfSimpleCMSPagePeer::TREE_PARENT, $this->tree_parent);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::TOPIC_ID)) $criteria->add(sfSimpleCMSPagePeer::TOPIC_ID, $this->topic_id);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::TEMPLATE)) $criteria->add(sfSimpleCMSPagePeer::TEMPLATE, $this->template);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::IS_PUBLISHED)) $criteria->add(sfSimpleCMSPagePeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::CREATED_AT)) $criteria->add(sfSimpleCMSPagePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfSimpleCMSPagePeer::UPDATED_AT)) $criteria->add(sfSimpleCMSPagePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfSimpleCMSPagePeer::DATABASE_NAME);

		$criteria->add(sfSimpleCMSPagePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSlug($this->slug);

		$copyObj->setTreeLeft($this->tree_left);

		$copyObj->setTreeRight($this->tree_right);

		$copyObj->setTreeParent($this->tree_parent);

		$copyObj->setTopicId($this->topic_id);

		$copyObj->setTemplate($this->template);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfSimpleCMSPagesRelatedByTreeParent() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addsfSimpleCMSPageRelatedByTreeParent($relObj->copy($deepCopy));
			}

			foreach($this->getsfSimpleCMSSlots() as $relObj) {
				$copyObj->addsfSimpleCMSSlot($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
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
			self::$peer = new sfSimpleCMSPagePeer();
		}
		return self::$peer;
	}

	
	public function setsfSimpleCMSPageRelatedByTreeParent($v)
	{


		if ($v === null) {
			$this->setTreeParent(NULL);
		} else {
			$this->setTreeParent($v->getId());
		}


		$this->asfSimpleCMSPageRelatedByTreeParent = $v;
	}


	
	public function getsfSimpleCMSPageRelatedByTreeParent($con = null)
	{
		if ($this->asfSimpleCMSPageRelatedByTreeParent === null && ($this->tree_parent !== null)) {
						include_once 'plugins/sfSimpleCMSPlugin/lib/model/om/BasesfSimpleCMSPagePeer.php';

			$this->asfSimpleCMSPageRelatedByTreeParent = sfSimpleCMSPagePeer::retrieveByPK($this->tree_parent, $con);

			
		}
		return $this->asfSimpleCMSPageRelatedByTreeParent;
	}

	
	public function initsfSimpleCMSPagesRelatedByTreeParent()
	{
		if ($this->collsfSimpleCMSPagesRelatedByTreeParent === null) {
			$this->collsfSimpleCMSPagesRelatedByTreeParent = array();
		}
	}

	
	public function getsfSimpleCMSPagesRelatedByTreeParent($criteria = null, $con = null)
	{
				include_once 'plugins/sfSimpleCMSPlugin/lib/model/om/BasesfSimpleCMSPagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleCMSPagesRelatedByTreeParent === null) {
			if ($this->isNew()) {
			   $this->collsfSimpleCMSPagesRelatedByTreeParent = array();
			} else {

				$criteria->add(sfSimpleCMSPagePeer::TREE_PARENT, $this->getId());

				sfSimpleCMSPagePeer::addSelectColumns($criteria);
				$this->collsfSimpleCMSPagesRelatedByTreeParent = sfSimpleCMSPagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfSimpleCMSPagePeer::TREE_PARENT, $this->getId());

				sfSimpleCMSPagePeer::addSelectColumns($criteria);
				if (!isset($this->lastsfSimpleCMSPageRelatedByTreeParentCriteria) || !$this->lastsfSimpleCMSPageRelatedByTreeParentCriteria->equals($criteria)) {
					$this->collsfSimpleCMSPagesRelatedByTreeParent = sfSimpleCMSPagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfSimpleCMSPageRelatedByTreeParentCriteria = $criteria;
		return $this->collsfSimpleCMSPagesRelatedByTreeParent;
	}

	
	public function countsfSimpleCMSPagesRelatedByTreeParent($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfSimpleCMSPlugin/lib/model/om/BasesfSimpleCMSPagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfSimpleCMSPagePeer::TREE_PARENT, $this->getId());

		return sfSimpleCMSPagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfSimpleCMSPageRelatedByTreeParent(sfSimpleCMSPage $l)
	{
		$this->collsfSimpleCMSPagesRelatedByTreeParent[] = $l;
		$l->setsfSimpleCMSPageRelatedByTreeParent($this);
	}

	
	public function initsfSimpleCMSSlots()
	{
		if ($this->collsfSimpleCMSSlots === null) {
			$this->collsfSimpleCMSSlots = array();
		}
	}

	
	public function getsfSimpleCMSSlots($criteria = null, $con = null)
	{
				include_once 'plugins/sfSimpleCMSPlugin/lib/model/om/BasesfSimpleCMSSlotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfSimpleCMSSlots === null) {
			if ($this->isNew()) {
			   $this->collsfSimpleCMSSlots = array();
			} else {

				$criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $this->getId());

				sfSimpleCMSSlotPeer::addSelectColumns($criteria);
				$this->collsfSimpleCMSSlots = sfSimpleCMSSlotPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $this->getId());

				sfSimpleCMSSlotPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfSimpleCMSSlotCriteria) || !$this->lastsfSimpleCMSSlotCriteria->equals($criteria)) {
					$this->collsfSimpleCMSSlots = sfSimpleCMSSlotPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfSimpleCMSSlotCriteria = $criteria;
		return $this->collsfSimpleCMSSlots;
	}

	
	public function countsfSimpleCMSSlots($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfSimpleCMSPlugin/lib/model/om/BasesfSimpleCMSSlotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfSimpleCMSSlotPeer::PAGE_ID, $this->getId());

		return sfSimpleCMSSlotPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfSimpleCMSSlot(sfSimpleCMSSlot $l)
	{
		$this->collsfSimpleCMSSlots[] = $l;
		$l->setsfSimpleCMSPage($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfSimpleCMSPage:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfSimpleCMSPage::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 