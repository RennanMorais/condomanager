<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'reserva_area', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Reservas</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-6">
                    
                    <form action="" method="POST">

                        <h6>Nova Reserva</h6>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Condomínio</div>
                                </div>
                                <select class="form-control" name="condominio" id="combo-condominio">
                                    <option value="">Selecionar...</option>
                                    <?php foreach($condominios as $condominiosItem):?>
                                    <option value="<?=$condominiosItem->id;?>"><?=$condominiosItem->nome;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Área</div>
                                </div>
                                <select class="form-control" name="area" id="combo-area">
                                    <option value="">Selecionar...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Nome do Evento</div>
                                </div>
                                <input type="text" class="form-control" name='evento' required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Data</div>
                                </div>
                                <input type="date" class="form-control" name='data' required/>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Início</div>
                                        </div>
                                        <input type="time" class="form-control" name='inicio' required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Término</div>
                                        </div>
                                        <input type="time" class="form-control" name='fim' required/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class='form-group'>
                            <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Reservar</button>         
                        </div>

                    </form>

                </div>

                <div class="col-sm-6">

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<script src="<?=$base;?>/assets/js/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function()
    {
        carrega_areasOnChange();
    });

    function carrega_areasOnChange() {
        $('#combo-condominio').on('change', function()
        {
            var valCond = $('#combo-condominio').val();

            $.ajax({
                url: "<?=$base;?>/app/moradores",
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

</script>
<?php $render('footer'); ?>