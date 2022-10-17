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
      <form action="<?php echo FRONT_ROOT . "Owner/Remove" ?>" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 5%;">Id</th>
              <th style="width: 10%;">Name</th>
              <th style="width: 10%;">Last Name</th>
              <th style="width: 10%">DNI</th>
              <th style="width: 10%">Email</th>
              <th style="width: 20%">Address</th>
              <th style="width: 30%">Cellphone</th>
              <th style="width: 10%">Dog</th>
              <th style="width: 10%">Service</th>
            </tr>
          </thead>
          <tbody>

          <?php
              foreach($ownerList as $owner) {
          ?>
            <tr>
                <td><?php echo $owner->getIdOwner() ?></td>
                <td><?php echo $owner->getNamePerson() ?></td>
                <td><?php echo $owner->getLastNamePerson() ?></td>
                <td><?php echo $owner->getDni() ?></td>
                <td><?php echo $owner->getEmail() ?></td>
                <td><?php echo $owner->getAddress() ?></td>
                <td><?php echo $owner->getCellphone() ?></td>
                <td><?php echo $owner->getDog()->getNameDog() ?></td>
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