<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo([
            'users_manage',
            'delete_tendik',
            'show_tendik',
            'update_tendik',
            'create_tendik',
            'delete_dosen',
            'show_dosen',
            'update_dosen',
            'create_dosen',
            'set_status_tendik',
            'set_status_dosen',
            'add_education_dosen',
            'add_jabfung_dosen',
            'add_inpassing_dosen',
            'add_certificate_dosen',
            'delete_education_dosen',
            'delete_jabfung_dosen',
            'delete_inpassing_dosen',
            'delete_certificate_dosen',
            'add_education_tendik',
            'add_certificate_tendik',
            'delete_education_tendik',
            'delete_certificate_tendik',
            'bas_menu',
            'efs_menu',
            'create_letter',
            'update_letter',
            'delete_letter',
            'read_letter',
            'create_employee_developments',
            'read_employee_developments',
            'update_employee_developments',
            'delete_employee_developments',
            'approve_employee_developments',
            'menu_employee_developments',
            'report_employee_developments',
            'create_job_vacancies',
            'read_job_vacancies',
            'update_job_vacancies',
            'delete_job_vacancies',
            'approve_job_vacancies',
            'menu_job_vacancies',
            'report_job_vacancies',
            'create_job_applicant',
            'read_job_applicant',
            'update_job_applicant',
            'delete_job_applicant',
            'approve_job_applicant',
            'menu_job_applicant',
            'report_job_applicant'
        ]);


        $role = Role::create(['name' => 'efs']);
        $role->givePermissionTo([
            'efs_menu',
            'create_letter',
            'update_letter',
            'delete_letter',
            'read_letter'
        ]);
        

        $role = Role::create(['name' => 'bas']);
        $role->givePermissionTo([
            'show_tendik',
            'update_tendik',
            'create_tendik',
            'show_dosen',
            'update_dosen',
            'create_dosen',
            'set_status_tendik',
            'set_status_dosen',
            'add_education_dosen',
            'add_jabfung_dosen',
            'add_inpassing_dosen',
            'add_certificate_dosen',
            'delete_education_dosen',
            'delete_jabfung_dosen',
            'delete_inpassing_dosen',
            'delete_certificate_dosen',
            'add_education_tendik',
            'add_certificate_tendik',
            'delete_education_tendik',
            'delete_certificate_tendik',
            'bas_menu',
            'approve_employee_developments',
            'menu_employee_developments',
            'report_employee_developments',
            'create_job_vacancies',
            'read_job_vacancies',
            'update_job_vacancies',
            'delete_job_vacancies',
            'approve_job_vacancies',
            'menu_job_vacancies',
            'report_job_vacancies',
            'create_job_applicant',
            'read_job_applicant',
            'update_job_applicant',
            'delete_job_applicant',
            'approve_job_applicant',
            'menu_job_applicant',
            'report_job_applicant'
        ]);
        

        $role = Role::create(['name' => 'GUEST']);
        $role->givePermissionTo([
            'view_profile',
            'view_attendances',
            'create_attendances',
            'create_request_attendances',
            'create_employee_developments',
            'read_employee_developments',
            'update_employee_developments',
            'delete_employee_developments',
            'menu_employee_developments'
        ]);        

        $role = Role::create(['name' => 'KOORDINATOR']);
        $role->givePermissionTo([
            'view_profile',
            'view_attendances',
            'create_attendances',
            'create_request_attendances',
            'view_presences',
            'create_employee_developments',
            'read_employee_developments',
            'update_employee_developments',
            'delete_employee_developments',
            'approve_employee_developments',
            'menu_employee_developments',
            'report_employee_developments'
        ]);
        
    }
}
