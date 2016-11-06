
$(document).ready(function(){

  //populate year select
  var opt = '';
  for (i = 2016; i > 1940; i= i-1) {
    opt += '<option value=\"'+i+'\">'+i+'</option>';
  }

  $("#movieYear").append(opt);

  //submit
  

});
