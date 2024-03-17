@extends('user.main')
@section('title', 'Dashboard')


@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@push('pagestyles')
@endpush



@push('pagescripts')
    <!-- apexcharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('backend/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('backend/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('backend/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
@endpush




@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Statistics</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">
                    <div class="">
                        <div class="row  ">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">{{ showGreetings() }}, {{ auth()->user()->full_name }}!</h4>
                                        <p class="text-muted mb-0">Let's start Earning.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">

                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row ">
                            <div class="col-xl-12">
                                <div class="card">


                                </div><!-- end card -->
                            </div><!-- end col -->

                        </div>

                        <div class="row d-none">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                        <div>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                ALL
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                1M
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                6M
                                            </button>
                                            <button type="button" class="btn btn-soft-primary btn-sm">
                                                1Y
                                            </button>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-header p-0 border-0 bg-light-subtle">
                                        <div class="row g-0 text-center">
                                            <div class="col-6 col-sm-3">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            data-target="7585">0</span></h5>
                                                    <p class="text-muted mb-0">Orders</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-3">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1">$<span class="counter-value"
                                                            data-target="22.89">0</span>k</h5>
                                                    <p class="text-muted mb-0">Earnings</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-3">
                                                <div class="p-3 border border-dashed border-start-0">
                                                    <h5 class="mb-1"><span class="counter-value"
                                                            data-target="367">0</span></h5>
                                                    <p class="text-muted mb-0">Refunds</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-sm-3">
                                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                    <h5 class="mb-1 text-success"><span class="counter-value"
                                                            data-target="18.92">0</span>%</h5>
                                                    <p class="text-muted mb-0">Conversation Ratio</p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body p-0 pb-2">
                                        <div class="w-100">
                                            <div id="customer_impression_charts"
                                                data-colors='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]'
                                                class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-4">
                                <!-- card -->
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Sales by Locations</h4>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-primary btn-sm">
                                                Export Report
                                            </button>
                                        </div>
                                    </div><!-- end card header -->

                                    <!-- card body -->
                                    <div class="card-body">

                                        <div id="sales-by-locations"
                                            data-colors='["--vz-light", "--vz-secondary", "--vz-primary"]'
                                            style="height: 269px" dir="ltr"></div>

                                        <div class="px-2 py-2 mt-1">
                                            <p class="mb-1">Canada <span class="float-end">75%</span></p>
                                            <div class="progress mt-2" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="75"></div>
                                            </div>

                                            <p class="mt-3 mb-1">Greenland <span class="float-end">47%</span>
                                            </p>
                                            <div class="progress mt-2" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                                    style="width: 47%" aria-valuenow="47" aria-valuemin="0"
                                                    aria-valuemax="47"></div>
                                            </div>

                                            <p class="mt-3 mb-1">Russia <span class="float-end">82%</span>
                                            </p>
                                            <div class="progress mt-2" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped bg-primary"
                                                    role="progressbar" style="width: 82%" aria-valuenow="82"
                                                    aria-valuemin="0" aria-valuemax="82"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

                        <div class="row d-none">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fw-semibold text-uppercase fs-12">Sort by:
                                                    </span><span class="text-muted">Today<i
                                                            class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Yesterday</a>
                                                    <a class="dropdown-item" href="#">Last 7 Days</a>
                                                    <a class="dropdown-item" href="#">Last 30 Days</a>
                                                    <a class="dropdown-item" href="#">This Month</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                    <img src="assets/images/products/img-1.png"
                                                                        alt="" class="img-fluid d-block" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-reset">Branded
                                                                            T-Shirts</a></h5>
                                                                    <span class="text-muted">24 Apr
                                                                        2021</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$29.00</h5>
                                                            <span class="text-muted">Price</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">62</h5>
                                                            <span class="text-muted">Orders</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">510</h5>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$1,798</h5>
                                                            <span class="text-muted">Amount</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                    <img src="assets/images/products/img-2.png"
                                                                        alt="" class="img-fluid d-block" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-reset">Bentwood
                                                                            Chair</a></h5>
                                                                    <span class="text-muted">19 Mar
                                                                        2021</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$85.20</h5>
                                                            <span class="text-muted">Price</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">35</h5>
                                                            <span class="text-muted">Orders</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal"><span
                                                                    class="badge bg-danger-subtle text-danger">Out
                                                                    of stock</span> </h5>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$2982</h5>
                                                            <span class="text-muted">Amount</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                    <img src="assets/images/products/img-3.png"
                                                                        alt="" class="img-fluid d-block" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-reset">Borosil Paper
                                                                            Cup</a></h5>
                                                                    <span class="text-muted">01 Mar
                                                                        2021</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$14.00</h5>
                                                            <span class="text-muted">Price</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">80</h5>
                                                            <span class="text-muted">Orders</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">749</h5>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$1120</h5>
                                                            <span class="text-muted">Amount</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                    <img src="assets/images/products/img-4.png"
                                                                        alt="" class="img-fluid d-block" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-reset">One Seater
                                                                            Sofa</a></h5>
                                                                    <span class="text-muted">11 Feb
                                                                        2021</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$127.50</h5>
                                                            <span class="text-muted">Price</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">56</h5>
                                                            <span class="text-muted">Orders</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal"><span
                                                                    class="badge bg-danger-subtle text-danger">Out
                                                                    of stock</span></h5>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$7140</h5>
                                                            <span class="text-muted">Amount</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                    <img src="assets/images/products/img-5.png"
                                                                        alt="" class="img-fluid d-block" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-reset">Stillbird
                                                                            Helmet</a></h5>
                                                                    <span class="text-muted">17 Jan
                                                                        2021</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$54</h5>
                                                            <span class="text-muted">Price</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">74</h5>
                                                            <span class="text-muted">Orders</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">805</h5>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 my-1 fw-normal">$3996</h5>
                                                            <span class="text-muted">Amount</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div
                                            class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                            <div class="col-sm">
                                                <div class="text-muted">
                                                    Showing <span class="fw-semibold">5</span> of <span
                                                        class="fw-semibold">25</span> Results
                                                </div>
                                            </div>
                                            <div class="col-sm-auto  mt-3 mt-sm-0">
                                                <ul
                                                    class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link">←</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">→</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Top Sellers</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Report<i
                                                            class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Download
                                                        Report</a>
                                                    <a class="dropdown-item" href="#">Export</a>
                                                    <a class="dropdown-item" href="#">Import</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/companies/img-1.png"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div>
                                                                    <h5 class="fs-14 my-1 fw-medium">
                                                                        <a href="apps-ecommerce-seller-details.html"
                                                                            class="text-reset">iTest
                                                                            Factory</a>
                                                                    </h5>
                                                                    <span class="text-muted">Oliver
                                                                        Tyler</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">Bags and Wallets</span>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">8547</p>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">$541200</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 mb-0">32%<i
                                                                    class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                            </h5>
                                                        </td>
                                                    </tr><!-- end -->
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/companies/img-2.png"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="apps-ecommerce-seller-details.html"
                                                                            class="text-reset">Digitech
                                                                            Galaxy</a></h5>
                                                                    <span class="text-muted">John
                                                                        Roberts</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">Watches</span>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">895</p>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">$75030</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 mb-0">79%<i
                                                                    class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                            </h5>
                                                        </td>
                                                    </tr><!-- end -->
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/companies/img-3.png"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div class="flex-gow-1">
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="apps-ecommerce-seller-details.html"
                                                                            class="text-reset">Nesta
                                                                            Technologies</a></h5>
                                                                    <span class="text-muted">Harley
                                                                        Fuller</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">Bike Accessories</span>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">3470</p>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">$45600</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 mb-0">90%<i
                                                                    class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                            </h5>
                                                        </td>
                                                    </tr><!-- end -->
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/companies/img-8.png"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 my-1 fw-medium"><a
                                                                            href="apps-ecommerce-seller-details.html"
                                                                            class="text-reset">Zoetic
                                                                            Fashion</a></h5>
                                                                    <span class="text-muted">James
                                                                        Bowen</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">Clothes</span>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">5488</p>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">$29456</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 mb-0">40%<i
                                                                    class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                            </h5>
                                                        </td>
                                                    </tr><!-- end -->
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/companies/img-5.png"
                                                                        alt="" class="avatar-sm p-2" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 my-1 fw-medium">
                                                                        <a href="apps-ecommerce-seller-details.html"
                                                                            class="text-reset">Meta4Systems</a>
                                                                    </h5>
                                                                    <span class="text-muted">Zoe Dennis</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">Furniture</span>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">4100</p>
                                                            <span class="text-muted">Stock</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">$11260</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 mb-0">57%<i
                                                                    class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                            </h5>
                                                        </td>
                                                    </tr><!-- end -->
                                                </tbody>
                                            </table><!-- end table -->
                                        </div>

                                        <div
                                            class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                            <div class="col-sm">
                                                <div class="text-muted">
                                                    Showing <span class="fw-semibold">5</span> of <span
                                                        class="fw-semibold">25</span> Results
                                                </div>
                                            </div>
                                            <div class="col-sm-auto  mt-3 mt-sm-0">
                                                <ul
                                                    class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link">←</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">→</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div> <!-- .card-body-->
                                </div> <!-- .card-->
                            </div> <!-- .col-->
                        </div> <!-- end row-->

                        <div class="row d-none">
                            <div class="col-xl-4">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Store Visits by Source</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Report<i
                                                            class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Download
                                                        Report</a>
                                                    <a class="dropdown-item" href="#">Export</a>
                                                    <a class="dropdown-item" href="#">Import</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div id="store-visits-source"
                                            data-colors='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                                            class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div> <!-- .card-->
                            </div> <!-- .col-->

                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-info btn-sm">
                                                <i class="ri-file-list-3-line align-middle"></i> Generate
                                                Report
                                            </button>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-light">
                                                    <tr>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Vendor</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Rating</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html"
                                                                class="fw-medium link-primary">#VZ2112</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-1.jpg"
                                                                        alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Alex Smith</div>
                                                            </div>
                                                        </td>
                                                        <td>Clothes</td>
                                                        <td>
                                                            <span class="text-success">$109.00</span>
                                                        </td>
                                                        <td>Zoetic Fashion</td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">5.0<span
                                                                    class="text-muted fs-11 ms-1">(61
                                                                    votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html"
                                                                class="fw-medium link-primary">#VZ2111</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-2.jpg"
                                                                        alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Jansh Brown</div>
                                                            </div>
                                                        </td>
                                                        <td>Kitchen Storage</td>
                                                        <td>
                                                            <span class="text-success">$149.00</span>
                                                        </td>
                                                        <td>Micro Design</td>
                                                        <td>
                                                            <span
                                                                class="badge bg-warning-subtle text-warning">Pending</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.5<span
                                                                    class="text-muted fs-11 ms-1">(61
                                                                    votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html"
                                                                class="fw-medium link-primary">#VZ2109</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-3.jpg"
                                                                        alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Ayaan Bowen</div>
                                                            </div>
                                                        </td>
                                                        <td>Bike Accessories</td>
                                                        <td>
                                                            <span class="text-success">$215.00</span>
                                                        </td>
                                                        <td>Nesta Technologies</td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.9<span
                                                                    class="text-muted fs-11 ms-1">(89
                                                                    votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html"
                                                                class="fw-medium link-primary">#VZ2108</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-4.jpg"
                                                                        alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Prezy Mark</div>
                                                            </div>
                                                        </td>
                                                        <td>Furniture</td>
                                                        <td>
                                                            <span class="text-success">$199.00</span>
                                                        </td>
                                                        <td>Syntyce Solutions</td>
                                                        <td>
                                                            <span class="badge bg-danger-subtle text-danger">Unpaid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.3<span
                                                                    class="text-muted fs-11 ms-1">(47
                                                                    votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <a href="apps-ecommerce-order-details.html"
                                                                class="fw-medium link-primary">#VZ2107</a>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img src="assets/images/users/avatar-6.jpg"
                                                                        alt="" class="avatar-xs rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">Vihan Hudda</div>
                                                            </div>
                                                        </td>
                                                        <td>Bags and Wallets</td>
                                                        <td>
                                                            <span class="text-success">$330.00</span>
                                                        </td>
                                                        <td>iTest Factory</td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-medium mb-0">4.7<span
                                                                    class="text-muted fs-11 ms-1">(161
                                                                    votes)</span></h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                </div> <!-- .card-->
                            </div> <!-- .col-->
                        </div> <!-- end row-->

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->

                <div class="col-auto layout-rightside-col d-none">
                    <div class="overlay"></div>
                    <div class="layout-rightside">
                        <div class="card h-100 rounded-0 card-border-effect-none">
                            <div class="card-body p-0">
                                <div class="p-3">
                                    <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity
                                    </h6>
                                </div>
                                <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                                    <div class="acitivity-timeline acitivity-main">
                                        <div class="acitivity-item d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                                <p class="text-muted mb-1">Product noise evolve smartwatch
                                                </p>
                                                <small class="mb-0 text-muted">02:14 PM Today</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                                    <i class="ri-stack-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Added new <span class="fw-semibold">style
                                                        collection</span></h6>
                                                <p class="text-muted mb-1">By Nesta Technologies</p>
                                                <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                                    <a href="apps-ecommerce-product-details.html"
                                                        class="bg-light rounded p-1">
                                                        <img src="assets/images/products/img-8.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </a>
                                                    <a href="apps-ecommerce-product-details.html"
                                                        class="bg-light rounded p-1">
                                                        <img src="assets/images/products/img-2.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </a>
                                                    <a href="apps-ecommerce-product-details.html"
                                                        class="bg-light rounded p-1">
                                                        <img src="assets/images/products/img-10.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </a>
                                                </div>
                                                <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                    class="avatar-xs rounded-circle acitivity-avatar">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Natasha Carey have liked the products
                                                </h6>
                                                <p class="text-muted mb-1">Allow users to like products in
                                                    your WooCommerce store.</p>
                                                <small class="mb-0 text-muted">25 Dec, 2021</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs acitivity-avatar">
                                                    <div class="avatar-title rounded-circle bg-secondary">
                                                        <i class="mdi mdi-sale fs-14"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Today offers by <a
                                                        href="apps-ecommerce-seller-details.html"
                                                        class="link-secondary">Digitech Galaxy</a></h6>
                                                <p class="text-muted mb-2">Offer is valid on orders of Rs.500
                                                    Or above for selected products only.</p>
                                                <small class="mb-0 text-muted">12 Dec, 2021</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs acitivity-avatar">
                                                    <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                        <i class="ri-bookmark-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Favorite Product</h6>
                                                <p class="text-muted mb-2">Esther James have Favorite product.
                                                </p>
                                                <small class="mb-0 text-muted">25 Nov, 2021</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs acitivity-avatar">
                                                    <div class="avatar-title rounded-circle bg-secondary">
                                                        <i class="mdi mdi-sale fs-14"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Flash sale starting <span
                                                        class="text-primary">Tomorrow.</span></h6>
                                                <p class="text-muted mb-0">Flash sale by <a href="javascript:void(0);"
                                                        class="link-secondary fw-medium">Zoetic Fashion</a>
                                                </p>
                                                <small class="mb-0 text-muted">22 Oct, 2021</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs acitivity-avatar">
                                                    <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                        <i class="ri-line-chart-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                                <p class="text-muted mb-2"><span class="text-danger">2 days
                                                        left</span> notification to submit the monthly sales
                                                    report. <a href="javascript:void(0);"
                                                        class="link-warning text-decoration-underline">Reports
                                                        Builder</a></p>
                                                <small class="mb-0 text-muted">15 Oct</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                    class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 lh-base">Frank Hook Commented</h6>
                                                <p class="text-muted mb-2 fst-italic">" A product that has
                                                    reviews is more likable to be sold than a product. "</p>
                                                <small class="mb-0 text-muted">26 Aug, 2021</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3 mt-2">
                                    <h6 class="text-muted mb-3 text-uppercase fw-semibold">Top 10 Categories
                                    </h6>

                                    <ol class="ps-3 text-muted">
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Mobile & Accessories <span
                                                    class="float-end">(10,294)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Desktop <span
                                                    class="float-end">(6,256)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Electronics <span
                                                    class="float-end">(3,479)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Home & Furniture <span
                                                    class="float-end">(2,275)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Grocery <span
                                                    class="float-end">(1,950)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Fashion <span
                                                    class="float-end">(1,582)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Appliances <span
                                                    class="float-end">(1,037)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Beauty, Toys & More <span
                                                    class="float-end">(924)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Food & Drinks <span
                                                    class="float-end">(701)</span></a>
                                        </li>
                                        <li class="py-1">
                                            <a href="#" class="text-muted">Toys & Games <span
                                                    class="float-end">(239)</span></a>
                                        </li>
                                    </ol>
                                    <div class="mt-3 text-center">
                                        <a href="javascript:void(0);" class="text-muted text-decoration-underline">View
                                            all
                                            Categories</a>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h6 class="text-muted mb-3 text-uppercase fw-semibold">Products Reviews
                                    </h6>
                                    <!-- Swiper -->
                                    <div class="swiper vertical-swiper" style="height: 250px;">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="card border border-dashed shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-sm">
                                                                <div class="avatar-title bg-light rounded">
                                                                    <img src="assets/images/companies/img-1.png"
                                                                        alt="" height="30">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div>
                                                                    <p
                                                                        class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                        " Great product and looks great, lots of
                                                                        features. "</p>
                                                                    <div class="fs-11 align-middle text-warning">
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="text-end mb-0 text-muted">
                                                                    - by <cite title="Source Title">Force
                                                                        Medicines</cite>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card border border-dashed shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                    class="avatar-sm rounded">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div>
                                                                    <p
                                                                        class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                        " Amazing template, very easy to
                                                                        understand and manipulate. "</p>
                                                                    <div class="fs-11 align-middle text-warning">
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-half-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="text-end mb-0 text-muted">
                                                                    - by <cite title="Source Title">Henry
                                                                        Baird</cite>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card border border-dashed shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-sm">
                                                                <div class="avatar-title bg-light rounded">
                                                                    <img src="assets/images/companies/img-8.png"
                                                                        alt="" height="30">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div>
                                                                    <p
                                                                        class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                        "Very beautiful product and Very helpful
                                                                        customer service."</p>
                                                                    <div class="fs-11 align-middle text-warning">
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-line"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="text-end mb-0 text-muted">
                                                                    - by <cite title="Source Title">Zoetic
                                                                        Fashion</cite>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card border border-dashed shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                    class="avatar-sm rounded">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <div>
                                                                    <p
                                                                        class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                        " The product is very beautiful. I like
                                                                        it. "</p>
                                                                    <div class="fs-11 align-middle text-warning">
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-fill"></i>
                                                                        <i class="ri-star-half-fill"></i>
                                                                        <i class="ri-star-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="text-end mb-0 text-muted">
                                                                    - by <cite title="Source Title">Nancy
                                                                        Martino</cite>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="text-muted mb-3 text-uppercase fw-semibold">Customer Reviews
                                    </h6>
                                    <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="fs-16 align-middle text-warning">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <h6 class="mb-0">4.5 out of 5</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-muted">Total <span class="fw-medium">5.50k</span>
                                            reviews</div>
                                    </div>

                                    <div class="mt-3">
                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0">5 star</h6>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="p-1">
                                                    <div class="progress animated-progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0 text-muted">2758</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0">4 star</h6>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="p-1">
                                                    <div class="progress animated-progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0 text-muted">1063</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0">3 star</h6>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="p-1">
                                                    <div class="progress animated-progress progress-sm">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0 text-muted">997</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0">2 star</h6>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="p-1">
                                                    <div class="progress animated-progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0 text-muted">227</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0">1 star</h6>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="p-1">
                                                    <div class="progress animated-progress progress-sm">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="p-1">
                                                    <h6 class="mb-0 text-muted">408</h6>
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                    </div>
                                </div>

                                <div class="card sidebar-alert bg-light border-0 text-center mx-4 mb-0 mt-3">
                                    <div class="card-body">
                                        <img src="assets/images/giftbox.png" alt="">
                                        <div class="mt-4">
                                            <h5>Invite New Seller</h5>
                                            <p class="text-muted lh-base">Refer a new seller to us and earn
                                                $100 per refer.</p>
                                            <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                                    class="ri-mail-fill label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                Invite Now</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end .rightbar-->

                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-xxl-3">
                    <div class="card card-height-100">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Mine</h4>

                        </div><!-- end cardheader -->
                        <div class="card-body">

                            <div>
                                <button class="btn btn-primary btn-lg btn-rounded" id="start-mining"
                                    data-id="{{ auth()->id() }}">Start Mining</button>
                            </div>

                            <ul class="list-group list-group-flush border-dashed mb-0 mt-3 pt-2">
                                <li class="list-group-item px-0">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <span class="avatar-title bg-light p-1 rounded-circle">
                                                <img src="{{ asset('backend/assets/images/svg/crypto-icons/btc.svg') }}"
                                                    class="img-fluid" alt="">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-1">Bitcoin</h6>
                                            <p class="fs-12 mb-0 text-muted"><i
                                                    class="mdi mdi-circle fs-10 align-middle text-primary me-1"></i>BTC
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0 text-end">
                                            <h6 class="mb-1">BTC 0.00584875</h6>
                                            <p class="text-success fs-12 mb-0">$19,405.12</p>
                                        </div>
                                    </div>
                                </li><!-- end -->
                                <li class="list-group-item px-0">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <span class="avatar-title bg-light p-1 rounded-circle">
                                                <img src="assets/images/svg/crypto-icons/eth.svg" class="img-fluid"
                                                    alt="">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-1">Ethereum</h6>
                                            <p class="fs-12 mb-0 text-muted"><i
                                                    class="mdi mdi-circle fs-10 align-middle text-info me-1"></i>ETH </p>
                                        </div>
                                        <div class="flex-shrink-0 text-end">
                                            <h6 class="mb-1">ETH 2.25842108</h6>
                                            <p class="text-danger fs-12 mb-0">$40552.18</p>
                                        </div>
                                    </div>
                                </li><!-- end -->
                                <li class="list-group-item px-0">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <span class="avatar-title bg-light p-1 rounded-circle">
                                                <img src="assets/images/svg/crypto-icons/ltc.svg" class="img-fluid"
                                                    alt="">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-1">Litecoin</h6>
                                            <p class="fs-12 mb-0 text-muted"><i
                                                    class="mdi mdi-circle fs-10 align-middle text-warning me-1"></i>LTC
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0 text-end">
                                            <h6 class="mb-1">LTC 10.58963217</h6>
                                            <p class="text-success fs-12 mb-0">$15824.58</p>
                                        </div>
                                    </div>
                                </li><!-- end -->
                                <li class="list-group-item px-0 pb-0">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <span class="avatar-title bg-light p-1 rounded-circle">
                                                <img src="assets/images/svg/crypto-icons/dash.svg" class="img-fluid"
                                                    alt="">
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-1">Dash</h6>
                                            <p class="fs-12 mb-0 text-muted"><i
                                                    class="mdi mdi-circle fs-10 align-middle text-success me-1"></i>DASH
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0 text-end">
                                            <h6 class="mb-1">DASH 204.28565885</h6>
                                            <p class="text-success fs-12 mb-0">$30635.84</p>
                                        </div>
                                    </div>
                                </li><!-- end -->
                            </ul><!-- end -->
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xxl-9 order-xxl-0 order-first">
                    <div class="d-flex flex-column h-100">
                        <div class="row h-100">
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-money-dollar-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Invested
                                                </p>
                                                <h4 class=" mb-0">$<span class="counter-value"
                                                        data-target="2390.68">2,390.68</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge bg-success-subtle text-success"><i
                                                        class="ri-arrow-up-s-fill align-middle me-1"></i>6.24 %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-arrow-up-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> Total Change
                                                </p>
                                                <h4 class=" mb-0">$<span class="counter-value"
                                                        data-target="19523.25">19,523.25</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge bg-success-subtle text-success"><i
                                                        class="ri-arrow-up-s-fill align-middle me-1"></i>3.67 %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-arrow-down-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Day Change</p>
                                                <h4 class=" mb-0">$<span class="counter-value"
                                                        data-target="14799.44">14,799.44</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge bg-danger-subtle text-danger"><i
                                                        class="ri-arrow-down-s-fill align-middle me-1"></i>4.80 %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Market Graph</h4>
                                        <div>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                1H
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                7D
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                1M
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                1Y
                                            </button>
                                            <button type="button" class="btn btn-soft-primary btn-sm">
                                                ALL
                                            </button>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body p-0">
                                        <div
                                            class="bg-light-subtle border-top-dashed border border-start-0 border-end-0 border-bottom-dashed py-3 px-4">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <div class="d-flex flex-wrap gap-4 align-items-center">
                                                        <h5 class="fs-19 mb-0">0.014756</h5>
                                                        <p class="fw-medium text-muted mb-0">$75.69 <span
                                                                class="text-success fs-11 ms-1">+1.99%</span></p>
                                                        <p class="fw-medium text-muted mb-0">High <span
                                                                class="text-body fs-11 ms-1">0.014578</span></p>
                                                        <p class="fw-medium text-muted mb-0">Low <span
                                                                class="text-body fs-11 ms-1">0.0175489</span></p>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-6">
                                                    <div class="d-flex">
                                                        <div
                                                            class="d-flex justify-content-end text-end flex-wrap gap-4 ms-auto">
                                                            <div class="pe-3">
                                                                <h6 class="mb-2 text-truncate text-muted">Total Balance
                                                                </h6>
                                                                <h5 class="mb-0">$72.8k</h5>

                                                            </div>
                                                            <div class="pe-3">
                                                                <h6 class="mb-2 text-muted">Profit</h6>
                                                                <h5 class="text-success mb-0">+$49.7k</h5>
                                                            </div>
                                                            <div class="pe-3">
                                                                <h6 class="mb-2 text-muted">Loss</h6>
                                                                <h5 class="text-danger mb-0">-$23.1k</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end cardbody -->
                                    <div class="card-body p-0 pb-3">
                                        <div id="Market_chart"
                                            data-colors="[&quot;--vz-success&quot;, &quot;--vz-danger&quot;]"
                                            class="apex-charts" dir="ltr" style="min-height: 309px;">
                                            <div id="apexchartss03i0mc5"
                                                class="apexcharts-canvas apexchartss03i0mc5 apexcharts-theme-light"
                                                style="width: 849px; height: 294px;"><svg id="SvgjsSvg1641"
                                                    width="849" height="294" xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev"
                                                    class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                                    transform="translate(0, 0)" style="background: transparent;">
                                                    <foreignObject x="0" y="0" width="849" height="294">
                                                        <div class="apexcharts-legend"
                                                            xmlns="http://www.w3.org/1999/xhtml"
                                                            style="max-height: 147px;"></div>
                                                    </foreignObject>
                                                    <rect id="SvgjsRect1647" width="0" height="0" x="0" y="0"
                                                        rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                                    <g id="SvgjsG1822" class="apexcharts-yaxis" rel="0"
                                                        transform="translate(31.96875, 0)">
                                                        <g id="SvgjsG1823" class="apexcharts-yaxis-texts-g"><text
                                                                id="SvgjsText1825"
                                                                font-family="Helvetica, Arial, sans-serif" x="20" y="31.5"
                                                                text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1826">$6660</tspan>
                                                                <title>$6660</title>
                                                            </text><text id="SvgjsText1828"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="76.74" text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1829">$6640</tspan>
                                                                <title>$6640</title>
                                                            </text><text id="SvgjsText1831"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="121.97999999999999" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1832">$6620</tspan>
                                                                <title>$6620</title>
                                                            </text><text id="SvgjsText1834"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="167.21999999999997" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1835">$6600</tspan>
                                                                <title>$6600</title>
                                                            </text><text id="SvgjsText1837"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="212.45999999999998" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1838">$6580</tspan>
                                                                <title>$6580</title>
                                                            </text><text id="SvgjsText1840"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="257.7" text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1841">$6560</tspan>
                                                                <title>$6560</title>
                                                            </text></g>
                                                    </g>
                                                    <g id="SvgjsG1643" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(77.11475988700565, 30)">
                                                        <defs id="SvgjsDefs1642">
                                                            <clipPath id="gridRectMasks03i0mc5">
                                                                <rect id="SvgjsRect1680" width="781.7392302259886"
                                                                    height="227.2" x="-14.5" y="-0.5" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMasks03i0mc5"></clipPath>
                                                            <clipPath id="nonForecastMasks03i0mc5"></clipPath>
                                                            <clipPath id="gridRectMarkerMasks03i0mc5">
                                                                <rect id="SvgjsRect1681" width="758.7392302259886"
                                                                    height="230.2" x="-2" y="-2" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fff"></rect>
                                                            </clipPath>
                                                        </defs>
                                                        <line id="SvgjsLine1648" x1="0" y1="0"
                                                            x2="0" y2="226.2" stroke="#b6b6b6"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                            height="226.2" fill="#b1b9c4" filter="none"
                                                            fill-opacity="0.9" stroke-width="1"></line>
                                                        <line id="SvgjsLine1749" x1="12.792190342813365"
                                                            y1="227.2" x2="12.792190342813365" y2="233.2"
                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                            stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1750" x1="63.96095171406682" y1="227.2"
                                                            x2="63.96095171406682" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1751" x1="115.12971308532028"
                                                            y1="227.2" x2="115.12971308532028" y2="233.2"
                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                            stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1752" x1="166.29847445657376"
                                                            y1="227.2" x2="166.29847445657376" y2="233.2"
                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                            stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1753" x1="217.46723582782724"
                                                            y1="227.2" x2="217.46723582782724" y2="233.2"
                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                            stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1754" x1="268.6359971990807" y1="227.2"
                                                            x2="268.6359971990807" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1755" x1="319.8047585703342" y1="227.2"
                                                            x2="319.8047585703342" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1756" x1="370.97351994158765"
                                                            y1="227.2" x2="370.97351994158765" y2="233.2"
                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                            stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1757" x1="422.14228131284113"
                                                            y1="227.2" x2="422.14228131284113" y2="233.2"
                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                            stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1758" x1="473.3110426840946" y1="227.2"
                                                            x2="473.3110426840946" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1759" x1="524.479804055348" y1="227.2"
                                                            x2="524.479804055348" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1760" x1="575.6485654266014" y1="227.2"
                                                            x2="575.6485654266014" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1761" x1="626.8173267978548" y1="227.2"
                                                            x2="626.8173267978548" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1762" x1="677.9860881691081" y1="227.2"
                                                            x2="677.9860881691081" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1763" x1="729.1548495403615" y1="227.2"
                                                            x2="729.1548495403615" y2="233.2" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <g id="SvgjsG1745" class="apexcharts-grid">
                                                            <g id="SvgjsG1746" class="apexcharts-gridlines-horizontal">
                                                                <line id="SvgjsLine1765" x1="-11.14600988700565"
                                                                    y1="45.239999999999995" x2="765.8852401129943"
                                                                    y2="45.239999999999995" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1766" x1="-11.14600988700565"
                                                                    y1="90.47999999999999" x2="765.8852401129943"
                                                                    y2="90.47999999999999" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1767" x1="-11.14600988700565"
                                                                    y1="135.71999999999997" x2="765.8852401129943"
                                                                    y2="135.71999999999997" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1768" x1="-11.14600988700565"
                                                                    y1="180.95999999999998" x2="765.8852401129943"
                                                                    y2="180.95999999999998" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG1747" class="apexcharts-gridlines-vertical">
                                                            </g>
                                                            <line id="SvgjsLine1771" x1="0" y1="226.2"
                                                                x2="754.7392302259886" y2="226.2"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine1770" x1="0" y1="1"
                                                                x2="0" y2="226.2" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG1682"
                                                            class="apexcharts-candlestick-series apexcharts-plot-series">
                                                            <g id="SvgjsG1683" class="apexcharts-series"
                                                                seriesName="series-1" rel="1"
                                                                data:realIndex="0">
                                                                <path id="SvgjsPath1685"
                                                                    d="M -4.477266619984678 60.327540000000226 L 0 60.327540000000226 L 0 21.488999999999578 L 0 60.327540000000226 L 4.477266619984678 60.327540000000226 L 4.477266619984678 68.28977999999915 L 0 68.28977999999915 L 0 83.60352000000057 L 0 68.28977999999915 L -4.477266619984678 68.28977999999915 L -4.477266619984678 59.827540000000226"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M -4.477266619984678 60.327540000000226 L 0 60.327540000000226 L 0 21.488999999999578 L 0 60.327540000000226 L 4.477266619984678 60.327540000000226 L 4.477266619984678 68.28977999999915 L 0 68.28977999999915 L 0 83.60352000000057 L 0 68.28977999999915 L -4.477266619984678 68.28977999999915 L -4.477266619984678 59.827540000000226"
                                                                    pathFrom="M 0 68.28977999999915M -4.477266619984678 68.28977999999915"
                                                                    cy="60.327540000000226" cx="3.977266619984678" j="0"
                                                                    val="6633.33" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1686"
                                                                    d="M 8.314923722828688 63.3133799999996 L 12.792190342813367 63.3133799999996 L 12.792190342813367 37.11941999999908 L 12.792190342813367 63.3133799999996 L 17.269456962798046 63.3133799999996 L 17.269456962798046 67.6111800000017 L 12.792190342813367 67.6111800000017 L 12.792190342813367 90.47999999999956 L 12.792190342813367 67.6111800000017 L 8.314923722828688 67.6111800000017 L 8.314923722828688 62.8133799999996"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 8.314923722828688 63.3133799999996 L 12.792190342813367 63.3133799999996 L 12.792190342813367 37.11941999999908 L 12.792190342813367 63.3133799999996 L 17.269456962798046 63.3133799999996 L 17.269456962798046 67.6111800000017 L 12.792190342813367 67.6111800000017 L 12.792190342813367 90.47999999999956 L 12.792190342813367 67.6111800000017 L 8.314923722828688 67.6111800000017 L 8.314923722828688 62.8133799999996"
                                                                    pathFrom="M 12.792190342813367 67.6111800000017M 8.314923722828688 67.6111800000017"
                                                                    cy="63.3133799999996" cx="16.769456962798046" j="1"
                                                                    val="6630.11" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1687"
                                                                    d="M 21.107114065642055 55.07970000000023 L 25.584380685626734 55.07970000000023 L 25.584380685626734 24.995100000000093 L 25.584380685626734 55.07970000000023 L 30.06164730561141 55.07970000000023 L 30.06164730561141 66.2539799999995 L 25.584380685626734 66.2539799999995 L 25.584380685626734 82.92491999999947 L 25.584380685626734 66.2539799999995 L 21.107114065642055 66.2539799999995 L 21.107114065642055 54.57970000000023"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 21.107114065642055 55.07970000000023 L 25.584380685626734 55.07970000000023 L 25.584380685626734 24.995100000000093 L 25.584380685626734 55.07970000000023 L 30.06164730561141 55.07970000000023 L 30.06164730561141 66.2539799999995 L 25.584380685626734 66.2539799999995 L 25.584380685626734 82.92491999999947 L 25.584380685626734 66.2539799999995 L 21.107114065642055 66.2539799999995 L 21.107114065642055 54.57970000000023"
                                                                    pathFrom="M 25.584380685626734 66.2539799999995M 21.107114065642055 66.2539799999995"
                                                                    cy="55.07970000000023" cx="29.56164730561141" j="2"
                                                                    val="6635.65" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1688"
                                                                    d="M 33.89930440845543 49.221120000000155 L 38.376571028440104 49.221120000000155 L 38.376571028440104 20.358000000000175 L 38.376571028440104 49.221120000000155 L 42.853837648424786 49.221120000000155 L 42.853837648424786 55.07970000000023 L 38.376571028440104 55.07970000000023 L 38.376571028440104 68.60646000000088 L 38.376571028440104 55.07970000000023 L 33.89930440845543 55.07970000000023 L 33.89930440845543 48.721120000000155"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 33.89930440845543 49.221120000000155 L 38.376571028440104 49.221120000000155 L 38.376571028440104 20.358000000000175 L 38.376571028440104 49.221120000000155 L 42.853837648424786 49.221120000000155 L 42.853837648424786 55.07970000000023 L 38.376571028440104 55.07970000000023 L 38.376571028440104 68.60646000000088 L 38.376571028440104 55.07970000000023 L 33.89930440845543 55.07970000000023 L 33.89930440845543 48.721120000000155"
                                                                    pathFrom="M 38.376571028440104 55.07970000000023M 33.89930440845543 55.07970000000023"
                                                                    cy="49.221120000000155" cx="42.353837648424786"
                                                                    j="3" val="6638.24" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1689"
                                                                    d="M 46.69149475126879 49.221120000000155 L 51.16876137125347 49.221120000000155 L 51.16876137125347 45.23999999999978 L 51.16876137125347 49.221120000000155 L 55.64602799123815 49.221120000000155 L 55.64602799123815 80.3688600000005 L 51.16876137125347 80.3688600000005 L 51.16876137125347 90.47999999999956 L 51.16876137125347 80.3688600000005 L 46.69149475126879 80.3688600000005 L 46.69149475126879 48.721120000000155"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 46.69149475126879 49.221120000000155 L 51.16876137125347 49.221120000000155 L 51.16876137125347 45.23999999999978 L 51.16876137125347 49.221120000000155 L 55.64602799123815 49.221120000000155 L 55.64602799123815 80.3688600000005 L 51.16876137125347 80.3688600000005 L 51.16876137125347 90.47999999999956 L 51.16876137125347 80.3688600000005 L 46.69149475126879 80.3688600000005 L 46.69149475126879 48.721120000000155"
                                                                    pathFrom="M 51.16876137125347 80.3688600000005M 46.69149475126879 80.3688600000005"
                                                                    cy="49.221120000000155" cx="55.14602799123815" j="4"
                                                                    val="6624.47" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1690"
                                                                    d="M 59.48368509408216 80.23314000000028 L 63.96095171406684 80.23314000000028 L 63.96095171406684 54.220140000001265 L 63.96095171406684 80.23314000000028 L 68.43821833405151 80.23314000000028 L 68.43821833405151 80.73077999999987 L 63.96095171406684 80.73077999999987 L 63.96095171406684 86.67983999999888 L 63.96095171406684 80.73077999999987 L 59.48368509408216 80.73077999999987 L 59.48368509408216 79.73314000000028"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 59.48368509408216 80.23314000000028 L 63.96095171406684 80.23314000000028 L 63.96095171406684 54.220140000001265 L 63.96095171406684 80.23314000000028 L 68.43821833405151 80.23314000000028 L 68.43821833405151 80.73077999999987 L 63.96095171406684 80.73077999999987 L 63.96095171406684 86.67983999999888 L 63.96095171406684 80.73077999999987 L 59.48368509408216 80.73077999999987 L 59.48368509408216 79.73314000000028"
                                                                    pathFrom="M 63.96095171406684 80.73077999999987M 59.48368509408216 80.73077999999987"
                                                                    cy="80.23314000000028" cx="67.93821833405151" j="5"
                                                                    val="6624.31" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1691"
                                                                    d="M 72.27587543689553 76.86275999999998 L 76.75314205688021 76.86275999999998 L 76.75314205688021 62.883600000001024 L 76.75314205688021 76.86275999999998 L 81.23040867686488 76.86275999999998 L 81.23040867686488 80.05218000000059 L 76.75314205688021 80.05218000000059 L 76.75314205688021 97.26599999999962 L 76.75314205688021 80.05218000000059 L 72.27587543689553 80.05218000000059 L 72.27587543689553 76.36275999999998"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 72.27587543689553 76.86275999999998 L 76.75314205688021 76.86275999999998 L 76.75314205688021 62.883600000001024 L 76.75314205688021 76.86275999999998 L 81.23040867686488 76.86275999999998 L 81.23040867686488 80.05218000000059 L 76.75314205688021 80.05218000000059 L 76.75314205688021 97.26599999999962 L 76.75314205688021 80.05218000000059 L 72.27587543689553 80.05218000000059 L 72.27587543689553 76.36275999999998"
                                                                    pathFrom="M 76.75314205688021 80.05218000000059M 72.27587543689553 80.05218000000059"
                                                                    cy="76.86275999999998" cx="80.73040867686488" j="6"
                                                                    val="6626.02" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1692"
                                                                    d="M 85.06806577970889 74.64600000000064 L 89.54533239969356 74.64600000000064 L 89.54533239969356 73.2435600000008 L 89.54533239969356 74.64600000000064 L 94.02259901967824 74.64600000000064 L 94.02259901967824 128.88875999999982 L 89.54533239969356 128.88875999999982 L 89.54533239969356 171.41435999999885 L 89.54533239969356 128.88875999999982 L 85.06806577970889 128.88875999999982 L 85.06806577970889 74.14600000000064"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 85.06806577970889 74.64600000000064 L 89.54533239969356 74.64600000000064 L 89.54533239969356 73.2435600000008 L 89.54533239969356 74.64600000000064 L 94.02259901967824 74.64600000000064 L 94.02259901967824 128.88875999999982 L 89.54533239969356 128.88875999999982 L 89.54533239969356 171.41435999999885 L 89.54533239969356 128.88875999999982 L 85.06806577970889 128.88875999999982 L 85.06806577970889 74.14600000000064"
                                                                    pathFrom="M 89.54533239969356 128.88875999999982M 85.06806577970889 128.88875999999982"
                                                                    cy="74.64600000000064" cx="93.52259901967824" j="7"
                                                                    val="6603.02" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1693"
                                                                    d="M 97.86025612252226 124.40999999999985 L 102.33752274250693 124.40999999999985 L 102.33752274250693 117.5561400000006 L 102.33752274250693 124.40999999999985 L 106.81478936249161 124.40999999999985 L 106.81478936249161 126.64937999999893 L 102.33752274250693 126.64937999999893 L 102.33752274250693 138.09510000000046 L 102.33752274250693 126.64937999999893 L 97.86025612252226 126.64937999999893 L 97.86025612252226 123.90999999999985"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 97.86025612252226 124.40999999999985 L 102.33752274250693 124.40999999999985 L 102.33752274250693 117.5561400000006 L 102.33752274250693 124.40999999999985 L 106.81478936249161 124.40999999999985 L 106.81478936249161 126.64937999999893 L 102.33752274250693 126.64937999999893 L 102.33752274250693 138.09510000000046 L 102.33752274250693 126.64937999999893 L 97.86025612252226 126.64937999999893 L 97.86025612252226 123.90999999999985"
                                                                    pathFrom="M 102.33752274250693 126.64937999999893M 97.86025612252226 126.64937999999893"
                                                                    cy="124.40999999999985" cx="106.31478936249161"
                                                                    j="8" val="6604.01" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1694"
                                                                    d="M 110.65244646533563 117.57875999999851 L 115.1297130853203 117.57875999999851 L 115.1297130853203 103.14720000000125 L 115.1297130853203 117.57875999999851 L 119.60697970530498 117.57875999999851 L 119.60697970530498 125.54100000000108 L 115.1297130853203 125.54100000000108 L 115.1297130853203 130.60787999999957 L 115.1297130853203 125.54100000000108 L 110.65244646533563 125.54100000000108 L 110.65244646533563 117.07875999999851"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 110.65244646533563 117.57875999999851 L 115.1297130853203 117.57875999999851 L 115.1297130853203 103.14720000000125 L 115.1297130853203 117.57875999999851 L 119.60697970530498 117.57875999999851 L 119.60697970530498 125.54100000000108 L 115.1297130853203 125.54100000000108 L 115.1297130853203 130.60787999999957 L 115.1297130853203 125.54100000000108 L 110.65244646533563 125.54100000000108 L 110.65244646533563 117.07875999999851"
                                                                    pathFrom="M 115.1297130853203 125.54100000000108M 110.65244646533563 125.54100000000108"
                                                                    cy="117.57875999999851" cx="119.10697970530498"
                                                                    j="9" val="6608.02" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1695"
                                                                    d="M 123.444636808149 115.56558000000041 L 127.92190342813367 115.56558000000041 L 127.92190342813367 111.5618400000003 L 127.92190342813367 115.56558000000041 L 132.39917004811835 115.56558000000041 L 132.39917004811835 117.57875999999851 L 127.92190342813367 117.57875999999851 L 127.92190342813367 131.21862000000147 L 127.92190342813367 117.57875999999851 L 123.444636808149 117.57875999999851 L 123.444636808149 115.06558000000041"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 123.444636808149 115.56558000000041 L 127.92190342813367 115.56558000000041 L 127.92190342813367 111.5618400000003 L 127.92190342813367 115.56558000000041 L 132.39917004811835 115.56558000000041 L 132.39917004811835 117.57875999999851 L 127.92190342813367 117.57875999999851 L 127.92190342813367 131.21862000000147 L 127.92190342813367 117.57875999999851 L 123.444636808149 117.57875999999851 L 123.444636808149 115.06558000000041"
                                                                    pathFrom="M 127.92190342813367 117.57875999999851M 123.444636808149 117.57875999999851"
                                                                    cy="115.56558000000041" cx="131.89917004811835"
                                                                    j="10" val="6608.91" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1696"
                                                                    d="M 136.23682715096237 108.57600000000093 L 140.71409377094704 108.57600000000093 L 140.71409377094704 92.76461999999992 L 140.71409377094704 108.57600000000093 L 145.19136039093172 108.57600000000093 L 145.19136039093172 115.56558000000041 L 140.71409377094704 115.56558000000041 L 140.71409377094704 117.60138000000006 L 140.71409377094704 115.56558000000041 L 136.23682715096237 115.56558000000041 L 136.23682715096237 108.07600000000093"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 136.23682715096237 108.57600000000093 L 140.71409377094704 108.57600000000093 L 140.71409377094704 92.76461999999992 L 140.71409377094704 108.57600000000093 L 145.19136039093172 108.57600000000093 L 145.19136039093172 115.56558000000041 L 140.71409377094704 115.56558000000041 L 140.71409377094704 117.60138000000006 L 140.71409377094704 115.56558000000041 L 136.23682715096237 115.56558000000041 L 136.23682715096237 108.07600000000093"
                                                                    pathFrom="M 140.71409377094704 115.56558000000041M 136.23682715096237 115.56558000000041"
                                                                    cy="108.57600000000093" cx="144.69136039093172"
                                                                    j="11" val="6612" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1697"
                                                                    d="M 149.02901749377574 108.57600000000093 L 153.50628411376042 108.57600000000093 L 153.50628411376042 101.4959400000007 L 153.50628411376042 108.57600000000093 L 157.9835507337451 108.57600000000093 L 157.9835507337451 108.57600000000093 L 153.50628411376042 108.57600000000093 L 153.50628411376042 124.20642000000043 L 153.50628411376042 108.57600000000093 L 149.02901749377574 108.57600000000093 L 149.02901749377574 108.07600000000093"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 149.02901749377574 108.57600000000093 L 153.50628411376042 108.57600000000093 L 153.50628411376042 101.4959400000007 L 153.50628411376042 108.57600000000093 L 157.9835507337451 108.57600000000093 L 157.9835507337451 108.57600000000093 L 153.50628411376042 108.57600000000093 L 153.50628411376042 124.20642000000043 L 153.50628411376042 108.57600000000093 L 149.02901749377574 108.57600000000093 L 149.02901749377574 108.07600000000093"
                                                                    pathFrom="M 153.50628411376042 108.57600000000093M 149.02901749377574 108.57600000000093"
                                                                    cy="108.57600000000093" cx="157.4835507337451"
                                                                    j="12" val="6612" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1698"
                                                                    d="M 161.82120783658908 83.80709999999999 L 166.29847445657376 83.80709999999999 L 166.29847445657376 81.16056000000026 L 166.29847445657376 83.80709999999999 L 170.77574107655843 83.80709999999999 L 170.77574107655843 108.57600000000093 L 166.29847445657376 108.57600000000093 L 166.29847445657376 116.65134000000035 L 166.29847445657376 108.57600000000093 L 161.82120783658908 108.57600000000093 L 161.82120783658908 83.30709999999999"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 161.82120783658908 83.80709999999999 L 166.29847445657376 83.80709999999999 L 166.29847445657376 81.16056000000026 L 166.29847445657376 83.80709999999999 L 170.77574107655843 83.80709999999999 L 170.77574107655843 108.57600000000093 L 166.29847445657376 108.57600000000093 L 166.29847445657376 116.65134000000035 L 166.29847445657376 108.57600000000093 L 161.82120783658908 108.57600000000093 L 161.82120783658908 83.30709999999999"
                                                                    pathFrom="M 166.29847445657376 108.57600000000093M 161.82120783658908 108.57600000000093"
                                                                    cy="83.80709999999999" cx="170.27574107655843"
                                                                    j="13" val="6622.95" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1699"
                                                                    d="M 174.61339817940245 81.63558000000012 L 179.09066479938713 81.63558000000012 L 179.09066479938713 81.63558000000012 L 179.09066479938713 81.63558000000012 L 183.5679314193718 81.63558000000012 L 183.5679314193718 100.27446000000054 L 179.09066479938713 100.27446000000054 L 179.09066479938713 101.79000000000087 L 179.09066479938713 100.27446000000054 L 174.61339817940245 100.27446000000054 L 174.61339817940245 81.13558000000012"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 174.61339817940245 81.63558000000012 L 179.09066479938713 81.63558000000012 L 179.09066479938713 81.63558000000012 L 179.09066479938713 81.63558000000012 L 183.5679314193718 81.63558000000012 L 183.5679314193718 100.27446000000054 L 179.09066479938713 100.27446000000054 L 179.09066479938713 101.79000000000087 L 179.09066479938713 100.27446000000054 L 174.61339817940245 100.27446000000054 L 174.61339817940245 81.13558000000012"
                                                                    pathFrom="M 179.09066479938713 100.27446000000054M 174.61339817940245 100.27446000000054"
                                                                    cy="81.63558000000012" cx="183.0679314193718" j="14"
                                                                    val="6615.67" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1700"
                                                                    d="M 187.40558852221582 93.44322000000102 L 191.8828551422005 93.44322000000102 L 191.8828551422005 93.33012000000053 L 191.8828551422005 93.44322000000102 L 196.36012176218517 93.44322000000102 L 196.36012176218517 112.19520000000193 L 191.8828551422005 112.19520000000193 L 191.8828551422005 113.10000000000036 L 191.8828551422005 112.19520000000193 L 187.40558852221582 112.19520000000193 L 187.40558852221582 92.94322000000102"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 187.40558852221582 93.44322000000102 L 191.8828551422005 93.44322000000102 L 191.8828551422005 93.33012000000053 L 191.8828551422005 93.44322000000102 L 196.36012176218517 93.44322000000102 L 196.36012176218517 112.19520000000193 L 191.8828551422005 112.19520000000193 L 191.8828551422005 113.10000000000036 L 191.8828551422005 112.19520000000193 L 187.40558852221582 112.19520000000193 L 187.40558852221582 92.94322000000102"
                                                                    pathFrom="M 191.8828551422005 112.19520000000193M 187.40558852221582 112.19520000000193"
                                                                    cy="93.44322000000102" cx="195.86012176218517"
                                                                    j="15" val="6610.4" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1701"
                                                                    d="M 200.1977788650292 102.01620000000185 L 204.67504548501387 102.01620000000185 L 204.67504548501387 84.19164000000092 L 204.67504548501387 102.01620000000185 L 209.15231210499854 102.01620000000185 L 209.15231210499854 110.83799999999974 L 204.67504548501387 110.83799999999974 L 204.67504548501387 112.19520000000193 L 204.67504548501387 110.83799999999974 L 200.1977788650292 110.83799999999974 L 200.1977788650292 101.51620000000185"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 200.1977788650292 102.01620000000185 L 204.67504548501387 102.01620000000185 L 204.67504548501387 84.19164000000092 L 204.67504548501387 102.01620000000185 L 209.15231210499854 102.01620000000185 L 209.15231210499854 110.83799999999974 L 204.67504548501387 110.83799999999974 L 204.67504548501387 112.19520000000193 L 204.67504548501387 110.83799999999974 L 200.1977788650292 110.83799999999974 L 200.1977788650292 101.51620000000185"
                                                                    pathFrom="M 204.67504548501387 110.83799999999974M 200.1977788650292 110.83799999999974"
                                                                    cy="102.01620000000185" cx="208.65231210499854"
                                                                    j="16" val="6614.9" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1702"
                                                                    d="M 212.98996920784256 82.67610000000059 L 217.46723582782724 82.67610000000059 L 217.46723582782724 76.45560000000114 L 217.46723582782724 82.67610000000059 L 221.9445024478119 82.67610000000059 L 221.9445024478119 102.01620000000185 L 217.46723582782724 102.01620000000185 L 217.46723582782724 105.56754000000001 L 217.46723582782724 102.01620000000185 L 212.98996920784256 102.01620000000185 L 212.98996920784256 82.17610000000059"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 212.98996920784256 82.67610000000059 L 217.46723582782724 82.67610000000059 L 217.46723582782724 76.45560000000114 L 217.46723582782724 82.67610000000059 L 221.9445024478119 82.67610000000059 L 221.9445024478119 102.01620000000185 L 217.46723582782724 102.01620000000185 L 217.46723582782724 105.56754000000001 L 217.46723582782724 102.01620000000185 L 212.98996920784256 102.01620000000185 L 212.98996920784256 82.17610000000059"
                                                                    pathFrom="M 217.46723582782724 102.01620000000185M 212.98996920784256 102.01620000000185"
                                                                    cy="82.67610000000059" cx="221.4445024478119" j="17"
                                                                    val="6623.45" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1703"
                                                                    d="M 225.78215955065593 82.60824000000139 L 230.2594261706406 82.60824000000139 L 230.2594261706406 74.64600000000064 L 230.2594261706406 82.60824000000139 L 234.73669279062528 82.60824000000139 L 234.73669279062528 89.6882999999998 L 230.2594261706406 89.6882999999998 L 230.2594261706406 94.14444000000003 L 230.2594261706406 89.6882999999998 L 225.78215955065593 89.6882999999998 L 225.78215955065593 82.10824000000139"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 225.78215955065593 82.60824000000139 L 230.2594261706406 82.60824000000139 L 230.2594261706406 74.64600000000064 L 230.2594261706406 82.60824000000139 L 234.73669279062528 82.60824000000139 L 234.73669279062528 89.6882999999998 L 230.2594261706406 89.6882999999998 L 230.2594261706406 94.14444000000003 L 230.2594261706406 89.6882999999998 L 225.78215955065593 89.6882999999998 L 225.78215955065593 82.10824000000139"
                                                                    pathFrom="M 230.2594261706406 89.6882999999998M 225.78215955065593 89.6882999999998"
                                                                    cy="82.60824000000139" cx="234.23669279062528"
                                                                    j="18" val="6620.35" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1704"
                                                                    d="M 238.5743498934693 91.76933999999892 L 243.05161651345398 91.76933999999892 L 243.05161651345398 89.6882999999998 L 243.05161651345398 91.76933999999892 L 247.52888313343865 91.76933999999892 L 247.52888313343865 100.59114000000045 L 243.05161651345398 100.59114000000045 L 243.05161651345398 112.98689999999988 L 243.05161651345398 100.59114000000045 L 238.5743498934693 100.59114000000045 L 238.5743498934693 91.26933999999892"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 238.5743498934693 91.76933999999892 L 243.05161651345398 91.76933999999892 L 243.05161651345398 89.6882999999998 L 243.05161651345398 91.76933999999892 L 247.52888313343865 91.76933999999892 L 247.52888313343865 100.59114000000045 L 243.05161651345398 100.59114000000045 L 243.05161651345398 112.98689999999988 L 243.05161651345398 100.59114000000045 L 238.5743498934693 100.59114000000045 L 238.5743498934693 91.26933999999892"
                                                                    pathFrom="M 243.05161651345398 100.59114000000045M 238.5743498934693 100.59114000000045"
                                                                    cy="91.76933999999892" cx="247.02888313343865"
                                                                    j="19" val="6615.53" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1705"
                                                                    d="M 251.36654023628267 100.59114000000045 L 255.84380685626735 100.59114000000045 L 255.84380685626735 95.16233999999895 L 255.84380685626735 100.59114000000045 L 260.321073476252 100.59114000000045 L 260.321073476252 101.36022000000048 L 255.84380685626735 101.36022000000048 L 255.84380685626735 113.10000000000036 L 255.84380685626735 101.36022000000048 L 251.36654023628267 101.36022000000048 L 251.36654023628267 100.09114000000045"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 251.36654023628267 100.59114000000045 L 255.84380685626735 100.59114000000045 L 255.84380685626735 95.16233999999895 L 255.84380685626735 100.59114000000045 L 260.321073476252 100.59114000000045 L 260.321073476252 101.36022000000048 L 255.84380685626735 101.36022000000048 L 255.84380685626735 113.10000000000036 L 255.84380685626735 101.36022000000048 L 251.36654023628267 101.36022000000048 L 251.36654023628267 100.09114000000045"
                                                                    pathFrom="M 255.84380685626735 101.36022000000048M 251.36654023628267 101.36022000000048"
                                                                    cy="100.59114000000045" cx="259.821073476252" j="20"
                                                                    val="6615.19" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1706"
                                                                    d="M 264.158730579096 90.47999999999956 L 268.6359971990807 90.47999999999956 L 268.6359971990807 86.86080000000038 L 268.6359971990807 90.47999999999956 L 273.11326381906537 90.47999999999956 L 273.11326381906537 101.36022000000048 L 268.6359971990807 101.36022000000048 L 268.6359971990807 117.17160000000149 L 268.6359971990807 101.36022000000048 L 264.158730579096 101.36022000000048 L 264.158730579096 89.97999999999956"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 264.158730579096 90.47999999999956 L 268.6359971990807 90.47999999999956 L 268.6359971990807 86.86080000000038 L 268.6359971990807 90.47999999999956 L 273.11326381906537 90.47999999999956 L 273.11326381906537 101.36022000000048 L 268.6359971990807 101.36022000000048 L 268.6359971990807 117.17160000000149 L 268.6359971990807 101.36022000000048 L 264.158730579096 101.36022000000048 L 264.158730579096 89.97999999999956"
                                                                    pathFrom="M 268.6359971990807 101.36022000000048M 264.158730579096 101.36022000000048"
                                                                    cy="90.47999999999956" cx="272.61326381906537"
                                                                    j="21" val="6620" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1707"
                                                                    d="M 276.9509209219094 90.47999999999956 L 281.4281875418941 90.47999999999956 L 281.4281875418941 78.78546000000097 L 281.4281875418941 90.47999999999956 L 285.90545416187877 90.47999999999956 L 285.90545416187877 91.52052000000003 L 281.4281875418941 91.52052000000003 L 281.4281875418941 103.71270000000186 L 281.4281875418941 91.52052000000003 L 276.9509209219094 91.52052000000003 L 276.9509209219094 89.97999999999956"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 276.9509209219094 90.47999999999956 L 281.4281875418941 90.47999999999956 L 281.4281875418941 78.78546000000097 L 281.4281875418941 90.47999999999956 L 285.90545416187877 90.47999999999956 L 285.90545416187877 91.52052000000003 L 281.4281875418941 91.52052000000003 L 281.4281875418941 103.71270000000186 L 281.4281875418941 91.52052000000003 L 276.9509209219094 91.52052000000003 L 276.9509209219094 89.97999999999956"
                                                                    pathFrom="M 281.4281875418941 91.52052000000003M 276.9509209219094 91.52052000000003"
                                                                    cy="90.47999999999956" cx="285.40545416187877"
                                                                    j="22" val="6620" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1708"
                                                                    d="M 289.74311126472276 80.05218000000059 L 294.22037788470743 80.05218000000059 L 294.22037788470743 58.47270000000026 L 294.22037788470743 80.05218000000059 L 298.6976445046921 80.05218000000059 L 298.6976445046921 89.73354000000108 L 294.22037788470743 89.73354000000108 L 294.22037788470743 96.72312000000056 L 294.22037788470743 89.73354000000108 L 289.74311126472276 89.73354000000108 L 289.74311126472276 79.55218000000059"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 289.74311126472276 80.05218000000059 L 294.22037788470743 80.05218000000059 L 294.22037788470743 58.47270000000026 L 294.22037788470743 80.05218000000059 L 298.6976445046921 80.05218000000059 L 298.6976445046921 89.73354000000108 L 294.22037788470743 89.73354000000108 L 294.22037788470743 96.72312000000056 L 294.22037788470743 89.73354000000108 L 289.74311126472276 89.73354000000108 L 289.74311126472276 79.55218000000059"
                                                                    pathFrom="M 294.22037788470743 89.73354000000108M 289.74311126472276 89.73354000000108"
                                                                    cy="80.05218000000059" cx="298.1976445046921" j="23"
                                                                    val="6624.61" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1709"
                                                                    d="M 302.53530160753616 77.02109999999993 L 307.01256822752083 77.02109999999993 L 307.01256822752083 76.90799999999945 L 307.01256822752083 77.02109999999993 L 311.4898348475055 77.02109999999993 L 311.4898348475055 95.95404000000053 L 307.01256822752083 95.95404000000053 L 307.01256822752083 109.34508000000096 L 307.01256822752083 95.95404000000053 L 302.53530160753616 95.95404000000053 L 302.53530160753616 76.52109999999993"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 302.53530160753616 77.02109999999993 L 307.01256822752083 77.02109999999993 L 307.01256822752083 76.90799999999945 L 307.01256822752083 77.02109999999993 L 311.4898348475055 77.02109999999993 L 311.4898348475055 95.95404000000053 L 307.01256822752083 95.95404000000053 L 307.01256822752083 109.34508000000096 L 307.01256822752083 95.95404000000053 L 302.53530160753616 95.95404000000053 L 302.53530160753616 76.52109999999993"
                                                                    pathFrom="M 307.01256822752083 95.95404000000053M 302.53530160753616 95.95404000000053"
                                                                    cy="77.02109999999993" cx="310.9898348475055" j="24"
                                                                    val="6617.58" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1710"
                                                                    d="M 315.3274919503495 92.74200000000019 L 319.8047585703342 92.74200000000019 L 319.8047585703342 76.97586000000047 L 319.8047585703342 92.74200000000019 L 324.28202519031885 92.74200000000019 L 324.28202519031885 138.2986800000017 L 319.8047585703342 138.2986800000017 L 319.8047585703342 146.41925999999876 L 319.8047585703342 138.2986800000017 L 315.3274919503495 138.2986800000017 L 315.3274919503495 92.24200000000019"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 315.3274919503495 92.74200000000019 L 319.8047585703342 92.74200000000019 L 319.8047585703342 76.97586000000047 L 319.8047585703342 92.74200000000019 L 324.28202519031885 92.74200000000019 L 324.28202519031885 138.2986800000017 L 319.8047585703342 138.2986800000017 L 319.8047585703342 146.41925999999876 L 319.8047585703342 138.2986800000017 L 315.3274919503495 138.2986800000017 L 315.3274919503495 92.24200000000019"
                                                                    pathFrom="M 319.8047585703342 138.2986800000017M 315.3274919503495 138.2986800000017"
                                                                    cy="92.74200000000019" cx="323.78202519031885"
                                                                    j="25" val="6598.86" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1711"
                                                                    d="M 328.11968229316284 138.2986800000017 L 332.5969489131475 138.2986800000017 L 332.5969489131475 138.2534400000004 L 332.5969489131475 138.2986800000017 L 337.0742155331322 138.2986800000017 L 337.0742155331322 164.76408000000083 L 332.5969489131475 164.76408000000083 L 332.5969489131475 203.57999999999993 L 332.5969489131475 164.76408000000083 L 328.11968229316284 164.76408000000083 L 328.11968229316284 137.7986800000017"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 328.11968229316284 138.2986800000017 L 332.5969489131475 138.2986800000017 L 332.5969489131475 138.2534400000004 L 332.5969489131475 138.2986800000017 L 337.0742155331322 138.2986800000017 L 337.0742155331322 164.76408000000083 L 332.5969489131475 164.76408000000083 L 332.5969489131475 203.57999999999993 L 332.5969489131475 164.76408000000083 L 328.11968229316284 164.76408000000083 L 328.11968229316284 137.7986800000017"
                                                                    pathFrom="M 332.5969489131475 164.76408000000083M 328.11968229316284 164.76408000000083"
                                                                    cy="138.2986800000017" cx="336.5742155331322" j="26"
                                                                    val="6587.16" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1712"
                                                                    d="M 340.91187263597624 150.64920000000166 L 345.3891392559609 150.64920000000166 L 345.3891392559609 135.72000000000116 L 345.3891392559609 150.64920000000166 L 349.8664058759456 150.64920000000166 L 349.8664058759456 160.91868000000068 L 345.3891392559609 160.91868000000068 L 345.3891392559609 180.96000000000095 L 345.3891392559609 160.91868000000068 L 340.91187263597624 160.91868000000068 L 340.91187263597624 150.14920000000166"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 340.91187263597624 150.64920000000166 L 345.3891392559609 150.64920000000166 L 345.3891392559609 135.72000000000116 L 345.3891392559609 150.64920000000166 L 349.8664058759456 150.64920000000166 L 349.8664058759456 160.91868000000068 L 345.3891392559609 160.91868000000068 L 345.3891392559609 180.96000000000095 L 345.3891392559609 160.91868000000068 L 340.91187263597624 160.91868000000068 L 340.91187263597624 150.14920000000166"
                                                                    pathFrom="M 345.3891392559609 160.91868000000068M 340.91187263597624 160.91868000000068"
                                                                    cy="150.64920000000166" cx="349.3664058759456"
                                                                    j="27" val="6593.4" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1713"
                                                                    d="M 353.7040629787896 149.314620000001 L 358.18132959877425 149.314620000001 L 358.18132959877425 138.23081999999886 L 358.18132959877425 149.314620000001 L 362.65859621875893 149.314620000001 L 362.65859621875893 163.29377999999997 L 358.18132959877425 163.29377999999997 L 358.18132959877425 169.64999999999964 L 358.18132959877425 163.29377999999997 L 353.7040629787896 163.29377999999997 L 353.7040629787896 148.814620000001"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 353.7040629787896 149.314620000001 L 358.18132959877425 149.314620000001 L 358.18132959877425 138.23081999999886 L 358.18132959877425 149.314620000001 L 362.65859621875893 149.314620000001 L 362.65859621875893 163.29377999999997 L 358.18132959877425 163.29377999999997 L 358.18132959877425 169.64999999999964 L 358.18132959877425 163.29377999999997 L 353.7040629787896 163.29377999999997 L 353.7040629787896 148.814620000001"
                                                                    pathFrom="M 358.18132959877425 163.29377999999997M 353.7040629787896 163.29377999999997"
                                                                    cy="149.314620000001" cx="362.15859621875893" j="28"
                                                                    val="6587.81" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1714"
                                                                    d="M 366.496253321603 163.29377999999997 L 370.97351994158765 163.29377999999997 L 370.97351994158765 152.16474000000198 L 370.97351994158765 163.29377999999997 L 375.45078656157233 163.29377999999997 L 375.45078656157233 185.48400000000038 L 370.97351994158765 185.48400000000038 L 370.97351994158765 210.04932000000008 L 370.97351994158765 185.48400000000038 L 366.496253321603 185.48400000000038 L 366.496253321603 162.79377999999997"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 366.496253321603 163.29377999999997 L 370.97351994158765 163.29377999999997 L 370.97351994158765 152.16474000000198 L 370.97351994158765 163.29377999999997 L 375.45078656157233 163.29377999999997 L 375.45078656157233 185.48400000000038 L 370.97351994158765 185.48400000000038 L 370.97351994158765 210.04932000000008 L 370.97351994158765 185.48400000000038 L 366.496253321603 185.48400000000038 L 366.496253321603 162.79377999999997"
                                                                    pathFrom="M 370.97351994158765 185.48400000000038M 366.496253321603 185.48400000000038"
                                                                    cy="163.29377999999997" cx="374.95078656157233"
                                                                    j="29" val="6578" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1715"
                                                                    d="M 379.2884436644163 183.22199999999975 L 383.765710284401 183.22199999999975 L 383.765710284401 177.0693599999995 L 383.765710284401 183.22199999999975 L 388.24297690438567 183.22199999999975 L 388.24297690438567 184.6922999999988 L 383.765710284401 184.6922999999988 L 383.765710284401 209.48381999999947 L 383.765710284401 184.6922999999988 L 379.2884436644163 184.6922999999988 L 379.2884436644163 182.72199999999975"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 379.2884436644163 183.22199999999975 L 383.765710284401 183.22199999999975 L 383.765710284401 177.0693599999995 L 383.765710284401 183.22199999999975 L 388.24297690438567 183.22199999999975 L 388.24297690438567 184.6922999999988 L 383.765710284401 184.6922999999988 L 383.765710284401 209.48381999999947 L 383.765710284401 184.6922999999988 L 379.2884436644163 184.6922999999988 L 379.2884436644163 182.72199999999975"
                                                                    pathFrom="M 383.765710284401 184.6922999999988M 379.2884436644163 184.6922999999988"
                                                                    cy="183.22199999999975" cx="387.74297690438567"
                                                                    j="30" val="6579" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1716"
                                                                    d="M 392.0806340072297 182.3624400000008 L 396.5579006272144 182.3624400000008 L 396.5579006272144 178.87896 L 396.5579006272144 182.3624400000008 L 401.03516724719907 182.3624400000008 L 401.03516724719907 190.09848000000056 L 396.5579006272144 190.09848000000056 L 396.5579006272144 210.8862599999993 L 396.5579006272144 190.09848000000056 L 392.0806340072297 190.09848000000056 L 392.0806340072297 181.8624400000008"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 392.0806340072297 182.3624400000008 L 396.5579006272144 182.3624400000008 L 396.5579006272144 178.87896 L 396.5579006272144 182.3624400000008 L 401.03516724719907 182.3624400000008 L 401.03516724719907 190.09848000000056 L 396.5579006272144 190.09848000000056 L 396.5579006272144 210.8862599999993 L 396.5579006272144 190.09848000000056 L 392.0806340072297 190.09848000000056 L 392.0806340072297 181.8624400000008"
                                                                    pathFrom="M 396.5579006272144 190.09848000000056M 392.0806340072297 190.09848000000056"
                                                                    cy="182.3624400000008" cx="400.53516724719907"
                                                                    j="31" val="6575.96" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1717"
                                                                    d="M 404.87282435004306 160.78296000000046 L 409.35009097002774 160.78296000000046 L 409.35009097002774 160.60200000000077 L 409.35009097002774 160.78296000000046 L 413.8273575900124 160.78296000000046 L 413.8273575900124 190.09848000000056 L 409.35009097002774 190.09848000000056 L 409.35009097002774 199.57625999999982 L 409.35009097002774 190.09848000000056 L 404.87282435004306 190.09848000000056 L 404.87282435004306 160.28296000000046"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 404.87282435004306 160.78296000000046 L 409.35009097002774 160.78296000000046 L 409.35009097002774 160.60200000000077 L 409.35009097002774 160.78296000000046 L 413.8273575900124 160.78296000000046 L 413.8273575900124 190.09848000000056 L 409.35009097002774 190.09848000000056 L 409.35009097002774 199.57625999999982 L 409.35009097002774 190.09848000000056 L 404.87282435004306 190.09848000000056 L 404.87282435004306 160.28296000000046"
                                                                    pathFrom="M 409.35009097002774 190.09848000000056M 404.87282435004306 190.09848000000056"
                                                                    cy="160.78296000000046" cx="413.3273575900124"
                                                                    j="32" val="6588.92" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1718"
                                                                    d="M 417.66501469285646 160.10435999999936 L 422.14228131284113 160.10435999999936 L 422.14228131284113 149.29199999999946 L 422.14228131284113 160.10435999999936 L 426.6195479328258 160.10435999999936 L 426.6195479328258 160.78296000000046 L 422.14228131284113 160.78296000000046 L 422.14228131284113 186.5018999999993 L 422.14228131284113 160.78296000000046 L 417.66501469285646 160.78296000000046 L 417.66501469285646 159.60435999999936"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 417.66501469285646 160.10435999999936 L 422.14228131284113 160.10435999999936 L 422.14228131284113 149.29199999999946 L 422.14228131284113 160.10435999999936 L 426.6195479328258 160.10435999999936 L 426.6195479328258 160.78296000000046 L 422.14228131284113 160.78296000000046 L 422.14228131284113 186.5018999999993 L 422.14228131284113 160.78296000000046 L 417.66501469285646 160.78296000000046 L 417.66501469285646 159.60435999999936"
                                                                    pathFrom="M 422.14228131284113 160.78296000000046M 417.66501469285646 160.78296000000046"
                                                                    cy="160.10435999999936" cx="426.1195479328258"
                                                                    j="33" val="6589.22" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1719"
                                                                    d="M 430.4572050356698 144.58704000000034 L 434.9344716556545 144.58704000000034 L 434.9344716556545 138.23081999999886 L 434.9344716556545 144.58704000000034 L 439.41173827563915 144.58704000000034 L 439.41173827563915 159.92339999999967 L 434.9344716556545 159.92339999999967 L 434.9344716556545 160.3757999999998 L 434.9344716556545 159.92339999999967 L 430.4572050356698 159.92339999999967 L 430.4572050356698 144.08704000000034"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 430.4572050356698 144.58704000000034 L 434.9344716556545 144.58704000000034 L 434.9344716556545 138.23081999999886 L 434.9344716556545 144.58704000000034 L 439.41173827563915 144.58704000000034 L 439.41173827563915 159.92339999999967 L 434.9344716556545 159.92339999999967 L 434.9344716556545 160.3757999999998 L 434.9344716556545 159.92339999999967 L 430.4572050356698 159.92339999999967 L 430.4572050356698 144.08704000000034"
                                                                    pathFrom="M 434.9344716556545 159.92339999999967M 430.4572050356698 159.92339999999967"
                                                                    cy="144.58704000000034" cx="438.91173827563915"
                                                                    j="34" val="6596.08" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1720"
                                                                    d="M 443.24939537848314 141.375 L 447.7266619984678 141.375 L 447.7266619984678 135.72000000000116 L 447.7266619984678 141.375 L 452.2039286184525 141.375 L 452.2039286184525 144.20249999999942 L 447.7266619984678 144.20249999999942 L 447.7266619984678 161.98181999999906 L 447.7266619984678 144.20249999999942 L 443.24939537848314 144.20249999999942 L 443.24939537848314 140.875"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 443.24939537848314 141.375 L 447.7266619984678 141.375 L 447.7266619984678 135.72000000000116 L 447.7266619984678 141.375 L 452.2039286184525 141.375 L 452.2039286184525 144.20249999999942 L 447.7266619984678 144.20249999999942 L 447.7266619984678 161.98181999999906 L 447.7266619984678 144.20249999999942 L 443.24939537848314 144.20249999999942 L 443.24939537848314 140.875"
                                                                    pathFrom="M 447.7266619984678 144.20249999999942M 443.24939537848314 144.20249999999942"
                                                                    cy="141.375" cx="451.7039286184525" j="35"
                                                                    val="6596.25" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1721"
                                                                    d="M 456.04158572129654 140.1761400000014 L 460.5188523412812 140.1761400000014 L 460.5188523412812 135.72000000000116 L 460.5188523412812 140.1761400000014 L 464.9961189612659 140.1761400000014 L 464.9961189612659 144.83585999999923 L 460.5188523412812 144.83585999999923 L 460.5188523412812 161.21274000000085 L 460.5188523412812 144.83585999999923 L 456.04158572129654 144.83585999999923 L 456.04158572129654 139.6761400000014"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 456.04158572129654 140.1761400000014 L 460.5188523412812 140.1761400000014 L 460.5188523412812 135.72000000000116 L 460.5188523412812 140.1761400000014 L 464.9961189612659 140.1761400000014 L 464.9961189612659 144.83585999999923 L 460.5188523412812 144.83585999999923 L 460.5188523412812 161.21274000000085 L 460.5188523412812 144.83585999999923 L 456.04158572129654 144.83585999999923 L 456.04158572129654 139.6761400000014"
                                                                    pathFrom="M 460.5188523412812 144.83585999999923M 456.04158572129654 144.83585999999923"
                                                                    cy="140.1761400000014" cx="464.4961189612659" j="36"
                                                                    val="6595.97" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1722"
                                                                    d="M 468.8337760641099 131.1959999999999 L 473.31104268409456 131.1959999999999 L 473.31104268409456 131.17338000000018 L 473.31104268409456 131.1959999999999 L 477.78830930407923 131.1959999999999 L 477.78830930407923 144.83585999999923 L 473.31104268409456 144.83585999999923 L 473.31104268409456 162.47946000000047 L 473.31104268409456 144.83585999999923 L 468.8337760641099 144.83585999999923 L 468.8337760641099 130.6959999999999"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 468.8337760641099 131.1959999999999 L 473.31104268409456 131.1959999999999 L 473.31104268409456 131.17338000000018 L 473.31104268409456 131.1959999999999 L 477.78830930407923 131.1959999999999 L 477.78830930407923 144.83585999999923 L 473.31104268409456 144.83585999999923 L 473.31104268409456 162.47946000000047 L 473.31104268409456 144.83585999999923 L 468.8337760641099 144.83585999999923 L 468.8337760641099 130.6959999999999"
                                                                    pathFrom="M 473.31104268409456 144.83585999999923M 468.8337760641099 144.83585999999923"
                                                                    cy="131.1959999999999" cx="477.28830930407923"
                                                                    j="37" val="6602" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1723"
                                                                    d="M 481.6259664069233 131.1959999999999 L 486.10323302690796 131.1959999999999 L 486.10323302690796 119.88600000000042 L 486.10323302690796 131.1959999999999 L 490.58049964689263 131.1959999999999 L 490.58049964689263 135.83309999999983 L 486.10323302690796 135.83309999999983 L 486.10323302690796 143.61437999999907 L 486.10323302690796 135.83309999999983 L 481.6259664069233 135.83309999999983 L 481.6259664069233 130.6959999999999"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 481.6259664069233 131.1959999999999 L 486.10323302690796 131.1959999999999 L 486.10323302690796 119.88600000000042 L 486.10323302690796 131.1959999999999 L 490.58049964689263 131.1959999999999 L 490.58049964689263 135.83309999999983 L 486.10323302690796 135.83309999999983 L 486.10323302690796 143.61437999999907 L 486.10323302690796 135.83309999999983 L 481.6259664069233 135.83309999999983 L 481.6259664069233 130.6959999999999"
                                                                    pathFrom="M 486.10323302690796 135.83309999999983M 481.6259664069233 135.83309999999983"
                                                                    cy="131.1959999999999" cx="490.08049964689263"
                                                                    j="38" val="6599.95" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1724"
                                                                    d="M 494.4181567497366 134.29493999999977 L 498.8954233697213 134.29493999999977 L 498.8954233697213 132.98298000000068 L 498.8954233697213 134.29493999999977 L 503.372689989706 134.29493999999977 L 503.372689989706 156.03276000000005 L 498.8954233697213 156.03276000000005 L 498.8954233697213 157.45781999999963 L 498.8954233697213 156.03276000000005 L 494.4181567497366 156.03276000000005 L 494.4181567497366 133.79493999999977"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 494.4181567497366 134.29493999999977 L 498.8954233697213 134.29493999999977 L 498.8954233697213 132.98298000000068 L 498.8954233697213 134.29493999999977 L 503.372689989706 134.29493999999977 L 503.372689989706 156.03276000000005 L 498.8954233697213 156.03276000000005 L 498.8954233697213 157.45781999999963 L 498.8954233697213 156.03276000000005 L 494.4181567497366 156.03276000000005 L 494.4181567497366 133.79493999999977"
                                                                    pathFrom="M 498.8954233697213 156.03276000000005M 494.4181567497366 156.03276000000005"
                                                                    cy="134.29493999999977" cx="502.872689989706" j="39"
                                                                    val="6591.02" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1725"
                                                                    d="M 507.21034709255 156.03276000000005 L 511.6876137125347 156.03276000000005 L 511.6876137125347 128.7530399999996 L 511.6876137125347 156.03276000000005 L 516.1648803325194 156.03276000000005 L 516.1648803325194 156.07799999999952 L 511.6876137125347 156.07799999999952 L 511.6876137125347 156.07799999999952 L 511.6876137125347 156.07799999999952 L 507.21034709255 156.07799999999952 L 507.21034709255 155.53276000000005"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 507.21034709255 156.03276000000005 L 511.6876137125347 156.03276000000005 L 511.6876137125347 128.7530399999996 L 511.6876137125347 156.03276000000005 L 516.1648803325194 156.03276000000005 L 516.1648803325194 156.07799999999952 L 511.6876137125347 156.07799999999952 L 511.6876137125347 156.07799999999952 L 511.6876137125347 156.07799999999952 L 507.21034709255 156.07799999999952 L 507.21034709255 155.53276000000005"
                                                                    pathFrom="M 511.6876137125347 156.07799999999952M 507.21034709255 156.07799999999952"
                                                                    cy="156.03276000000005" cx="515.6648803325194"
                                                                    j="40" val="6591" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1726"
                                                                    d="M 520.0025374353634 153.8160000000007 L 524.479804055348 153.8160000000007 L 524.479804055348 132.7341600000018 L 524.479804055348 153.8160000000007 L 528.9570706753327 153.8160000000007 L 528.9570706753327 156.07799999999952 L 524.479804055348 156.07799999999952 L 524.479804055348 169.64999999999964 L 524.479804055348 156.07799999999952 L 520.0025374353634 156.07799999999952 L 520.0025374353634 153.3160000000007"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 520.0025374353634 153.8160000000007 L 524.479804055348 153.8160000000007 L 524.479804055348 132.7341600000018 L 524.479804055348 153.8160000000007 L 528.9570706753327 153.8160000000007 L 528.9570706753327 156.07799999999952 L 524.479804055348 156.07799999999952 L 524.479804055348 169.64999999999964 L 524.479804055348 156.07799999999952 L 520.0025374353634 156.07799999999952 L 520.0025374353634 153.3160000000007"
                                                                    pathFrom="M 524.479804055348 156.07799999999952M 520.0025374353634 156.07799999999952"
                                                                    cy="153.8160000000007" cx="528.4570706753327" j="41"
                                                                    val="6592" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1727"
                                                                    d="M 532.7947277781767 150.78492000000006 L 537.2719943981614 150.78492000000006 L 537.2719943981614 144.7453800000003 L 537.2719943981614 150.78492000000006 L 541.7492610181461 150.78492000000006 L 541.7492610181461 151.25993999999992 L 537.2719943981614 151.25993999999992 L 537.2719943981614 158.34000000000015 L 537.2719943981614 151.25993999999992 L 532.7947277781767 151.25993999999992 L 532.7947277781767 150.28492000000006"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 532.7947277781767 150.78492000000006 L 537.2719943981614 150.78492000000006 L 537.2719943981614 144.7453800000003 L 537.2719943981614 150.78492000000006 L 541.7492610181461 150.78492000000006 L 541.7492610181461 151.25993999999992 L 537.2719943981614 151.25993999999992 L 537.2719943981614 158.34000000000015 L 537.2719943981614 151.25993999999992 L 532.7947277781767 151.25993999999992 L 532.7947277781767 150.28492000000006"
                                                                    pathFrom="M 537.2719943981614 151.25993999999992M 532.7947277781767 151.25993999999992"
                                                                    cy="150.78492000000006" cx="541.2492610181461"
                                                                    j="42" val="6593.34" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1728"
                                                                    d="M 545.58691812099 149.6086800000012 L 550.0641847409747 149.6086800000012 L 550.0641847409747 124.95287999999891 L 550.0641847409747 149.6086800000012 L 554.5414513609594 149.6086800000012 L 554.5414513609594 150.78492000000006 L 550.0641847409747 150.78492000000006 L 550.0641847409747 175.01094000000012 L 550.0641847409747 150.78492000000006 L 545.58691812099 150.78492000000006 L 545.58691812099 149.1086800000012"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 545.58691812099 149.6086800000012 L 550.0641847409747 149.6086800000012 L 550.0641847409747 124.95287999999891 L 550.0641847409747 149.6086800000012 L 554.5414513609594 149.6086800000012 L 554.5414513609594 150.78492000000006 L 550.0641847409747 150.78492000000006 L 550.0641847409747 175.01094000000012 L 550.0641847409747 150.78492000000006 L 545.58691812099 150.78492000000006 L 545.58691812099 149.1086800000012"
                                                                    pathFrom="M 550.0641847409747 150.78492000000006M 545.58691812099 150.78492000000006"
                                                                    cy="149.6086800000012" cx="554.0414513609594" j="43"
                                                                    val="6593.86" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1729"
                                                                    d="M 558.3791084638035 135.6973799999996 L 562.8563750837882 135.6973799999996 L 562.8563750837882 126.03864000000067 L 562.8563750837882 135.6973799999996 L 567.3336417037729 135.6973799999996 L 567.3336417037729 149.6086800000012 L 562.8563750837882 149.6086800000012 L 562.8563750837882 166.09866000000147 L 562.8563750837882 149.6086800000012 L 558.3791084638035 149.6086800000012 L 558.3791084638035 135.1973799999996"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 558.3791084638035 135.6973799999996 L 562.8563750837882 135.6973799999996 L 562.8563750837882 126.03864000000067 L 562.8563750837882 135.6973799999996 L 567.3336417037729 135.6973799999996 L 567.3336417037729 149.6086800000012 L 562.8563750837882 149.6086800000012 L 562.8563750837882 166.09866000000147 L 562.8563750837882 149.6086800000012 L 558.3791084638035 149.6086800000012 L 558.3791084638035 135.1973799999996"
                                                                    pathFrom="M 562.8563750837882 149.6086800000012M 558.3791084638035 149.6086800000012"
                                                                    cy="135.6973799999996" cx="566.8336417037729" j="44"
                                                                    val="6600.01" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1730"
                                                                    d="M 571.1712988066168 131.62577999999849 L 575.6485654266015 131.62577999999849 L 575.6485654266015 128.45897999999943 L 575.6485654266015 131.62577999999849 L 580.1258320465862 131.62577999999849 L 580.1258320465862 144.20249999999942 L 575.6485654266015 144.20249999999942 L 575.6485654266015 152.0516400000015 L 575.6485654266015 144.20249999999942 L 571.1712988066168 144.20249999999942 L 571.1712988066168 131.12577999999849"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 571.1712988066168 131.62577999999849 L 575.6485654266015 131.62577999999849 L 575.6485654266015 128.45897999999943 L 575.6485654266015 131.62577999999849 L 580.1258320465862 131.62577999999849 L 580.1258320465862 144.20249999999942 L 575.6485654266015 144.20249999999942 L 575.6485654266015 152.0516400000015 L 575.6485654266015 144.20249999999942 L 571.1712988066168 144.20249999999942 L 571.1712988066168 131.12577999999849"
                                                                    pathFrom="M 575.6485654266015 144.20249999999942M 571.1712988066168 144.20249999999942"
                                                                    cy="131.62577999999849" cx="579.6258320465862"
                                                                    j="45" val="6596.25" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1731"
                                                                    d="M 583.9634891494302 128.95662000000084 L 588.4407557694149 128.95662000000084 L 588.4407557694149 126.21960000000036 L 588.4407557694149 128.95662000000084 L 592.9180223893995 128.95662000000084 L 592.9180223893995 144.20249999999942 L 588.4407557694149 144.20249999999942 L 588.4407557694149 158.34000000000015 L 588.4407557694149 144.20249999999942 L 583.9634891494302 144.20249999999942 L 583.9634891494302 128.45662000000084"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 583.9634891494302 128.95662000000084 L 588.4407557694149 128.95662000000084 L 588.4407557694149 126.21960000000036 L 588.4407557694149 128.95662000000084 L 592.9180223893995 128.95662000000084 L 592.9180223893995 144.20249999999942 L 588.4407557694149 144.20249999999942 L 588.4407557694149 158.34000000000015 L 588.4407557694149 144.20249999999942 L 583.9634891494302 144.20249999999942 L 583.9634891494302 128.45662000000084"
                                                                    pathFrom="M 588.4407557694149 144.20249999999942M 583.9634891494302 144.20249999999942"
                                                                    cy="128.95662000000084" cx="592.4180223893995"
                                                                    j="46" val="6602.99" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1732"
                                                                    d="M 596.7556794922435 128.95662000000084 L 601.2329461122282 128.95662000000084 L 601.2329461122282 122.14800000000105 L 601.2329461122282 128.95662000000084 L 605.7102127322129 128.95662000000084 L 605.7102127322129 163.29377999999997 L 601.2329461122282 163.29377999999997 L 601.2329461122282 169.6726200000012 L 601.2329461122282 163.29377999999997 L 596.7556794922435 163.29377999999997 L 596.7556794922435 128.45662000000084"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 596.7556794922435 128.95662000000084 L 601.2329461122282 128.95662000000084 L 601.2329461122282 122.14800000000105 L 601.2329461122282 128.95662000000084 L 605.7102127322129 128.95662000000084 L 605.7102127322129 163.29377999999997 L 601.2329461122282 163.29377999999997 L 601.2329461122282 169.6726200000012 L 601.2329461122282 163.29377999999997 L 596.7556794922435 163.29377999999997 L 596.7556794922435 128.45662000000084"
                                                                    pathFrom="M 601.2329461122282 163.29377999999997M 596.7556794922435 163.29377999999997"
                                                                    cy="128.95662000000084" cx="605.2102127322129"
                                                                    j="47" val="6587.81" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1733"
                                                                    d="M 609.547869835057 153.90647999999965 L 614.0251364550417 153.90647999999965 L 614.0251364550417 147.03000000000065 L 614.0251364550417 153.90647999999965 L 618.5024030750263 153.90647999999965 L 618.5024030750263 163.29377999999997 L 614.0251364550417 163.29377999999997 L 614.0251364550417 173.563259999999 L 614.0251364550417 163.29377999999997 L 609.547869835057 163.29377999999997 L 609.547869835057 153.40647999999965"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 609.547869835057 153.90647999999965 L 614.0251364550417 153.90647999999965 L 614.0251364550417 147.03000000000065 L 614.0251364550417 153.90647999999965 L 618.5024030750263 153.90647999999965 L 618.5024030750263 163.29377999999997 L 614.0251364550417 163.29377999999997 L 614.0251364550417 173.563259999999 L 614.0251364550417 163.29377999999997 L 609.547869835057 163.29377999999997 L 609.547869835057 153.40647999999965"
                                                                    pathFrom="M 614.0251364550417 163.29377999999997M 609.547869835057 163.29377999999997"
                                                                    cy="153.90647999999965" cx="618.0024030750263"
                                                                    j="48" val="6591.96" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1734"
                                                                    d="M 622.3400601778703 153.8838599999999 L 626.817326797855 153.8838599999999 L 626.817326797855 144.60966000000008 L 626.817326797855 153.8838599999999 L 631.2945934178397 153.8838599999999 L 631.2945934178397 161.98181999999906 L 626.817326797855 161.98181999999906 L 626.817326797855 169.64999999999964 L 626.817326797855 161.98181999999906 L 622.3400601778703 161.98181999999906 L 622.3400601778703 153.3838599999999"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 622.3400601778703 153.8838599999999 L 626.817326797855 153.8838599999999 L 626.817326797855 144.60966000000008 L 626.817326797855 153.8838599999999 L 631.2945934178397 153.8838599999999 L 631.2945934178397 161.98181999999906 L 626.817326797855 161.98181999999906 L 626.817326797855 169.64999999999964 L 626.817326797855 161.98181999999906 L 622.3400601778703 161.98181999999906 L 622.3400601778703 153.3838599999999"
                                                                    pathFrom="M 626.817326797855 161.98181999999906M 622.3400601778703 161.98181999999906"
                                                                    cy="153.8838599999999" cx="630.7945934178397" j="49"
                                                                    val="6588.39" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1735"
                                                                    d="M 635.1322505206837 148.68125999999938 L 639.6095171406683 148.68125999999938 L 639.6095171406683 139.76898000000074 L 639.6095171406683 148.68125999999938 L 644.086783760653 148.68125999999938 L 644.086783760653 163.76879999999983 L 639.6095171406683 163.76879999999983 L 639.6095171406683 163.76879999999983 L 639.6095171406683 163.76879999999983 L 635.1322505206837 163.76879999999983 L 635.1322505206837 148.18125999999938"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 635.1322505206837 148.68125999999938 L 639.6095171406683 148.68125999999938 L 639.6095171406683 139.76898000000074 L 639.6095171406683 148.68125999999938 L 644.086783760653 148.68125999999938 L 644.086783760653 163.76879999999983 L 639.6095171406683 163.76879999999983 L 639.6095171406683 163.76879999999983 L 639.6095171406683 163.76879999999983 L 635.1322505206837 163.76879999999983 L 635.1322505206837 148.18125999999938"
                                                                    pathFrom="M 639.6095171406683 163.76879999999983M 635.1322505206837 163.76879999999983"
                                                                    cy="148.68125999999938" cx="643.586783760653" j="50"
                                                                    val="6594.27" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1736"
                                                                    d="M 647.924440863497 143.52390000000014 L 652.4017074834817 143.52390000000014 L 652.4017074834817 133.45800000000054 L 652.4017074834817 143.52390000000014 L 656.8789741034664 143.52390000000014 L 656.8789741034664 143.77272000000085 L 652.4017074834817 143.77272000000085 L 652.4017074834817 158.34000000000015 L 652.4017074834817 143.77272000000085 L 647.924440863497 143.77272000000085 L 647.924440863497 143.02390000000014"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 647.924440863497 143.52390000000014 L 652.4017074834817 143.52390000000014 L 652.4017074834817 133.45800000000054 L 652.4017074834817 143.52390000000014 L 656.8789741034664 143.52390000000014 L 656.8789741034664 143.77272000000085 L 652.4017074834817 143.77272000000085 L 652.4017074834817 158.34000000000015 L 652.4017074834817 143.77272000000085 L 647.924440863497 143.77272000000085 L 647.924440863497 143.02390000000014"
                                                                    pathFrom="M 652.4017074834817 143.77272000000085M 647.924440863497 143.77272000000085"
                                                                    cy="143.52390000000014" cx="656.3789741034664"
                                                                    j="51" val="6596.55" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1737"
                                                                    d="M 660.7166312063104 135.67475999999988 L 665.193897826295 135.67475999999988 L 665.193897826295 124.40999999999985 L 665.193897826295 135.67475999999988 L 669.6711644462797 135.67475999999988 L 669.6711644462797 138.1855800000012 L 665.193897826295 138.1855800000012 L 665.193897826295 143.38818000000174 L 665.193897826295 138.1855800000012 L 660.7166312063104 138.1855800000012 L 660.7166312063104 135.17475999999988"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 660.7166312063104 135.67475999999988 L 665.193897826295 135.67475999999988 L 665.193897826295 124.40999999999985 L 665.193897826295 135.67475999999988 L 669.6711644462797 135.67475999999988 L 669.6711644462797 138.1855800000012 L 665.193897826295 138.1855800000012 L 665.193897826295 143.38818000000174 L 665.193897826295 138.1855800000012 L 660.7166312063104 138.1855800000012 L 660.7166312063104 135.17475999999988"
                                                                    pathFrom="M 665.193897826295 138.1855800000012M 660.7166312063104 138.1855800000012"
                                                                    cy="135.67475999999988" cx="669.1711644462797"
                                                                    j="52" val="6600.02" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1738"
                                                                    d="M 673.5088215491238 134.47589999999946 L 677.9860881691085 134.47589999999946 L 677.9860881691085 124.40999999999985 L 677.9860881691085 134.47589999999946 L 682.4633547890932 134.47589999999946 L 682.4633547890932 151.53138000000035 L 677.9860881691085 151.53138000000035 L 677.9860881691085 160.28531999999905 L 677.9860881691085 151.53138000000035 L 673.5088215491238 151.53138000000035 L 673.5088215491238 133.97589999999946"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 673.5088215491238 134.47589999999946 L 677.9860881691085 134.47589999999946 L 677.9860881691085 124.40999999999985 L 677.9860881691085 134.47589999999946 L 682.4633547890932 134.47589999999946 L 682.4633547890932 151.53138000000035 L 677.9860881691085 151.53138000000035 L 677.9860881691085 160.28531999999905 L 677.9860881691085 151.53138000000035 L 673.5088215491238 151.53138000000035 L 673.5088215491238 133.97589999999946"
                                                                    pathFrom="M 677.9860881691085 151.53138000000035M 673.5088215491238 151.53138000000035"
                                                                    cy="134.47589999999946" cx="681.9633547890932"
                                                                    j="53" val="6593.01" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1739"
                                                                    d="M 686.3010118919372 128.79827999999907 L 690.7782785119218 128.79827999999907 L 690.7782785119218 124.40999999999985 L 690.7782785119218 128.79827999999907 L 695.2555451319065 128.79827999999907 L 695.2555451319065 151.21470000000045 L 690.7782785119218 151.21470000000045 L 690.7782785119218 153.8160000000007 L 690.7782785119218 151.21470000000045 L 686.3010118919372 151.21470000000045 L 686.3010118919372 128.29827999999907"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 686.3010118919372 128.79827999999907 L 690.7782785119218 128.79827999999907 L 690.7782785119218 124.40999999999985 L 690.7782785119218 128.79827999999907 L 695.2555451319065 128.79827999999907 L 695.2555451319065 151.21470000000045 L 690.7782785119218 151.21470000000045 L 690.7782785119218 153.8160000000007 L 690.7782785119218 151.21470000000045 L 686.3010118919372 151.21470000000045 L 686.3010118919372 128.29827999999907"
                                                                    pathFrom="M 690.7782785119218 151.21470000000045M 686.3010118919372 151.21470000000045"
                                                                    cy="128.79827999999907" cx="694.7555451319065"
                                                                    j="54" val="6603.06" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1740"
                                                                    d="M 699.0932022347505 126.92081999999937 L 703.5704688547352 126.92081999999937 L 703.5704688547352 125.54100000000108 L 703.5704688547352 126.92081999999937 L 708.0477354747198 126.92081999999937 L 708.0477354747198 128.77566000000115 L 703.5704688547352 128.77566000000115 L 703.5704688547352 137.77842000000055 L 703.5704688547352 128.77566000000115 L 699.0932022347505 128.77566000000115 L 699.0932022347505 126.42081999999937"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 699.0932022347505 126.92081999999937 L 703.5704688547352 126.92081999999937 L 703.5704688547352 125.54100000000108 L 703.5704688547352 126.92081999999937 L 708.0477354747198 126.92081999999937 L 708.0477354747198 128.77566000000115 L 703.5704688547352 128.77566000000115 L 703.5704688547352 137.77842000000055 L 703.5704688547352 128.77566000000115 L 699.0932022347505 128.77566000000115 L 699.0932022347505 126.42081999999937"
                                                                    pathFrom="M 703.5704688547352 128.77566000000115M 699.0932022347505 128.77566000000115"
                                                                    cy="126.92081999999937" cx="707.5477354747198"
                                                                    j="55" val="6603.89" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1741"
                                                                    d="M 711.8853925775638 125.6767200000013 L 716.3626591975485 125.6767200000013 L 716.3626591975485 125.6767200000013 L 716.3626591975485 125.6767200000013 L 720.8399258175332 125.6767200000013 L 720.8399258175332 127.80299999999988 L 716.3626591975485 127.80299999999988 L 716.3626591975485 135.72000000000116 L 716.3626591975485 127.80299999999988 L 711.8853925775638 127.80299999999988 L 711.8853925775638 125.1767200000013"
                                                                    fill="rgba(238,99,82,1)" fill-opacity="1"
                                                                    stroke="#ee6352" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 711.8853925775638 125.6767200000013 L 716.3626591975485 125.6767200000013 L 716.3626591975485 125.6767200000013 L 716.3626591975485 125.6767200000013 L 720.8399258175332 125.6767200000013 L 720.8399258175332 127.80299999999988 L 716.3626591975485 127.80299999999988 L 716.3626591975485 135.72000000000116 L 716.3626591975485 127.80299999999988 L 711.8853925775638 127.80299999999988 L 711.8853925775638 125.1767200000013"
                                                                    pathFrom="M 716.3626591975485 127.80299999999988M 711.8853925775638 127.80299999999988"
                                                                    cy="125.6767200000013" cx="720.3399258175332" j="56"
                                                                    val="6603.5" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1742"
                                                                    d="M 724.6775829203773 126.98868000000039 L 729.154849540362 126.98868000000039 L 729.154849540362 126.69462000000021 L 729.154849540362 126.98868000000039 L 733.6321161603466 126.98868000000039 L 733.6321161603466 127.80299999999988 L 729.154849540362 127.80299999999988 L 729.154849540362 141.375 L 729.154849540362 127.80299999999988 L 724.6775829203773 127.80299999999988 L 724.6775829203773 126.48868000000039"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 724.6775829203773 126.98868000000039 L 729.154849540362 126.98868000000039 L 729.154849540362 126.69462000000021 L 729.154849540362 126.98868000000039 L 733.6321161603466 126.98868000000039 L 733.6321161603466 127.80299999999988 L 729.154849540362 127.80299999999988 L 729.154849540362 141.375 L 729.154849540362 127.80299999999988 L 724.6775829203773 127.80299999999988 L 724.6775829203773 126.48868000000039"
                                                                    pathFrom="M 729.154849540362 127.80299999999988M 724.6775829203773 127.80299999999988"
                                                                    cy="126.98868000000039" cx="733.1321161603466"
                                                                    j="57" val="6603.86" barWidth="8.954533239969356">
                                                                </path>
                                                                <path id="SvgjsPath1743"
                                                                    d="M 737.4697732631906 126.51366000000053 L 741.9470398831753 126.51366000000053 L 741.9470398831753 124.40999999999985 L 741.9470398831753 126.51366000000053 L 746.42430650316 126.51366000000053 L 746.42430650316 127.01130000000012 L 741.9470398831753 127.01130000000012 L 741.9470398831753 135.72000000000116 L 741.9470398831753 127.01130000000012 L 737.4697732631906 127.01130000000012 L 737.4697732631906 126.01366000000053"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 737.4697732631906 126.51366000000053 L 741.9470398831753 126.51366000000053 L 741.9470398831753 124.40999999999985 L 741.9470398831753 126.51366000000053 L 746.42430650316 126.51366000000053 L 746.42430650316 127.01130000000012 L 741.9470398831753 127.01130000000012 L 741.9470398831753 135.72000000000116 L 741.9470398831753 127.01130000000012 L 737.4697732631906 127.01130000000012 L 737.4697732631906 126.01366000000053"
                                                                    pathFrom="M 741.9470398831753 127.01130000000012M 737.4697732631906 127.01130000000012"
                                                                    cy="126.51366000000053" cx="745.92430650316" j="58"
                                                                    val="6604.07" barWidth="8.954533239969356"></path>
                                                                <path id="SvgjsPath1744"
                                                                    d="M 750.261963606004 122.14800000000105 L 754.7392302259886 122.14800000000105 L 754.7392302259886 122.14800000000105 L 754.7392302259886 122.14800000000105 L 759.2164968459733 122.14800000000105 L 759.2164968459733 124.45524000000114 L 754.7392302259886 124.45524000000114 L 754.7392302259886 126.51366000000053 L 754.7392302259886 124.45524000000114 L 750.261963606004 124.45524000000114 L 750.261963606004 121.64800000000105"
                                                                    fill="rgba(64,187,130,1)" fill-opacity="1"
                                                                    stroke="#40bb82" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="1"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-candlestick-area" index="0"
                                                                    clip-path="url(#gridRectMasks03i0mc5)"
                                                                    pathTo="M 750.261963606004 122.14800000000105 L 754.7392302259886 122.14800000000105 L 754.7392302259886 122.14800000000105 L 754.7392302259886 122.14800000000105 L 759.2164968459733 122.14800000000105 L 759.2164968459733 124.45524000000114 L 754.7392302259886 124.45524000000114 L 754.7392302259886 126.51366000000053 L 754.7392302259886 124.45524000000114 L 750.261963606004 124.45524000000114 L 750.261963606004 121.64800000000105"
                                                                    pathFrom="M 754.7392302259886 124.45524000000114M 750.261963606004 124.45524000000114"
                                                                    cy="122.14800000000105" cx="758.7164968459733"
                                                                    j="59" val="6606" barWidth="8.954533239969356">
                                                                </path>
                                                            </g>
                                                            <g id="SvgjsG1684" class="apexcharts-datalabels"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG1748" class="apexcharts-grid-borders">
                                                            <line id="SvgjsLine1764" x1="-11.14600988700565"
                                                                y1="0" x2="765.8852401129943" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine1769" x1="-11.14600988700565"
                                                                y1="226.2" x2="765.8852401129943" y2="226.2"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine1821" x1="-11.14600988700565"
                                                                y1="227.2" x2="765.8852401129944" y2="227.2"
                                                                stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt"></line>
                                                        </g>
                                                        <line id="SvgjsLine1772" x1="-11.14600988700565"
                                                            y1="0" x2="765.8852401129943" y2="0"
                                                            stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1773" x1="-11.14600988700565"
                                                            y1="0" x2="765.8852401129943" y2="0"
                                                            stroke-dasharray="0" stroke-width="0"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                                        </line>
                                                        <g id="SvgjsG1774" class="apexcharts-xaxis"
                                                            transform="translate(0, 0)">
                                                            <g id="SvgjsG1775" class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -4)"><text id="SvgjsText1777"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="12.792190342813365" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1778">23:00</tspan>
                                                                    <title>23:00</title>
                                                                </text><text id="SvgjsText1780"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="63.96095171406682" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1781">01:00</tspan>
                                                                    <title>01:00</title>
                                                                </text><text id="SvgjsText1783"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="115.12971308532028" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1784">03:00</tspan>
                                                                    <title>03:00</title>
                                                                </text><text id="SvgjsText1786"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="166.29847445657376" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1787">05:00</tspan>
                                                                    <title>05:00</title>
                                                                </text><text id="SvgjsText1789"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="217.46723582782724" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1790">07:00</tspan>
                                                                    <title>07:00</title>
                                                                </text><text id="SvgjsText1792"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="268.6359971990807" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1793">09:00</tspan>
                                                                    <title>09:00</title>
                                                                </text><text id="SvgjsText1795"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="319.8047585703342" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1796">11:00</tspan>
                                                                    <title>11:00</title>
                                                                </text><text id="SvgjsText1798"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="370.97351994158765" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1799">13:00</tspan>
                                                                    <title>13:00</title>
                                                                </text><text id="SvgjsText1801"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="422.14228131284113" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1802">15:00</tspan>
                                                                    <title>15:00</title>
                                                                </text><text id="SvgjsText1804"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="473.3110426840946" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1805">17:00</tspan>
                                                                    <title>17:00</title>
                                                                </text><text id="SvgjsText1807"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="524.479804055348" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1808">19:00</tspan>
                                                                    <title>19:00</title>
                                                                </text><text id="SvgjsText1810"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="575.6485654266014" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1811">21:00</tspan>
                                                                    <title>21:00</title>
                                                                </text><text id="SvgjsText1813"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="626.8173267978548" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1814">23:00</tspan>
                                                                    <title>23:00</title>
                                                                </text><text id="SvgjsText1816"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="677.9860881691081" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1817">01:00</tspan>
                                                                    <title>01:00</title>
                                                                </text><text id="SvgjsText1819"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="729.1548495403615" y="255.2" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="12px"
                                                                    font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan1820">03:00</tspan>
                                                                    <title>03:00</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG1842" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG1843" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG1844" class="apexcharts-point-annotations"></g>
                                                        <rect id="SvgjsRect1845" width="0" height="0" x="0"
                                                            y="0" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                        <rect id="SvgjsRect1846" width="0" height="0" x="0"
                                                            y="0" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(0, 143, 251);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                    <div class="apexcharts-xaxistooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div><!-- end col -->
            </div>
            <div class="row">
                {{-- @include('backend.dashboard.leads_monthly') --}}
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    <!-- End Page-content -->
@endsection


@section('scripts')

    <script>
        $(document).ready(function() {
            $('#start-mining').click(function() {
                var id = $(this).data('id');
                startMining(id);

            })
        })

        function startMining(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('start.mining') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    id
                },
                success: function(result) {

                },
                error: function(result) {
                    showToastify(result.msg, "error");

                    alert("Error " + result.status + ': ' + JSON.stringify(result.responseJSON.errors))

                }
            });
        }
    </script>
@endsection
