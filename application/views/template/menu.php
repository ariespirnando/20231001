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
                <a href="<?php echo base_url() ?>" class="nav-link">UJIAN-ADM</a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
        <?php 
            $role = base64_decode($this->session->userdata('role_ses'));  ##Baca aja Sesionya
            switch ($role) {
                case "U-ADMIN":
                    $this->view('template/role/admin.php');
                    break; 
                case "U-GURU":
                    $this->view('template/role/guru.php');
                    break;
                case "U-KEPSEK":
                    $this->view('template/role/kepsek.php');
                    break;
                case "U-KURIKULUM":
                    $this->view('template/role/kurikulum.php');
                    break;
                case "U-KEUANGAN":
                    $this->view('template/role/keuangan.php');
                    break;
                case "U-WALISISWA":
                    $this->view('template/role/walisiswa.php');
                    break; 
                default:
                    $this->view('template/role/siswa.php');
            } 
        ?>            
        </ul>
        
    </nav>

</div>
<!--  END SIDEBAR  -->
