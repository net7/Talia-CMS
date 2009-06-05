<?php

/**
 * Subclass for representing a row from the 'product_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ProductCategory extends BaseProductCategory
{

} // END OF class ProductCategory extends BaseProductCategory

$columns_map = array('left'   => ForumPostPeer::TREE_LEFT,
		     'right'  => ForumPostPeer::TREE_RIGHT,
		     'parent' => ForumPostPeer::TREE_PARENT,
		     'scope'  => ForumPostPeer::TOPIC_ID);

sfPropelBehavior::add('ProductCategory', array('actasnestedset' => array('columns' => $columns_map)));
