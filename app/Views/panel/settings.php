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

    <div class="row">
        <div class="col-md-8">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        Site Settings 
                    </div>
                </div>
                <div class="portlet-body">

                <?php if (isset($validation)):  ?>                    
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors(); ?>
                    </div>                    
                <?php endif; ?>        

                    <form method="post" action="" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label class="control-label">Company name</label>
                            <input type="text" name="company_name" placeholder="Company name" value="<?= set_value("company_name") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <input type="text" name="phone" placeholder="Phone" value="<?= set_value("phone") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fax</label>
                            <input type="text" name="fax" placeholder="Fax" value="<?= set_value("fax") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" name="address" placeholder="Address" value="<?= set_value("address") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">About us</label>
                            <textarea class="form-control" name="about_us" rows="3"><?= set_value("about_us") ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mission</label>
                            <textarea class="form-control" name="mission" rows="3"><?= set_value("mission") ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Vision</label>
                            <textarea class="form-control" name="vision" rows="3"><?= set_value("vision") ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Motto</label>
                            <textarea class="form-control" name="motto" rows="3"><?= set_value("motto") ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">E-mail</label>
                            <input type="text" name="email" placeholder="E-mail" value="<?= set_value("email") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Facebook</label>
                            <input type="text" name="facebook" placeholder="Facebook" value="<?= set_value("facebook") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Twitter</label>
                            <input type="text" name="twitter" placeholder="Twitter" value="<?= set_value("twitter") ?>" class="form-control" /> 
                        </div>  
                        <div class="form-group">
                            <label class="control-label">Linkedin</label>
                            <input type="text" name="linkedin" placeholder="Linkedin" value="<?= set_value("linkedin") ?>" class="form-control" /> 
                        </div> 
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group input-large">
                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                    <span class="fileinput-filename"> </span>
                                </div>
                                <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new"> Select file </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="logo"> </span>
                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                        <div class="margin-top-10">
                            <button type="submit" class="btn green"> Submit </button>
                        </div>
                    </form>                        
                </div>
            </div>
        </div>    
    </div>    
<?= $this->endSection() ?>