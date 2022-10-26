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
              <th style="width: 20%;">Nombre</th>
            </tr>
          </thead>
          <tbody>

          <?php
              foreach($userList as $user) {
          ?>
            <tr>
                <td><?php echo $user->getUserName() ?></td>
            <td>
                  <button type="submit" name="userName" class="btn" value="<?php echo $user->getUserName() ?>"> Borrar </button>
                  <a href="<?php echo FRONT_ROOT . "User/ShowModifyView/" . $user->getUserName() ?>" class="btn"> Modificar </a>
                </td>
              </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
      </form> 
      </div>
              <div class="wrapper row4">
                  <main class="hoc container clear"> 
                      <div>
                          <a href="<?php echo FRONT_ROOT . "Owner/ShowAddView"?>" class="btn">INGRESAR DUEÑO</a>
                      </div>
                      <div>
                          <a href="<?php echo FRONT_ROOT . "Keeper/ShowAddView"?>" class="btn">INGRESAR GUARDIAN</a>
                      </div>
                      <div>
                          <a href="<?php echo FRONT_ROOT . "Booking/ShowAddView"?>" class="btn">RESERVA</a>
                      </div>
                  </main>
              </div>
    
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include('footer.php');
?>