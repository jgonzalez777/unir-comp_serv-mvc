
<div class="row">
    <div class="col-sm-6">
        <h1 class="page-header display-4 text-center">Librería UNIR</h1>
    </div>
    <div class="col-sm-6 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Logo_UNIR.png/640px-Logo_UNIR.png" width="40%">
    </div>
</div>

<div class="well well-sm">
    <a class="btn btn-outline-primary" href="?entidad=Libro&accion=Crud">Crear nuevo libro</a>
</div>

<br />


<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Autor(es)</th>
            <th scope="col">Año publicación</th>
            <th scope="col">Ciudad</th>
            <th scope="col">País</th>
            <th scope="col">Editorial</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha alta</th>
            <th scope="col">Última modificación</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $contador = 1; 
        foreach($this->model->Listar() as $tupla): 
    ?>
        <tr>
            <th scope="row"><?php echo $contador++; ?></th>
            <td><?php echo $tupla->titulo; ?></td>
            <td><?php echo $tupla->autor; ?></td>
            <td><?php echo $tupla->anio_publicacion; ?></td>
            <td><?php echo $tupla->ciudad; ?></td>
            <td><?php echo $tupla->pais; ?></td>
            <td><?php echo $tupla->editorial; ?></td>
            <td>$<?php echo $tupla->precio; ?></td>
            <td><?php echo $tupla->fecha_creacion; ?></td>
            <td><?php echo $tupla->fecha_modificacion; ?></td>
            <td>
                <a class="btn btn-outline-dark" href="?entidad=Libro&accion=Crud&id=<?php echo $tupla->id; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-outline-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?entidad=Libro&accion=Eliminar&id=<?php echo $tupla->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
