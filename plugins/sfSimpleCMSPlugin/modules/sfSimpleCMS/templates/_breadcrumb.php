<ul id="breadcrumb_trail">
<?php foreach ($pages as $node): ?>
  <li><?php echo link_to($node->isRoot() ? __('Home') : $node->__toString($culture), sfSimpleCMSTools::urlForPage($node->getSlug()), array('class' => 'cms_page_navigation')) ?></li>  
<?php endforeach; ?>
  <li class="last"><?php echo $page->__toString($culture) ?></li>  
</ul>