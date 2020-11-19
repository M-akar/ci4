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
                        <i class="fa fa-picture"></i>Blog List </div>

                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-condensed table-hover table-image">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Title </th>
                                    <th> Slug </th>
                                    <th> Image </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $blogs as $blog ): ?>
                                    <tr>
                                        <td> <?= $blog['id'] ?> </td>
                                        <td> <?= $blog['title'] ?> </td>
                                        <td> <?= $blog['slug'] ?> </td>
                                        <td>
                                            <?php if($blog['img_url']): ?> 
                                                <img src="<?= base_url('uploads/blog/').'/'.$blog['img_url'] ?>" class="img-responsive">
                                            <?php endif; ?>    
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if( $blog['is_active'] == 1){ ?>
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
                        <i class="fa fa-picture"></i>Creat a new Blog </div>

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
                            <label class="control-label">Title</label>
                            <input type="text" name="title" placeholder="Title" value="<?= set_value("title") ?>" class="form-control" /> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Content</label>
                            <textarea class="form-control" name="content" rows="3"><?= set_value("content") ?></textarea>
                        </div>
                        <div class="form-group">                    
                        
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename"> </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new"> Select file </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="file" name="img_url"> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
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
</div>      
        
<?= $this->endSection() ?>