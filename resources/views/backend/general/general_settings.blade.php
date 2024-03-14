@extends('backend.main')
@section('title', 'General Settings')


@section('styles')
    <script language="javascript" type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.6/codemirror.min.js"></script>
    <script language="javascript" type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.6/mode/perl/perl.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.6/codemirror.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.6/theme/abbott.min.css">

@endsection

@push('pagestyles')
@endpush

@section('scripts')
@endsection




@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Site Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">General</a>
                                </li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab"
                                        aria-selected="false">
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#headerScripts" role="tab"
                                        aria-selected="false">
                                        Scripts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#pageCSS" role="tab"
                                        aria-selected="false">
                                        Global CSS
                                    </a>
                                </li>


                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content  text-muted">
                                <div class="tab-pane active" id="general" role="tabpanel">
                                    <h6>General Settings</h6>
                                    <form action="{{ route('general.settings.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="company_name"
                                                            class="form-label ">company_name</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="company_name"
                                                                class=" form-control inputs" id="company_name"
                                                                placeholder="Enter company_name" value="{{fromSettings('company_name')}}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="phone_number"
                                                            class="form-label ">phone_number</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="phone_number"
                                                                class=" form-control inputs" id="phone_number"
                                                                placeholder="Enter phone_number" value="{{fromSettings('phone_number')}}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="email" class="form-label ">email</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="email"
                                                                class=" form-control inputs" id="email"
                                                                placeholder="Enter email" value="{{fromSettings('email')}}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="address" class="form-label ">address</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="address"
                                                                class=" form-control inputs" id="address"
                                                                placeholder="Enter address" value="{{fromSettings('address')}}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="city_name" class="form-label ">city_name</label>
                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="city_name"
                                                                class=" form-control inputs" id="city_name"
                                                                placeholder="Enter city_name" value="{{fromSettings('city_name')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="lead_receiver_email" class="form-label ">lead_receiver_email</label>
                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="lead_receiver_email"
                                                                class=" form-control inputs" id="lead_receiver_email"
                                                                placeholder="Enter lead_receiver_email" value="{{fromSettings('lead_receiver_email')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="email_bcc" class="form-label ">email_bcc</label>
                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="email" name="email_bcc"
                                                                class=" form-control inputs" id="email_bcc"
                                                                placeholder="Enter email_bcc" value="{{fromSettings('email_bcc')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="email_cc" class="form-label ">email_cc</label>
                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="email_cc"
                                                                class=" form-control inputs" id="email_cc"
                                                                placeholder="Enter email_cc" value="{{fromSettings('email_cc')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="whatsapp" class="form-label ">whatsapp</label>
                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="whatsapp"
                                                                class=" form-control inputs" id="whatsapp"
                                                                placeholder="Enter whatsapp" value="{{fromSettings('whatsapp')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="lead_receiver_phone" class="form-label ">lead_receiver_phone</label>
                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="text" name="lead_receiver_phone"
                                                                class=" form-control inputs" id="lead_receiver_phone"
                                                                placeholder="Enter lead_receiver_phone" value="{{fromSettings('lead_receiver_phone')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="logo" class="form-label ">logo</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="file" name="logo"
                                                                class=" form-control inputs" id="logo">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div><!--end col-->
                                            <div class="col-6 mt-3">
                                                <img src="{{ asset(fromSettings('logo')) }}" alt="" class="img-thumbnail img-responsive ">
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="logo_dark" class="form-label ">logo_dark</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="file" name="logo_dark"
                                                                class=" form-control inputs" id="logo_dark">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div><!--end col-->
                                            <div class="col-6 mt-3">
                                                <img src="{{ asset(fromSettings('logo_dark')) }}" alt="" class="img-thumbnail img-responsive ">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="fav_icon_backend" class="form-label ">fav_icon_backend</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="file" name="fav_icon_backend"
                                                                class=" form-control inputs" id="fav_icon_backend">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div><!--end col-->
                                            <div class="col-6 mt-3">
                                                <img src="{{ asset(fromSettings('fav_icon_backend')) }}" alt="" class="img-thumbnail img-responsive ">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="fav_icon_frontend" class="form-label ">fav_icon_frontend</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="file" name="fav_icon_frontend"
                                                                class=" form-control inputs" id="fav_icon_frontend">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div><!--end col-->
                                            <div class="col-6 mt-3">
                                                <img src="{{ asset(fromSettings('fav_icon_frontend')) }}" alt="" class="img-thumbnail img-responsive ">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-6 mt-3">
                                                <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-3">
                                                        <label for="watermark"
                                                            class="form-label ">watermark</label>

                                                    </div>
                                                    <div class="col-xxl-9 col-md-9">
                                                        <div>
                                                            <input type="file" name="watermark"
                                                                class=" form-control inputs" id="watermark" >
                                                        </div>
                                                    </div>
                                                </div>


                                            </div><!--end col-->
                                            <div class="col-6 mt-3">
                                                <img src="{{ asset(fromSettings('watermark'))}}" alt="">
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>
                                <div class="tab-pane " id="headerScripts" role="tabpanel">
                                    <form action="{{ route('general.settings.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group col-md-12  mb-2">
                                            <label for="scripts">Header Scripts</label>
                                            <div>
                                                <textarea name="scripts" class="form-control" id="codemirror">{!! base64_decode(fromSettings('scripts')) !!}</textarea>
                                            </div>

                                        </div>
                                        <div class="form-group col-md-12 mb-3 text-right">
                                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane " id="pageCSS" role="tabpanel">
                                    <form action="{{ route('general.settings.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="styles">Global CSS</label>
                                            <div>
                                                <textarea name="styles" class="form-control" id="styles">{!! base64_decode(fromSettings('styles')) !!}</textarea>
                                            </div>

                                        </div>
                                        <div class="form-group col-md-12 mb-3 text-right">
                                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!--end col-->


            </div>

        </div>
    </div>


@endsection


@push('pagescripts')
    <script>
        $(document).ready(function() {
            var editor = CodeMirror.fromTextArea(document.getElementById('codemirror'), {
                lineNumbers: true,
                matchBrackets: true

            });
            var editor2 = CodeMirror.fromTextArea(document.getElementById('styles'), {
                lineNumbers: true,
                matchBrackets: true

            });
        })
    </script>
@endpush
