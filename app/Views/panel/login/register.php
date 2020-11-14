

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url() ?>/metronic/assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        


        <!-- END LOGO -->
        <div class="content">
            <?php if (isset($validation)):  ?>
              
                <div class="alert alert-danger" role="alert">
                    <?php echo $validation->listErrors(); ?>
                </div>
                 
            <?php endif; ?>            
            <form method="post" action="register">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" name="firstname" placeholder="First Name" class="form-control" /> </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="lastname" placeholder="Last Name" class="form-control" /> </div>
                <div class="form-group">
                    <label class="control-label">Email Adress</label>
                    <input type="text" name="email" placeholder="E-mail Adress" class="form-control" /> </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" placeholder="Min 4 Character" class="form-control" /> </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Pass" class="form-control" /> </div>

                <div class="form-actions">
                    <button type="submit" class="btn green pull-right"> Register </button>
                </div>
            </form>
        </div>
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> <?php echo date("Y") ?> &copy; Tüm hakları saklıdır </div>
        <!-- END COPYRIGHT -->
