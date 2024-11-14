<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('patientvisit', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('date');
            $table->string('time');
            $table->timestamps();
        });

        
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine');
            $table->string('qty');
            $table->timestamps();
        });

        
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->timestamps();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->string('province_id', 4)->index();
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->string('province_id', 4)->index();
            $table->string('city_id', 6)->index();
            $table->timestamps();

            $table->index(['province_id', 'region_id'], 'cities_province_regions');
        });

        Schema::create('barangays', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->string('province_id', 4)->index();
            $table->string('city_id', 6)->index();
            $table->timestamps();

            $table->index(['province_id', 'region_id'], 'barangay_idx_1');
            $table->index(['city_id', 'province_id', 'region_id'], 'barangay_idx_2');
        });
    
   
      
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangays');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('regions');
    }
    
    };


