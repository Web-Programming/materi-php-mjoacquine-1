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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->decimal('price',10,2);
            $table->text('description')->nullble();
            $table->enum('status',['new','used'])->default('new');
            $table->boolean('is active')->default(true);
            $table->date('release_date')->nullble();
            //menambahkan kolom created_at dan updated_at secara otomayis
            $table->timestamps();


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
