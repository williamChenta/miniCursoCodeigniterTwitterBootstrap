<form class="form-horizontal" id="teste" name="teste" action="teste" method="post">
  <div class="control-group">
    <label class="control-label" for="txtNum1">Numero 1:</label>
    <div class="controls">
      <input type="text" id="txtNum1" name="txtNum1">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="txtNum2">Numero 2:</label>
    <div class="controls">
      <input type="text" id="txtNum2" name="txtNum2">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Somar</button>
    </div>
  </div>

  <div class="alert">
    <strong>Resultado da soma: </strong><?php echo $resultado;?>
  </div>

</form>