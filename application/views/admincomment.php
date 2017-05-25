<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()."assets/css/bootstrap.min.css"?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()."assets/css/sb-admin.css"?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()."assets/fonts/font-awesome.min.css"?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Page</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Selamat Datang, <?php echo $this->session->userdata('user'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                             <a href="<?php echo base_url()."index.php/Login/logout/"?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo base_url()."index.php/Admin_menu/load/"?>"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-edit"></i> Comment</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Forms
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Form Komen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d){ ?>
                        <tr>
                            <td>
                            <div class="row">
                                <form method="POST" action="<?php echo base_url()."index.php/Admin_comment/do_update"; ?>">
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" value="<?php echo $d['kode']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $d['nama']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">    
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?php echo $d['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">    
                                        <div class="form-group">
                                            <label>Komentar</label>
                                            <input class="form-control" name="komen" value="<?php echo $d['komen']; ?>" readonly>
                                        </div>
                                        <label>Reply :</label>
                                        
                                        
                                        <?php if($d['reply']== NULL) { ?>
                                        <div class="form-group">
                                            <textarea class="form-control" name="reply" rows="3"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Reply" />                                       
                                        
                                        <?php }else{ ?>
                                            <div class="form-group">
                                            <input class="form-control" name="reply" value="<?php echo $d['reply']; ?>" readonly>
                                        </div>
                                        <?php }?>
                                        
                                        
                                    </div>
                                </form>
                            </div>
                            </td>
                            <td>
                                <a href="<?php echo base_url()."index.php/Admin_comment/do_delete/".$d['kode']; ?>" class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                            <?php }?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/js/jquery.js"?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js"?>"></script>

</body>

</html>
