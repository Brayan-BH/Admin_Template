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
        <div class="col-12 table-responsive">
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
                        <th class="no-export">Acciones</th>
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
        responsive: false,
        fixedColumns: true,
        fixedHeader: true,
        scrollCollapse: true,
        autoWidth: true,
        scrollCollapse: true,
        info: true,
        // lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        // dom: 'lfBrtip',
        dom: "B<'col-md-2'l>ftipr",
        buttons: [
          {
            extend: 'pdfHtml5',
            title: 'Reporte de Ventas',
            className: 'btn bg-red mb-3',
            text: "<i class='fas fa-file-pdf fa-2x bg-red'></i>",
            exportOptions: 
            {
              // columns: [0, 1, 2, 3, 4, 5] //exportar solo la primera y segunda columna
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
            customize:function(doc) 
            {
              doc.styles.title = {
                  color: '#4c8aa0',
                  fontSize: '20',
                  alignment: 'center'
              },
              doc.styles['td:nth-child(2)'] = { 
                  width: '100px',
                  orientation: 'landscape',
                  extend: 'pdfFlash',
                  'max-width': '100px'
              },
              doc.styles.tableHeader = {
                  fillColor:'#4c8aa0',
                  color:'white',
                  alignment:'center'
              },
              doc.content[1].margin = [  0, 0, 720.00, 1224.00 ]
            }
          },
          {
            extend: 'excelHtml5',
            title: 'Reporte de Ventas',
            className: 'btn bg-green mb-3',
            text: "<i class='fas fa-file-excel fa-2x bg-green'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          {
            extend: 'csvHtml5',
            title: 'Reporte de Ventas',
            className: 'btn bg-blue mb-3',
            text: "<i class='fas fa-file-csv fa-2x bg-blue'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          {
            extend: 'print',
            title: 'Reporte de Ventas',
            className: 'btn bg-orange mb-3',
            text: "<i class='fas fa-print fa-2x bg-orange'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          { 
            extend: 'copy',
            className: 'btn bg-purple mb-3',
            text: "<i class='fas fa-copy fa-2x bg-purple'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          }

        ],
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                          "sFirst":    "Primero",
                          "sLast":     "Último",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                        },
            "oAria":    {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
            "decimal": ",",
            "thousands": "."
          },
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