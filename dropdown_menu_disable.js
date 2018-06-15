

function check() {

  var x = document.getElementById("course-list").value;
  if (x=="Select Course:")
  {document.getElementById("TA_List").disabled = true;}

  else
  {document.getElementById("TA_List").disabled = false;}

}
