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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {{/* job_tag is the pivot table that connects the jobs and tags tables, it basically tells which job is associated to which tag, since it's many to many relation */}
            $table->id();
            $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete(); //this means that if the job is deleted, the tag will also be deleted
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete(); //this means that if the tag is deleted, the job will also be deleted
            $table->timestamps();
        });
    }
    //A pivot table is a table used to connect two other tables in a many-to-many relationship. It takes the names of the two tables(singular form) and combines them into one name, in this case job_tag. It also contains the foreign keys of the two tables, in this case job_listing_id and tag_id. The pivot table is used to connect the two tables and create a many-to-many relationship between them.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};

/*

A pivot table is a table used to connect two other tables in a many-to-many relationship.

In your case, the pivot table is job_tag, and it connects:

Jobs (job_listings)

Tags (tags)

Example : 

Relational databases (like MySQL or PostgreSQL) don’t support many-to-many directly. So you create a third table (pivot table) to link the two.

For example:

Jobs Table

id	title
1	Developer
2	Designer
Tags Table

id	name
1	remote
2	full-time
job_tag (Pivot Table)

job_id	tag_id
1	    1
1	    2
2	    1

This say that a developer is both remote and full time, which is a many-to-many relationship.

Example : 

insert into job_tag(job_listing_id,tag_id) values (10,1);--means job with an id of 10 is associated with tag of 1
*/