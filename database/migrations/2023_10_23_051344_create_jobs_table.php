<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('description');
            $table->integer('opening_number')->unsigned();
            $table->integer('role');
            $table->string('company_name');
            $table->string('location');
            $table->string('salary');
            $table->enum('employment_type', [0, 1, 2])->comment('0: Full-time, 1: Part-time, 2: Contract');
            $table->date('posting_date');
            $table->date('application_deadline');
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        //
    }
}
