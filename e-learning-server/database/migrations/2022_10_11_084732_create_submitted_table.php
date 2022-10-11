<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('submitted', function (Blueprint $table) {
            $table->foreignId("student_id")->constrained()->references("id")->on("users");
            $table->foreignId("assignment_id")->constrained()->references("id")->on("announcements");
            $table->string("file_url");
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('submitted');
    }
};
