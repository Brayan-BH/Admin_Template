<?php include('Templates/header.php') ?>

<!-- Incio del contenido principal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h1>Ventas</h1>
        <!-- <div class="mb-3">
            <button class="btn btn-success" onclick="guardarVenta()">Agregar</button>
            <button class="btn btn-warning">Actualizar</button>
            <button class="btn btn-danger">Eliminar</button>
        </div> -->
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
                    </tr>
                </thead>
            </table>
      </div>
      <!-- <div class="col-4">
            <input type="text" name="txtCodVenta" id="txtCodVenta">
            <label for="txtCodVenta">Codigo Venta</label>
            <input type="text" name="txtProducto" id="txtProducto">
            <label for="txtProducto">Nombre Producto</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion">
            <label for="txtDescripcion">Descripcion</label>
            <input type="text" name="txtCantidad" id="txtCantidad">
            <label for="txtCantidad">Cantidad</label>
            <input type="text" name="txtPrecioUnitario" id="txtPrecioUnitario">
            <label for="txtPrecioUnitario">Precio Unitario</label>
            <input type="text" name="txtPrecioTotal" id="txtPrecioTotal">
            <label for="txtPrecioTotal">Precio Total</label>
            <input type="text" name="txtFechaOperacion" id="txtFechaOperacion">
            <label for="txtFechaOperacion">Fecha Operacion</label>
            <input type="text" name="txtMetodoPago" id="txtMetodoPago">
            <label for="txtMetodoPago">Metodo de Pago</label>
            <input type="text" name="txtNombreCliente" id="txtNombreCliente">
            <label for="txtNombreCliente">Nombre Cliente</label>
            <input type="text" name="txtDocumentoIdentidad" id="txtDocumentoIdentidad">
            <label for="txtDocumentoIdentidad">Documento Identidad</label>
        </div> -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Fin del contenido principal -->

<?php include('Templates/footer.php') ?>
<script type="text/javascript">
  
$(document).ready(function(){

$('#listVentas').DataTable( {
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
        ],

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });
});

function guardarVenta()
    {
        
      $.ajax({
        method: 'POST',
        data : {codigo_venta: $('#txtCodVenta').val(),nombre_producto: $('#txtProducto').val(),descripcion: $('#txtDescripcion').val(),cantidad: $('#txtCantidad').val(),precio_unitario: $('#txtPrecioUnitario').val(),precio_total: $('#txtPrecioTotal').val(),fecha_operacion: $('#txtFechaOperacion').val(),metodo_pago: $('#txtMetodoPago').val(),nombre_cliente: $('#txtNombreCliente').val(),documento_identidad: $('#txtDocumentoIdentidad').val()},
        url: 'http://web.miapp.com/api/v1/ventas',
      }).done(function (response) {
        for (i = 0; i < response.data.length; i++) 
        {
          $('#pagina').append(response.data[i].nombre + '<br>')
          // $("#pagina").append(response.data[i].nombre+"<br>");
        }
        // console.log(response)
      });
    }

</script>