<?php $culture=$sf_user->getCulture() ?>
<div id="path">
<p>
<a href='/'>Home</a>
 &gt;
<?php foreach ($pages as $node): ?>
<?php echo link_to($node->isRoot() ? $node->getTitle($culture) : $node->__toString($culture), '@simple_slug_lang?slug=' . $node->getSlug() . '&sf_culture=' . $culture) ?>  
   &gt;
<?php endforeach; ?>
<?php echo $page->__toString($culture) ?>
</p>
</div>
