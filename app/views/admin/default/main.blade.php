@include('header')
@section('mainMenubar')
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
            <span>后台管理</span></a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 管理员</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">个人详情</a></li>
                <li class="divider"></li>
                <li><a href="login.html">退出</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->
        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li class="active"><a href="#"><i class="glyphicon glyphicon-sound-5-1"></i> 仪表盘</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> 用户</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-tint"></i> 资源</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-cog"></i> 配置</a></li>
        </ul>
       <!--  <form class="navbar-form navbar-right" role="search">
        	<div class="form-group">
        		<input type="text" class="form-control" placeholder="请输入关键字" />
        	</div>
        	<button type="subbmit" class="btn btn-default" >搜索</button>
        </form> -->
    </div>
</div>
<!-- topbar ends -->
@show

<div class="ch-container">
    <div class="row">
        @msection('sidebar')
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">仪表盘</li>
                        <li class="active"><a class="ajax-link" href="#"><i class="glyphicon glyphicon-home"></i><span> CNZZ统计</span></a>
                        </li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-eye-open"></i><span> 系统信息</span></a>
                        </li>
                        <li><a class="ajax-link" href="form.html"><i
                                    class="glyphicon glyphicon-edit"></i><span> 数据备份</span></a></li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-list-alt"></i><span> 清除缓存</span></a>
                        </li>
                       <!--  <li><a class="ajax-link" href="typography.html"><i class="glyphicon glyphicon-font"></i><span> Typography</span></a>
                        </li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-picture"></i><span> Gallery</span></a>
                        </li>
                        <li class="nav-header hidden-md">Sample Section</li>
                        <li><a class="ajax-link" href="table.html"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Tables</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Child Menu 1</a></li>
                                <li><a href="#">Child Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="calendar.html"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>
                        <li><a class="ajax-link" href="grid.html"><i
                                    class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="tour.html"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a></li>
                        <li><a class="ajax-link" href="icon.html"><i
                                    class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                        <li><a href="error.html"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                        </li>
                        <li><a href="login.html"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
		@show

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
			        <ul class="breadcrumb">
			            <li>
			                <a href="#">仪表盘</a>
			            </li>
			            <li>
			                <a href="#">CNZZ统计</a>
			            </li>
			        </ul>
			    </div>

			    <div class="row">
			        <div class="box col-md-12">
					@yield('content')
			        </div>
			        <!--/span-->
			    </div><!--/row-->

	    <!-- content ends -->
	    </div><!--/#content.col-md-0-->
	</div><!--/fluid-row-->
    <hr>
    <!-- footer start -->
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">software backend</a> 2012 - 2014</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://wp.rchangchu.com">renchangchun</a></p>
    </footer>
    <!-- footer end -->

</div><!--/.fluid-container-->



@include('footer')