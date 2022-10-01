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
        Schema::create('account', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('name');
            $table->string('psd');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->decimal('bonus', $precision = 10, $scale = 2)->default(0.00);
            $table->tinyInteger('privilege')->default(0);
            $table->integer('group')->default(1);
            $table->tinyInteger('login_status')->default(0);
            $table->string('worldname_crc')->default(0);
            $table->tinyInteger('forbid_mask')->default(0);
            $table->tinyInteger('guard')->default(0);
            $table->string('mibao')->nullable();
            $table->string('ip')->nullable();
            $table->dateTime('time')->nullable();
            $table->string('img')->default('/avatars/avatar.png')->nullable();            
            $table->tinyInteger('active')->default(0);
            $table->string('remember_token')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

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
        Schema::dropIfExists('account');
    }
};
