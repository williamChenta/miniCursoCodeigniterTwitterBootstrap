<fieldset>
    <legend>Cadastro de clientes</legend>

    <form class="form-horizontal" method="post" action="clientes" id="frmClientes" name="frmClientes">
        <input type="hidden" id="hdnId" name="hdnId">
        <input type="hidden" id="hdnAcao" name="hdnAcao">
        <div class="control-group">
            <label class="control-label" for="txtNome">Nome:</label>
            <div class="controls">
                <input type="text" id="txtNome" name="nome">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txtEndereco">Endereço:</label>
            <div class="controls">
                <input type="text" id="txtEndereco" name="endereco">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txtTelefone">Telefone:</label>
            <div class="controls">
                <input type="text" id="txtTelefone" name="telefone">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="button" class="btn" onclick="acao('salvar','frmClientes','')">Salvar</button>
            </div>
        </div>
    </form>

    <hr>
    <div style="height:300px; overflow-y: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width:5%" colspan="2" align="center">Ação</th>
                    <th style="width:30%">Nome</th>
                    <th style="width:55%">Endereço</th>
                    <th style="width:10%">Telefone</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $this->load->helper('html');
                $img_trash = array(
                    'src' => 'assets/img/png/glyphicons_016_bin.png',
                    'width' => '15',
                    'height' => '15',
                    'style' => 'cursor:pointer',
                    'title' => 'Excluir',
                );

                $img_edit = array(
                    'src' => 'assets/img/png/glyphicons_030_pencil.png',
                    'width' => '15',
                    'height' => '15',
                    'style' => 'cursor:pointer',
                    'title' => 'Alterar',
                );

                $excluir = img($img_trash);
                $alterar = img($img_edit);

                foreach ($linhas->result() as $row) {
                    ?>

                    <tr>
                        <td onclick="acao('excluir','frmClientes', '<?php echo $row->id_cliente; ?>')"><?php echo $excluir; ?></td>
                        <td onclick="acao('alterar','frmClientes', '<?php echo $row->id_cliente; ?>')"><?php echo $alterar; ?></td>
                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->endereco; ?></td>
                        <td><?php echo $row->telefone; ?></td>
                    </tr>

                    <?php
                }
                ?>

            </tbody>
        </table>
    </div> 

</fieldset>