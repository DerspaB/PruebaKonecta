<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD PRODUCTOS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?php foreach($menu as $item): ?>
                <li><a class="nav-link active" href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
            <?php endforeach; ?>
        </div>
        </div>
    </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
               <?php if(isset($result))
                    {
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Fecha Creación</th>
                            <th>Fecha Venta</th>
                            <th>Acciones</th>
                        </tr>
                    <?php
                    foreach($result as $item):
                    ?>
                    <tr>
                            <td><?= $item->idProducto?></td>
                            <td><?= $item->nombreProducto ?></td>
                            <td><?= $item->referencia ?></td>
                            <td><?= $item->precio ?></td>
                            <td><?= $item->peso ?></td>
                            <td><?= $item->categoria ?></td>
                            <td><?= $item->stock ?></td>
                            <td><?= $item->fechaCreacion ?></td>
                            <td><?= $item->fechaUltimaVenta ?></td>
                            <td>
                                <form action="http://localhost/pruebaJorgeParradoPHP/Products/delete" method="POST" accept-charset="utf-8">
                                    <input name="idProducto" type="hidden" value="<?= $item->idProducto?>">
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                                <form action="http://localhost/pruebaJorgeParradoPHP/Products/showById" method="POST" accept-charset="utf-8">
                                    <input name="idProducto" type="hidden" value="<?= $item->idProducto?>">
                                    <button class="btn btn-info">Actualizar</button>
                                </form>
                            </td>
                            
                    </tr>
                    <?php endforeach; ?>
                    </table>
                    <?php if(isset($msgGet)){?>
                    <div class="alert alert-success" role="alert">
                        <?= isset($msgGet) ? $msgGet : ''?>
                    </div>
                    <?php } ?>
                <?php
                }else if(isset($showById)){
                    ?> 
                    <form action="http://localhost/pruebaJorgeParradoPHP/Products/update" method="POST" accept-charset="utf-8">
                        

                        <input type="hidden" class="form-control" id="idProducto" name="idProducto" value="<?php echo $showById[0]->idProducto ?>" required>
                        
                        <div class="mb-3">
                            <label for="nombreProducto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?php echo $showById[0]->nombreProducto ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="referencia" class="form-label">Referencia</label>
                            <input type="text" class="form-control" id="referencia" value="<?php echo $showById[0]->referencia ?>" name="referencia" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $showById[0]->precio ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="number" class="form-control" id="peso" name="peso" value="<?php echo $showById[0]->peso ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $showById[0]->categoria ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $showById[0]->stock ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>
                    <?php
                    
                }
                else{
                    ?>
                    <form action="http://localhost/pruebaJorgeParradoPHP/Products/create" method="POST" accept-charset="utf-8">
                        <div class="mb-3">
                            <label for="nombreProducto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                        </div>
                        <div class="mb-3">
                            <label for="referencia" class="form-label">Referencia</label>
                            <input type="text" class="form-control" id="referencia" name="referencia" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="number" class="form-control" id="peso" name="peso" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                    <br>
                    <?php if(isset($msg)){?>
                    <div class="alert alert-success" role="alert">
                        <?= isset($msg) ? $msg : ''?>
                    </div>
                    <?php
                    }
                }
                ?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>