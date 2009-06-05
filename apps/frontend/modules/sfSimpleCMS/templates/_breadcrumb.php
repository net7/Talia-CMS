<?php $culture=$sf_user->getCulture() ?>
<div id="path">
<p>
<?php echo link_to('Home', 'http://www.nietzschesource.org') ?>
 &gt;
<?php foreach ($pages as $node): ?>
<?php echo link_to($node->isRoot() ? $node->getTitle($culture) : $node->__toString($culture),sfSimpleCMSTools::urlForPage($node->getSlug())) ?>  
   &gt;
<?php endforeach; ?>
<?php echo $page->__toString($culture) ?>
</p>
</div>
