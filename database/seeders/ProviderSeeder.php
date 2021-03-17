<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */
    public function run()
    {
        $providers = [
            [
                'first_name'                    => 'John',
                'last_name'                     => 'Smith',
                'phone'                         => '821 222 7878',
                'email'                         => 'john@provider.com',
                'date_of_agreement'             => date('Y-m-d'),
                'practice'                      => '1 Year',
                'current_licensure'             => 'Paul',
                'collaborative_need'            => 'No',
                'practice_states'               => 'California',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'emr_system'                    => 'EMR System',
                'meeting_time'                  => 'On Weekend',
                'begin_seeing_patients'         => date('Y-m-d'),
                'agent_can_contact'             => 'No',
                'billing_company_can_contact'   => 'No',
                'monthly_budget'                => 15000,
                'additional_notes'              => 'Some additional notes',
                'percentage_of_chart'           => 47,
                'need_prescriptive_authority'   => 'Yes',
                'prescribing_substances'        => 'Some prescribing substances',
                'provider_need_collaborative_speak'     => 'No',
                'unique_request'                => 'Some unique request',
                'have_malpractice'              => 'Yes',
                'have_billing_company'          => 'Yes',
            ],
            [
                'first_name'                    => 'Paul',
                'last_name'                     => 'Smith',
                'phone'                         => '821 222 7878',
                'email'                         => 'paul@provider.com',
                'date_of_agreement'             => date('Y-m-d'),
                'practice'                      => '1 Year',
                'current_licensure'             => 'Paul',
                'collaborative_need'            => 'No',
                'practice_states'               => 'Florida',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'emr_system'                    => 'EMR System',
                'meeting_time'                  => 'On Weekend',
                'begin_seeing_patients'         => date('Y-m-d'),
                'agent_can_contact'             => 'No',
                'billing_company_can_contact'   => 'No',
                'monthly_budget'                => 9000,
                'additional_notes'              => 'Some additional notes',
                'percentage_of_chart'           => 47,
                'need_prescriptive_authority'   => 'Yes',
                'prescribing_substances'        => 'Some prescribing substances',
                'provider_need_collaborative_speak'     => 'No',
                'unique_request'                => 'Some unique request',
                'have_malpractice'              => 'Yes',
                'have_billing_company'          => 'Yes',
            ],
            [
                'first_name'                    => 'John',
                'last_name'                     => 'White',
                'phone'                         => '821 222 7878',
                'email'                         => 'white@provider.com',
                'date_of_agreement'             => date('Y-m-d'),
                'practice'                      => '1 Year',
                'current_licensure'             => 'Paul',
                'collaborative_need'            => 'No',
                'practice_states'               => 'Texas',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'emr_system'                    => 'EMR System',
                'meeting_time'                  => 'On Weekend',
                'begin_seeing_patients'         => date('Y-m-d'),
                'agent_can_contact'             => 'No',
                'billing_company_can_contact'   => 'No',
                'monthly_budget'                => 13500,
                'additional_notes'              => 'Some additional notes',
                'percentage_of_chart'           => 47,
                'need_prescriptive_authority'   => 'Yes',
                'prescribing_substances'        => 'Some prescribing substances',
                'provider_need_collaborative_speak'     => 'No',
                'unique_request'                => 'Some unique request',
                'have_malpractice'              => 'Yes',
                'have_billing_company'          => 'Yes',
            ],
            [
                'first_name'                    => 'John',
                'last_name'                     => 'Smith',
                'phone'                         => '821 222 7878',
                'email'                         => 'john@provider.com',
                'date_of_agreement'             => date('Y-m-d'),
                'practice'                      => '1 Year',
                'current_licensure'             => 'Paul',
                'collaborative_need'            => 'No',
                'practice_states'               => 'California',
                'communication_form'            => 'Phone Call',
                'collaborative_communication'   => 'Yes',
                'emr_system'                    => 'EMR System',
                'meeting_time'                  => 'On Weekend',
                'begin_seeing_patients'         => date('Y-m-d'),
                'agent_can_contact'             => 'No',
                'billing_company_can_contact'   => 'No',
                'monthly_budget'                => 15000,
                'additional_notes'              => 'Some additional notes',
                'percentage_of_chart'           => 47,
                'need_prescriptive_authority'   => 'Yes',
                'prescribing_substances'        => 'Some prescribing substances',
                'provider_need_collaborative_speak'     => 'No',
                'unique_request'                => 'Some unique request',
                'have_malpractice'              => 'Yes',
                'have_billing_company'          => 'Yes',
            ],
            
        ];

        Provider::insert($providers);
    }
}
