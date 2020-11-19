<?= $this->extend('panel/layouts/main') ?>

<?= $this->section('content') ?>

<?php if(session()->get("success")): ?>
    <div class="alert alert-success" role="alert">          
        <?= session()->get("success") ?>               
    </div>
<?php endif; ?>

<?php if(session()->get("error")): ?>
    <div class="alert alert-danger" role="alert">          
        <?= session()->get("error") ?>               
    </div>
<?php endif; ?>
        
<div class="profile-content">
    <div class="row">
    <div class="col-md-6">
        <!-- BEGIN CONDENSED TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture"></i>Admin List </div>

            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> First Name </th>
                                <th> Last Name </th>
                                <th> Username </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $users as $user ): ?>
                                <tr>
                                    <td> <?= $user['id'] ?> </td>
                                    <td> <?= $user['firstname'] ?> </td>
                                    <td> <?= $user['lastname'] ?> </td>
                                    <td> <?= $user['email'] ?> </td>
                                    <td>
                                        <?php if( $user['is_active'] == 1){ ?>
                                            <span class="label label-sm label-success"> Aktive </span>
                                        <?php }else{ ?>    
                                            <span class="label label-sm label-danger"> Passive </span>
                                        <?php } ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END CONDENSED TABLE PORTLET-->
    </div>
        <div class="col-md-6">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture"></i>Creat a new Admin </div>

            </div>
            <div class="portlet-body">  

                <?php if (isset($validation)):  ?>
                
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                    
                <?php endif; ?>            
                <form method="post" action="">
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
                        <input type="password" name="password" placeholder="Min 5 Character" class="form-control" /> </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" name="confirm_password" placeholder="Confirm Pass" class="form-control" /> </div>

                    <div class="margin-top-10">
                        <button type="submit" class="btn green"> Register </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
        
<?= $this->endSection() ?>