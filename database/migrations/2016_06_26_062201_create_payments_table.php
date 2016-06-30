<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('import_id')->unsigned();
            $table->foreign('import_id')->references('id')->on('imports');

            $table->string('covered_recipient_type')->nullable();
            $table->string('teaching_hospital_id')->nullable();
            $table->string('teaching_hospital_name')->nullable();
            $table->string('physician_profile_id')->nullable();
            $table->string('physician_first_name')->nullable();
            $table->string('physician_middle_name')->nullable();
            $table->string('physician_last_name')->nullable();
            $table->string('physician_name_suffix')->nullable();
            $table->string('recipient_primary_business_street_address_line1')->nullable();
            $table->string('recipient_primary_business_street_address_line2')->nullable();
            $table->string('recipient_city')->nullable();
            $table->string('recipient_state')->nullable();
            $table->string('recipient_zip_code')->nullable();
            $table->string('recipient_country')->nullable();
            $table->string('recipient_province')->nullable();
            $table->string('recipient_postal_code')->nullable();
            $table->string('physician_primary_type')->nullable();
            $table->string('physician_specialty')->nullable();
            $table->string('physician_license_state_code1')->nullable();
            $table->string('physician_license_state_code2')->nullable();
            $table->string('physician_license_state_code3')->nullable();
            $table->string('physician_license_state_code4')->nullable();
            $table->string('physician_license_state_code5')->nullable();
            $table->string('submitting_applicable_manufacturer_or_applicable_gpo_name')->nullable();
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_id')->nullable();
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_name')->nullable();
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_state')->nullable();
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_country')->nullable();
            $table->float('total_amount_of_payment_usdollars')->nullable();
            $table->timestamp('date_of_payment')->nullable();
            $table->integer('number_of_payments_included_in_total_amount')->nullable();
            $table->string('form_of_payment_or_transfer_of_value')->nullable();
            $table->string('nature_of_payment_or_transfer_of_value')->nullable();
            $table->string('city_of_travel')->nullable();
            $table->string('state_of_travel')->nullable();
            $table->string('country_of_travel')->nullable();
            $table->string('physician_ownership_indicator')->nullable();
            $table->string('third_party_payment_recipient_indicator')->nullable();
            $table->string('name_of_third_party_entity_receiving_payment_or_transfer_of_valu')->nullable();
            $table->string('charity_indicator')->nullable();
            $table->string('third_party_equals_covered_recipient_indicator')->nullable();
            $table->string('contextual_information')->nullable();
            $table->string('delay_in_publication_indicator')->nullable();
            $table->string('record_id')->nullable();
            $table->string('dispute_status_for_publication')->nullable();
            $table->string('product_indicator')->nullable();
            $table->string('name_of_associated_covered_drug_or_biological1')->nullable();
            $table->string('name_of_associated_covered_drug_or_biological2')->nullable();
            $table->string('name_of_associated_covered_drug_or_biological3')->nullable();
            $table->string('name_of_associated_covered_drug_or_biological4')->nullable();
            $table->string('name_of_associated_covered_drug_or_biological5')->nullable();
            $table->string('ndc_of_associated_covered_drug_or_biological1')->nullable();
            $table->string('ndc_of_associated_covered_drug_or_biological2')->nullable();
            $table->string('ndc_of_associated_covered_drug_or_biological3')->nullable();
            $table->string('ndc_of_associated_covered_drug_or_biological4')->nullable();
            $table->string('ndc_of_associated_covered_drug_or_biological5')->nullable();
            $table->string('name_of_associated_covered_device_or_medical_supply1')->nullable();
            $table->string('name_of_associated_covered_device_or_medical_supply2')->nullable();
            $table->string('name_of_associated_covered_device_or_medical_supply3')->nullable();
            $table->string('name_of_associated_covered_device_or_medical_supply4')->nullable();
            $table->string('name_of_associated_covered_device_or_medical_supply5')->nullable();
            $table->integer('program_year')->nullable();
            $table->timestamp('payment_publication_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
