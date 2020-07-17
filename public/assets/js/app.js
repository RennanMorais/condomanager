//Chart Visitantes

$(document).ready(function(){

    var ctx = document.getElementById('visitor-chart').getContext('2d');
    var myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Visitantes',
                data: [12, 19, 3, 5, 2, 3, 5, 6, 12, 25, 23, 21],
                backgroundColor: [
                    '#C7E8ED'
                ],
                borderColor: [
                    '#148A9D'
                ],
                borderWidth: 3
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
    var myChart = new Chart(ctx, {

        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Ocorrências',
                data: [11, 7, 2, 5, 9, 4, 2, 3, 12, 1, 4, 5],
                backgroundColor: [
                    '#e5a0a6'
                ],
                borderColor: [
                    '#DC3545'
                ],
                borderWidth: 3
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

});




//Modal condominio Add e edição
$('#add-cond').on('click', function () {

    $.ajax({url: "http://localhost/condosoftware/src/views/pages/forms/add-cond.php", success: function(result){
      $("#modal-content").html(result);
    }});

    $('#condominio-modal').show('fade');

});

$('#modal-close').on('click', function() {
    $('#condominio-modal').hide('fade');
});