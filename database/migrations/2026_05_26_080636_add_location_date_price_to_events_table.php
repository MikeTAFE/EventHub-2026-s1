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
        Schema::table('events', function (Blueprint $table) {
            $table->string('location')->nullable()->after('name');
            $table->decimal('price', 8, 2)->default(0)->after('location');  // Default to 0 (free)
            $table->dateTime('event_date')->nullable()->after('price');  // Nullable to avoid errors with existing data
            // $table->decimal('sale_price', 8, 2)->nullable()->after('price');  // This would create an optional/nullable value
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('price');
            $table->dropColumn('event_date');
            // $table->dropColumn('sale_price');
        });
    }
};
