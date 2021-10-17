<?php include('conecta.php') ?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-ekOryaXPbeCpWQNxMwSWVvQ0+1VrStoPJq54shlYhR8HzQgig1v5fas6YgOqLoKz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="./index.php">
                <img src="./assets/img/logo.png" alt="Logo" width="30" height="30" class="mr-2"> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./sobre.html">Sobre</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./categoria.html">Objetos</a>
                            <a class="dropdown-item" href="./categoria.html">Coisas</a>
                            <a class="dropdown-item" href="./categoria.html">Decoração</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contato.html">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php">Carrinho</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        <div id="carrosselBootstrap" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carrosselBootstrap" data-slide-to="0" class="active"></li>
                <li data-target="#carrosselBootstrap" data-slide-to="1"></li>
                <li data-target="#carrosselBootstrap" data-slide-to="2"></li>
                <li data-target="#carrosselBootstrap" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" id="banner01">
                    <div class="carousel-caption">
                        <h2>Título 1</h2>
                        <p>Descrição 1</p>
                    </div>
                </div>
                <div class="carousel-item" id="banner02">
                    <div class="carousel-caption">
                        <h2>Título 2</h2>
                        <p>Descrição 2</p>
                    </div>
                </div>
                <div class="carousel-item" id="banner03">
                    <div class="carousel-caption">
                        <h2>Título 3</h2>
                        <p>Descrição 3</p>
                    </div>
                </div>
                <div class="carousel-item" id="banner04">
                    <div class="carousel-caption">
                        <h2>Título 4</h2>
                        <p>Descrição 4</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carrosselBootstrap" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carrosselBootstrap" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
        <section class="container">
            <section id="catMaisVendidos" class="row px-3 px-md-0 mb-5">
                <h2 class="col-12 text-center text-info mt-5 mb-4">Mais Vendidos</h2>
                <div id="carrosselMaisVendidos" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators indicators-mais-vendidos">
                        <li data-target="#carrosselMaisVendidos" data-slide-to="0" class="bg-info active"></li>
                        <li data-target="#carrosselMaisVendidos" data-slide-to="1" class="bg-info"></li>
                        <li data-target="#carrosselMaisVendidos" data-slide-to="2" class="bg-info"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="maisVendidos01">
                            <div class="card-deck">

                                <?php
                                $consulta = mysqli_query($conexao, "SELECT * FROM produtos");

                                while ($linha = mysqli_fetch_array($consulta)) {
                                    # code...
                                    $id = $linha['id'];
                                    $imagem = $linha['imagem'];
                                    $nome = $linha['nome'];
                                    $desc = $linha['descricao'];
                                    $preco = $linha['preco'];
                                    $quant = $linha['qunatidade'];
                                    $data = $linha['data'];

                                ?>

                                    <div class="card promo">
                                        <img class="card-img-top" src="<?php echo $imagem ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $nome ?></h4>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                        <div class="card-footer">
                                            <p class="preco-vitrine text-info d-inline">R$ <?php echo $preco ?></p>
                                            <!-- <a href="carrinho.php" class="btn btn-info float-right">Comprar</a> -->
                                            <a href="produto.php" class="btn btn-info float-right">Detalhes</a>
                                        </div>
                                        <div class="card-footer">
                                            <form action="carrinho.php" method="POST">
                                                
                                                <input name="id_txt" type="hidden" value="<?php echo $id ?>">
                                                <input name="nome" type="hidden" value="<?php echo $nome ?>">
                                                <input name="preco" type="hidden" value="<?php echo $preco ?>">
                                                <input name="quantidade" type="hidden" value="1">

                                                <button name="Comprar" type="submit"> Comprar</button>

                                            </form>
                                        </div>
                                        <span class="badge badge-pill badge-info">PROMO</span>
                                    </div>


                                <?php

                                }

                                ?>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </section>
    </main>
    <footer class="container-fluid mt-5 mb-0 mx-0 pt-5 px-0">
        <div class="bg-dark text-white mx-0 p-5">
            <div class="d-flex flex-row flex-nowrap justify-content-center redes-sociais">
                <a href="#" target="_blank" title="Acesse nosso Insta"><i class="fab fa-instagram mr-2"></i></a>
                <a href="#" target="_blank" title="Acesse nosso Face"><i class="fab fa-facebook mr-2"></i></a>
                <a href="#" target="_blank" title="Acesse nosso Twitter"><i class="fab fa-twitter mr-2"></i></a>
                <a href="#" target="_blank" title="Acesse nosso Pinterest"><i class="fab fa-pinterest mr-2"></i></a>
            </div>
            <div class="d-flex flex-row flex-nowrap justify-content-center mt-3">
                <small>Fulanos &copy; | CNPJ 01.012.012/0001-99 | <a href="#" title="Políticas e Termos" data-toggle="modal" data-target="#modalPoliticas">Políticas de Privacidade</a> | <a href="#" title="Trocas e Devoluções" data-toggle="modal" data-target="#modalTrocas">Trocas e Devoluções</a></small>
            </div>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>