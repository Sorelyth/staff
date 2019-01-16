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
       $("#agregardiscipuloModal").hide();
       $("#losdiscipulos").load(" #losdiscipulos");

    }
  });
}
function nuevoinforme(){
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
      $("#idinforme").val(response);
    }
  });
  if(confirm("¿Seguro de guardar este informe?")){seguircreacion();}
}
function seguircreacion(){
  var idinforme = document.getElementById("idinforme").value;
  if(idinforme==0){alert("Error: el informe para el mes seleccionado ya existe");}
    else{
    //alert(idinforme);
    var respuesta1 = document.getElementById("pregunta1").value;
    var respuesta2 = document.getElementById("pregunta2").value;
    var respuesta3 = document.getElementById("pregunta3").value;
    var respuesta4 = document.getElementById("pregunta4").value;
    var respuesta5 = document.getElementById("pregunta5").value;
    var respuesta6 = document.getElementById("pregunta6").value;
    var respuesta7 = document.getElementById("pregunta7").value;
    var respuesta8 = document.getElementById("pregunta8").value;
    var respuesta9 = document.getElementById("pregunta9").value;
    var respuesta10 = document.getElementById("pregunta10").value;
    var respuesta11 = document.getElementById("pregunta11").value;
    var respuesta12 = document.getElementById("pregunta12").value;
    var respuesta13 = document.getElementById("pregunta13").value;
    var respuesta14 = document.getElementById("pregunta14").value;
    var respuesta15 = document.getElementById("pregunta15").value;
    var respuesta16 = document.getElementById("pregunta16").value;
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "llenar_informe",idinforme:idinforme,respuesta1:respuesta1,respuesta2:respuesta2,respuesta3:respuesta3,respuesta4:respuesta4},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(response) {
        //alert(response);
      }
    });
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "llenar_informe",idinforme:idinforme,respuesta1:respuesta5,respuesta2:respuesta6,respuesta3:respuesta7,respuesta4:respuesta8},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function() {
        //alert(response);
        //alert(idinforme);
      }
    });
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "llenar_informe",idinforme:idinforme,respuesta1:respuesta9,respuesta2:respuesta10,respuesta3:respuesta11,respuesta4:respuesta12},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function() {
        //alert(response);
        //alert(idinforme);
      }
    });
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "llenar_informe",idinforme:idinforme,respuesta1:respuesta13,respuesta2:respuesta14,respuesta3:respuesta15,respuesta4:respuesta16},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function() {
        //alert(response);
        //alert(idinforme);
      }
    });
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
        data: {accion: "informe_discipulos",iddiscipulo:iddiscipulo,idinforme:idinforme,fase:fase,historia:historia},
        url: "ajax_requests.php",
        cache: false,
        // beforeSend: function() {
        //    $('#res3').html('loading please wait...');
        // },
        success: function(response) {
          //alert(response);
        }
      });
      if(i==numerodediscipulos){ alert("Informe guardado satisfactoriamente.");window.location.href="informe.php"}
    }
  }
}

function logout(){
  post('index.php',{out:0});
}
