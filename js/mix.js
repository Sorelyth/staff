function post(path, parameters,target="_self") {
        var form = $('<form></form>');

        form.attr("method", "post");
        form.attr("action", path);
        form.attr("target",target);

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
function mostrarinforme(idpersona,idinforme){
  post('mostrar_informe.php',{idpersona:idpersona,idinforme:idinforme},"_blank");
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
function seleccionarcoach(idcoach){
  $('#resultado').hide();
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "seleccion_coach",idcoach:idcoach},
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

function tiempoconcentrado(respuesta){
  //alert(respuesta);
  var div_pregunta = document.getElementById("div_pregunta5");
  if(respuesta==1){
    div_pregunta.innerHTML='<div class="form-group row">'+
      '<label for="pregunta5" class="col-sm-3 col-form-label"><p style="font-weight:bold;">'+
      '¿Qué te enseñó Dios? ¿Cómo te ayudaron y ayudaste a '+
      'tus líderes en el proceso del DDSM durante este mes?</p></label>'+
      '<textarea class="col-sm-8 form-control" name="pregunta5" id="pregunta5" required></textarea>'+
      '</div>'+
      '<p>Presentar estadísticas diagnosticas manual del alumno DDSM, personales y del equipo a cargo.</p>';
  }
  if(respuesta==2){
    div_pregunta.innerHTML='<div class="form-group row">'+
      '<label for="pregunta5" class="col-sm-3 col-form-label"><p style="font-weight:bold;">'+
      '¿Qué te enseñó Dios? ¿Qué acciones tomaste con tu equipo '+
      'relacionadas con la consecución de nuevos socios personales y de ciudad? ¿Cuantas citas de desafío a nuevos '+
      'socios tuviste este mes? ¿Qué acciones tuviste con tus actuales socios que comunicaron, '+
      'gratitud, visión y amor hacia ellos? ¿Qué acciones tomaste con tu equipo que comunicaron, '+
      'gratitud, visión y amor hacia ellos?</p></label>'+
      '<textarea class="col-sm-8 form-control" name="pregunta5" id="pregunta5" required></textarea>'+
    '</div>';
  }
}
function modalnuevodiscipulo(){
  var modal = document.getElementById("discipulo_modal");
  modal.style.display="block";
}
function cerrarmodaldiscipulo(){
  var modal = document.getElementById("discipulo_modal");
  modal.style.display="none";
}
function nuevodiscipulo(){
  var nombre = document.getElementById("discipulo_name").value;
  var apellidos = document.getElementById("discipulo_lastname").value;
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "nuevo_discipulo",nombre:nombre,apellidos:apellidos},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function() {
        alert("Se ha guardado tu discípulo con éxito");
        var modal = document.getElementById("discipulo_modal");
        modal.style.display="none";
       $("#losdiscipulos").load(" #losdiscipulos");

    }
  });
}
function nuevoinforme(){
  if(confirm("¿Seguro de guardar este informe?")){
    var mes = document.getElementById("idmes").value;
    var year = document.getElementById("year").value;
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "crear_informe",mes:mes,year:year},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(response) {
        alert(response);
        $("#idinforme").val(response);
      }
    });
    //var idinforme = document.getElementById("idinforme").value;
    //alert(idinforme);
    //seguircreacion(idinforme);
    return true;
  }
  else {return false;}
}

function seguircreacion(idinforme){

  if(idinforme==0){alert("Error: el informe para el mes seleccionado ya existe");}
    else{
    //alert(idinforme);
    for(i=1;i<18;i++){
      var pregunta = "pregunta"+i;
      var respuesta = document.getElementById(pregunta).value;
      $.ajax({
        type: "post",
        dataType: "html",
        data: {accion: "llenar_pregunta_informe",idinforme:idinforme,respuesta:respuesta},
        url: "ajax_requests.php",
        cache: false,
        // beforeSend: function() {
        //    $('#res3').html('loading please wait...');
        // },
        success: function(response) {
          //alert(response);
        }
      });
    }

    var numerodediscipulos = document.getElementById("cuantosdiscipulos").value;
    //alert(numerodediscipulos);
    var i;
    for (i=1;i<numerodediscipulos+1;i++){
      var div_iddiscipulo="iddiscipulo_"+i;
      //alert(div_iddiscipulo);
      var iddiscipulo = document.getElementById(div_iddiscipulo).value;
      var div_fase = "fase_"+iddiscipulo;
      var div_historia = "historia_"+iddiscipulo;
      var fase = document.getElementById(div_fase).value;
      var historia = document.getElementById(div_historia).value;
      $.ajax({
        type: "post",
        dataType: "html",
        data: {accion: "informe_discipulos",idinforme:idinforme,iddiscipulo:iddiscipulo,fase:fase,historia:historia},
        url: "ajax_requests.php",
        cache: false,
        // beforeSend: function() {
        //    $('#res3').html('loading please wait...');
        // },
        success: function(response) {
          //alert(response);
        }
      });
      if(i==numerodediscipulos){alert("Informe guardado satisfactoriamente.");return true;}
    }
  }
}
function logout(){
  post('index.php',{out:0});
}
function buscarpersona(texto){
  $('#resultado').show();
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "buscar_persona",buscar:texto},
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
function seleccionarpersona(idpersona){
  $('#resultado').hide();
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "seleccion_persona",idpersona:idpersona},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#persona").val(htmldata);
       $('#idpersona').val(idpersona);
    }
  });
}
function buscarinformesporpersona(){
  var idpersona = document.getElementById('idpersona').value;
  //alert(idpersona);
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "buscar_informes_persona",idpersona:idpersona},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
       $("#resultados_busqueda").html(htmldata);
    }
  });
}
function buscarinformespormes(){
  var idmes= document.getElementById('idmes').value;
  var year= document.getElementById('year').value;
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "buscar_informes_mes",mes:idmes,year:year},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#resultados_busqueda").html(htmldata);
    }
  });
}
function buscarinformesporpersonaymes(){
  var idpersona = document.getElementById('idpersona').value;
  var idmes= document.getElementById('idmes').value;
  var year= document.getElementById('year').value;
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "buscar_informes_persona_mes",idpersona:idpersona,mes:idmes,year:year},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#resultados_busqueda").html(htmldata);
    }
  });
}
function seleccionarsocio(idsocio,idtiposocio){
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "info_socio",idsocio:idsocio,idtiposocio:idtiposocio},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
    //alert(htmldata);
       $("#info_socio").html(htmldata);
       formulariodetransferencia();
    }
  });
}
function formulariodetransferencia(){
//   Monto (Sin comas ni puntos): *
// Banco *
// Tipo de Transacción: *
// Fecha de la Consignación o Transferencia: *
// MM
// /
// DD
// /
// YYYY
// Ciudad desde donde Consignan o Transfieren:
// Destinación de esta donación ... (Si es para un Proyecto Específico escriba cual en "Otro") *
// Donación Normal
// Other:
// Adjuntar archivo de Transferencia o Consignación *
  var div_formulario_transferencia = document.getElementById("formulario_transferencia");
  div_formulario_socio.innerHTML = '<div class="form-group row"><label class="col-sm-2" for="socio_name">Nombre completo</label>'+
  '<input type="text" name="socio_name" id="socio_name" class="col-sm-6" required></div>'+
  '<div class="form-group row"><label class="col-sm-2" for="socio_id">Documento de identificación</label>'+
  '<input type="text" name="socio_id" id="socio_id" class="col-sm-6" required></div>'+
  '<div class="form-group row"><label class="col-sm-2" for="socio_email">Correo electrónico</label>'+
  '<input type="email" name="socio_email" id="socio_email" class="col-sm-6" required></div>'+
  '<div class="form-group row"><label class="col-sm-2" for="socio_phone">Número de teléfono</label>'+
  '<input type="text" name="socio_phone" id="socio_phone" class="col-sm-6" required></div>'+
  '<div class="form-group row"><label class="col-sm-2" for="socio_address">Dirección y ciudad</label>'+
  '<input type="text" name="socio_address" id="socio_address" class="col-sm-6" required></div>'+
  '<div class="row" style="text-align:center;">'+
  '<div class="col-sm-3"></div><button type="button" class="btn btn-secondary" onclick="cerrarmodalsocio();">Cerrar</button>'+
  '<div class="col-sm-1"></div><input type="submit" class="btn btn-primary" id="guardarsocio" value="Guardar"><div>';
}
function modalnuevosocio(){
  var modal = document.getElementById("socio_modal");
  modal.style.display="block";
}
function cerrarmodalsocio(){
  var modal = document.getElementById("socio_modal");
  modal.style.display="none";
}
function seleccionartiposocio(){
  var tiposocio = document.getElementById("idtiposocio").value;
  var div_formulario_socio = document.getElementById("formulario_socio");
  if(tiposocio==1){
    div_formulario_socio.innerHTML = '<form action="" id="form_nuevo_socio" onsubmit="return nuevosocio();" method="post"><div class="form-group row"><label class="col-sm-2" for="socio_name">Nombre completo</label>'+
    '<input type="text" name="socio_name" id="socio_name" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_id">Documento de identificación</label>'+
    '<input type="text" name="socio_id" id="socio_id" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_email">Correo electrónico</label>'+
    '<input type="email" name="socio_email" id="socio_email" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_phone">Número de teléfono</label>'+
    '<input type="text" name="socio_phone" id="socio_phone" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_address">Dirección y ciudad</label>'+
    '<input type="text" name="socio_address" id="socio_address" class="col-sm-6" required></div>'+
    '<div class="row" style="text-align:center;">'+
    '<div class="col-sm-3"></div><button type="button" class="btn btn-secondary" onclick="cerrarmodalsocio();">Cerrar</button>'+
    '<div class="col-sm-1"></div><input type="submit" class="btn btn-primary" id="guardarsocio" value="Guardar"><div></form>';
  }
  if(tiposocio==2){
    div_formulario_socio.innerHTML = '<form action="" id="form_nuevo_socio" onsubmit="return nuevosocio();" method="post"><div class="form-group row"><label class="col-sm-2" for="socio_empresa">Nombre jurídico de la empresa</label>'+
    '<input type="text" name="socio_empresa" id="socio_empresa" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_id">NIT</label>'+
    '<input type="text" name="socio_id" id="socio_id" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_name">Nombre completo del contacto de la empresa</label>'+
    '<input type="text" name="socio_name" id="socio_name" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_email">Correo electrónico</label>'+
    '<input type="email" name="socio_email" id="socio_email" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_phone">Número de teléfono</label>'+
    '<input type="text" name="socio_phone" id="socio_phone" class="col-sm-6" required></div>'+
    '<div class="form-group row"><label class="col-sm-2" for="socio_address">Dirección y ciudad</label>'+
    '<input type="text" name="socio_address" id="socio_address" class="col-sm-6" required></div>'+
    '<div class="row" style="text-align:center;">'+
    '<div class="col-sm-3"></div><button type="button" class="btn btn-secondary" onclick="cerrarmodalsocio();">Cerrar</button>'+
    '<div class="col-sm-1"></div><input type="submit" class="btn btn-primary" id="guardarsocio" value="Guardar"><div></form>';
  }
  if(tiposocio==0){ div_formulario_socio.innerHTML = '';}
}
function nuevosocio(){
  var tiposocio = document.getElementById("idtiposocio").value;
  if(tiposocio==1){
    var socioname = document.getElementById("socio_name").value;
    var socioid = document.getElementById("socio_id").value;
    var socioemail = document.getElementById("socio_email").value;
    var sociophone = document.getElementById("socio_phone").value;
    var socioaddress = document.getElementById("socio_address").value;
    var retorno = false;
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "nuevo_socio_persona",tiposocio:tiposocio,socioname:socioname,socioid:socioid,socioemail:socioemail,sociophone:sociophone,socioaddress:socioaddress},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(response) {
        alert(response);
         $("#socio_modal").hide();
         //$("#losdiscipulos").load(" #losdiscipulos");
         var retorno = true;
      }
    });
    return retorno;
  }
  if(tiposocio==2){
    var socioempresa = document.getElementById("socio_empresa").value;
    var socioname = document.getElementById("socio_name").value;
    var socioid = document.getElementById("socio_id").value;
    var socioemail = document.getElementById("socio_email").value;
    var sociophone = document.getElementById("socio_phone").value;
    var socioaddress = document.getElementById("socio_address").value;
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "nuevo_socio_empresa",tiposocio:tiposocio,socioempresa:socioempresa,socioname:socioname,socioid:socioid,socioemail:socioemail,sociophone:sociophone,socioaddress:socioaddress},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(response) {
        alert(response);
         $("#socio_modal").hide();
         var retorno = true;
         //$("#losdiscipulos").load(" #losdiscipulos");
      }
    });
    return retorno;
  }
}
