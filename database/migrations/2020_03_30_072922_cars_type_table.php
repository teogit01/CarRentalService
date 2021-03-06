<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cars_type')) {
            Schema::create('cars_type', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                $table->string('code', 191)->comment('mã loại xe');
                $table->string('name')->comment('tên loại xe');
                $table->integer('seating')->comment('số chỗ ngồi');
                $table->string('model')->comment('model');

                // log time
                $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày tạo');

                $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày cập nhật');

                $table->timestamp('deleted_at')
                    ->nullable()
                    ->comment('ngày xóa tạm');
                // Setting unique
                $table->unique(['code']);
            });
            // DB::statement("ALTER TABLE `cars_type` comment 'Thông tin bảng loại xe'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
