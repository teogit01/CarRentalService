<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                // $table->decimal('deposit', 10, 3)->comment('đặt cọc');
                $table->string('name');
                $table->string('address')->comment('địa chỉ');
                
                // $table->dateTime('time_start')->comment('thời gian bắt đầu');
                // $table->dateTime('time_end')->comment('thời gian kết thúc');
                // $table->integer('status_id')->unsigned()->comment('id tình trạng');
                // $table->integer('comment_id')->unsigned()->comment('id bình luận');
                // $table->integer('discount_id')->unsigned()->comment('id khuyến mãi');
                // $table->integer('user_id')->unsigned()->comment('id nhân viên');
                $table->integer('user_id');
                $table->integer('phone');
                $table->string('service')->nullable();
                $table->enum('status', ['đang chờ','đã liên hệ','đã nhận cọc','đã thanh toán','hoàn thành','hủy'])->default('đang chờ');
                $table->integer('grand_total');
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->integer('item_count');
                $table->boolean('is_paid')->default(false);
                $table->enum('payment_method', ['Tiền Mặt', 'paypal'])->default('Tiền Mặt');

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
            });
            //DB::statement("ALTER TABLE `invoices` comment 'Thông tin phiếu đặt'");
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
