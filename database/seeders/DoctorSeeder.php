<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            [
                'first_name'                    => 'Gerry',
                'last_name'                     => 'Helton',
                'phone'                         => '821 222 7878',
                'email'                         => 'gerry@doctor.com',
                'address'                       => '2019 Upland Avenue Miller City, OH 45864',
                'practice'                      => '1 Year',
                'experience'                    => '3 Years',
                'specialization'                => 'Cardialogy',
                'certifications'                => 'Some Certifications',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'states_licensed'               => 'California',
                'have_malpractice'              => 'Yes',
                'additional_notes'              => 'Some additional notes',
                'monthly_stipend'               => 9000,
            ],
            [
                'first_name'                    => 'David',
                'last_name'                     => 'Munoz',
                'phone'                         => '821 222 7878',
                'email'                         => 'david@doctor.com',
                'address'                       => '2019 Upland Avenue Miller City, OH 45864',
                'practice'                      => '1.5 Years',
                'experience'                    => '3 Years',
                'specialization'                => 'Cardialogy',
                'certifications'                => 'Some Certifications',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'states_licensed'               => 'Texas',
                'have_malpractice'              => 'Yes',
                'additional_notes'              => 'Some additional notes',
                'monthly_stipend'               => 15000,
            ],
            [
                'first_name'                    => 'David',
                'last_name'                     => 'Campbell',
                'phone'                         => '821 222 7878',
                'email'                         => 'campbell@doctor.com',
                'address'                       => '2019 Upland Avenue Miller City, OH 45864',
                'practice'                      => '1 Year',
                'experience'                    => '3 Years',
                'specialization'                => 'Cardialogy',
                'certifications'                => 'Some Certifications',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'states_licensed'               => 'Washington',
                'have_malpractice'              => 'Yes',
                'additional_notes'              => 'Some additional notes',
                'monthly_stipend'               => 12000,
            ],
            [
                'first_name'                    => 'Perry',
                'last_name'                     => 'Rocco',
                'phone'                         => '821 222 7878',
                'email'                         => 'rocco@doctor.com',
                'address'                       => '2019 Upland Avenue Miller City, OH 45864',
                'practice'                      => '1 Year',
                'experience'                    => '3 Years',
                'specialization'                => 'Cardialogy',
                'certifications'                => 'Some Certifications',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'states_licensed'               => 'Alaska',
                'have_malpractice'              => 'Yes',
                'additional_notes'              => 'Some additional notes',
                'monthly_stipend'               => 82000,
            ],
            
        ];

        Doctor::insert($doctors);
    }
}
