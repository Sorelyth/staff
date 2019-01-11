function checkRegisterForm(form)
{
  re = /^\w+$/;
  if(!re.test(form.username.value)) {
    alert("Error: Nombre y Apellido solo puede contener letras!");
    form.username.focus();
    return false;
  }

  if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
    if(form.pwd1.value.length < 6) {
      alert("Error: La contrasena debe tener al menos 6 caracteres!");
      form.pwd1.focus();
      return false;
    }
    if((form.pwd1.value == form.username.value)) {
      alert("Error: Contrasena debe ser diferente de nombre de usuario!");
      form.pwd1.focus();
      return false;
    }
  } else {
    alert("Error: Por favor, verifique que ha tecleado bien la contrasena!");
    form.pwd1.focus();
    return false;
  }

//   alert("You entered a valid password: " + form.pwd1.value);
  return true;
}
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
function Logout(){
  post('index.php',{out:0});
}
function AgregarProducto(){
  // Get the modal
  var modal = document.getElementById('modalproducto');
  //var modal_content = document.getElementById('modalproducto_content');
  //var modal_content_new = document.createElement('div');
  //  modal_content.className = 'modal-content';
  modal.style.display = "block";
  // Get the <span> element that closes the modal


  // When the user clicks on <span> (x), close the modal

  selectartesanos();
  selectref();
  document.getElementById("modalproducto_content").innerHTML = '<form action="" method="post" onsubmit="return checkProductForm(this);"><span class="close">&times;</span><br><fieldset><legend>Nuevo Producto</legend>'
  +'<div class="row"><div class="one padded mobile tenth"><label for="tamano">Tamaño</label><select name="tamano" id="tamano"><option value="S">S</option><option value="M">M</option><option value="L">L</option></select></div>'
  +'<div class="one padded mobile tenth"><label for="cantidad">Cantidad</label><input type="number" name="cantidad" id="cantidad" required></div>'
  +'<div class="one padded mobile third"><label for="artesano">Artesano</label><div id="artesanos_div"></div></div>'
  +'<div class="one padded mobile third"><label for="colores">Colores</label><input type="text" name="colores id="colores" required></div></div>'
  +'<div class="row"><div class="one padded mobile half"><label for="ref">Referencia</label><div id="ref_div"></div></div>'
  +'<div class="one padded mobile half"><label for="sku">SKU</label><input type="text" name="sku" id="sku" required></div></div>'
  +'<div class="row"><label for="descripcion">Descripcion</label><input type="text" name="descripcion" id="descripcion" required></div><br>'
  +'<button class="turquoise gap-right gap-bottom"name="nuevoproducto" type="submit">Guardar</button></fieldset>';
  //modal_content.appendChild(modal_content_new);
  // Get the button that opens the modal);
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
  }
}
function checkProductForm(form){
  if(form.artesano.value=="") {
    alert("Error: Debe elegir un  artesano. Si no existe, registrelo.");
    return false;
  }
  else if (form.colores.value=="") {
    alert("Error: Faltan los colores");
    return false;
  }
  else if (form.ref.value=="") {
    alert("Error: Falta la referencia. Si no existe, registrela.");
    return false;
  }
  else {
    return true;
  }
}

function selectartesanos() {
  //alert("se ejecuto esa vaina");
                $.ajax({
                  type: "post",
                  dataType: "html",
                  data: {accion: "artesanos"},
                  url: "ajax_requests.php",
                  cache: false,
                  // beforeSend: function() {
                  //    $('#res3').html('loading please wait...');
                  // },
                  success: function(htmldata) {
                    //alert(htmldata);
                     $("#artesanos_div").html(htmldata);
                  }
                });
              }
function selectref() {
  //alert("se ejecuto esa vaina");
                $.ajax({
                  type: "post",
                  dataType: "html",
                  data: {accion: "ref"},
                  url: "ajax_requests.php",
                  cache: false,
                  // beforeSend: function() {
                  //    $('#res3').html('loading please wait...');
                  // },
                  success: function(htmldata) {
                    //alert(htmldata);
                     $("#ref_div").html(htmldata);
                  }
                });
              }

    function ModificarIngreso(idingreso){
    var table = document.getElementById("ingresos");
    var row = table.rows.namedItem(""+idingreso+"");
    row.deleteCell(0);
    row.deleteCell(0);
    row.deleteCell(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = '<input type="text" name="conceptoingreso" id="conceptoingreso"></input>';
    cell2.innerHTML = '<input type="number" name="valoringreso" id="valoringreso"></input>';
    cell3.innerHTML = '<button class="btn btn-info" onclick="guardarIngreso()" name="guardaringreso" data-toggle="tooltip" title="Guardar"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';
    }

	function NuevoGastoVariable(){
    if(document.getElementById("efectivo").checked) {
    efectiv = 1;
    } else { efectiv = 0;}
    concepto = document.getElementById("conceptogastovariable").value;
    valor = document.getElementById("valorgastovariable").value;
    dia = document.getElementById("fecha").value;
	sure = confirm("Está seguro de registrar este gasto en el presupuesto?");
	if(sure){
		post("agregargasto.php",{guardargastovariable: 0,conceptogastovariable: concepto,valorgastovariable: valor,fecha:dia,efectivo:efectiv});
		}
	}
	function BuscarPersona(){
		correo = document.getElementById("inputEmail").value;
		post('agregarpersona.php',{buscar:correo});
	}
	function AgregarPersona(idcolabo){
		post('agregarpersona.php',{agregar:idcolabo});
	}
	function EliminarAhorro(idgastofijo){
	sure = confirm("Está seguro de eliminar este ahorro del presupuesto?");
	if(sure){
   		 post('verahorros.php',{borrarahorro:idgastofijo});
    }
    }
