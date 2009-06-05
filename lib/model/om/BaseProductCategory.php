<?php


abstract class BaseProductCategory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $label;


	
	protected $tree_left;


	
	protected $tree_right;


	
	protected $tree_parent;


	
	protected $topic_id;

	
	protected $collProductCategoryI18ns;

	
	protected $lastProductCategoryI18nCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  protected $culture;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getLabel()
	{

		return $this->label;
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProductCategoryPeer::ID;
		}

	} 
	
	public function setLabel($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->label !== $v) {
			$this->label = $v;
			$this->modifiedColumns[] = ProductCategoryPeer::LABEL;
		}

	} 
	
	public function setTreeLeft($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_left !== $v) {
			$this->tree_left = $v;
			$this->modifiedColumns[] = ProductCategoryPeer::TREE_LEFT;
		}

	} 
	
	public function setTreeRight($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_right !== $v) {
			$this->tree_right = $v;
			$this->modifiedColumns[] = ProductCategoryPeer::TREE_RIGHT;
		}

	} 
	
	public function setTreeParent($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_parent !== $v) {
			$this->tree_parent = $v;
			$this->modifiedColumns[] = ProductCategoryPeer::TREE_PARENT;
		}

	} 
	
	public function setTopicId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->topic_id !== $v) {
			$this->topic_id = $v;
			$this->modifiedColumns[] = ProductCategoryPeer::TOPIC_ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->label = $rs->getString($startcol + 1);

			$this->tree_left = $rs->getInt($startcol + 2);

			$this->tree_right = $rs->getInt($startcol + 3);

			$this->tree_parent = $rs->getInt($startcol + 4);

			$this->topic_id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ProductCategory object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseProductCategory:delete:pre') as $callable)
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
			$con = Propel::getConnection(ProductCategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProductCategoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseProductCategory:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseProductCategory:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProductCategoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseProductCategory:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProductCategoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProductCategoryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collProductCategoryI18ns !== null) {
				foreach($this->collProductCategoryI18ns as $referrerFK) {
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


			if (($retval = ProductCategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProductCategoryI18ns !== null) {
					foreach($this->collProductCategoryI18ns as $referrerFK) {
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
		$pos = ProductCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getLabel();
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProductCategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLabel(),
			$keys[2] => $this->getTreeLeft(),
			$keys[3] => $this->getTreeRight(),
			$keys[4] => $this->getTreeParent(),
			$keys[5] => $this->getTopicId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProductCategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLabel($value);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProductCategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLabel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTreeLeft($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTreeRight($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTreeParent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTopicId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ProductCategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductCategoryPeer::ID)) $criteria->add(ProductCategoryPeer::ID, $this->id);
		if ($this->isColumnModified(ProductCategoryPeer::LABEL)) $criteria->add(ProductCategoryPeer::LABEL, $this->label);
		if ($this->isColumnModified(ProductCategoryPeer::TREE_LEFT)) $criteria->add(ProductCategoryPeer::TREE_LEFT, $this->tree_left);
		if ($this->isColumnModified(ProductCategoryPeer::TREE_RIGHT)) $criteria->add(ProductCategoryPeer::TREE_RIGHT, $this->tree_right);
		if ($this->isColumnModified(ProductCategoryPeer::TREE_PARENT)) $criteria->add(ProductCategoryPeer::TREE_PARENT, $this->tree_parent);
		if ($this->isColumnModified(ProductCategoryPeer::TOPIC_ID)) $criteria->add(ProductCategoryPeer::TOPIC_ID, $this->topic_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProductCategoryPeer::DATABASE_NAME);

		$criteria->add(ProductCategoryPeer::ID, $this->id);

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

		$copyObj->setLabel($this->label);

		$copyObj->setTreeLeft($this->tree_left);

		$copyObj->setTreeRight($this->tree_right);

		$copyObj->setTreeParent($this->tree_parent);

		$copyObj->setTopicId($this->topic_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getProductCategoryI18ns() as $relObj) {
				$copyObj->addProductCategoryI18n($relObj->copy($deepCopy));
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
			self::$peer = new ProductCategoryPeer();
		}
		return self::$peer;
	}

	
	public function initProductCategoryI18ns()
	{
		if ($this->collProductCategoryI18ns === null) {
			$this->collProductCategoryI18ns = array();
		}
	}

	
	public function getProductCategoryI18ns($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseProductCategoryI18nPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProductCategoryI18ns === null) {
			if ($this->isNew()) {
			   $this->collProductCategoryI18ns = array();
			} else {

				$criteria->add(ProductCategoryI18nPeer::ID, $this->getId());

				ProductCategoryI18nPeer::addSelectColumns($criteria);
				$this->collProductCategoryI18ns = ProductCategoryI18nPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ProductCategoryI18nPeer::ID, $this->getId());

				ProductCategoryI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastProductCategoryI18nCriteria) || !$this->lastProductCategoryI18nCriteria->equals($criteria)) {
					$this->collProductCategoryI18ns = ProductCategoryI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProductCategoryI18nCriteria = $criteria;
		return $this->collProductCategoryI18ns;
	}

	
	public function countProductCategoryI18ns($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseProductCategoryI18nPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ProductCategoryI18nPeer::ID, $this->getId());

		return ProductCategoryI18nPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addProductCategoryI18n(ProductCategoryI18n $l)
	{
		$this->collProductCategoryI18ns[] = $l;
		$l->setProductCategory($this);
	}

  public function getCulture()
  {
    return $this->culture;
  }

  public function setCulture($culture)
  {
    $this->culture = $culture;
  }

  public function getName()
  {
    $obj = $this->getCurrentProductCategoryI18n();

    return ($obj ? $obj->getName() : null);
  }

  public function setName($value)
  {
    $this->getCurrentProductCategoryI18n()->setName($value);
  }

  public function getDescription()
  {
    $obj = $this->getCurrentProductCategoryI18n();

    return ($obj ? $obj->getDescription() : null);
  }

  public function setDescription($value)
  {
    $this->getCurrentProductCategoryI18n()->setDescription($value);
  }

  protected $current_i18n = array();

  public function getCurrentProductCategoryI18n()
  {
    if (!isset($this->current_i18n[$this->culture]))
    {
      $obj = ProductCategoryI18nPeer::retrieveByPK($this->getId(), $this->culture);
      if ($obj)
      {
        $this->setProductCategoryI18nForCulture($obj, $this->culture);
      }
      else
      {
        $this->setProductCategoryI18nForCulture(new ProductCategoryI18n(), $this->culture);
        $this->current_i18n[$this->culture]->setCulture($this->culture);
      }
    }

    return $this->current_i18n[$this->culture];
  }

  public function setProductCategoryI18nForCulture($object, $culture)
  {
    $this->current_i18n[$culture] = $object;
    $this->addProductCategoryI18n($object);
  }


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseProductCategory:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseProductCategory::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 