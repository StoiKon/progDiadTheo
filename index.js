$(document).ready(function(){
  $("#showbtn0").click( function() {
  $("#role option").eq(1).prop('selected',true);
  $("#amd").show();
  $("entYear").show();
  $("#bathmd").hide();

});
$("#role").change( function() {
  switch(this.selectedIndex){
    case 0:
      $("#amd").hide();
      $("entYear").hide();
      $("#bathmd").show();
      break;
    case 1:
      $("#bathmd").hide();
      $("#amd").show();
      break;

  }
});
$("#showbtn").click(function(){
  $("#loginForm").toggleClass('hide');
  $("#sign").addClass('hide');
});
$("#showbtn0").click(function(){
  $("#sign").toggleClass('hide');
  $("#loginForm").addClass('hide');
});
});