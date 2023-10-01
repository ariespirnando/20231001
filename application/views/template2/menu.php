<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="<?php echo base_url() ?>">
                    <img src="<?php echo base_url().'assets/' ?>assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="<?php echo base_url() ?>" class="nav-link">Ujian</a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
        <?php  
            $this->view('template2/role/siswa.php');
        ?>            
        </ul> 
    </nav>

</div>
<!--  END SIDEBAR  -->
