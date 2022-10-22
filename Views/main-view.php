<?php

 include('nav-bar.php');
 require_once(VIEWS_PATH . "validate-session.php");
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT . "Owner/ShowAddView"?>">INICIO</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Keeper/ShowAddView"?>">INGRESO GUARDIAN</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Keeper/ShowListView"?>">LISTA / BORRAR GUARDIAN</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Owner/ShowListView"?>">LISTA / BORRAR DUEÑO</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Booking/ShowAddView"?>">RESERVAR</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4">
    <main class="hoc container clear"> 
        <div>
            <button type="button" onclick="<?php echo FRONT_ROOT . "Owner/ShowListView"?>" class="btn">LISTADO DE DUEÑOS</button>
        </div>
        <div>
            <button type="button" onclick="<?php echo FRONT_ROOT . "Keeper/ShowListView"?>" class="btn">LISTADO DE GUARDIANES</button>
        </div>
        <div>
            <button type="button" onclick="<?php echo FRONT_ROOT . "Booking/ShowAddView"?>" class="btn">RESERVA</button>
        </div>
    </main>
</div>



