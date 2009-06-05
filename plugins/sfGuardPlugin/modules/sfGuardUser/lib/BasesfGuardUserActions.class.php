<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardUserActions.class.php 10861 2008-08-13 16:28:32Z boutell $
 */
class BasesfGuardUserActions extends autosfGuardUserActions
{
  public function validateEdit()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST && !$this->getRequestParameter('id'))
    {
      if ($this->getRequestParameter('sf_guard_user[password]') == '')
      {
        $this->getRequest()->setError('sf_guard_user{password}', $this->getContext()->getI18N()->__('Password is mandatory'));

        return false;
      }
    }

    return true;
  }

  protected function addFiltersCriteria($c)
  {
    // Tom Boutell (tom@punkave.com): implement filtering for groups. If 
    // any groups are checked, display only users who are in one or more 
    // of the checked groups. Also, take steps to prevent the base class
    // implementation from attempting to incorrectly filter for groups.

    if (isset($this->filters['groups'])) 
    {
      $groups = $this->filters['groups'];
      if (count($groups)) 
      {
        $c->addJoin(sfGuardUserPeer::ID, sfGuardUserGroupPeer::USER_ID);
        $orClause = false;
        foreach ($groups as $group)
        {
          $crit = $c->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, $group);
          if (!$orClause) {
            $orClause = $crit;
          } else {
            $orClause->addOr($crit);
          }
        }
        $c->add($orClause);
      }
    }
    // Prevent the base class implementation from setting up criteria
    // for groups that can't actually work (there is
    // no such thing as sfGuardUserPeer::GROUPS). TODO: although
    // PHP 5.2.x doesn't seem to mind compiling (not executing)
    // references to nonexistent constants, we should define a GROUPS
    // constant in sfGuardUserPeer anyway, just to be futureproof.

    // Hide the groups filter from the base class implementation
    if (isset($this->filters['groups_is_empty'])) 
    {
      $groupsIsEmpty = $this->filters['groups_is_empty'];
      unset($this->filters['groups_is_empty']);
    }
    if (isset($this->filters['groups'])) 
    {
      $groups = $this->filters['groups'];
      unset($this->filters['groups']);
    }

    // Call the base class implementation to get the other filters
    $result = parent::addFiltersCriteria($c);

    // Restore the groups filter
    if (isset($groupsIsEmpty)) 
    {
      $this->filters['groups_is_empty'] = $groupsIsEmpty;   
    }
    if (isset($groups)) 
    {
      $this->filters['groups'] = $groups;
    }
  }

}
