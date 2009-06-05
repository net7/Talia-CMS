var activatedAreas = new Array();

function setTextareaToTinyMCE(sEditorID)
{
  var oEditor = document.getElementById(sEditorID);
    if(oEditor)
  {
    if(activatedAreas[sEditorID] == true)
      unsetTextareaToTinyMCE(sEditorID);
    try {
      activatedAreas[sEditorID] = true;
      tinyMCE.execCommand("mceAddControl", true, sEditorID);
    }
    catch(e)
    {
      alert("Error activating element " + sEditorID + "\n" + e);
    }
  }
}

function unsetTextareaToTinyMCE(sEditorID)
{
  var oEditor = document.getElementById(sEditorID);
  if(oEditor && (activatedAreas[sEditorID] == true))
  {
    try
    {
      tinyMCE.execCommand("mceRemoveControl", true, sEditorID);
      activatedAreas[sEditorID] = false;
    }
    catch(e)
    {
      alert("Error deactivating element " + sEditorID + "\n" + e);
    }
  }
}

function tinymceDeactivate()
{
  try {
    tinyMCE.triggerSave(true,true);
  }
  catch(e)
  {
    alert("Error saving form\n" + e);
  }

  for(var i in activatedAreas)
  {
    if(activatedAreas[i] == true)
    {
      unsetTextareaToTinyMCE(i);
    }
  }
}

function submitForm(formId)
{
 if($(formId).onsubmit())
 {
    $(formId).submit();
 }
}

tinyMCE.init({
  theme : "advanced",
  language : "en",
  mode : "exact",
  relative_urls : false,
  debug : false,
  valid_elements : "*[*]",
  height:"100%",
  width:"100%",
  theme_advanced_resize_horizontal : false,
  theme_advanced_resizing : true,
  auto_reset_designmode : true
});
