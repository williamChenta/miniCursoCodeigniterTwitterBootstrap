<fieldset>
    <legend>Cadastro de fabricantes</legend>

    <form class="form-horizontal" method="post" action="fabricantes" id="frmFabricantes" name="frmFabricantes">
        <input type="hidden" id="hdnId" name="hdnId">
        <input type="hidden" id="hdnAcao" name="hdnAcao">
        <div class="control-group">
            <label class="control-label" for="txtNome">Nome:</label>
            <div class="controls">
                <input type="text" id="txtNome" name="nome">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txtSite">Site:</label>
            <div class="controls">
                <input type="text" id="txtSite" name="site">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="button" class="btn" onclick="acao('salvar','frmFabricantes','')">Salvar</button>
            </div>
        </div>
    </form>

    <hr>
    <div style="height:300px; overflow-y: auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width:5%" colspan="2" align="center">Ação</th>
                    <th style="width:40%">Nome</th>
                    <th style="width:55%">Site</th>
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
                        <td onclick="acao('excluir','frmFabricantes', '<?php echo $row->id_fabricante; ?>')"><?php echo $excluir; ?></td>
                        <td onclick="acao('alterar','frmFabricantes', '<?php echo $row->id_fabricante; ?>')"><?php echo $alterar; ?></td>
                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->site; ?></td>
                    </tr>

                    <?php
                }
                ?>

            </tbody>
        </table>
    </div> 

</fieldset>