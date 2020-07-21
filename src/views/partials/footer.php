    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        CondoSoftware
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="https://condosoftware.com.br">CondoSystem</a>.</strong> All rights reserved.
    </footer>

  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?=$base;?>/assets/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=$base;?>/assets/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=$base;?>/assets/js/adminlte.min.js"></script>
  <!-- Font aewsome -->
  <script type="text/javascript" src="<?=$base;?>/assets/js/all.min.js"></script>
  <!-- Chart -->
  <script type="text/javascript" src="<?=$base;?>/assets/js/Chart.min.js"></script>
  <!-- Mask -->
  <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.mask.min.js"></script>
  <!-- Page Script -->
  <script type="text/javascript" src="<?=$base;?>/assets/js/app.js"></script>
  <script>
      $(document).ready(function(){

      var ctx = document.getElementById('visitor-chart').getContext('2d');
      var myChart = new Chart(ctx, {

          type: 'line',
          data: {
              labels: ['<?=$data;?>', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
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
  </script>

</body>
</html>