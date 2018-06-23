

function check() {

  var x = document.getElementById("course_list").value;
  if (x=="Select Course:")
  {document.getElementById('TA_list').disabled = true;}

  else
  {document.getElementById('TA_list').disabled = false;}

}
