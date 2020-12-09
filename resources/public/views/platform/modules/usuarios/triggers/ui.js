$(document).on('click', '#editarEmpresa', function (e) {
   
    $('#editarEmpresa').hide();
    $('#actualizarCambio').show();
    $('#nombre').removeAttr("readonly");
    $('#rol').removeAttr("readonly");
    $('#documento').removeAttr("readonly");
    $('#correo').removeAttr("readonly");
    $('#telefono').removeAttr("readonly");
    $('#direccion').removeAttr("readonly");
    $('#ciudad').removeAttr("readonly");
  
});
$(document).on('click', '#actualizarCambio', function (e) {
    $('#editarEmpresa').show();
    $('#nombre').prop('readonly', true);
    $('#rol').prop('readonly', true);
    $('#documento').prop('readonly', true);
    $('#correo').prop('readonly', true);
    $('#telefono').prop('readonly', true);
    $('#direccion').prop('readonly', true);
    $('#ciudad').prop('readonly', true);
    modificarUsuario();
    $('#actualizarCambio').hide();
});
