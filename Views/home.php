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
                                    <label for="email">
                                        <span>Email</span>
                                        <input type="text" id="email" name="email" required>
                                    </label>
                                </div>
                                <div>
                                    <label for="user_password">
                                        <span>Password</span>
                                        <input type="password" id="user_password" name="password" required>
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