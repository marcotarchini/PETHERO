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
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>INGRESE NUEVO GUARDIAN</h2>
        <form action="<?php echo FRONT_ROOT . "Keeper/Add"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              
                <th>Tipo de perro</th>
                <th>Precio por dia</th>
              
            </thead>
            <tbody align="center">
              <tr>
                <td style="max-width: 100px;">
                  <input type="text" name="dogType" required>
                </td>
                <td>
                   <input type="number" name="priceXDay" required>
                </td>  
              </tr>
              </tbody>
          </table>
          <div>
            <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
          </div>
          <div><!--
            <?php
                if($message != "") {
                  echo "<div>
                    <p>". $message ."</p>
                  </div>";
                }
            ?>-->
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