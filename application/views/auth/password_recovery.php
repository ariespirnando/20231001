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
    <style>
        .responsive-image {  width: 100%;  height: auto; } 
    </style>
</head>
<body class="form">
    

    <div class="form-container">
        <div class="form-form a-u-reload">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content"> 
                        <h3 class="">UJIAN <span class="brand-name">ADM</span></h3> 
                        <form class="text-left" >
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trello"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect></svg>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Nomor INDUK">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <input id="nisn" name="nisn" type="text" class="form-control" placeholder="NISN">
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass"> 
                                    </div>
                                    <div class="field-wrapper"> 
                                        <span onclick="validasi()" class="btn btn-primary" value="">Cek Kartu Ujian</span> 
                                    </div>
                                    
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

     <!-- BEGIN PAGE LEVEL PLUGINS -->
     <script src="<?php echo base_url().'assets/' ?>assets/js/components/session-timeout/bootstrap-session-timeout.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    
</body>
</html>

<script>
function validasi(){  
    var time = 1900;
    var email = $('#email').val(); 
    var nisn = $('#nisn').val();   
    $.ajax({
        url: '<?php echo base_url()?>'+'auth/cekemailrecov',
        type: 'post', 
        dataType: "json",
        data: {
                "email":email, 
                "nisn":nisn,  
                }, 
        success: function(data,response){
            if(data.isauth == 0){
                location.replace('<?php echo base_url() ?>'+data.module); 
            }else{
                login_failure10();
            } 
        },
        beforeSend: function() { 
            reload(time); 
        },  
        error: function(){
            login_failure10()
        },
        timeout: time 
    })  
     
}
 
  
var SessionTimeout=function() {
    var e=function() {
        $.sessionTimeout( {
            title:"Session Timeout Notification", 
            message:"Your session is about to expire.", 
            keepAliveUrl:"", 
            redirUrl:"<?php echo base_url().'error404/clear' ?>", 
            logoutUrl:"<?php echo base_url().'error404/clear' ?>", 
            warnAfter:900e3,  
            redirAfter:916e3, 
            ignoreUserActivity:!0, 
            countdownMessage:"Redirecting in {timer}.", 
            countdownBar: !0
        }
        )
    };
    return {
            init:function() {
                e()
            }
        }
    } 
    ();
    jQuery(document).ready(function() {
        SessionTimeout.init()
    }
    );

</script>

<script src="<?php echo base_url().'assets/' ?>locking_browser.js"></script>
