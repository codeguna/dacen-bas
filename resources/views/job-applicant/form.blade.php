<div class="box box-info padding-1">
    <div class="box-body">
        {{-- <input type="hidden" class="form-control" name="job_vacancies_id"
                value="{{ $jobapplicant_id}}">
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="form-group">
            <label for="front_title">Front Title</label>
            <input type="text" class="form-control" id="front_title" name="front_title">
        </div>
        <div class="form-group">
            <label for="back_title">Back Title</label>
            <input type="text" class="form-control" id="back_title" name="back_title">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender">
        </div>
        <div class="form-group">
            <label for="born_place">Born Place</label>
            <input type="text" class="form-control" id="born_place" name="born_place">
        </div>
        <div class="form-group">
            <label for="born_date">Born Date</label>
            <input type="text" class="form-control" id="born_date" name="born_date">
        </div>
        <div class="form-group">
            <label for="date_of_application">Date of Application</label>
            <input type="text" class="form-control" id="date_of_application" name="date_of_application">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" class="form-control" id="level" name="level">
        </div>
        <div class="form-group">
            <label for="university">University</label>
            <input type="text" class="form-control" id="university" name="university">
        </div>
        <div class="form-group">
            <label for="major">Major</label>
            <input type="text" class="form-control" id="major" name="major">
        </div>
        <div class="form-group">
            <label for="university_base">University Base</label>
            <input type="text" class="form-control" id="university_base" name="university_base">
        </div>
        <div class="form-group">
            <label for="graduation_year">Graduation Year</label>
            <input type="text" class="form-control" id="graduation_year" name="graduation_year">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
    </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="container mt-5">
                    <div id="stepper" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#step1"> <button type="button" class="btn step-trigger"
                                    role="tab" id="steppertrigger1" aria-controls="step1"> <span
                                        class="bs-stepper-circle">1</span> <span class="bs-stepper-label">Data
                                        Pribadi</span> </button> </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step2"> <button type="button" class="btn step-trigger"
                                    role="tab" id="steppertrigger2" aria-controls="step2"> <span
                                        class="bs-stepper-circle">2</span> <span class="bs-stepper-label">Data
                                        Alamat</span> </button> </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step3"> <button type="button" class="btn step-trigger"
                                    role="tab" id="steppertrigger3" aria-controls="step3"> <span
                                        class="bs-stepper-circle">3</span> <span class="bs-stepper-label">Data
                                        Kontak</span> </button> </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form>
                                <div id="step1" class="content" role="tabpanel" aria-labelledby="steppertrigger1">
                                    {{-- FORM --}}
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="front_title">Front Title</label>
                                        <input type="text" class="form-control" id="front_title" name="front_title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="back_title">Back Title</label>
                                        <input type="text" class="form-control" id="back_title" name="back_title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <input type="text" class="form-control" id="gender" name="gender" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="born_place">Born Place</label>
                                        <input type="text" class="form-control" id="born_place" name="born_place" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="born_date">Born Date</label>
                                        <input type="text" class="form-control" id="born_date" name="born_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_application">Date of Application</label>
                                        <input type="text" class="form-control" id="date_of_application" name="date_of_application" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <input type="text" class="form-control" id="level" name="level" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="university">University</label>
                                        <input type="text" class="form-control" id="university" name="university" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="major">Major</label>
                                        <input type="text" class="form-control" id="major" name="major" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="university_base">University Base</label>
                                        <input type="text" class="form-control" id="university_base" name="university_base" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="graduation_year">Graduation Year</label>
                                        <input type="text" class="form-control" id="graduation_year" name="graduation_year" required>
                                    </div>
                                    
                                    {{-- END FORM --}}
                                    <button type="button" class="btn btn-primary"
                                        onclick="stepper.next()">Next</button>
                                </div>
                                <div id="step2" class="content" role="tabpanel" aria-labelledby="steppertrigger2">
                                    <div class="form-group"> <label for="address">Alamat</label> <input type="text"
                                            class="form-control" id="address" name="address"> </div> <button
                                        type="button" class="btn btn-primary"
                                        onclick="stepper.previous()">Previous</button> <button type="button"
                                        class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="step3" class="content" role="tabpanel" aria-labelledby="steppertrigger3">
                                    <div class="form-group"> <label for="contact">Nomor Kontak</label> <input
                                            type="text" class="form-control" id="contact" name="contact"> </div>
                                    <button type="button" class="btn btn-primary"
                                        onclick="stepper.previous()">Previous</button> <button type="submit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
