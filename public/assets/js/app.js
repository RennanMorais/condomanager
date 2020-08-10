//Modal condominio Add
$('#add').on('click', function () {
    $('#condominio-modal').show('fade');
});

$('#modal-close').on('click', function() {
    $('#condominio-modal').hide('fade');
});

$('#cnpj-field').mask('00.000.000/0000-00');
$('#rg-field').mask('00.000.000-0');
$('#cpf-field').mask('000.000.000-00');
$('#phone-field').mask('(00) 00000-0000');
$('#field-valor').mask('000.000.000.000.000,00', {reverse: true});

//Selectpicker
$('select').select2();