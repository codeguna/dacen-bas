<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="container mt-5">
                    <div id="stepper" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#step1"> <button  class="btn step-trigger"
                                    role="tab" id="steppertrigger1" aria-controls="step1"> <span
                                        class="bs-stepper-circle">1</span> <span class="bs-stepper-label">Data
                                        Pribadi</span> </button> </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step2"> <button  class="btn step-trigger"
                                    role="tab" id="steppertrigger2" aria-controls="step2"> <span
                                        class="bs-stepper-circle">2</span> <span class="bs-stepper-label">Data
                                        Alamat</span> </button> </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step3"> <button  class="btn step-trigger"
                                    role="tab" id="steppertrigger3" aria-controls="step3"> <span
                                        class="bs-stepper-circle">3</span> <span class="bs-stepper-label">Data
                                        Kontak</span> </button> </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form action="{{ route('admin.job-applicants.save-applicant') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                                @csrf
                                <div id="step1" class="content" role="tabpanel" aria-labelledby="steppertrigger1">
                                    {{-- FORM --}}
                                    @include('job-applicant.form.personal')
                                    {{-- END FORM --}}
                                    <button  class="btn btn-primary" onclick="stepper.next()"><i
                                            class="fa fa-arrow-right" aria-hidden="true"></i> Tahap Berikutnya</button>
                                </div>
                                <div id="step2" class="content" role="tabpanel" aria-labelledby="steppertrigger2">
                                    {{-- FORM --}}
                                    @include('job-applicant.form.address')
                                    {{-- END FORM --}}
                                    <button  class="btn btn-primary" onclick="stepper.previous()"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Sebelumnya</button> <button  class="btn btn-primary"
                                        onclick="stepper.next()"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        Berikutnya</button>
                                </div>
                                <div id="step3" class="content" role="tabpanel" aria-labelledby="steppertrigger3">
                                    {{-- FORM --}}
                                    @include('job-applicant.form.contact')
                                    {{-- FORM --}}
                                    <button  class="btn btn-primary" onclick="stepper.previous()"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Sebelumnya</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"
                                            aria-hidden="true"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
