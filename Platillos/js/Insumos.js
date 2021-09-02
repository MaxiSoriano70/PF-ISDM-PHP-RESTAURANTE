function Default () {
 $("input[type=checkbox]").each(function(){
  if ($(this).prop("checked")) {
   var n=$(this).val();
   $(".in"+n).prop('disabled',false);
  }
  else {
   var n=$(this).val()
   $(".in"+n).prop('disabled',true);
  }
 });
}

window.addEventListener("loadstart",Default());

function identificador(pos) {
 if ($(".ch"+pos).prop("checked")) {
  $(".in"+pos).prop('disabled',false);
  $(".in"+pos).val(1);
 }
 else {
  $(".in"+pos).prop('disabled',true);
  $(".in"+pos).val('');
 }
}