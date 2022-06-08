<?php include('Templates/header.php') ?>

<!-- Incio del contenido principal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h1>Categorias</h1>
        <!-- <div class="mb-3">
            <button class="btn btn-success" onclick="guardarCategory()">Agregar</button>
            <button class="btn btn-warning">Actualizar</button>
            <button class="btn btn-danger">Eliminar</button>
        </div> -->
      <div class="container-fluid">
        <!-- /.row -->
        <div class="col-12">
            <table id="listCategoria" class="display">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                    </tr>
                </thead>
            </table>
      </div>
      <!-- <div class="col-4">
            <input type="text" name="txtCodigo" id="txtCodigo">
            <label for="txtCodigo">Codigo</label>
            <input type="text" name="txtNombre" id="txtNombre">
            <label for="txtApellidos">Nombre</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion">
            <label for="txtApellidos">Descripcion</label>
            <input type="text" name="txtEStado" id="txtEStado">
            <label for="txtApellidos">Estado</label>
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

$('#listCategoria').DataTable( {
        "ajax":{
            type: 'get',
            url: "http://web.miapp.com/api/v1/categorias",
            dataSrc: 'data',
            cache: true
            },
        columns: [
            { data: 'codigo' },
            { data: 'nombre' },
            { data: 'descripcion' },
            { data: 'estado' },
        ],

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
]


    });
});

function guardarCategory()
    {
        
      $.ajax({
        method: 'POST',
        data : {codigo: $('#txtCodigo').val(), nombre: $('#txtNombre').val(),descripcion: $('#txtDescripcion').val(),estado: $('#txtEStado').val()},
        url: 'http://web.miapp.com/api/v1/categorias',
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
