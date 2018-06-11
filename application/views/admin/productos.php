<div class="row">
    <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            PRODUCTOS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="col-lg-8">
                            
                        </div>
                        <div class="col-md-4 ">
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <select class="form-control" id="categoria" onchange="filtro_ajax();">
                                        <option value="res">RES</option>                                       <option value="cerdo">CERDO</option>
                                        <option value="abarrotes">ABARROTES</option>
                                    </select>
                                </div>
                        </div>
                        <div class="panel-body">

                            <div class="dataTable_wrapper">

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>CODIGO</th>
                                            <th>NOMBRE</th>
                                            <th>PRECIO ESTIMADO</th>
                                            <th>CATEGORIA</th>
                                            <th>AGREGAR </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach ($productos as $produc) {?>
                                         
                                        <tr>
                                            <td align="center"><?php echo $produc->idCodigo ?></td>
                                            <td align="center"><?php echo $produc->nombreProducto ?></td>
                                            <td align="center"><?php echo $produc->precioEstimado ?></td>
                                            <td align="center"><?php echo $produc->categoria ?></td>
                                            <td align="right"> <button id-cliente="<?php echo $this->session->userdata('IdCliente') ?>" id-producto="<?php echo $produc->idProducto?>" id-codigo="<?php echo $produc->idCodigo ?>" id-nombre="<?php echo $produc->nombreProducto ?>" id-categoria="<?php echo $produc->categoria ?>" id-precio="<?php echo $produc->precioEstimado ?>" class="btn btn-primary btn-circle Agregar"><i class="fa fa-pencil" title="Agregar"></i>Agrgar</button></td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                    </div>
                        <!-- /.panel-body -->
            </div>
                    <!-- /.panel -->
    </div>
                <!-- /.col-lg-12 -->
</div>

<div class="modal fade bs-example-modal-lg modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agrgar Producto</h4>
        </div>
         
         <div class="modal-body " style="background: whitesmoke" max-height="100%" min-height="300px">
                    
           <div class="row">
                <form action="<?php echo site_url('Eltorreon/agregarProducto');?>" enctype="multipart/form-data" method="post">
                 
                 <div class="col-lg-12">
                    <input type="hidden" name="idProducto" id="idProducto">
                    <input type="hidden" name="Categoria" id="Categoria">
                    <input type="text" name="idCliente" id="idCliente">
                    <div class="col-lg-2">
                            <div class="form-group">
                            <label>Cantidad</label>
                            <input type="text" class="form-control" name="Cantidad" id="Cantidad" placeholder="Canidad" required="">
                        </div>
                    </div>
                    <div class="col-lg-2">
                            <div class="form-group">
                            <label>#Codigo</label>
                            <input type="text" class="form-control" name="Codigo" id="Codigo" placeholder="" readonly="readonly">
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Nombre del Producto</label>
                        <input type="text" class="form-control" name="Nombre" id="Nombre" readonly="readonly">
                      </div>     
                    </div>
                   
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label>Precio</label>
                        <input type="text" class="form-control currency" name="Precio" id="currencyField" readonly="readonly" >
                      </div>    
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>U/Medida</label>
                            <input type="text" class="form-control" name="U_Medida" id="id-U-Medida" value="Kg" readonly="readonly" placeholder="Kg">
                        </div>    
                    </div> 

                 </div>
                <div class="col-lg-12"> 
                    <div class="form-group">                
                            <label>Agregar Observación</label>
                            <textarea class="form-control" name="Descripcion" id="id-descripcion" rows="5" placeholder="Agergar Observación" required></textarea>
                    </div>
                </div>

                 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('.Agregar').click(function(){
        var idCliente =$(this).attr('id-cliente');
        var idProducto =$(this).attr('id-producto');
        var Cantidad =$(this).attr('id-cantidad');
        var Codigo =$(this).attr('id-codigo');
        var Nombre =$(this).attr('id-nombre');
        var Precio =$(this).attr('id-precio');
        var U_Medida =$(this).attr('id-U-Medida');
        var Categoria =$(this).attr('id-categoria');
        var Descripcion =$(this).attr('id-descripcion');
       

        
        $('#idCliente').val(idCliente);
        $('#idProducto').val(idProducto);
        $('#Cantidad').val(Cantidad);
        $('#Codigo').val(Codigo);
        $('#Nombre').val(Nombre);
        $('#currencyField').val(Precio);
        $('#Categoria').val(Categoria);
        $('#id-U-Medida').val(U_Medida);
        $('#Categoria').val(Categoria);
        $('#Descripcion').val(Descripcion);

        $('.modal').modal('show');
        
    });

</script>