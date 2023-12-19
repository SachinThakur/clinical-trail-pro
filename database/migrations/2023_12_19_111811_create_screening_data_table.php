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
        Schema::create('screening_data', function (Blueprint $table) {
            $table->id();
			$table->string('first_name');
			$table->date('date_of_birth');
			$table->enum('migraine_frequency', ['monthly', 'weekly', 'daily']);
			$table->enum('daily_frequency', [1, 2, 3])->nullable()->comment('1:1-2,2:3-4,3:5+');
			$table->string('customer_group')->nullable();
			$table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screening_data');
    }
};
