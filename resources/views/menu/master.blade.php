<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <base href="{{ asset('assets') }}/">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />
    <link href="libs/flot/css/float-chart.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet" />
    <link href="css/home.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="dist/js/menu-item.js"></script>
    <script src="dist/js/order.js"></script>
</head>

<body>
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <br>
                        <h2 class="logo-text"> POS</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <form  class="search-wrap">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="#" class="icontext">
                                <a href="#" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
                                    <i class="fa fa-home"></i>
                                </a>
                            </a>
                        </div> <!-- widget .// -->
                        <div class="widget-header dropdown">
                            <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
                            </div> <!--  dropdown-menu .// -->
                        </div> <!-- widget  dropdown.// -->
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section>
    <br>
    <section class="section-content padding-y-sm bg-home ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 card padding-y-sm pd-card" id="items">
                    <div class="row" id="menu-item"></div>
                </div>
                <div class="col-md-4">
                    <form id='add-order-form' method="post">
                        @csrf
                        <!-- Thêm CSRF token để bảo mật form -->

                        <div class="bg-total">
                            <span id="cart">
                                <table class="table table-hover shopping-cart-wrap">
                                    <thead class="text-muted">
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Customer Name" id="customer-name-input"
                                                        name="customer_name">
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col" width="120">Qty</th>
                                            <th scope="col" width="120">Price</th>
                                            <th scope="col" class="text-right" width="200">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="menu-table-body">

                                    </tbody>
                                </table>
                            </span>
                        </div>

                        <div class="box bg-total">
                            <dl class="dlist-align">
                                <dt>Total: </dt>
                                <div class="text-right h4 b total-price" data-value="" name="total_amount"></div>
                            </dl>
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-danger btn-error btn-lg btn-block" id="cancel-btn"><i
                                            class="fa fa-times-circle "></i> Cancel </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                            class="fa fa-shopping-bag"></i> Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="libs/flot/excanvas.js"></script>
    <script src="libs/flot/jquery.flot.js"></script>
    <script src="libs/flot/jquery.flot.pie.js"></script>
    <script src="libs/flot/jquery.flot.time.js"></script>
    <script src="libs/flot/jquery.flot.stack.js"></script>
    <script src="libs/flot/jquery.flot.crosshair.js"></script>
    <script src="libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
</body>

</html>
