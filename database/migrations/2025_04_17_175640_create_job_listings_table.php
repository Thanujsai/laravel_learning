<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            //foreign id called employer_id which says the job listing belongs to an employer
            //$table->unsignedBigInteger('employer_id');//this is the foreign key that references the id of the employer, so we need to create a foreign key constraint
            $table->foreignIdFor(App\Models\Employer::class);
            $table->string('title');//title and salary are the fields in our job model, it needs to be present in the table too, so we need to create the table with these fields
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
