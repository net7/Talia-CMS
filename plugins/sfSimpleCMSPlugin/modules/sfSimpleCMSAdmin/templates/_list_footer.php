<?php use_helper('I18N', 'Validation') ?>
<?php if ($sf_request->getAttribute('page_names')): ?>

  <?php echo form_tag('sfSimpleCMSAdmin/addPage', 'name=cms_tools_create_page id=cms_tools_create_page style=margin-right:270px') ?>
    <h2><?php echo __('Create new page') ?></h2>
    <fieldset>
    <div class="form-row">
      <label for="slug"><?php echo __('Path') ?></label>
      <?php if ($sf_request->hasError('slug')): ?>
        <?php echo form_error('slug', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php echo input_tag('slug') ?>
    </div>
    
    <div class="form-row">
      <label for="template"><?php echo __('Template') ?></label>
      <div class="content">
        <?php echo select_tag('template', options_for_select(sfConfig::get('app_sfSimpleCMS_templates', array(
          'simplePage' => 'Simple Page',
          'home'       => 'Home'  
        )))) ?>
      </div>
    </div>
  
    <div class="form-row">
      <label for="position"><?php echo __('Position') ?></label>
      <div class="content">
        <?php echo radiobutton_tag('position_type', 'after') ?>After
        <?php echo radiobutton_tag('position_type', 'under', 'selected=selected') ?>Under
      </div>
      <div class="content">
        <?php echo select_tag('position', options_for_select($sf_request->getAttribute('page_names'))) ?>
      </div>
    </div>
    </fieldset>
  
    <ul class="sf_admin_actions">
      <li><?php echo submit_tag(__('create'), array (
      'name' => 'create',
      'class' => 'sf_admin_action_save',
    )) ?></li>
    </ul>

  </form>
      
<?php else: ?>

  <?php echo form_tag('sfSimpleCMSAdmin/createRootPage', 'name=cms_tools_create_page id=cms_tools_create_root_page style=margin-right:270px') ?>
    <h2><?php echo __('Create root page') ?></h2>
    <fieldset>
    <div class="form-row">
      <label for="slug"><?php echo __('Path') ?></label>
      <?php echo input_tag('slug') ?>
    </div>
    
    <div class="form-row">
      <label for="template"><?php echo __('Template') ?></label>
      <div class="content">
        <?php echo select_tag('template', options_for_select(sfConfig::get('app_sfSimpleCMS_templates'))) ?>
      </div>
    </div>
  
    </fieldset>
  
    <ul class="sf_admin_actions">
      <li><?php echo submit_tag(__('create'), array (
      'name' => 'create',
      'class' => 'sf_admin_action_save',
    )) ?></li>
    </ul>
  </form>
<?php endif; ?>

