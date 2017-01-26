<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jquery -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   

        <link rel="stylesheet" type="text/css" href="{{ url(('/')) }}/css/others.css">  
        <link rel="stylesheet" type="text/css" href="{{ url(('/')) }}/css/gen.css">     

        
    </head>
    <body>
    <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
                <div  class="navbar-brand">
                    <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle">
                        <i class="fa fa-bars"></i>
                    </a>
            <a href="#">Prescription Mangement System</a>
                </div>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      </difv><!--/.nav-collapse -->
    </div>
  </nav>
    <!-- Sidebar -->

    <div id="sidebar-wrapper">
        <nav id="spy">
            
            <ul class="sidebar-nav nav">
                <li class="sidebar-brand">
                    <!-- <a href="#" target="iframe_ex" style="padding-left: 15px;"><img src="icon/home.png" class="img_medi" style="margin-right:6px;    margin-bottom: 12px;">Home</a> -->
                    <a href="#"  style="padding-left: 15px;"><img src="icon/home.png" class="img_medi" style="margin-right:6px;    margin-bottom: 12px;">Home</a>
                </li>
                <li>
                    <div class="panel-group" id="accordion">
                    <div class="panel cus-panel">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><img src="icon/medic.png" style="margin-right: 10px; margin-top: -1px;">Medicine</a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">
                        <a href="{{ url(('/')) }}/admin/medicine/create" target="iframe_ex"> <div class="panel-body">Add</div> </a>
                        <a href="{{ url(('/')) }}/admin/medicine" target="iframe_ex"> <div class="panel-body">View</div> </a>
                      </div>
                    </div>
                                   
               
                    <div class="panel cus-panel">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><img src="icon/pharmercy.png"  style="margin-right: 10px">Pharmacy</a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <a href="{{ url(('/')) }}/admin/pharmacy/create" target="iframe_ex"> <div class="panel-body">Add</div> </a>
                        <a href="{{ url(('/')) }}/admin/pharmacy" target="iframe_ex"> <div class="panel-body">view</div> </a>
                      </div>
                    </div>
               
                    <div class="panel cus-panel">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><img src="icon/doctor.png"  style="margin-right: 10px">Doctor</a>
                        </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">
                        <a href="{{ url(('/')) }}/admin/doctor/create" target="iframe_ex"> <div class="panel-body">Add</div> </a>
                        <a href="{{ url(('/')) }}/admin/doctor" target="iframe_ex"> <div class="panel-body">view</div> </a>
                      </div>
                    </div>
               
                    <div class="panel cus-panel">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><img src="icon/customer.png"  style="margin-right: 10px">Patient</a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse">
                        <a href="{{ url(('/')) }}/admin/patient/create" target="iframe_ex"> <div class="panel-body">Add</div> </a>
                        <a href="{{ url(('/')) }}/admin/patient" target="iframe_ex"> <div class="panel-body">view</div> </a>
                      </div>
                    </div>
                    <div class="panel cus-panel">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><img src="icon/customer.png"  style="margin-right: 10px">Prescription</a>
                        </h4>
                      </div>
                      <div id="collapse5" class="panel-collapse collapse">
                        <a href="{{ url(('/')) }}/doctor/prescription/create" target="iframe_ex"> <div class="panel-body">Add</div> </a>
                        <a href="{{ url(('/')) }}/doctor/prescription" target="iframe_ex"> <div class="panel-body">view</div> </a>
                      </div>
                    </div>
                  </div>
                </li>

            </ul>
        </nav>
    </div>
    <!-- Page content -->
    

    <div id="page-content-wrapper">
        <div id="div1" class="page-content">
         <iframe name="iframe_ex" class="set_iframe"></iframe>           
        </div>
    </div>
</div>


<!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/temp.js"></script>  
    </body>
</html>
