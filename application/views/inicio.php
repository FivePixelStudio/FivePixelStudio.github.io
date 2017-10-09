<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>GAME PANEL</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum maxime tempore quae eum provident, ipsa nihil quidem veritatis consequatur quod molestias veniam labore quos odio doloremque modi iusto necessitatibus. Provident.</p>
			<?php echo base_url(); ?>
		</div>
	</div>
</div>

<br>
<div class="container">
  <div class="row">
 
    <!-- GAME  -->   
    <div class="col-sm-4 game">
      <div class="panel panel-default">
        <img src="http://www.abc.net.au/reslib/201612/r1646745_25272999.jpg" class="img-responsive" alt="Image">
        <div class="panel-body">
          <h4>LIMBO</h4>
          <p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus facere harum magnam ducimus sit earum voluptatibus voluptate consectetur! Eum dolorum animi sunt, esse deserunt nisi assumenda cum obcaecati debitis sint?</p>
          <div class="text-center"><button type="button" class="btn btn-default"><i class="fa fa-gamepad" aria-hidden="true"></i> Jugar </button></div>
        </div>
      </div>
    </div> 

    <!-- GAME  -->
    <div class="col-sm-4 game">
      <div class="panel panel-default">
        <img src="http://www.abc.net.au/reslib/201612/r1646745_25272999.jpg" class="img-responsive" alt="Image">
        <div class="panel-body">
          <h4>LIMBO</h4>
          <p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus facere harum magnam ducimus sit earum voluptatibus voluptate consectetur! Eum dolorum animi sunt, esse deserunt nisi assumenda cum obcaecati debitis sint?</p>
          <div class ="text-center"><button type="button" class="btn btn-default"><i class="fa fa-gamepad" aria-hidden="true"></i> Jugar</button></div>
        </div>
      </div>
    </div>

    <!-- GAME  -->
    <div class="col-sm-4 game">
      <div class="panel panel-default">
        <img src="http://www.abc.net.au/reslib/201612/r1646745_25272999.jpg" class="img-responsive" alt="Image">
        <div class="panel-body">
          <h4>LIMBO</h4>
          <p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus facere harum magnam ducimus sit earum voluptatibus voluptate consectetur! Eum dolorum animi sunt, esse deserunt nisi assumenda cum obcaecati debitis sint?</p>
          <div class="text-center"><button type="button" class="btn btn-default"><i class="fa fa-gamepad" aria-hidden="true"></i> Jugar</button></div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php if($this->session->userdata('log_estado') == 'OK'){ ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>DATO SOLO PARA USUARIOS</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero ullam laudantium, ipsum repellat ex quam deserunt temporibus porro laborum quidem veniam voluptas voluptate harum maiores est ratione, esse debitis nulla?</p>
		</div>
	</div>
</div>
<?php } ?>