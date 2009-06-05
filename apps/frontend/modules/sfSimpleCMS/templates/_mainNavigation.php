    <div id="menu">
      <ul>
<?php
$home=sfSimpleCMSPagePeer::retrieveBySlug('home');
$home_title=$home->getTitle($sf_user->getCulture());
?>

    <li><?php echo link_to($home_title,
			  '@simple_slug_lang?slug=home&sf_culture='.$sf_user->getCulture())?></li>
     <?php foreach ($level1_nodes as $node): ?>
   
     <li <?php if ($node->getSlug() == $page->getSlug()): ?>class="current"<?php endif; ?>>
     <?php echo link_to(
		   $node->__toString($culture), 
		   '@simple_slug_lang?sf_culture='.$culture.'&slug='.$node->getSlug()) ?>


       <?php if($node->hasChildren()): ?>
         <ul class="secondlevel pages">
         <?php foreach ($node->getChildren() as $child_secondlevel): ?>


          <li <?php if ($child_secondlevel->getSlug() == $page->getSlug()): ?>class="current"<?php endif; ?>>
        <?php echo link_to(
		   $child_secondlevel->__toString($culture), 
		   '@simple_slug_lang?sf_culture='.$culture.'&slug='.$child_secondlevel->getSlug()) ?>


       <?php if($child_secondlevel->hasChildren()): ?>
         <ul class="thirdlevel pages">
         <?php foreach ($child_secondlevel->getChildren() as $child_thirdlevel): ?>


          <li <?php if ($child_thirdlevel->getSlug() == $page->getSlug()): ?>class="current"<?php endif; ?>>
        <?php echo link_to(
		   $child_thirdlevel->__toString($culture), 
		   '@simple_slug_lang?sf_culture='.$culture.'&slug='.$child_thirdlevel->getSlug()) ?>

        </li>
         <?php endforeach; ?>
         </ul>
	 <?php endif; ?>
        </li>


         <?php endforeach; ?>
         </ul>
	 <?php endif; ?>


     </li>
  <?php endforeach; ?>
</ul>

	<ul id="login">
<?php if(!$sf_user->isAuthenticated()): ?>
	<li> <?php echo link_to('login','@sf_guard_signin')?></li>
<?php else: ?>
	<li> <?php echo link_to('edit pages','sfSimpleCMSAdmin/list')?></li>
	<li> <?php echo link_to('manage users','sfGuardUser/list')?></li>
	<li> <?php echo link_to('logout','@sf_guard_signout')?></li>
<?php endif; ?>
 </ul>

</div>