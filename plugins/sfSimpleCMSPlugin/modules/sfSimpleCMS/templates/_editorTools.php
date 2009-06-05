<?php use_helper('Javascript', 'I18N', 'Validation', 'sfSimpleCMS') ?>

<div id="editor_box" style="display: none;">
  <h1>
    <?php echo __('Edition Tools') ?>
    <?php echo link_to_function('&nbsp;&nbsp;&nbsp;&nbsp;', "toggle_pane('tools');$('toolbar_minifier').toggleClassName('minimized')", 'id=toolbar_minifier title='.__('Toggle toolbar')) ?>
  </h1>

  <div id="cms_toolbox_mode">
    <div>
      Mode: 
      <?php if ($sf_params->get('preview')): ?>
        <?php $query_string = 'edit=true&preview=true' ?>
        <span class="preview selected"><?php echo __('preview') ?></span>
        <span class="edit"><?php echo link_to( __('edit'), sfSimpleCMSTools::urlForPage($slug, 'edit=true')) ?></span>
      <?php else: ?>
        <?php $query_string = 'edit=true' ?>
        <span class="preview"><?php echo link_to(__('preview'), sfSimpleCMSTools::urlForPage($slug, 'edit=true&preview=true')) ?></span>
        <span class="edit selected"><?php echo __('edit') ?></span>
      <?php endif; ?>
      <span class="list"><?php echo link_to(__('list'), 'sfSimpleCMSAdmin/list') ?></span>
    </div>
    <?php if ($is_publisher): ?>
    <div>
      Status: 
      <?php if ($page->getIsPublished()): ?>
        <span class="published selected"><?php echo __('published') ?></span>
        <span class="unpublished"><?php echo link_to_with_path(__('unpublish'), 'sfSimpleCMS/togglePublish?slug='.$slug, array('query_string' => $query_string.'&sf_culture='.$culture)) ?></span>
      <?php else: ?>
        <span class="published"><?php echo link_to_with_path( __('publish'), 'sfSimpleCMS/togglePublish?slug='.$slug, array('query_string' => $query_string.'&sf_culture='.$culture)) ?></span>
        <span class="unpublished selected"><?php echo __('unpublished') ?></span>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>

  <div id="tools" class="open">
  
    <?php if($page): ?>
      
    <?php if (sfConfig::get('app_sfSimpleCMS_use_l10n', false)): ?>
    <h2><?php echo link_to_function(__('Localizations'), "toggle_pane('cms_page_localizations')") ?> </h2>
  
    <ul id="cms_page_localizations" style="display:none;">
      <?php foreach (sfConfig::get('app_sfSimpleCMS_localizations') as $localization): ?>
       <?php echo content_tag(
         'li', 
         link_to_unless(
           $localization == $culture, 
           format_language(substr($localization, 0, 2)), 
           sfSimpleCMSTools::urlForPage($slug, $query_string, $localization)
          ),
          $page->hasLocalization($localization) ? 'class=localization_exists' : ''
        ) ?>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  
    <h2><?php echo link_to_function(__('Page properties'), "toggle_pane('cms_tools_update_page')") ?> </h2>
  
    <?php echo form_tag('sfSimpleCMS/update', 'name=cms_tools_update_page id=cms_tools_update_page class=open') ?>
  
      <?php echo input_hidden_tag('page_id', $page->getId()) ?>
  
      <div class="form_control">
        <label for="title">Title:</label>
        <?php echo input_tag('title', $page->getTitle($culture), 'id=update_title class=wide') ?>
      </div>
      
      <?php echo input_hidden_tag('sf_culture', $culture) ?>
      
      <div class="form_control">
        <label for="new_slug">Path:</label>
        <?php if ($sf_request->hasError('new_slug')): ?>
          <?php echo form_error('new_slug', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php echo input_tag('new_slug', $page->getSlug(), 'id=update_path class=wide') ?>
      </div>
      
      <div class="form_control">
        <label for="template">Template:</label>
        <?php echo select_tag('template', options_for_select(sfConfig::get('app_sfSimpleCMS_templates', array(
          'simplePage' => 'Simple Page',
          'home'       => 'Home'        
        )), $page->getTemplate()), 'id=update_template class=wide') ?>
      </div>
      
      <div class="form_control">
        <label for="position">
          Position:
          <?php echo radiobutton_tag('position_type', 'after') ?>After
          <?php echo radiobutton_tag('position_type', 'under') ?>Under
        </label>
        <?php if ($sf_request->hasError('position')): ?>
          <?php echo form_error('position', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php echo select_tag('position', options_for_select($page_names, $slug), 'id=create_position class=wide') ?>
        <?php echo javascript_tag("
        current_page_option = $$('#create_position option[selected=selected]')[0];
        current_page_option.value = '';
        current_page_option.addClassName('current');
        ") ?>
      </div>
  
      <div class="form_submit">
        <?php echo button_to_with_path(__('delete'), 'sfSimpleCMS/delete?sf_culture='.$culture.'&slug='.$slug, array(
          'confirm'      => __('Are you sure you want to delete this page?')
        )) ?>
        <?php echo submit_tag(__('update')) ?>
      </div>
  
    </form>
    <?php endif; ?>
  
    <h2><?php echo link_to_function(__('Create new page'), "toggle_pane('cms_tools_create_page')") ?></h2>
  
    <?php echo form_tag('sfSimpleCMS/create', 'name=cms_tools_create_page id=cms_tools_create_page style=display:none') ?>
      
      <?php echo input_hidden_tag('sf_culture', $culture) ?>
      <?php echo input_hidden_tag('slug', $sf_params->get('slug')) ?>
      
      <div class="form_control">
        <label for="slug">Path:</label>
        <?php if ($sf_request->hasError('create_slug')): ?>
          <?php echo form_error('create_slug', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php echo input_tag('create_slug', '', 'id=create_path class=wide autocomplete=off') ?>
      </div>
      
      <div class="form_control">
        <label for="template">Template:</label>
        <?php echo select_tag('template', options_for_select(sfConfig::get('app_sfSimpleCMS_templates', array(
          'simplePage' => 'Simple Page',
          'home'       => 'Home'
        )), $page->getTemplate()), 'id=create_template class=wide') ?>
      </div>
  
      <div class="form_control">
        <label for="position">
          Position:
          <?php echo radiobutton_tag('position_type', 'after') ?>After
          <?php echo radiobutton_tag('position_type', 'under', 'selected=selected') ?>Under
        </label>
        <?php if ($sf_request->hasError('create_position')): ?>
          <?php echo form_error('create_position', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php echo select_tag('create_position', options_for_select($page_names), 'id=create_position class=wide') ?>
      </div>

      <div class="form_submit">
        <?php echo submit_tag('create') ?>
      </div>
  
    </form>
    
    <h2><?php echo link_to_function(__('Page list'), "toggle_pane('cms_tools_change_page')") ?></h2>
    
    <ul id="cms_tools_change_page" style="display:none;">
    <?php foreach($page_names as $page_slug => $page_name): ?>
      <li>
        <?php if($page_slug == $slug): ?>
          <div class="current"><?php echo $page_name ?></div>
        <?php else: ?>
          <?php echo link_to($page_name, sfSimpleCMSTools::urlForPage($page_slug, $query_string)) ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
    </ul>

  </div>
</div>

<?php use_javascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype') ?>
<?php use_javascript('/sfSimpleCMSPlugin/js/cookies_handler.js') ?>
<?php use_javascript('/sfSimpleCMSPlugin/js/editorTools.js') ?>
<?php echo draggable_element('editor_box', array('revert' => 'save_toolbar_state')) ?>