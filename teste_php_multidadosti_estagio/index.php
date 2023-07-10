<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Multidados TI</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Teste");

            $.get("DataRequest.php", { type: "clientes" }, function(data) {
                console.log(data);
            });
        });
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">

<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="index.html">
            <img src="assets/img/logo.png" alt="logo" class="img-responsive"/>
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <?php
        include_once 'DataRequest.php';

        $dataRequest = new DataRequest();

        if (isset($_GET['type'])) {
            switch ($_GET['type']) {
                case 'clientes':
                    $data = $dataRequest->dadosClientes();
                    console.log($data);
                    break;
                case 'fornecedores':
                    $data = $dataRequest->dadosFornecedores();
                    console.log($data);
                    break;
                case 'usuarios':
                    $data = $dataRequest->dadosUsuarios();
                    console.log($data);
                    break;
                default:
                    $data = array();
                    $dataRequest->dadosClientes();
                    console.log($data);
                    console.log($dataRequest);
                    console.log('teste');

            }
        } else {
            $data = array();
        }

        $json = json_encode($data);

        echo $json;
        ?>
        <?php include 'PHP/cabecalho.php'; ?>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php include 'PHP/menu.php'; ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Dashboard <small>tudo que você precisa à um click.</small>
                    </h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="pull-right">
                            <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top"
                                 data-original-title="Change dashboard date range">
                                <i class="fa fa-calendar"></i>
                                <span>
								</span>
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS -->
            <?php
            $dataRequest = new DataRequest();
            $clientes = $dataRequest->dadosClientes('c');
            $usuarios = $dataRequest->dadosUsuarios('c');
            $fornecedores = $dataRequest->dadosFornecedores('c');
            ?>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $clientes; ?>
                            </div>
                            <div class="desc">
                                Clientes
                            </div>
                        </div>
                        <a class="more view-blue" href="#">
                            Visualizar <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $usuarios; ?>
                            </div>
                            <div class="desc">
                                Usuários
                            </div>
                        </div>
                        <a class="more view-green" href="#">
                            Visualizar <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $fornecedores; ?>
                            </div>
                            <div class="desc">
                                Fornecedores
                            </div>
                        </div>
                        <a class="more view-purple" href="#">
                            Visualizar <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <!-- END DASHBOARD STATS -->
                <div class="clearfix">
                </div>
                <!--Tabela-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box grey">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-folder-open"></i>Tabela Simples
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Nome
                                            </th>
                                            <th>
                                                Sobrenome
                                            </th>
                                            <th>
                                                Usuario
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                Mark
                                            </td>
                                            <td>
                                                Otto
                                            </td>
                                            <td>
                                                makr124
                                            </td>
                                            <td>
                                    <span class="label label-sm label-success">
                                        Aprovado
                                    </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                Jacob
                                            </td>
                                            <td>
                                                Nilson
                                            </td>
                                            <td>
                                                jac123
                                            </td>
                                            <td>
                                    <span class="label label-sm label-info">
                                        Pendente
                                    </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                Larry
                                            </td>
                                            <td>
                                                Cooper
                                            </td>
                                            <td>
                                                lar
                                            </td>
                                            <td>
                                    <span class="label label-sm label-warning">
                                        Suspenso
                                    </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                                Sandy
                                            </td>
                                            <td>
                                                Lim
                                            </td>
                                            <td>
                                                sanlim
                                            </td>
                                            <td>
                                    <span class="label label-sm label-danger">
                                        Bloqueado
                                    </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php include 'PHP/rodape.php'; ?>

    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"
            type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.cockie.min.js" type="text/javascript"></script>
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/scripts/app.js" type="text/javascript"></script>
    <script src="assets/scripts/index.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function() {
            function updateTable(data) {
                var table = $('.table-hover');
                var tableBody = table.find('tbody');
                var tableHead = table.find('thead');
                tableBody.empty();
                tableHead.empty();

                if(data.length > 0) {
                    var headerRow = '<tr><th>#</th>';
                    for (var key in data[0]) {
                        if(key !== 'statusClass') {
                            headerRow += `<th>${key.charAt(0).toUpperCase() + key.slice(1)}</th>`;
                        }
                    }
                    headerRow += '</tr>';
                    tableHead.append(headerRow);

                    $.each(data, function(index, row) {
                        var rowIndex = index + 1;
                        var htmlRow = `<tr><td>${rowIndex}</td>`;
                        for (var key in row) {
                            if(key !== 'statusClass') {
                                if(key === 'status') {
                                    htmlRow += `<td><span class="label label-sm ${row.statusClass}">${row[key]}</span></td>`;
                                } else {
                                    htmlRow += `<td>${row[key]}</td>`;
                                }
                            }
                        }
                        htmlRow += '</tr>';
                        tableBody.append(htmlRow);
                    });
                }
            }

            $('.more').on('click', function(e) {
                e.preventDefault();

                var action;
                if ($(this).hasClass('view-blue')) {
                    action = 'getClientData';
                } else if ($(this).hasClass('view-green')) {
                    action = 'getUserData';
                } else if ($(this).hasClass('view-purple')) {
                    action = 'getSupplierData';
                } else {
                    console.error('Ação desconhecida');
                    return;
                }

                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: { action: action },
                    dataType: 'json',
                    success: function(data) {
                        updateTable(data);
                        console.log(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                    },
                    complete: function() {
                        setTimeout(function(){
                            console.log("Ação finalizada.");
                        }, 3000);
                    }
                });
            });

            var tableBox = document.querySelector('.portlet.box.grey');

            document.querySelector('.view-blue').addEventListener('click', function (event) {
                event.preventDefault();
                tableBox.classList.remove('green', 'purple');
                tableBox.classList.add('blue');
            });

            document.querySelector('.view-green').addEventListener('click', function (event) {
                event.preventDefault();
                tableBox.classList.remove('blue', 'purple');
                tableBox.classList.add('green');
            });

            document.querySelector('.view-purple').addEventListener('click', function (event) {
                event.preventDefault();
                tableBox.classList.remove('blue', 'green');
                tableBox.classList.add('purple');
            });
        });

    </script>
    <script>
        jQuery(document).ready(function () {
            App.init();
            Index.init();
        });
    </script>
</body>
</html>