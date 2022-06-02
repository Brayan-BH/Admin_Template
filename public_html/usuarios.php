<?php include('Templates/header.php') ?>

<!-- Incio del contenido principal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h1>Usuarios</h1>
        <div class="mb-3">
            <button class="btn btn-success" onclick="guardarUsuario()">Agregar</button>
            <button class="btn btn-warning">Actualizar</button>
            <button class="btn btn-danger">Eliminar</button>
        </div>
      <div class="container-fluid">
        <!-- /.row -->
        <div class="col-12">
            <table id="listUsuarios" class="display">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Estado</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-4">
            <input type="text" name="txtNombre" id="txtNombre">
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtApellidos" id="txtApellidos">
            <label for="txtApellidos">Apellidos</label>
            <input type="text" name="txtCorreo" id="txtCorreo">
            <label for="txtCorreo">Correo</label>
            <input type="text" name="txtRol" id="txtRol">
            <label for="txtRol">Rol</label>
            <input type="text" name="txtEstado" id="txtEstado">
            <label for="txtEstado">Estado</label>
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


$('#listUsuarios').DataTable( {
        "ajax":{
            type: 'get',
            url: "http://miapi.com/Public_html/api/v1/usuarios",
            dataSrc: 'data',
            cache: true
            },
        columns: [
            { data: 'nombre' },
            { data: 'apellidos' },
            { data: 'correo' },
            { data: 'rol' },
            { data: 'estado' }
        ]
    });
    function guardarUsuario()
    {
      $.ajax({
        method: 'POST',
        data : {nombre: $('#txtNombre').val(), apellidos: $('#txtApellidos').val(), correo: $('#txtCorreo').val(), rol: $('#txtRol').val(), estado: $('#txtEstado').val()},
        url: 'http://miapi.com/Public_html/api/v1/usuarios',
      }).done(function (response) {
        for (i = 0; i < response.data.length; i++) 
        {
          $('#listUsuarios').append(response.data[i].nombre + '<br>')
          // $("#pagina").append(response.data[i].nombre+"<br>");
        }
        console.log(response)
      });
    }
});

</script>