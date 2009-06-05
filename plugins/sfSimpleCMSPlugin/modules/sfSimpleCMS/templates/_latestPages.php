<?php if ($pages): ?>
  <h3>Latest modifications</h3>
  <ul>
  <?php foreach ($pages as $page_node): ?>
    <li><?php echo link_to($page_node->getTitle($culture), sfSimpleCMSTools::urlForPage($page_node->getSlug()), 'class=cms_page_navigation') ?></li>  
  <?php endforeach; ?>
  </ul>
<?php endif ?>