@extends('layouts.app')
@section('content')
    <p class="fs-4 text-dark" style="font-weight: 600">
        Pelatihan
    </p>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-header gap-3">
            <div class="">
                <button class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 10L12 15L17 10" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 15V3" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
        <div class="">
            <button data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl" class="btn text-white" style="background-color:#1B3061">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 4C12.5523 4 13 4.35817 13 4.8V19.2C13 19.6418 12.5523 20 12 20C11.4477 20 11 19.6418 11 19.2V4.8C11 4.35817 11.4477 4 12 4Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4 12C4 11.4477 4.35817 11 4.8 11H19.2C19.6418 11 20 11.4477 20 12C20 12.5523 19.6418 13 19.2 13H4.8C4.35817 13 4 12.5523 4 12Z"
                        fill="white" />
                </svg>Tambah Pelatihan
            </button>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1B3061">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Tambah Pelatihan</h5>
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-4">Basic Wizard</h4>

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Seller Details</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">First name</label>
                                            <input type="text" class="form-control" id="basicpill-firstname-input" placeholder="Enter Your First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Last name</label>
                                            <input type="text" class="form-control" id="basicpill-lastname-input" placeholder="Enter Your Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input">Phone</label>
                                            <input type="text" class="form-control" id="basicpill-phoneno-input" placeholder="Enter Your Phone No.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input">Email</label>
                                            <input type="email" class="form-control" id="basicpill-email-input" placeholder="Enter Your Email ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="basicpill-address-input">Address</label>
                                            <textarea id="basicpill-address-input" class="form-control" rows="2" placeholder="Enter Your Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <!-- Company Document -->
                        <h3>Company Document</h3>
                        <section>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-pancard-input">PAN Card</label>
                                            <input type="text" class="form-control" id="basicpill-pancard-input" placeholder="Enter Your PAN No.">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-vatno-input">VAT/TIN No.</label>
                                            <input type="text" class="form-control" id="basicpill-vatno-input"  placeholder="Enter Your VAT/TIN No.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input">CST No.</label>
                                            <input type="text" class="form-control" id="basicpill-cstno-input" placeholder="Enter Your CST No.">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-servicetax-input">Service Tax No.</label>
                                            <input type="text" class="form-control" id="basicpill-servicetax-input" placeholder="Enter Your Service Tax No.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-companyuin-input">Company UIN</label>
                                            <input type="text" class="form-control" id="basicpill-companyuin-input" placeholder="Enter Your Company UIN">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-declaration-input">Declaration</label>
                                            <input type="text" class="form-control" id="basicpill-Declaration-input" placeholder="Declaration Details">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <!-- Bank Details -->
                        <h3>Bank Details</h3>
                        <section>
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-namecard-input">Name on Card</label>
                                                <input type="text" class="form-control" id="basicpill-namecard-input" placeholder="Enter Your Name on Card">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Credit Card Type</label>
                                                <select class="form-select">
                                                      <option selected>Select Card Type</option>
                                                      <option value="AE">American Express</option>
                                                      <option value="VI">Visa</option>
                                                      <option value="MC">MasterCard</option>
                                                      <option value="DI">Discover</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cardno-input">Credit Card Number</label>
                                                <input type="text" class="form-control" id="basicpill-cardno-input"  placeholder="Credit Card Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-card-verification-input">Card Verification Number</label>
                                                <input type="text" class="form-control" id="basicpill-card-verification-input" placeholder="Credit Verification Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-expiration-input">Expiration Date</label>
                                                <input type="text" class="form-control" id="basicpill-expiration-input" placeholder="Card Expiration Date">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                              </div>
                        </section>

                        <!-- Confirm Details -->
                        <h3>Confirm Detail</h3>
                        <section>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                        </div>
                                        <div>
                                            <h5>Confirm Detail</h5>
                                            <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn text-white" style="background-color: #1B3061">Tambah</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="row mt-4">
        <div class="col-12 col-xl-4 col-md-6">
            <div class="card p-4">
                <div class="mb-3">
                    <span class="badge fs-6 bg-info text-white">2002</span>
                </div>
                <div class="mb-3">
                    <h4>PJL Kel. Purwosari Kec. Purwosari</h4>
                </div>
                <div class="row">
                    <div class="col-4" >
                        <button style="min-width: 90px" class="btn btn-danger">Hapus</button>
                    </div>
                    <div class="col-4" >
                        <button style="min-width: 90px" class="btn btn-warning">Edit</button>
                    </div>
                    <div class="col-4" >
                        <button style="min-width: 90px;background-color: #1B3061" class="btn text-white">Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
@endsection