<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear'); 
        Artisan::call('composer dump-autoload');
               
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users_manage']);
        //TENDIK
        Permission::create(['name' => 'delete_tendik']);
        Permission::create(['name' => 'show_tendik']);
        Permission::create(['name' => 'update_tendik']);
        Permission::create(['name' => 'create_tendik']);
        // DOSEN
        Permission::create(['name' => 'delete_dosen']);
        Permission::create(['name' => 'show_dosen']);
        Permission::create(['name' => 'update_dosen']);
        Permission::create(['name' => 'create_dosen']);
        //SET STATUS AKTIF/NON AKTIF
        Permission::create(['name' => 'set_status_tendik']);
        Permission::create(['name' => 'set_status_dosen']);
        //ADD DATA DOSEN
        Permission::create(['name' => 'add_education_dosen']);
        Permission::create(['name' => 'add_jabfung_dosen']);
        Permission::create(['name' => 'add_inpassing_dosen']);
        Permission::create(['name' => 'add_certificate_dosen']);
        Permission::create(['name' => 'delete_education_dosen']);
        Permission::create(['name' => 'delete_jabfung_dosen']);
        Permission::create(['name' => 'delete_inpassing_dosen']);
        Permission::create(['name' => 'delete_certificate_dosen']);
        //ADD DATA TENDIK
        Permission::create(['name' => 'add_education_tendik']);
        Permission::create(['name' => 'add_certificate_tendik']);
        Permission::create(['name' => 'delete_education_tendik']);
        Permission::create(['name' => 'delete_certificate_tendik']);

        //ADD GUEST
        Permission::create(['name' => 'view_attendances']);
        Permission::create(['name' => 'create_attendances']);
        Permission::create(['name' => 'view_profile']);

        //BAS
        Permission::create(['name' => 'bas_menu']);

        //EFS
        Permission::create(['name' => 'efs_menu']);
        Permission::create(['name' => 'create_letter']);
        Permission::create(['name' => 'update_letter']);
        Permission::create(['name' => 'delete_letter']);
        Permission::create(['name' => 'read_letter']);


        //KOORDINATOR
        Permission::create(['name' => 'view_presences']);

        //PENGEMBANGAN KARYAWAN
        Permission::create(['name' => 'create_employee_developments']);
        Permission::create(['name' => 'read_employee_developments']);
        Permission::create(['name' => 'update_employee_developments']);
        Permission::create(['name' => 'delete_employee_developments']);
        Permission::create(['name' => 'approve_employee_developments']);
        Permission::create(['name' => 'menu_employee_developments']);
        Permission::create(['name' => 'report_employee_developments']);

        //PEMBUATAN LOWONGAN KARYAWAN
        Permission::create(['name' => 'create_job_vacancies']);
        Permission::create(['name' => 'read_job_vacancies']);
        Permission::create(['name' => 'update_job_vacancies']);
        Permission::create(['name' => 'delete_job_vacancies']);
        Permission::create(['name' => 'approve_job_vacancies']);
        Permission::create(['name' => 'menu_job_vacancies']);
        Permission::create(['name' => 'report_job_vacancies']);

        //PEMBUATAN LOWONGAN KARYAWAN
        Permission::create(['name' => 'create_job_applicant']);
        Permission::create(['name' => 'read_job_applicant']);
        Permission::create(['name' => 'update_job_applicant']);
        Permission::create(['name' => 'delete_job_applicant']);
        Permission::create(['name' => 'approve_job_applicant']);
        Permission::create(['name' => 'menu_job_applicant']);
        Permission::create(['name' => 'report_job_applicant']);
    }
}
