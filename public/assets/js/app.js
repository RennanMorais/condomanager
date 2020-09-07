//Link pricipal
base = $('body').attr('base');

//Pega os dados do grafico de visitantes
function GraphDataVisitantes()
{
    var
    datas = [],
    datasBD = [],
    countVisitantes = [], 
    index = 7;

    while (index >= 1) 
    {
        dt = new Date();

        if(index > 1) {
            dt.setDate(dt.getDate() - (index - 1));
        }

        var day = dt.getDate() < 10 ? '0' + dt.getDate() : '' + dt.getDate();
        var month = dt.getMonth() < 10 ? '0' + (dt.getMonth() + 1) : '' + dt.getMonth();

        fotmatDate = day+"/"+month+"/"+dt.getFullYear();

        datas.push(fotmatDate);

        formatDateBD = dt.getFullYear()+"-"+month+"-"+day;

        datasBD.push(formatDateBD);
        
        index = index - 1;

    }
    

    var indexDate = 0;

    while(indexDate <= 6) {

        $.ajax(
        {
            url: base+"/app/request/countvisitantes",
            method: "POST",
            data:{date: datasBD[indexDate]},
            success: function (data)
            {
            
                countVisitantes.push(data);
                graficoVisitantes(datas, countVisitantes);
            
            }

        });

        indexDate = indexDate + 1;
        graficoVisitantes(datas, countVisitantes);

    }
}

//Pega os dados do grafico de ocorrencias
function GraphDataOcorrencias()
{
    var
    datas = [],
    datasBD = [],
    countOcorrencias = [], 
    index = 7;

    while (index >= 1) 
    {
        dt = new Date();

        if(index > 1) {
            dt.setDate(dt.getDate() - (index - 1));
        }

        var day = dt.getDate() < 10 ? '0' + dt.getDate() : '' + dt.getDate();
        var month = dt.getMonth() < 10 ? '0' + (dt.getMonth() + 1) : '' + dt.getMonth();

        fotmatDate = day+"/"+month+"/"+dt.getFullYear();

        datas.push(fotmatDate);

        formatDateBD = dt.getFullYear()+"-"+month+"-"+day;

        datasBD.push(formatDateBD);
        
        index = index - 1;

    }
    

    var indexDate = 0;

    while(indexDate <= 6) {

        $.ajax(
        {
            url: base+"/app/request/countocorrencias",
            method: "POST",
            data:{date: datasBD[indexDate]},
            success: function (data)
            {
            
                countOcorrencias.push(data);
                graficoOcorrencias(datas, countOcorrencias);
            }

        });

        indexDate = indexDate + 1;
        graficoOcorrencias(datas, countOcorrencias);

    }
}

function graficoVisitantes(datas, countVisitantes)
{
    
    var ctx = document.getElementById('visitor-chart').getContext('2d');
    var visitorChart = new Chart(ctx, {

        type: 'bar',
        data: {
            labels: datas,
            datasets: [{
                label: 'Visitantes',
                data: countVisitantes,
                backgroundColor: [
                    '#b2f4ff',
                    '#b2f4ff',
                    '#b2f4ff',
                    '#b2f4ff',
                    '#b2f4ff',
                    '#b2f4ff',
                    '#b2f4ff'
                ],
                borderColor: [
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

}

function graficoOcorrencias(datas, countOcorrencias) {
    var ctx = document.getElementById('occurrence-chart').getContext('2d');
    var occurrenceChart = new Chart(ctx, {

        type: 'bar',
        data: {
            labels: datas,
            datasets: [{
                label: 'Ocorrências',
                data: countOcorrencias,
                backgroundColor: [
                    '#ff8989',
                    '#ff8989',
                    '#ff8989',
                    '#ff8989',
                    '#ff8989',
                    '#ff8989',
                    '#ff8989'
                ],
                borderColor: [
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
  });
}

//Carrega predios por condominio
function carrega_predios()
{
    var valCond = $('#combo-condominio').val();

    $.ajax({
        url: base+"/app/request/getpredios",
        method: "POST",
        data: {id_cond: valCond},
        dataType: "json",
        success: function (data)
        {
            
            //console(data);
            var html = '';
            for (var count = 0; count < data.length; count++){
                html += '<option value="' + data[count].id + '">' + data[count].nome + '</option>';
            }
            
            $('#combo-morador').html('<option value="">Selecionar...</option>');
            $('#combo-predio').append(html);

        }
    });
}

function carrega_prediosOnChange() {
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: base+"/app/request/getpredios",
            method: "POST",
            data: {id_cond: valCond},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].nome + '</option>';
                }
                
                $('#combo-morador').html('<option value="">Selecionar...</option>');
                $('#combo-predio').html(html);

            }
        });
    });
}

//Função que carrega moradores ao selecionar o condominio e o predio
function carrega_moradoresPorPredioCondominio() 
{
    //Carrega predios ao selecionar o condominio
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: base+"/app/request/getpredios",
            method: "POST",
            data: {id_cond: valCond},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].nome + '</option>';
                }
                
                $('#combo-predio').html('<option value="">Selecionar...</option>');
                $('#combo-predio').append(html);

            }
        });

    });

    //Carrega moradores ao selecionar o prédio
    $('#combo-predio').on('change', function()
    {
        var val_predio = $('#combo-predio').val();
        
        $.ajax({
            url: base+"/app/request/getmoradorbypredio",
            method: "POST",
            data: {id_predio: val_predio},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
                }
                
                $('#combo-morador').html('<option value="">Selecionar...</option>');
                $('#combo-morador').append(html);

            }
        });
    });
}

//Carrega morador por condominio e preenche o campo de telefone
function carrega_moradorOnChange() 
{
    $('#combo-condominio').on('change', function()
    {
        var condominio = $('#combo-condominio').val();

        $.ajax({
            url: base+"/app/request/getmorador",
            method: "POST",
            data: {id_cond: condominio},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
                }
                
                $('#combo-morador').html('<option value="">Selecionar...</option>');
                $('#combo-morador').append(html);

            }
        });

    });
}

function carrega_phone() 
{
    $('#combo-morador').on('change', function()
    {
        var morador = $('#combo-morador').val();

        $.ajax({
            url: base+"/app/request/getphone",
            method: "POST",
            data: {id_morador: morador},
            dataType: "json",
            success: function (data)
            {
                
                //alert(data);
                $('#phone-field').val(data.phone);

            }
        });

    });
}

//Carrega Areas
function carrega_areasOnChange() 
{
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: base+"/app/request/getmorador",
            method: "POST",
            data: {id_cond: valCond},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
                }
                
                $('#combo-morador').html('<option value="">Selecionar...</option>');
                $('#combo-morador').append(html);

            }
        });
        
        $.ajax({
            url: base+"/app/request/getarea",
            method: "POST",
            data: {id_cond: valCond},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].nome + '</option>';
                }
                
                $('#combo-area').html('<option value="">Selecionar...</option>');
                $('#combo-area').append(html);

            }
        });
    });
}

function carrega_morador() 
{
    var valCond = $('#combo-condominio').val();
    $.ajax({
        url: base+"/app/request/getmorador",
        method: "POST",
        data: {id_cond: valCond},
        dataType: "json",
        success: function (data)
        {
            
            //console(data);
            var html = '';
            for (var count = 0; count < data.length; count++){
                html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
            }
            
            $('#combo-morador').append(html);

        }
    });
}

//Alterar formatação do campo Numero do documento se RG ou CPF
function alterarFormataçãoDoc()
{
    
    $('#tipo-doc').on('change', function(){

        var tipo = $('#tipo-doc').val();

        if(tipo == "RG") {
            $('#documento').removeAttr('disabled');
            $('#documento').mask('00.000.000-0');
        } else if(tipo == "CPF") {
            $('#documento').removeAttr('disabled');
            $('#documento').mask('000.000.000-00');
        } else {
            $('#documento').attr('disabled', 'disabled');
        }
        
        

    });

}

//Modal condominio Add
$('#add').on('click', function () {
    $('#condominio-modal').show('fade');
});

$('#modal-close').on('click', function() {
    $('#condominio-modal').hide('fade');
});

//Formatação dos campos numericos
$('#cnpj-field').mask('00.000.000/0000-00');
$('#rg-field').mask('00.000.000-0');
$('#cpf-field').mask('000.000.000-00');
$('#phone-field').mask('(00) 00000-0000');
$('#field-valor').mask('000.000.000,00', {reverse: true});

//Selectpicker
$('select').select2();