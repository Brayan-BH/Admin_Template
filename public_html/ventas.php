<?php include('Templates/header.php') ?>

<script type="text/javascript">

    var tableVentas = null;

</script>
<!-- Incio del contenido principal -->
<div id="modVentas">
  
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <h1 class="title mx-3">VENTAS</h1>
        <div class="my-3">
            <!-- <button class="btn btn-success" onclick="guardarProduct()">Agregar</button>
            <button class="btn btn-warning">Actualizar</button>
            <button class="btn btn-danger">Eliminar</button> -->
            <button type="button" class="btn btn-default mx-3"onclick="loadNuevaVenta()" style="background-color: #00afb9 ;">
              Nueva Venta
              <i class="fa fa-plus-circle"></i>
            </button>
        </div>
      <div class="container-fluid">
        <!-- /.row -->
        <div class="col-12">
            <table id="listVentas" class="display">
                <thead>
                    <tr>
                        <th>N° Venta</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                        <th>Fecha de Operacion</th>
                        <th>Metodo de Pago</th>
                        <th>Nombre de Cliente</th>
                        <th>Documento de Identidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Fin del contenido principal -->

<?php include('Templates/footer.php') ?>

<script type="text/javascript">
  
$(document).ready(function(){

tableVentas =  $('#listVentas').DataTable( {
        "ajax":{
            type: 'get',
            url: "http://web.miapp.com/api/v1/ventas",
            dataSrc: 'data',
            cache: true
            },
        columns: [
            { data: 'codigo_venta' },
            { data: 'nombre_producto' },
            { data: 'descripcion' },
            { data: 'cantidad' },
            { data: 'precio_unitario' },
            { data: 'precio_total' },
            { data: 'fecha_operacion' },
            { data: 'metodo_pago' },
            { data: 'nombre_cliente' },
            { data: 'documento_identidad' },
            {
              render: function (data, type, row) {

                return "<button class=\"btn btn-warning\" onclick=\"loadEditarVentas('"+row.id+"')\"><i class='fa fa-edit'></i></button> <button class=\"btn btn-danger\" onclick=\"confirmarEliminarVenta('"+row.id+"')\"><i class='fa fa-trash'></i></button>";
                   
                },
            }
        ],

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });
});

function loadNuevaVenta(){
  $('#modVentas').load("NuevaVenta.html",function(){
      // console.log("cargado");
      $('#modalVentas').modal({
        show: true
      });
    });
  }

  function confirmarEliminarVenta (id)
  { 
    $('#modVentas').load("EliminarVenta.html?v=1",function(){//parmetros?v=1.0
      // console.log(id);
      $('#txtidDeleteVenta').val(id);
      $('#EliminarVenta').modal({
        show: true
      });
    });
  }

function reloadTableVentas ()
{
  tableVentas.ajax.reload();
}

function loadEditarVentas (id)
{  
  $("#modVentas").load("EditarVenta.html",function(){


$.ajax(
  {
    method:"get",
    url:"http://web.miapp.com/api/v1/ventas/"+id
  }
)
.done(function(response){
  
  $('#txtIdVenta').val(response.data.id);
  $('#txtNumVenta').val(response.data.codigo_venta);
  $('#txtProductos').val(response.data.nombre_producto);
  $('#txtDescripcion').val(response.data.descripcion);
  $('#txtCantidad').val(response.data.cantidad);
  $('#txtUniPrecio').val(response.data.precio_unitario);
  $('#txtTotPrecio').val(response.data.precio_total);
  $('#txtFechaOperacion').val(response.data.fecha_operacion);
  $('#txtMetodoPago').val(response.data.metodo_pago);
  $('#txtNombreCliente').val(response.data.nombre_cliente);
  $('#txtDocIdentidad').val(response.data.documento_identidad);

  $('#modalVentasEditar').modal({
    show: true
  }); 
});
});
    
}

</script>