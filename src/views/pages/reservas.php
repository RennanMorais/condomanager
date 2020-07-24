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
                <div class="col-sm-3">
                    
                    <form id="form-new" action="<?=$base;?>/app/reservas/add_reserva" method="POST">

                        <h6>Nova Reserva</h6>

                        <?php if(!empty($flashDateCheck)): ?>
                        <div class="flash alert alert-danger"><?= $flashDateCheck; ?></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Condomínio</div>
                                </div>
                                <select class="form-control" name="condominio" id="combo-condominio" required>
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
                                    <div class="input-group-text">Morador</div>
                                </div>
                                <select class="form-control" name="morador" id="combo-morador" required>
                                    <option value="">Selecionar...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Área</div>
                                </div>
                                <select class="form-control" name="area" id="combo-area" required>
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
                            <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Reservar</button>         
                        </div>

                    </form>

                </div>

                <div class="col-sm-9">
                    <table class="table table-bordered table-hover table-responsive-sm table-center">
                        <thead class="bg-info">
                            <tr>
                                <th>Condominio</th>
                                <th>Morador</th>
                                <th>Área</th>
                                <th>Evento</th>
                                <th>Data</th>
                                <th>Início</th>
                                <th>Término</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservas as $reservaItem): ?>
                            <tr>
                                <td><?=$reservaItem->condominio;?></td>
                                <td><?=$reservaItem->morador;?></td>
                                <td><?=$reservaItem->area_comum;?></td>
                                <td><?=$reservaItem->evento;?></td>
                                <td><?=date('d/m/Y', strtotime($reservaItem->data));?></td>
                                <td><?=date('H:i', strtotime($reservaItem->inicio));?></td>
                                <td><?=date('H:i', strtotime($reservaItem->termino));?></td>
                                <td><?=$reservaItem->status;?></td>
                                <td style="text-align:center;">
                                    <?php if($reservaItem->status != 'Rejeitado'):?>
                                    <a href="<?=$base;?>/app/reservas/aprovar?id=<?=$reservaItem->id;?>" class="btn btn-outline-success btn-sm" title="Aprovar"><i class="fa fa-check-square"></i></a>
                                    <a href="<?=$base;?>/app/reservas/rejeitar?id=<?=$reservaItem->id;?>" class="btn btn-outline-danger btn-sm" title="Rejeitar"><i class="fa fa-window-close"></i></a>
                                    <a href="<?=$base;?>/app/reservas/edit_reserva/<?=$reservaItem->id;?>" class="btn btn-outline-warning btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                                    <?php endif; ?>
                                    <button data-toggle="modal" data-target="#del-modal-<?=$reservaItem->id;?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
  
                            <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$reservaItem->id;?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-body" id="modal-content">
                                            <h5>Tem certeza que deseja excluir: <?=$reservaItem->evento;?>?</h5>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="<?=$base;?>/app/reservas/delete_reserva?id=<?=$reservaItem->id;?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Não</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if(empty($reservas)): ?>
                
                        <div class="container-fluid">
                            <h6 class="alert alert-secondary text-center">Nenhuma Reserva Cadastrada!</h6>
                        </div>
                    
                    <?php endif;?>                          
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<script src="<?=$base;?>/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function()
{
    carrega_areas();
    carrega_areasOnChange();
});

function carrega_areas() 
{
    var valCond = $('#combo-condominio').val();
    $.ajax({
        url: "<?=$base;?>/app/reservas/getmorador",
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
        url: "<?=$base;?>/app/reservas/getarea",
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
}

function carrega_areasOnChange() 
{
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: "<?=$base;?>/app/reservas/getmorador",
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
            url: "<?=$base;?>/app/reservas/getarea",
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