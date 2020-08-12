function popGraphsOcorrencias()
{
    var
    datas = [],
    datasBD = [],
    countDatas = [],
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
            url: "http://localhost/condosoftware/public/app/request/countocorrencias",
            method: "POST",
            data:{date: datasBD[indexDate]},
            success: function (data)
            {
            
                countDatas.push(data);
                graficosDash(datas, countDatas);
            
            }

        });

        graficosDash(datas, countDatas);

        indexDate = indexDate + 1;

    }

}

function graficosDash(datas, countDatas)
{
    
    var ctx = document.getElementById('visitor-chart').getContext('2d');
    var visitorChart = new Chart(ctx, {

        type: 'bar',
        data: {
            labels: datas,
            datasets: [{
                label: 'Visitantes',
                data: countDatas,
                backgroundColor: [
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8',
                    '#17A2B8'
                ],
                borderColor: [
                    '#148A9D',
                    '#148A9D',
                    '#148A9D',
                    '#148A9D',
                    '#148A9D',
                    '#148A9D',
                    '#148A9D'   
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

    var ctx = document.getElementById('occurrence-chart').getContext('2d');
    var occurrenceChart = new Chart(ctx, {

        type: 'bar',
        data: {
            labels: datas,
            datasets: [{
                label: 'Ocorrências',
                data: countDatas,
                backgroundColor: [
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545',
                    '#DC3545'
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

function carrega_predios()
{
    var valCond = $('#combo-condominio').val();

    $.ajax({
        url: "http://localhost/condosoftware/public/app/request/getpredios",
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
            url: "http://localhost/condosoftware/public/app/request/getpredios",
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
$('#field-valor').mask('000.000.000,00', {reverse: true});

//Selectpicker
$('select').select2();

