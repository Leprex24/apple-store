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
        Schema::table('orders', function(Blueprint $table) {
            $table->dropColumn('shipping_address');
            if(!Schema::hasColumn('orders', 'shipping_first_name')){
                $table->string('shipping_first_name')->nullable()->after('phone');
            }
            if(!Schema::hasColumn('orders', 'shipping_last_name')){
                $table->string('shipping_last_name')->nullable()->after('shipping_first_name');
            }
            if (!Schema::hasColumn('orders', 'shipping_street')) {
                $table->string('shipping_street')->nullable()->after('shipping_last_name');
            }
            if (!Schema::hasColumn('orders', 'shipping_building_number')) {
                $table->string('shipping_building_number')->nullable()->after('shipping_street');
            }
            if (!Schema::hasColumn('orders', 'shipping_apartment_number')) {
                $table->string('shipping_apartment_number')->nullable()->after('shipping_building_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('shipping_address')->nullable();
            $table->dropColumn([
                'shipping_first_name',
                'shipping_last_name',
                'shipping_street',
                'shipping_building_number',
                'shipping_apartment_number'
            ]);
        });
    }
};
