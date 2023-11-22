<?php
function sidebar($active)
{ ?>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Medaritown House</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Fitur
                </li>

                <li class="sidebar-item <?php echo $active == 'dashboard' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="./index.php">
                        <i class="align-middle" data-feather="home"></i><span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo $active == 'profile' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="./profile.php">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Profile Setting</span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo $active == 'gallery' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="./gallery.php">
                        <i class="align-middle" data-feather="image"></i> <span class="align-middle">Gallery</span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo $active == 'slider' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="./slider.php">
                        <i class="align-middle" data-feather="sidebar"></i> <span class="align-middle">Slider</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

<?php } ?>