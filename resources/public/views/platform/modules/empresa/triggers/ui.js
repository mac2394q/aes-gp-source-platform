$(document).on('click', '#editarEmpresa', function (e) {
    $('#editarEmpresa').hide();
    $('#razonSocial').removeAttr("readonly");
    $('#nit').removeAttr("readonly");
    $('#ciudad').removeAttr("readonly");
    $('#departamento').removeAttr("readonly");
    $('#direccion').removeAttr("readonly");

    $('#telefono').removeAttr("readonly");
    $('#emailEmpresarial').removeAttr("readonly");
    $('#representanteLegal').removeAttr("readonly");
    $('#cargoRepresentante').removeAttr("readonly");
    $('#telefonoRepresentante').removeAttr("readonly");
    $('#emailContacto').removeAttr("readonly");
    $('#representanteLegal2').removeAttr("readonly");
    $('#cargoRepresentante2').removeAttr("readonly");
    $('#telefonoRepresentante2').removeAttr("readonly");
    $('#emailContacto2').removeAttr("readonly");
    $('#link').removeAttr("readonly");
    $('#usuario').removeAttr("readonly");

    $('#actualizarCambiosUi').show();
});

$(document).on('click', '#actualizarCambiosUi', function (e) {

    $('#editarEmpresa').show();
    $('#razonSocial').prop('readonly', true);
    $('#nit').prop('readonly', true);
    $('#ciudad').prop('readonly', true);
    $('#departamento').prop('readonly', true);
    $('#direccion').prop('readonly', true);
    
    $('#telefono').prop('readonly', true);
    $('#emailEmpresarial').prop('readonly', true);
    $('#representanteLegal').prop('readonly', true);
    $('#cargoRepresentante').prop('readonly', true);
    $('#telefonoRepresentante').prop('readonly', true);
    $('#emailContacto').prop('readonly', true);
    $('#representanteLegal2').prop('readonly', true);
    $('#cargoRepresentante2').prop('readonly', true);
    $('#telefonoRepresentante2').prop('readonly', true);
    $('#emailContacto2').prop('readonly', true);
    $('#link').prop('readonly', true);
    $('#usuario').prop('readonly', true);

    $('#actualizarCambiosUi').hide();
    modificarEmpresa();
    
});