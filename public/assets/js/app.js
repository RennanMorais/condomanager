function popGraphsOcorrencias()
{
  var
  quantidade = 1,
  datas = [],
  countDatas = [],
  index = 7;

  while (index >= quantidade) 
  {
    dt = new Date();

    if(index > 1) {
        dt.setDate(dt.getDate() - (index - 1));
    }

    var day = dt.getDate() < 10 ? '0' + dt.getDate() : '' + dt.getDate();
    var month = dt.getMonth() < 10 ? '0' + (dt.getMonth() + 1) : '' + dt.getMonth();

    fotmatDate = day+"/"+month+"/"+dt.getFullYear();

    datas.push(fotmatDate);

    var day_bd = dt.getDate() < 10 ? '0' + dt.getDate() : '' + dt.getDate();
    var month_bd = dt.getMonth() < 10 ? '0' + (dt.getMonth() + 1) : '' + dt.getMonth();

    fotmatDateBD = dt.getFullYear()+"-"+month_bd+"-"+day_bd;

    $.ajax(
    {
      url: "http://localhost/condosoftware/public/app/request/countocorrencias",
      method: "POST",
      data:{date: fotmatDateBD},
      success: function (data)
      {
        
        for(i = 0; i < data.length; i++)
        {
          countDatas.push(data[i]);
        }  
        
      }

    });

    graficosDash();

    $(document).ready(function()
    {

         graficosDash(datas, countDatas);

    });
    
    index = index - 1;

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

