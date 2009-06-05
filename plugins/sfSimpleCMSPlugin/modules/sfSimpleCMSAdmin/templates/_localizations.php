<?php $localizations = $sf_simple_cms_page->getLocalizations(ESC_RAW) ?>
<?php foreach ($localizations as $localization): ?>
  <?php echo link_to(format_language(substr($localization, 0, 2)), sfSimpleCMSTools::urlForPage($sf_simple_cms_page->getSlug(), 'edit=true', $localization)) ?>
<?php endforeach; ?>
