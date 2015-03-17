<?php use \yii\helpers\Url;?>
<div role="navigation" class="navbar-default sidebar">
                <div class="sidebar-nav navbar-collapse">
                    <ul id="side-menu" class="nav in">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" placeholder="Search..." class="form-control">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Division<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/division/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/division/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Circle<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/circle/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/circle/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Material<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/material/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/material/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Material Type<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/materialtype/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/materialtype/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Work<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/work/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/work/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Work Progress<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/workprogress/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/workprogress/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Civil<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/civil/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/civil/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Tender<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href=<?=Url::to(["/tender/create"])?>>Create</a>
                                </li>
                                <li>
                                    <a href=<?=Url::to(["/tender/index"])?>>View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>