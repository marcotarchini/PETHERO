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
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>ADD NEW OWNER</h2>
        <form action="<?php echo FRONT_ROOT . "Owner/Add"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Address</th>
                <th>Cellphone</th>
                <th>Dog</th>
                <th>Service</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr>
                <td style="max-width: 100px;">
                  <input type="text" name="name" required>
                </td>
                <td>
                  <input type="text" name="lastName" required>
                </td>
                <td>
                  <input type="text" name="dni" required>
                </td>
                <td>
                  <input type="text" name="email" required>
                </td>
                <td>
                  <input type="text" name="address" required>
                </td>
                <td>
                  <input type="text" name="cellphone" required>
                </td>
                <td>
                  <input type="text" name="dog" required>
                </td>
                <td>
                    <select name="dog" id="dog" class="select">

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
                <td>
                  <input type="text" name="service" required>
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