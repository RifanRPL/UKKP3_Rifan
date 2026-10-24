@include('cust.layout.header')

<div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">

                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0">Selamat Datang, {{ Auth::user()->name }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>   
<div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary-subtle ">
                                        <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0 font-size-15">Total</h6>
                                </div>
                            </div>

                            <div>
                                <h4 class="mt-4 pt-1 mb-0 font-size-22">0 <span class="text-success fw-medium font-size-13 align-middle"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary-subtle ">
                                        <i class="bx bx-cart-alt font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0 font-size-15">Total</h6>
                                </div>
                            </div>

                            <div>
                                <h4 class="mt-4 pt-1 mb-0 font-size-22">0<span class="text-danger fw-medium font-size-13 align-middle"> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary-subtle ">
                                        <i class="bx bx-package font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0 font-size-15">Today</h6>
                                </div>
                            </div>

                            <div>
                                <h4 class="mt-4 pt-1 mb-0 font-size-22">0<span class="text-danger fw-medium font-size-13 align-middle"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary-subtle ">
                                        <i class="bx bx-rocket font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0 font-size-15">Total</h6>
                                </div>

                            </div>

                            <div>
                                <h4 class="mt-4 pt-1 mb-0 font-size-22">0<span class="text-success fw-medium font-size-13 align-middle"> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('cust.layout.footer')