<!-- Modal Login -->
<div class="modal" data-backdrop="static" id="mdLogin">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/dao/valida_dados.php" method="POST">
                        <div class="form-group">
                            <label for="user">Usuário:</label>
                            <input type="text" class="form-control" id="user" name="user">
                        </div>
                        <div class="form-group">
                            <label for="pass">Senha:</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-secondary float-right">Logar</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">

                </div>
                
            </div>
        </div>
    </div>
    <!-- Modal Login -->