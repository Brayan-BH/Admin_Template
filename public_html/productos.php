<?php include('Templates/header.php') ?>

<script type="text/javascript">

    var tableProductos = null;

</script>

<!-- Incio del contenido principal -->
<div id="modalContainer">
  
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Main content -->
  <section class="content">
        <h1 class="title mx-3">PRODUCTOS</h1>
        <div class="my-3">
            <!-- <button class="btn btn-success" onclick="guardarProduct()">Agregar</button>
            <button class="btn btn-warning">Actualizar</button>
            <button class="btn btn-danger">Eliminar</button> -->
            <button type="button" class="btn btn-default mx-3"onclick="loadNuevoProducto()" style="background-color: #00afb9 ;">
              Agregar Producto
              <i class="fa fa-plus-circle"></i>
            </button>
        </div>
      <div class="container-fluid">
        <!-- /.row -->
        <div class="col-12 table-responsive" id="toolbar">
            <table id="listProductos" class="display table-hover">
                <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Categoria</th>
                      <th>Descripcion</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th class="no-export">Acciones</th>
                        
                    </tr>
                </thead>
            </table>
      </div>
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Fin del contenido principal -->

<?php include('Templates/footer.php') ?>

<script type="text/javascript">


 $(document).ready(function(){
 

  tableProductos = $('#listProductos').DataTable( {
        "ajax":{
            type: 'get',
            url: "http://web.miapp.com/api/v1/productos",
            dataSrc: 'data',
            cache: true
            },
        columns: [
            { data: 'codigo' },
            { data: 'nombre' },
            { data: 'categoria' },
            { data: 'descripcion' },
            { data: 'precio' },
            { data: 'stock' },
            { 
                render: function (data, type, row) {
                    return "<button class=\"btn btn-warning\" onclick=\"loadEditarProducto('"+row.id+"')\"><i class='fa fa-edit'></i></button> <button class=\"btn btn-danger\" onclick=\"confirmarEliminarProducto('"+row.id+"')\"><i class='fa fa-trash'></i></button>";
                },
            },
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
            title: 'Reporte de Productos',
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
                  'max-width': '100px'
              },
              doc.styles.tableHeader = {
                  fillColor:'#4c8aa0',
                  color:'white',
                  alignment:'center'
              },
              doc.content[1].margin = [ 100, 0, 100, 0 ]
            }
          },
          {
            extend: 'excelHtml5',
            title: 'Reporte de Productos',
            className: 'btn bg-green mb-3',
            text: "<i class='fas fa-file-excel fa-2x bg-green'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          {
            extend: 'csvHtml5',
            title: 'Reporte de Productos',
            className: 'btn bg-blue mb-3',
            text: "<i class='fas fa-file-csv fa-2x bg-blue'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          {
            extend: 'print',
            title: 'Reporte de Productos',
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
  


function loadNuevoProducto(){
  $('#modalContainer').load("NuevoProducto.html",function(){
      // console.log("cargado");
      $('#modal1').modal({
        show: true
      });
    });
  }

  function confirmarEliminarProducto (id)
  { 
    $('#modalContainer').load("EliminarProducto.html?v=1",function(){//parmetros?v=1.0
      // console.log(id);
      $('#txtidDelete').val(id);
      $('#EliminarProducto').modal({
        show: true
      });
    });
  }

  function reloadTableProductos ()
  {
    tableProductos.ajax.reload();
  }

  function loadEditarProducto(id)
{
  $("#modalContainer").load("EditarProducto.html",function(){


    $.ajax(
      {
        method:"get",
        url:"http://web.miapp.com/api/v1/productos/"+id
      }
    )
    .done(function(response){
      
      $("#txtID").val(response.data.id);     
      $("#txtCodigo").val(response.data.codigo);
      $("#txtNombre").val(response.data.nombre);
      $("#txtCategoria").val(response.data.categoria);
      $("#txtDescripcion").val(response.data.descripcion);
      $("#txtPrecio").val(response.data.precio);
      $("#txtStock").val(response.data.stock);

      $('#mdlEditarProducto').modal({
        show: true
      }); 
    });
  });
}

</script>