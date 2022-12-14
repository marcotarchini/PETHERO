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
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
      <form action="<?php echo FRONT_ROOT . "Keeper/Remove" ?>" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 10%;">ID</th>
              <th style="width: 20%;">Nombre</th>
              <th style="width: 20%;">Apellido</th>
              <th style="width: 10%">DNI</th>
              <th style="width: 20%">Email</th>
              <th style="width: 20%">Direccion</th>
              <th style="width: 10%">Telefono</th>
              <th style="width: 10%">Tamaño</th>
              <th style="width: 10%">Precio por dia</th>
              <th style="width: 10%">Puntuacion</th>
            </tr>
          </thead>
          <tbody>

          <?php
            foreach($keeperList as $keeper) {
          ?>
            <tr>
                <td><?php echo $keeper->getIdKeeper() ?></td>
                <td><?php echo $keeper->getNameKeeper() ?></td>
                <td><?php echo $keeper->getLNameKeeper() ?></td>
                <td><?php echo $keeper->getDni() ?></td>
                <td><?php echo $keeper->getEmail() ?></td>
                <td><?php echo $keeper->getAddress() ?></td>
                <td><?php echo $keeper->getCellphone() ?></td>
                <td><?php echo $keeper->getPetType() ?></td>
                <td><?php echo $keeper->getPriceXDay() ?></td>
                <td><?php echo $keeper->getScore() ?></td>
                <td>
                  <button type="submit" name="idKeeper" class="btn" value="<?php echo $keeper->getIdKeeper() ?>"> Borrar </button>
                  <a href="<?php echo FRONT_ROOT . "Keeper/ShowModifyView/" . $keeper->getIdKeeper() ?>" class="btn"> Modificar </a>
                </td>
              </tr>
          <?php
          }
          ?>
          </tbody>
        </table></form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include('footer.php');
?>