<?php include('Templates/header.php') ?>

<!-- Incio del contenido principal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <h1>Productos</h1>
        <div class="col-12">
            <table id="listProductos" class="display">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
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
            { data: 'precio' },
        ]

    });
});

</script>