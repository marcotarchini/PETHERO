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
      <form action="<?php echo FRONT_ROOT . "user/Remove" ?>" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 20%;">Name</th>
              <th style="width: 20%;">Last Name</th>
              <th style="width: 10%">DNI</th>
              <th style="width: 20%">Email</th>
              <th style="width: 20%">Address</th>
              <th style="width: 10%">Cellphone</th>
            </tr>
          </thead>
          <tbody>

          <?php
              foreach($userList as $user) {
          ?>
            <tr>
                <td><?php echo $user->getNameUser() ?></td>
                <td><?php echo $user->getLastnameUser() ?></td>
                <td><?php echo $user->getDni() ?></td>
                <td><?php echo $user->getEmail() ?></td>
                <td><?php echo $user->getAddress() ?></td>
                <td><?php echo $user->getCellphone() ?></td>
                <td>
                  <button type="submit" name="email" class="btn" value="<?php echo $user->getEmail() ?>"> Remove </button>
                  <a href="<?php echo FRONT_ROOT . "user/ShowModifyView/" . $user->getEmail() ?>" class="btn"> Modificar </a>
                </td>
              </tr>
          <?php
          }
          ?>
          </tbody>
        </table></form> 
      </div>
    
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include('footer.php');
?>