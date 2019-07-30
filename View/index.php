<?php
    $dir = dirname(__FILE__);
    include "$dir/template/header.php";
    
?> 
<div class="col-md-12">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Novo Contato
</button>
<table class= "table table-striped">
<tr><th>Nome</th> <th>Celular</th> <th>Email</th> <th></th> </tr>
    <?php 
    if(!$contatos){
        echo "<tr><td colspan='4'>Não existem contatos cadastrados. </td> </tr>";
    }else{
        foreach ($contatos as $key => $contato) {
            $line  = "<tr>";
            $line .= "<td>{$contato['nome']}</td>";
            $line .= "<td>{$contato['celular']}</td>";
            $line .= "<td>{$contato['email']}</td>";
            $line .= "<td><a href='{$_SERVER['url_path']}contato/alterar/{$contato['id']}'>Alterar</a> ";
            $line .= "<a href='{$_SERVER['url_path']}contato/excluir/{$contato['id']}' class='btn_excluir'>Excluir</a> </td>";
            $line .= "</tr>";
             
            echo $line;
        }
    }
    ?>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="flase">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Contato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <div id="message"></div>
                <form action="<?php echo $_SERVER['url_path'];?>contato/novo" id="saveContato" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome"></label>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-describedby="helpId">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefone"></label>
                                <input type="text" name="telefone" id="telefone" class="form-control mask_telefone" placeholder="Telefone" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="celular"></label>
                                <input type="text" name="celular" id="celular" class="form-control mask_telefone" placeholder="Celular " aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cep"></label>
                                <input type="text" name="cep" id="cep" class="form-control mask_cep" placeholder="Cep" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="endereco"></label>
                                <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="estado"></label>                                
                                  <select class="form-control" name="estado" id="estado">
                                    <option>AC</option>
                                    <option>AL</option>
                                    <option>AM</option>
                                    <option>AP</option>
                                    <option>BA</option>
                                    <option>CE</option>
                                    <option>DF</option>
                                    <option>ES</option>
                                    <option>GO</option>
                                    <option>MA</option>
                                    <option>MG</option>
                                    <option>MS</option>
                                    <option>MT</option>
                                    <option>PA</option>
                                    <option>PB</option>
                                    <option>PE</option>
                                    <option>PI</option>
                                    <option>PR</option>
                                    <option>RJ</option>
                                    <option>RN</option>
                                    <option>RO</option>
                                    <option>RR</option>
                                    <option>RS</option>
                                    <option>SC</option>
                                    <option>SE</option>
                                    <option>SP</option>
                                    <option>TO</option>
                                    
                                  </select>
                                
                                <!-- <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" aria-describedby="helpId"> -->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="cidade"></label>
                                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id='btn_saveContato'>Salvar</button>
            </div>
        </div>
    </div>
</div>
<?php
    include "$dir/template/footer.php";    
?>
<script>
$(".btn_excluir").click(function(){
        $aviso = confirm("Gostaria de remover esse contato");
        return $aviso;
    })
</script>