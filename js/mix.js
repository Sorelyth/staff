function post(path, parameters) {
        var form = $('<form></form>');

        form.attr("method", "post");
        form.attr("action", path);

        $.each(parameters, function(key, value) {
            if ( typeof value == 'object' || typeof value == 'array' ){
                $.each(value, function(subkey, subvalue) {
                    var field = $('<input />');
                    field.attr("type", "hidden");
                    field.attr("name", key+'[]');
                    field.attr("value", subvalue);
                    form.append(field);
                });
            } else {
                var field = $('<input />');
                field.attr("type", "hidden");
                field.attr("name", key);
                field.attr("value", value);
                form.append(field);
            }
        });
        $(document.body).append(form);
        form.submit();
}
function checkRegisterForm(){
  var email = document.getElementById("inputEmail").value;
  var pwd1 = document.getElementById("pwd1").value;
  var pwd2 = document.getElementById("pwd2").value;
  var foo="@cru.org";
  if(!email.includes(foo)){
    alert(" Error: El correo electrónico sólo puede ser del dominio de cru.org");
    return false;
  }
  if(pwd1 != pwd2){
    alert("Error: Asegúrese de haber tecleado bien su contraseña.");
    return false;
  }
  if(pwd1.length < 6) {
    alert("Error: La contraseña debe tener al menos 6 caracteres.");
    return false;
  }
  if(pwd1 == email) {
    alert("Error: Contraseña debe ser diferente de correo.");
    return false;
  }
  if(pwd1 == pwd2 && email.includes(foo)) {
    return true;
  }
}
function cambioDepartamento(){
  var iddepartamento = document.getElementById("iddpto").value;
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "cambio_dpto",iddpto:iddepartamento},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#selectmunicipio").html(htmldata);
    }
  });
}
function buscarCoach(texto){
  $('#resultado').show();
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "buscar_coach",buscar:texto},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#resultado").html(htmldata);
    }
  });
}
function seleccionarcoach(idcoach,idpersona){
  $('#resultado').hide();
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "seleccion_coach",idcoach:idcoach,idpersona:idpersona},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#coach").val(htmldata);
    }
  });
}
function Logout(){
  post('index.php',{out:0});
}
