<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
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
        <header class="topo-pagina p-3 mb-5" id="topoCarrinho">
            <h1 class="p-3">Carrinho</h1>
            <p class="px-3 pt-0 topo">Confira seu pedido, seus dados e clique em Finalize sua Compra</p>
        </header>
        <section class="container my-3">
            <div class="row">
                <form class="col-12 mb-5" id="carrinhoForm" action="pagamento.html" method="post">
                    <h2 class="col-12 text-center text-info mt-5 mb-4">Produtos selecionados</h2>
                    <p class="ml-0 mb-5 text-center">Confira os produtos selecionados e clique em Finalizar Compra</p>
                    <table class="table text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" colspan="2">Produto</th>
                                <th scope="col" class="d-none d-md-table-cell">Preço Unitário</th>
                                <th scope="col">Preço Total</th>
                                <th scope="col">Opções</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (isset($_POST['id_txt'])) {

                                $id = $_POST['id_txt'];
                                $nome = $_POST['nome'];
                                $preco = $_POST['preco'];
                                $quantidade = $_POST['quantidade'];

                                $meucarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
                            }

                            session_start();

                            if (isset($_SESSION['carrinho'])) {

                                $meucarrinho = $_SESSION['carrinho'];

                                if (isset($_POST['id_txt'])) {

                                    $id = $_POST['id_txt'];
                                    $nome = $_POST['nome'];
                                    $preco = $_POST['preco'];
                                    $quantidade = $_POST['quantidade'];

                                    $pos = -1;
                                    for ($i = 0; $i < count($meucarrinho); $i++) {
                                        # code...
                                        if ($id == $meucarrinho[$i]['id']) {
                                            # code...
                                            $pos = $i;
                                        }
                                    }

                                    if ($pos <> -1) {
                                        $quant = $meucarrinho[$pos]['quantidade'] + $quantidade;
                                        $meucarrinho[$pos] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quant);
                                    } else {
                                        $meucarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
                                    }
                                }
                            }

                            if (isset($meucarrinho)) $_SESSION['carrinho'] = $meucarrinho;


                            if (isset($meucarrinho)) {

                                $total = 0;

                                for ($i = 0; $i < count($meucarrinho); $i++) {
                                    # code...

                            ?>

                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex align-items-start justify-content-start flex-column flex-md-row">
                                                <img src="./assets/img/produto-04-440x440.jpg" alt="<?php echo $meucarrinho[$i]['nome'] ?>" width="72" height="72">
                                                <div class="text-left mx-0 mx-md-3">
                                                    <h5 class="my-0"><span class="cart-qtd">1</span> <?php echo $meucarrinho[$i]['nome'] ?></h5>
                                                    <p class="my-0">Tamanho: <span class="cart-size">M</span></p>
                                                    <small class="text-muted my-0">SKU: 123-EFIUAB-98</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart-unit-price d-none d-md-table-cell">R$ <?php echo $meucarrinho[$i]['preco'] ?></td>

                                        <?php

                                        $subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i]['quantidade'];
                                        $total = $total + $subtotal;

                                        ?>

                                        <td class="cart-subtotal-price">R$ <?php echo $subtotal ?></td>
                                        <td>
                                            <a href="#" class="ml-3" data-toggle="modal" data-target="#modalProduto01"><i class="fas fa-pencil"></i></a>
                                            <a href="#" class="ml-3"><i class="fas fa-times"></i></a>
                                        </td>
                                        <td>
                                            <?php echo $meucarrinho[$i]['quantidade'] ?>
                                        </td>
                                        <!-- Modal Produto 01 -->
                                        <div class="modal fade mt-5" id="modalProduto01" tabindex="-1" role="dialog" aria-labelledby="modalProduto01Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalProduto01Label">Item 01</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="formProduto01Edit">
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="tamanhoProduto01">Tamanhos</label>
                                                                    <select class="form-control" name="tamanho" id="tamanho" required="">
                                                                        <option value="" disabled="" selected="">--</option>
                                                                        <option value="PP">PP</option>
                                                                        <option value="P">P</option>
                                                                        <option value="M">M</option>
                                                                        <option value="G">G</option>
                                                                        <option value="GG">GG</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="quantidadeProduto01">Quantidade</label>
                                                                    <input type="number" class="form-control" id="quantidadeProduto01" step="1" min="1" value="<?php echo $meucarrinho[$i]['quantidade'] ?>" form="carrinhoForm" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group clearfix">
                                                                <button data-dismiss="modal" class="mx-auto my-2 btn btn-info btn-lg col-md-3 float-right">Atualizar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /Modal Produto 01 -->
                                    </tr>



                            <?php

                                }
                            }

                            ?>

                        </tbody>

                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="d-flex align-items-start justify-content-start flex-column flex-md-row">
                                        <img src="./assets/img/produto-04-440x440.jpg" alt="x" width="72" height="72">
                                        <div class="text-left mx-0 mx-md-3">
                                            <h5 class="my-0"><span class="cart-qtd">x</span> x</h5>
                                            <p class="my-0">x <span class="cart-size">x</span></p>
                                            <small class="text-muted my-0">x</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart-unit-price d-none d-md-table-cell">Total:</td>
                                <td class="cart-subtotal-price"><?php if (isset($total)) echo $total ?></td>
                                <td>
                                    <a href="#" class="ml-3" data-toggle="modal" data-target="#modalProduto01"><i class="fas fa-pencil"></i></a>
                                    <a href="#" class="ml-3"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="form-inline">
                        <div class="form-group col-md-6">
                            <label for="cupomDesconto" class="col-auto pl-0">Cupom de Desconto</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="cupomDesconto" id="cupomDesconto" placeholder="INSIRA SEU CUPOM">
                            </div>
                        </div>
                        <div class="form-group col-md-2 offset-4">
                            <button type="submit" class="btn btn-info" form="carrinhoForm">Finalizar Compra</button>
                        </div>
                    </div>
                </form>
            </div>

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