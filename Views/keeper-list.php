<?php

 include('nav-bar.php');
 require_once(VIEWS_PATH . "validate-session.php");
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT . "Owner/ShowAddView"?>">Home</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Owner/ShowAddView"?>">ADD OWNER</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Owner/ShowListView"?>">LIST/ REMOVE OWNER</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Keeper/ShowAddView"?>">ADD KEEPER</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Keeper/ShowListView"?>">LIST/ REMOVE KEEPER</a></li>
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
              <th style="width: 20%;">Name</th>
              <th style="width: 20%;">Last Name</th>
              <th style="width: 20%">DNI</th>
              <th style="width: 20%">Email</th>
              <th style="width: 20%">Address</th>
              <th style="width: 20%">Cellphone</th>
              <th style="width: 20%">Dog type</th>
              <th style="width: 20%">Price for day</th>
            </tr>
          </thead>
          <tbody>

          <?php
           
            foreach($keeperList as $keeper) {
          ?>
            <tr>
                <td><?php echo $keeper->getIdKeeper() ?></td>
                <td><?php echo $keeper->getNamePerson() ?></td>
                <td><?php echo $keeper->getLastnamePerson() ?></td>
                <td><?php echo $keeper->getDni() ?></td>
                <td><?php echo $keeper->getEmail() ?></td>
                <td><?php echo $keeper->getAddress() ?></td>
                <td><?php echo $keeper->getCellphone() ?></td>
                <td><?php echo $keeper->getDogType() ?></td>
                <td><?php echo $keeper->getPriceXDay() ?></td>
                <td>
                  <button type="submit" name="idKeeper" class="btn" value="<?php echo $keeper->getIdKeeper() ?>"> Remove </button>
                  <a href="<?php echo FRONT_ROOT . "Keeper/ShowModifyView/" . $keeper->getIdKeeper() ?>" class="btn"> Modify </a>
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