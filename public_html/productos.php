<?php include('Templates/header.php') ?>

<!-- Incio del contenido principal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h1>Productos</h1>
        <div class="mb-3">
            <button class="btn btn-success" onclick="guardarProduct()">Agregar</button>
            <button class="btn btn-warning">Actualizar</button>
            <button class="btn btn-danger">Eliminar</button>
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
                        
                    </tr>
                </thead>
            </table>
      </div>
      <div class="col-4">
            <input type="text" name="txtCodigo" id="txtCodigo">
            <label for="txtCodigo">Codigo</label>
            <input type="text" name="txtNombre" id="txtNombre">
            <label for="txtApellidos">Nombre</label>
            <input type="text" name="txtCategoria" id="txtCategoria">
            <label for="txtCategoria">Categoria</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion">
            <label for="txtDescripcion">Descripcion</label>
            <input type="text" name="txtPrecio" id="txtPrecio">
            <label for="txtPrecio">Precio</label>
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

$('#listProductos').DataTable( {
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
        ]

    });
});

function guardarProduct()
    {
        
      $.ajax({
        method: 'POST',
        data : {codigo: $('#txtCodigo').val(), nombre: $('#txtNombre').val(),categoria: $('#txtCategoria').val(), descripcion: $('#txtDescripcion').val(), precio: $('#txtPrecio').val()},
        url: 'http://web.miapp.com/api/v1/productos',
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