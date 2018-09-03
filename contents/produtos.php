<?php
  include_once "./dao/conexao.php";

  $select_produtos = mysqli_query($conexao, "SELECT p.id as id, p.nome as nome, p.descricao as descricao, p.preco as preco, p.situacao_id as situacao_id, s.nome as situacao from produtos p, situacao s WHERE p.situacao_id = s.id");

  $id = 0;

?>

<div class="container-fluid ">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-0 mb-3 border-bottom">
          <h1 class="h2">Produtos</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#mdCadProduto">Novo Produto</button>
              <button class="btn btn-sm btn-outline-secondary">Exportar</button>
            </div>
          </div>
        </div>
    </main>
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Situação</th>
                <th>Opções</th>
                <th>Estoque</th>
              </tr>
            </thead>
            <tbody>
    <?php
      if(mysqli_num_rows($select_produtos) > 0){
        while($produto = mysqli_fetch_assoc($select_produtos)){
    ?>
          <tr>
              <td><?php echo $produto['id']; ?></td>
              <td><?php echo $produto['nome']; ?></td>
              <td><?php echo $produto['descricao']; ?></td>
              <td><?php echo $produto['preco']; ?></td>
              <td>
                <?php 
                
                echo $produto['situacao']; 
                
                ?>
              </td>
              <td>
                <button class="btn btn-sm" data-toggle="modal" data-target="#mdEditProduto<?php echo $produto['id']; ?>"><i class="material-icons" style="font-size:20px;color:grey;"  >edit</i></button>
                <a class="btn btn-sm" href="#"><i class="material-icons" style="font-size:20px;color:grey;" data-toggle="modal" data-target="#mdDelProduto">search</i></a>
                <a class="btn btn-sm" data-toggle="modal" data-target="#mdDelProduto<?php echo $produto['id']; ?>" ><i class="material-icons" style="font-size:20px;color:grey;">delete</i></a>
              </td>
              <td>
              <a class="btn btn-sm" data-toggle="modal" data-target="#mdDelProduto<?php echo $produto['id']; ?>" ><i class="material-icons" style="font-size:20px;color:grey;">menu</i></a>
              </td>

               <!-- Modal Editar Produto -->
                  <div class="modal" data-backdrop="static" id="mdEditProduto<?php echo $produto['id']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Editar Produto</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          
                          <!-- Modal body -->
                          <div class="modal-body">
                              
                          <div class="col-md-12 order-md-1">
                              <form class="needs-validation" novalidate action="./dao/produtos/processa/editar_produto.php" method="POST">
                                <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="nome">Nome do Produto</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $produto['id']; ?>">
                                    <input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name="nome" value="<?php echo $produto['nome']; ?>">
                                    <div class="invalid-feedback">
                                    Por Favor entre com o nome do Produto.
                                    </div>
                                </div>

                                <div class="col-md-12 mb-1">
                                    <label for="decricao_curta">Descrição do Produto</label>
                                    <textarea  class="form-control"  rows="2" id="descricao" placeholder="Descreva o produto." name="descricao">
                                    <?php echo $produto['descricao']; ?>
                                    </textarea>
                                    <div class="invalid-feedback">
                                    Por Favor descreva o produto.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="preco">Preço</label>
                                    <input type="text"  class="form-control" id="preco" placeholder="Preço do produto." name="preco" value="<?php echo $produto['preco']; ?>">
                                    <div class="invalid-feedback">
                                    Preço do produto.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="situacao_id">Situação</label>
                                <select class="form-control" id="situacao_id" name="situacao_id">
                                    <option value="<?php echo $produto['situacao_id']; ?>"><?php echo $produto['situacao']; ?></option>
                                <?php 
                                    $situacoes = mysqli_query($conexao, "SELECT * FROM situacao");
                                    while($situacao = mysqli_fetch_assoc($situacoes)){
                                ?>
                                    <option value="<?php echo $situacao['id'] ?>"><?php echo $situacao['nome'] ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                </div>

                                </div>
                                
                              </div>

                          </div>
                          
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- Modal Editar Produto -->

                    <!-- Modal excluir Produto -->
                    <div class="modal" data-backdrop="static" id="mdDelProduto<?php echo $produto['id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Excluir Produto</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                              <div class="col-md-12 order-md-1">
                                  <form class="needs-validation" novalidate action="./dao/produtos/processa/deleta_produto.php" method="POST">
                                    <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label ><?php echo $produto['nome']; ?></label>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $produto['id']; ?>">
                                    </div>

                                  </div>
                                    
                                </div>

                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" >Excluir</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                              </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <!-- Modal Excluir Produto -->
          </tr>
    <?php
        }
      }
    ?>
          </tbody>
        </table>
      </div>
    </div>

<!-- Modal Novo Produto -->
<div class="modal" data-backdrop="static" id="mdCadProduto">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Novo Produto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
        <div class="col-md-12 order-md-1">
          <form class="needs-validation" novalidate action="./dao/produtos/processa/cadastra_produto.php" method="POST">
            <div class="row">

            <div class="col-md-12 mb-3">
                <label for="nome">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name="nome">
                <div class="invalid-feedback">
                 Por Favor entre com o nome do Produto.
                </div>
            </div>

            <div class="col-md-12 mb-1">
                <label for="decricao_curta">Descrição do Produto</label>
                <textarea  class="form-control"  rows="2" id="descricao" placeholder="Descreva o produto." name="descricao"></textarea>
                <div class="invalid-feedback">
                 Por Favor descreva o produto.
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="preco">Preço</label>
                <input type="text"  class="form-control" id="preco" placeholder="Preço do produto." name="preco">
                <div class="invalid-feedback">
                 Preço do produto.
                </div>
            </div>

            <div class="col-md-6 mb-3">
            <label for="situacao_id">Situação</label>
            <select class="form-control" id="situacao_id" name="situacao_id">
                <option value="0">Selecionar...</option>
            <?php 
                $situacoes = mysqli_query($conexao, "SELECT * FROM situacao");
                while($situacao = mysqli_fetch_assoc($situacoes)){
            ?>
                <option value="<?php echo $situacao['id'] ?>"><?php echo $situacao['nome'] ?></option>
            <?php
                }
            ?>
            </select>
            </div>

            </div>
            
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Cadastrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Modal Novo Produto -->

</div>