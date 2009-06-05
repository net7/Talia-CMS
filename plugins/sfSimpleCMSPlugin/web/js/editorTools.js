function toggle_pane(pane)
{
  new Effect.toggle(pane, 'blind', {duration:0.6});
  $(pane).toggleClassName('open');
  save_toolbar_state();
}

function restore_toolbar_state()
{ 
  var state_cookie = readCookie('sf_simple_blog_toolbar');
  var editorbox = document.getElementById('editor_box');
  if(state_cookie)
  {
    var preferences = state_cookie.split('x');

    editorbox.style.left = preferences[0]+'px';
    editorbox.style.top = preferences[1]+'px';
    if(preferences[2] == 'false')
    {
      $('tools').style.display = 'none';
      $('tools').removeClassName('open');
      $('toolbar_minifier').addClassName('minimized')
    }
    if(preferences[3] == 'true')
    {
      try
      {
        $('cms_page_localizations').style.display = 'block';
        $('cms_page_localizations').addClassName('open');
      }
      catch (e) {}
    }
    if(preferences[4] == 'false')
    {
      $('cms_tools_update_page').style.display = 'none';
      $('cms_tools_update_page').removeClassName('open');
    }
    if(preferences[5] == 'true')
    {
      $('cms_tools_create_page').style.display = 'block';
      $('cms_tools_create_page').addClassName('open');
    }
    if(preferences[6] == 'true')
    {
      $('cms_tools_change_page').style.display = 'block';
      $('cms_tools_change_page').addClassName('open');
    }
  }
  editorbox.style.display = 'block';
}

function save_toolbar_state()
{
  var position = Position.cumulativeOffset($('editor_box'));
  var preferences = new Array();
  preferences[0] = position[0];
  preferences[1] = position[1];
  preferences[2] = $('tools').hasClassName('open') ? 'true' : 'false';
  try
  {
    preferences[3] = $('cms_page_localizations').hasClassName('open') ? 'true' : 'false';
  }
  catch (e) {}
  preferences[4] = $('cms_tools_update_page').hasClassName('open') ? 'true' : 'false';
  preferences[5] = $('cms_tools_create_page').hasClassName('open') ? 'true' : 'false';
  preferences[6] = $('cms_tools_change_page').hasClassName('open') ? 'true' : 'false';
  
  createCookie('sf_simple_blog_toolbar', preferences.join('x'), 7);
}

function transform_links_to_editable()
{
  links = $$('a[class=cms_page_navigation]');
  links.each(function (found_link) {
    found_link.href = found_link.href + window.location.search;
  });
}
Event.observe(window, 'load', function() {
  restore_toolbar_state();
  transform_links_to_editable();
});