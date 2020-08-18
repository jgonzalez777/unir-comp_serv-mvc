<h1 class="page-header">
    <?php
    if($lib->id != null){
        echo $lib->titulo;
    }
    else
    {
        echo 'Registrar nuevo libro';
    }
    ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?entidad=Libro">Libros / </a></li>
  <li class="active"><?php echo $lib->id != null ? $lib->titulo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?entidad=Libro&accion=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $lib->id; ?>" />
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Título*</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $lib->titulo; ?>" class="form-control" placeholder="Ingresa el título"/>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Autor*</label>
                <input type="text" name="autor" id="autor" value="<?php echo $lib->autor; ?>" class="form-control" placeholder="Ingresa el autor"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Año de publicación</label>
                <input type="text" name="anio_publicacion" id="anio_publicacion" value="<?php echo $lib->anio_publicacion; ?>" class="form-control" placeholder="Ingresa el año de publicación"/>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" value="<?php echo $lib->ciudad; ?>" class="form-control" placeholder="Ingresa la ciudad"/>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>País</label>
                <input type="text" name="pais" id="pais" value="<?php echo $lib->pais; ?>" class="form-control" placeholder="Ingresa el país"/>
            </div>
        </div>
    </div>  
    
    
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label>Editorial</label>
                <input type="text" name="editorial" id="editorial" value="<?php echo $lib->editorial; ?>" class="form-control" placeholder="Ingresa la editorial"/>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Precio $</label>
                <input type="text" name="precio" id="precio" value="<?php echo $lib->precio; ?>" class="form-control" placeholder="Ingresa el precio"/>
            </div>
        </div>
    </div>

    <div class="row" id="error">
        <div class="col-sm-12">
            <div class="alert alert-danger" role="alert">
                <p id="error-txt"></p>
            </div>
        </div>
    </div>

    <hr />
</form>
<div class="text-center">
    <button class="btn btn-outline-success" onclick="return validar();">Guardar</button>
</div>
<script>
    $(document).ready(function(){
        $("#error").hide("slow");
    })

    function validar(){

        var envio = true;

        if($("#titulo").val() == ""){
            $("#error-txt").html("Por favor captura el titulo");
            $("#error").show("slow");
            envio = false;
        }

        if($("#autor").val() == ""){
            $("#error-txt").html("Por favor captura el autor");
            $("#error").show("slow");
            envio = false;
        }

        if($("#anio_publicacion").val() == ""){
            $("#error-txt").html("Por favor captura el año de publicación");
            $("#error").show("slow");
            envio = false;
        }

        if($("#ciudad").val() == ""){
            $("#error-txt").html("Por favor captura la ciudad");
            $("#error").show("slow");
            envio = false;
        }

        if($("#pais").val() == ""){
            $("#error-txt").html("Por favor captura el país");
            $("#error").show("slow");
            envio = false;
        }

        if($("#editorial").val() == ""){
            $("#error-txt").html("Por favor captura la editorial");
            $("#error").show("slow");
            envio = false;
        }

        if($("#precio").val() == ""){
            $("#error-txt").html("Por favor captura el precio");
            $("#error").show("slow");
            envio = false;
        }

        if(envio)
            $("#frm-alumno").submit();
    }
</script>