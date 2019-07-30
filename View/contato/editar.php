<?php
    $dir = dirname(__FILE__);
    include "$dir/../template/header.php";
    
?> 

<div class="col-md-8">
<form action="<?php echo $_SERVER['url_path'];?>contato/update/<?php echo $contato['id']?>" id="updateContato" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome"></label>
                                <input type="text" name="nome" id="nome" class="form-control" value ="<?php echo $contato['nome']?>" placeholder="Nome" aria-describedby="helpId">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" name="email" id="email" class="form-control" value ="<?php echo $contato['email']?>" placeholder="Email" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefone"></label>
                                <input type="text" name="telefone" id="telefone" class="form-control mask_telefone" value ="<?php echo $contato['telefone']?>" placeholder="Telefone" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="celular"></label>
                                <input type="text" name="celular" id="celular" class="form-control mask_telefone" value ="<?php echo $contato['celular']?>" placeholder="Celular " aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cep"></label>
                                <input type="text" name="cep" id="cep" class="form-control mask_cep" value ="<?php echo $contato['cep']?>" placeholder="Cep" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="endereco"></label>
                                <input type="text" name="endereco" id="endereco" class="form-control" value ="<?php echo $contato['endereco']?>" placeholder="Endereço" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="estado"></label>                                
                                  <select class="form-control" name="estado" id="estado" >
                                    <option <?php echo $contato['estado']=='AC'? 'selected':'' ?> >AC</option>
                                    <option <?php echo $contato['estado']=='AL'? 'selected':'' ?>>AL</option>
                                    <option <?php echo $contato['estado']=='AM'? 'selected':'' ?>>AM</option>
                                    <option <?php echo $contato['estado']=='AP'? 'selected':'' ?>>AP</option>
                                    <option <?php echo $contato['estado']=='BA'? 'selected':'' ?>>BA</option>
                                    <option <?php echo $contato['estado']=='CE'? 'selected':'' ?>>CE</option>
                                    <option <?php echo $contato['estado']=='DF'? 'selected':'' ?>>DF</option>
                                    <option <?php echo $contato['estado']=='ES'? 'selected':'' ?>>ES</option>
                                    <option <?php echo $contato['estado']=='GO'? 'selected':'' ?>>GO</option>
                                    <option <?php echo $contato['estado']=='MA'? 'selected':'' ?>>MA</option>
                                    <option <?php echo $contato['estado']=='MG'? 'selected':'' ?>>MG</option>
                                    <option <?php echo $contato['estado']=='MS'? 'selected':'' ?>>MS</option>
                                    <option <?php echo $contato['estado']=='MT'? 'selected':'' ?>>MT</option>
                                    <option <?php echo $contato['estado']=='PA'? 'selected':'' ?>>PA</option>
                                    <option <?php echo $contato['estado']=='PB'? 'selected':'' ?>>PB</option>
                                    <option <?php echo $contato['estado']=='PE'? 'selected':'' ?>>PE</option>
                                    <option <?php echo $contato['estado']=='PI'? 'selected':'' ?>>PI</option>
                                    <option <?php echo $contato['estado']=='PR'? 'selected':'' ?>>PR</option>
                                    <option <?php echo $contato['estado']=='RJ'? 'selected':'' ?>>RJ</option>
                                    <option <?php echo $contato['estado']=='RN'? 'selected':'' ?>>RN</option>
                                    <option <?php echo $contato['estado']=='RO'? 'selected':'' ?>>RO</option>
                                    <option <?php echo $contato['estado']=='RR'? 'selected':'' ?>>RR</option>
                                    <option <?php echo $contato['estado']=='RS'? 'selected':'' ?>>RS</option>
                                    <option <?php echo $contato['estado']=='SC'? 'selected':'' ?>>SC</option>
                                    <option <?php echo $contato['estado']=='SE'? 'selected':'' ?>>SE</option>
                                    <option <?php echo $contato['estado']=='SP'? 'selected':'' ?>>SP</option>
                                    <option <?php echo $contato['estado']=='TO'? 'selected':'' ?>>TO</option>
                                     
                                  </select>
                                
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="cidade"></label>
                                <input type="text" name="cidade" id="cidade" class="form-control" value ="<?php echo $contato['cidade']?>" placeholder="Cidade" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
</div>
<?php
    include "$dir/../template/footer.php";    
?>