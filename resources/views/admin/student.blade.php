@extends('admin.template.main')

@section('title', 'Students - EduGuard')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        eCommerce Dashboard</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">Home</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Students</li>
                        </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="apps/ecommerce/sales/listing.html" class="btn btn-sm fw-bold btn-secondary">Manage Sales</a>
                    <a href="apps/ecommerce/catalog/add-product.html" class="btn btn-sm fw-bold btn-primary">Add Product</a>
                </div>
            </div>
        </div>
        <p>Halaman Students</p>
    </div>
@endsection
