<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('printer_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('printer_id')->constrained('printers')->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['printer_id', 'locale']);
            $table->index('locale');
        });

        // Існуючі описи переносимо як переклад основною мовою (uk)
        DB::table('printers')->orderBy('id')->each(function ($printer) {
            DB::table('printer_translations')->insert([
                'printer_id' => $printer->id,
                'locale' => 'uk',
                'title' => $printer->name,
                'description' => $printer->description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        Schema::table('printers', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }

    public function down(): void
    {
        Schema::table('printers', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        DB::table('printer_translations')->where('locale', 'uk')->orderBy('id')->each(function ($translation) {
            DB::table('printers')
                ->where('id', $translation->printer_id)
                ->update(['description' => $translation->description]);
        });

        Schema::dropIfExists('printer_translations');
    }
};