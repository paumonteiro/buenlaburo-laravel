
<div class="main">
  <!-- formularios -->
  <div class="row col-xs-12">
    <h1>Crear cuenta</h1>
  </div>
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <ul class="errores">
        </ul>

        <form  action="register.php" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <fieldset>

              <div class="form-group">
                  <label for="name">Username</label>
                  <input type="text" class="form-control" name="name" id="name" value="name"/>
                  <span class="help-block"></span>
              </div>

              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="email"/>
                  <span class="help-block"></span>
              </div>

              <div class="form-group">
        				<label for="password">Password</label>
        				<input id="password" class="form-control" type="password" name="password">
        			</div>
        			<div class="form-group">
        				<label for="cpassword">Confirmar Password</label>
        				<input id="cpassword" class="form-control" type="password" name="cpassword">
        			</div>

              <div class="form-group">
                  <label for="avatar">Foto de perfil: </label><br/>
                  <input type="file" class="form-control" name="avatar" id="avatar" />
                  <span class="help-block"></span>
              </div>

              <div class="form-group">
									<br>
                  <button type="submit" class="btn btn-default-2">Enviar</button>
              </div>
          </fieldset>
        </form>
      </div>
  </div>
</div>
