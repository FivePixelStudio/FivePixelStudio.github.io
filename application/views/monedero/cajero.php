<div class="wrapper">
  <div class="container">

    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
        <li role="presentation" class="active">
          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            <span class="text">perfil</span>
          </a>
        </li>
        <li role="presentation" class="next">
          <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
            <span class="text">mis juegos</span>
          </a>
        </li>
        <li role="presentation" class="dropdown">
          <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">
            <span class="text">cajero</span>
            <span class="caret">
            </span>
          </a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
            <li>
              <a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
                <span>monedero</span>
              </a>
            </li>
            <li>
              <a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
                <span>transacciones</span>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
          
        </div>
        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
          
        </div>
        <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
         
        </div>
        <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
         
        </div>
        <div role="tabpanel" class="tab-pane fade" id="samsa" aria-labelledby="samsa-tab">
         
        </div>
      </div>
    </div>
  </div>
</div>