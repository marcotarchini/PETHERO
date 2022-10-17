<?php 
 include('nav-bar.php');
 require_once(VIEWS_PATH . "validate-session.php");
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT . "Cellphone/ShowAddView"?>">Home</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Cellphone/ShowAddView"?>">Add Cellphone</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Cellphone/ShowListView"?>">List/Remove Cellphone</a></li>
        <li><a href="<?php echo FRONT_ROOT . "BeerType/ShowAddView"?>">Add BeerType</a></li>
        <li><a href="<?php echo FRONT_ROOT . "BeerType/ShowListView"?>">List/Remove BeerType</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Beer/ShowAddView"?>">Add Beer</a></li>
        <li><a href="<?php echo FRONT_ROOT . "Beer/ShowListView"?>">List/Remove Beer</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4">
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>MODIFY CELLPHONE</h2>
        <form action="<?php echo FRONT_ROOT . "Cellphone/Modify"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              <tr>
                <th>Code</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr>
                <td style="max-width: 100px;">
                  <input type="hidden" name="id" value="<?php echo $cellphone->getId()?>">
                  <input type="number" name="code" min="1" max="999" size="30" value="<?php echo $cellphone->getCode()?>" required>
                </td>
                <td>
                  <input type="text" name="brand" size="20" value="<?php echo $cellphone->getBrand()?>" required>
                </td>
                <td>
                  <input type="text" name="model" size="20" value="<?php echo $cellphone->getModel()?>" required>
                </td>     
                <td>
                  <input type="text" name="price" size="10" value="<?php echo $cellphone->getPrice()?>" required>
                </td>         
              </tr>
              </tbody>
          </table>
          <div>
            <input type="submit" class="btn" value="Modificar" style="background-color:#DC8E47;color:white;"/>
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