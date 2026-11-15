<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('printer_material', function (Blueprint $table) {
            $table->foreignId('printer_id')
                ->constrained('printers')->cascadeOnDelete();
            $table->foreignId('material_id')
                ->constrained('materials')->cascadeOnDelete();
            $table->primary(['printer_id', 'material_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('printer_material');
    }
};