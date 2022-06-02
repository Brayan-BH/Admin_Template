<?php include('Templates/header.php') ?>

<!-- Incio del contenido principal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <h1>Usuarios</h1>
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
});

</script>