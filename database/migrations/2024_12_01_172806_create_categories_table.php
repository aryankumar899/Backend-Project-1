<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\app\Model\Category;
use Illuminate\Database\Eloquent\SoftDeletes;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_name');
            $table->string('category_name');
            $table->timestamps();
            $table->SoftDeletes();
           

        });
    }

    /**
    //  *  @return void
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        // $table->dropSoftDeletes();                      
        
    }
};
