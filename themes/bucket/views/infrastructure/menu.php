<div class="row">
	<div class="col-lg-12">
<nav class="navbar navbar-inverse" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo '@'.Yii::app()->user->my_infrastructurename;?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        
                        <li <?php if($active==1) {?>class="active"<?php } ?>><a href="#">All</a></li>
                        <li <?php if($active==1) {?>class="active"<?php } ?>><a href="#">Mikrotik</a></li>
                        <li <?php if($active==1) {?>class="active"<?php } ?>><a href="#">Wan</a></li>
                        <li <?php if($active==2) {?>class="active"<?php } ?>><a href="javascript:;">AccessPoint</a></li>
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:;">Link</a></li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">Add <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a data-toggle="modal" href="#AddNewMikrotik">New Mikrotik</a></li>
                                <li><a href="#">New AccessPoint</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
    </div>
</div>

                            <!-- Modal AddNewMikrotik-->
                            <div class="modal fade" id="AddNewMikrotik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Add New Mikrotik</h4>
                                        </div>
                                        <form  id="formCreateNew" class="cmxform " method="post">
                                            <input type="hidden" name="action" value="create">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="mktname">Mikrotik Name</label>
                                                        <div class="input-group m-bot15">
                                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                            <input type="text" class="form-control" id="mktaname" name="mktname" placeholder="Enter Your Mikrotik Name" autofocus>
                                                        </div>
                                                </div>
                                                <fieldset>
                                                <legend>Mikrotik Connection</legend>
                                                <div class="form-group">
                                                    <label for="RemoteAddress">Hostname(IP)</label>
                                                        <input type="text" class="form-control" id="RemoteAddress" name="RemoteAddress" placeholder="Enter Your Hostname or IP" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label for="User">Mikrotik login name</label>
                                                        <input type="text" class="form-control" id="User" name="User" placeholder="Enter Your Mikrotik User" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label for="Pass">Mikrotik login password</label>
                                                        <input type="password" class="form-control" id="Pass" name="Pass" placeholder="Enter Your Mikrotik Password" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label for="ApiPort">Mikrotik API Port</label>
                                                        <input type="text" class="form-control" id="ApiPort" name="ApiPort" placeholder="Enter Your Mikrotik API Port" value="8291" autofocus>

                                                </div>
                                                </fieldset>
                                                <fieldset>
                                                <legend>Mikrotik Connection</legend>
                                                <div class="form-group">
                                                    <label for="RemoteAddress">Hostname(IP)</label>
                                                        <input type="text" class="form-control" id="RemoteAddress" name="RemoteAddress" placeholder="Enter Your Hostname or IP" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label for="User">Mikrotik login name</label>
                                                        <input type="text" class="form-control" id="User" name="User" placeholder="Enter Your Mikrotik User" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label for="Pass">Mikrotik login password</label>
                                                        <input type="password" class="form-control" id="Pass" name="Pass" placeholder="Enter Your Mikrotik Password" autofocus>

                                                </div>
                                                </fieldset>
                                               


                                            </div>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                                <button class="btn btn-success" type="submit">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
                                <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_view/infrastructure.js"></script>
                            </div>
                            <!-- modal AddNewMikrotik-->