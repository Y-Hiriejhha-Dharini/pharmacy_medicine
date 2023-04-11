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
        Schema::create('pescription_uploads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('drug_id')->constrained('drugs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('drug_qty');
            $table->tinyInteger('status')->default(0)->comment('0-email sent, 1-accepted, 2-rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pescription_uploads');
    }
};
