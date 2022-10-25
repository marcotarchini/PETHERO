<main>
    <div>
        <h1>BIENVENIDO A PET HERO</h1>
    </div>

    <div>
        <nav class="menuIndex">
            <ul class="clear">
                <li><a href="#">INGRESE USUARIO:</a>
                    <ul>                      
                            <form action="<?php echo FRONT_ROOT . "Home/Login"?>" method="post">
                                <div>
                                    <label for="userName">
                                        <span>USUARIO</span>
                                        <input type="text" id="userName" name="userName" required>
                                    </label>
                                </div>
                                <div>
                                    <label for="password">
                                        <span>CONTRASEÑA</span>
                                        <input type="password" id="password" name="password" required>
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn">Login</button>
                                </div>
                            </form>                     
                    </ul>
                </li>             
            </ul>
        </nav>
    </div>
</main>