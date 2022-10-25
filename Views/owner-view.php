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
      <form action="<?php echo FRONT_ROOT . "Owner/Remove" ?>" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 5%;">ID</th>
              <th style="width: 20%;">Nombre</th>
              <th style="width: 20%;">Apellido</th>
              <th style="width: 10%">DNI</th>
              <th style="width: 20%">Email</th>
              <th style="width: 20%">Direccion</th>
              <th style="width: 10%">Telefono</th>
              <th style="width: 10%">Servicio</th>
            </tr>
          </thead>
          <tbody>

          <?php
              foreach($ownerList as $owner) {
          ?>
            <tr>
                <td><?php echo $owner->getIdOwner() ?></td>
                <td><?php echo $owner->getNameOwner() ?></td>
                <td><?php echo $owner->getLNameOwner() ?></td>
                <td><?php echo $owner->getDni() ?></td>
                <td><?php echo $owner->getEmail() ?></td>
                <td><?php echo $owner->getAddress() ?></td>
                <td><?php echo $owner->getCellphone() ?></td>
                <td><?php echo $owner->getService() ?></td>
                <td>
                  <button type="submit" name="idOwner" class="btn" value="<?php echo $owner->getIdOwner() ?>"> Remove </button>
                  <a href="<?php echo FRONT_ROOT . "Owner/ShowModifyView/" . $owner->getIdOwner() ?>" class="btn"> Modificar </a>
                </td>
              </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
      </form> 
      <form action="<?php echo FRONT_ROOT . "Pet/Remove" ?>" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 10%;">ID</th>
              <th style="width: 10%;">Animal</th>
              <th style="width: 10%;">Nombre</th>
              <th style="width: 30%">Foto</th>
              <th style="width: 10%">Raza</th>
              <th style="width: 10%">Tamaño</th>
              <th style="width: 30%">Plan de vacunas</th>
              <th style="width: 30%">Video</th>
            </tr>
          </thead>
          <tbody>

          <?php
              foreach($petList as $pet) {
          ?>
            <tr>
                <td><?php echo $pet->getIdPet() ?></td>
                <td><?php echo $pet->getAnimal() ?></td>
                <td><?php echo $pet->getNamePet() ?></td>
                <td><?php echo $pet->getPhoto() ?></td>
                <td><?php echo $pet->getRace() ?></td>
                <td><?php echo $pet->getSize() ?></td>
                <td><?php echo $pet->getObservation() ?></td>
                <td><?php echo $pet->getVaccines() ?></td>
                <td><?php echo $pet->getVideo() ?></td>
                <td>
                  <button type="submit" name="idPet" class="btn" value="<?php echo $pet->getIdPet() ?>"> Borrar </button>
                  <a href="<?php echo FRONT_ROOT . "Pet/ShowModifyView/" . $pet->getIdPet() ?>" class="btn"> Modificar </a>
                </td>
              </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
      </form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include('footer.php');
?>