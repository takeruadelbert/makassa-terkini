<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 fit-screen">
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-middleLogin">
            <div class="col-md-12 col-sm-12 col-xs-12 box-topShadow"></div>
            <div class="col-md-12 col-sm-12 col-xs-12 box-middleContent flex">
                <div class="row">
                    <div class="boxOut-loginContent center-block">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 login-logo center">
                                <img src="<?= Router::url("/template/londiniumv/login/img/icon/login-logo.png", true)?>">
                            </div>
                        </div>                        
                        <div class="row">
                            <?= $this->element(_TEMPLATE_DIR . "/londiniumv/flash/dispatcher");?>
                            <?php
                            echo $this->Form->create("Account", array("action" => "lupa_password_admin"));
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-user">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-email">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-1 col-sm-1 col-xs-1 box-imgEmail">
                                                    <img src="<?= Router::url("/template/londiniumv/login/img/icon/icon-mail.png", true)?>">
                                                </div>
                                                <div class="col-md-11 col-sm-11 col-xs-11 boxOut-paddingField">
                                                    <div class="form-group label-floating">
                                                        <div class="input-group font-sourceSansPro">
                                                            <label class="control-label label-edit" for="username">Email</label>
                                                            <input id="username" class="form-control input-username" type="text" name="data[User][email]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-checkBox">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-login">
                                            <div class="col-md-12 col-sm-12 col-xs-12 font-sourceSansPro">
                                                <a href="<?= Router::url("/admin", true) ?>">
                                                    Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-buttonReset">
                                        <button type="submit" class="btn button-login font-sourceSansProBold">RESET PASSWORD</button>
                                    </div>
                                </div>                              
                            </div>
                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-bottomLogin">
            <div class="col-md-12 col-sm-12 col-xs-12 box-topShadow"></div>
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-copyright font-sourceSansProBold center flex">
                Copyright © 2016 Makassar Terkini | Developed & Maintenance By : PT. iLugroup Multimedia Indonesia
            </div>

        </div>
    </div>
</div>