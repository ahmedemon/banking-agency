<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('member_name');
            $table->string('member_f_name');
            $table->string('member_m_name');
            $table->string('expect_loan_details');
            $table->integer('acount_type');
            $table->integer('loan_reason');
            $table->integer('previous_loan');
            $table->integer('loan_collection_method');
            $table->string('bank_check_details');
            $table->string('check_number');
            $table->integer('member_age');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->integer('member_phone');
            $table->integer('bank_account');
            $table->integer('loan_type');
            $table->integer('total_deposit');
            $table->integer('expect_loan_amount');
            $table->decimal('expect_loan_amount_percentage');
            $table->integer('yearly_income');
            $table->string('member_profession');
            $table->string('organization_name');
            $table->string('member_title');
            $table->integer('total_year');
            $table->integer('total_salary');
            $table->string('family_member');
            $table->string('business_type');
            $table->string('rent_or_owner');
            $table->string('is_ownership');
            $table->date('licence_issue_date');
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_applications');
    }
}
