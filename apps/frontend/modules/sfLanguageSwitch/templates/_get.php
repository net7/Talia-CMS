<div id="language">
<ul>
  <?php foreach($sf_data->getRaw('languages') as $language => $information): ?>
    <li<?php echo $language == $sf_user->getCulture() ? ' class="selected"' : '' ?>>


      <?php echo link_to(
			 $information['title'],
			 $current_module . '/' . $current_action . $information['query']
			 ) ?>
    </li>
  <?php endforeach; ?>
</ul>
</div>