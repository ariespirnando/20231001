<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <title>UJIAN Form | SMA Negeri 2 Bekasi  </title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/' ?>assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo base_url().'assets/' ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets/' ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets/' ?>assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>assets/css/forms/switches.css">
    <link href="<?php echo base_url().'assets/' ?>plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets/' ?>assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets/' ?>plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
    <style>
        .responsive-image {  width: 100%;  height: auto; } 
    </style>

    <style>
        h4.modal-title { color: #000; }
        .modal-content {
            border: none;
            box-shadow: 0px 0px 15px 1px #ebedf2;
            border: 1px solid #bfc9d4;
        }
        .modal-body { text-align: center; }
        .modal-body p {
            color: #3b3f5c;
            font-weight: 600;
            margin-bottom: 0; }
        p span.countdown-holder { color: #e7515a; font-size: 18px; }
        .modal-footer { border: none; }
        .progress {
            width: 50%;
            margin: 0 auto;
            border-radius: 30px;
            height: 10px;
        }
        .modal-backdrop { background-color: #fff; }
        @media (min-width: 576px) { .modal-dialog { max-width: 350px; } }
    </style>

</head>
<body class="form  a-u-reload">
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content"> 
                        <h1 class="">UJIAN <span class="brand-name">ADM</span></h1> 
                        <p class="signup-link">SMA Negeri 2 Bekasi</p>
                        <form class="text-left" > 
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                                </div>

                                <div id="password-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper toggle-pass">
                                             
                                        </div>
                                        <div class="field-wrapper">
                                        <a href="<?php echo base_url().'auth/passrecov'?>">Lupa Password ?</a>
                                        </div> 
                                    </div>
                                </div>

                                 

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Tampilkan Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <span onclick="login()" class="btn btn-primary">Log In</span>  
                                    </div> 
                                </div>

                                 

                                <div class="field-wrapper">
                                    
                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions">© 2020 All Rights Reserved | SMA Negeri 2 Bekasi</p> 
                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

         
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url().'assets/' ?>assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url().'assets/' ?>bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url().'assets/' ?>bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url().'assets/' ?>assets/js/authentication/form-1.js"></script>
    <script src="<?php echo base_url().'assets/' ?>plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="<?php echo base_url().'assets/' ?>plugins/blockui/jquery.blockUI.min.js"></script>  
    <script src="<?php echo base_url().'assets/' ?>assets/js/authcustom.js"></script>
</body>
</html>
<?php 
if($this->session->userdata('message') <> ''){ 
    echo "<script>
            Snackbar.show({
                text: '".$this->session->userdata('message')."',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a',
                pos: 'top-right'
            });
        </script>"; 
}
?>
<script>

function login(){ 
    var pass = $('#password').val();
    var user = $('#username').val(); 
    var time = 2500;
    if(pass!="" && user!=""){  
        var password = pass.trim();
        var username = user.trim();    
        $.ajax({
            url: '<?php echo base_url()?>'+window.atob('YXV0aC9sb2dpbg=='),
            type: 'post', 
            dataType: "json",
            data: {
                    "username":username,
                    "password":password, 
                }, 
            success: function(data,response){
                if(data.isauth == 1){
                    login_failure3()
                }else if(data.isauth == 2){
                    login_failure2() 
                }else{
                    location.replace('<?php echo base_url() ?>'+data.module);
                } 
            },
            beforeSend: function() { 
                reload(time); 
            },  
            error: function(){
                login_failure2()
            },
            timeout: time 
        }) 
    }else{
        login_failure1();
    }
}
 
</script>

<script src="<?php echo base_url().'assets/' ?>locking_browser.js"></script>
