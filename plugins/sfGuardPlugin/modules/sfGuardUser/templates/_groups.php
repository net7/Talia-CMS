<?php

  // TBB (tom@punkave.com): filters by group.

  $groups = sfGuardGroupPeer::doSelect(new Criteria());
  $fgroups = isset($filters['groups']) ? $filters['groups'] : array();
?>
<span class="groups_filter">
<?php foreach ($groups as $group): ?>
  <div class="groups_filter_group">
  <?php
    echo checkbox_tag('filters[groups][]', 
      $group->getId(), in_array($group->getId(), $fgroups));
  ?>
    <span class="groups_filter_group_label">
    <?php echo $group->getName(); ?>
    </span>
  </div>
<?php endforeach ?>
</span>
