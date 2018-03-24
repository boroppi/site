<div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="dashboard.php" class="simple-text logo-mini">
                    CS
                </a>
                <a href="dashboard.php" class="simple-text logo-normal">
                    CryptoStats
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php if( basename($_SERVER['PHP_SELF'], '.php') == 'dashboard' ) {echo 'active';} else {echo '';}?>">
                        <a href="dashboard.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="<?php if( basename($_SERVER['PHP_SELF'], '.php') == 'analyze' ) {echo 'active';} else {echo '';}?>">
                        <a href="analyze.php">
                            <i class="now-ui-icons education_atom"></i>
                            <p>Analyze Tool</p>
                        </a>
                    </li>
                    <li class="<?php if( basename($_SERVER['PHP_SELF'], '.php') == 'tables' ) {echo 'active';} else {echo '';}?>">
                        <a href="tables.php">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Cryptocurrencies</p>
                        </a>
                    </li>
                    <li class="<?php if( basename($_SERVER['PHP_SELF'], '.php') == 'cross' ) {echo 'active';} else {echo '';}?>">
                        <a href="cross.php">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Cross Price</p>
                        </a>
                    </li>
                    <li class="<?php if( basename($_SERVER['PHP_SELF'], '.php') == 'user' ) {echo 'active';} else {echo '';}?>">
                        <a href="user.php">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="logout.php">
                            <i class="now-ui-icons media-1_button-power"></i>
                            <p class="button button-block" name="logout"/>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>