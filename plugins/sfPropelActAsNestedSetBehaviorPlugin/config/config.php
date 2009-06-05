<?php
/*
 * This file is part of the sfPropelActAsNestedSetBehavior package.
 * 
 * (c) 2007 Tristan Rivoallan <tristan@rivoallan.net>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

sfPropelBehavior::registerHooks('actasnestedset', array(
  ':save:pre'   => array('sfPropelActAsNestedSetBehavior', 'preSave'),
  ':delete:pre' => array('sfPropelActAsNestedSetBehavior', 'preDelete'),  
));

sfPropelBehavior::registerMethods('actasnestedset', array (
  array (
    'sfPropelActAsNestedSetBehavior',
    'getLeftValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getRightValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getParentIdValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getScopeIdValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'setLeftValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'setRightValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'setParentIdValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'setScopeIdValue'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'makeRoot'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'insertAsFirstChildOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'insertAsLastChildOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'insertAsNextSiblingOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'insertAsPrevSiblingOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'insertAsParentOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'hasChildren'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getChildren'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getParent'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getNumberOfChildren'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getDescendants'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getNumberOfDescendants'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'isRoot'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'hasParent'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'hasNextSibling'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'hasPrevSibling'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'isLeaf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'isEqualTo'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'isChildOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'isDescendantOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'moveToFirstChildOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'moveToLastChildOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'moveToNextSiblingOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'moveToPrevSiblingOf'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'deleteChildren'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'deleteDescendants'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'retrieveFirstChild'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'retrieveLastChild'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'retrieveNextSibling'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'retrievePrevSibling'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'retrieveParent'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'retrieveSiblings'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getLevel'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'setLevel'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'getPath'
  ),
  array (
    'sfPropelActAsNestedSetBehavior',
    'reload'
  ),
));