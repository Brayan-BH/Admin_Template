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
        <div class="col-12">
            <table id="listProductos" class="display">
                <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Categoria</th>
                      <th>Descripcion</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                        
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
            { 
                render: function (data, type, row) {
                    return "<button class=\"btn btn-warning\"><i class='fa fa-edit'></i></button> <button class=\"btn btn-danger\" onclick=\"confirmarEliminarProducto('"+row.id+"')\"><i class='fa fa-trash'></i></button>";
                },
            },
        ],

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

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
    $('#modalContainer').load("EliminarProducto.html",function(){
      // console.log("cargado");
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

  
// function cerrar(){
//   $('#modal1').modal('hide');
// }
  
// function guardarProduct()
//     {
        
//       $.ajax({
//         method: 'POST',
//         data : {codigo: $('#txtCodigo').val(), nombre: $('#txtNombre').val(),categoria: $('#txtCategoria').val(), descripcion: $('#txtDescripcion').val(), precio: $('#txtPrecio').val()},
//         url: 'http://web.miapp.com/api/v1/productos',
//       }).done(function (response) {
//         for (i = 0; i < response.data.length; i++) 
//         {
//           $('#pagina').append(response.data[i].nombre + '<br>')
//           // $("#pagina").append(response.data[i].nombre+"<br>");
//         }
//         // console.log(response)
//       });
//     }

</script>