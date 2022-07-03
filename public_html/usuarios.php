<?php include('Templates/header.php') ?>

<script type="text/javascript">

    var tableClientes = null;

</script>
<!-- Incio del contenido principal -->
<div id="modal-cliente">

</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h1 class="title mx-3">CLIENTES</h1>
        <div class="my-3">
        <button type="button" class="btn btn-default mx-3" onclick="loadNuevoCliente()" style="background-color: #00afb9 ;">
              Agregar Cliente
              <i class="fa fa-plus-circle"></i>
            </button>

        </div>
      <div class="container-fluid">
        <!-- /.row -->
        <div class="col-12">
            <table id="listUsuarios" class="display">
                <thead style="background-color: #cce3de;">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Documento_identidad</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th class="no-export">Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
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
 

    tableClientes = $('#listUsuarios').DataTable( {
       "ajax":{
           type: 'get',
           url: "http://web.miapp.com/api/v1/clientes",
           dataSrc: 'data',
           cache: true
           },
       columns: [
            { data: 'nombre' },
            { data: 'correo' },
            { data: 'documento_identidad' },
            { data: 'direccion' },
            { data: 'telefono' },
           { 
            render: function (data, type, row) {

              return "<button class=\"btn btn-warning\" onclick=\"loadEditarCliente('"+row.idcliente+"')\"><i class='fa fa-edit'></i></button> <button class=\"btn btn-danger\" onclick=\"confirmarEliminarCliente('"+row.idcliente+"')\"><i class='fa fa-trash'></i></button>";
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
            title: 'Reporte de Clientes',
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
            title: 'Reporte de Clientes',
            className: 'btn bg-green mb-3',
            text: "<i class='fas fa-file-excel fa-2x bg-green'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          {
            extend: 'csvHtml5',
            title: 'Reporte de Clientes',
            className: 'btn bg-blue mb-3',
            text: "<i class='fas fa-file-csv fa-2x bg-blue'></i>",
            exportOptions:
            {
              columns: ":not(.no-export)" //exportar toda columna que no tenga la clase no-exportar
            },
          },
          {
            extend: 'print',
            title: 'Reporte de Clientes',
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
 


 function loadNuevoCliente(){
  $('#modal-cliente').load("NuevoCliente.html?v=1",function(){
      // console.log("cargado");
      $('#modalCliente').modal({
        show: true
      });
    });
  }
  
  function confirmarEliminarCliente (idcliente)
  { 
    $('#modal-cliente').load("EliminarCliente.html",function(){//parmetros?v=1.0
      // console.log(id);
      $('#txtDeleteCliente').val(idcliente);
      $('#EliminarCliente').modal({
        show: true
      });
    });
  }

  function reloadTableClientes ()
  {
    tableClientes.ajax.reload();
  }
 
  function loadEditarCliente(idcliente)
  {

    $("#modal-cliente").load("EditarCLiente.html",function(){


    $.ajax(
      {
        method:"get",
        url:"http://web.miapp.com/api/v1/clientes"+idcliente
      }
    )
    .done(function(response){
      
      $("#txtIdCliente").val(response.data.idcliente);     
      $("#txtCliente").val(response.data.nombre);
      $("#txtCorreo").val(response.data.correo);
      $("#txtDocIdentidad").val(response.data.documento_identidad);
      $("#txtDireccion").val(response.data.direccion);
      $("#txtTelefono").val(response.data.telefono);
      
      $('#modalEditarCliente').modal({
        show: true
      }); 
    });
  });
  }


</script>