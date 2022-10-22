<?php

use DAO\DogDAO;

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
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>INGRESE NUEVO DUEÑO</h2>
        <form action="<?php echo FRONT_ROOT . "Owner/Add"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
                <th>Dog</th>
                <th>Service</th>          
            </thead>
            <tbody align="center">
              <tr>
                <td style="max-width: 100px;">
                  <input type="text" name="dog" required>
                </td>
                <td>
                  <input type="text" name="service" required>
                </td> 
                <td>
                  <select name="dog" id="dog" class="select">
                </td>
                <td>
                      <?php
                        $dogDAO = new DogDAO();
                        $dogList = $dogDAO->GetAll();

                        foreach($dogList as $dog) {
                          echo "<option value=". $dog->getIdDog() .">
                          ". $dog->getNameDog(). "
                          </option>";
                        }
                      ?>

                    </select>
                </td>                 
              </tr>
              </tbody>
          </table>
          <div>
            <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
          </div>
          <div>
            <?php
                if($message != "") {
                  echo "<div>
                    <p>". $message ."</p>
                  </div>";
                }
            ?>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
<!-- ################################################################################################ -->

<?php 
  include('footer.php');
?>