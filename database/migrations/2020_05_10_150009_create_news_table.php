<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable(); // ảnh
            $table->integer('position')->default(0); // vi trí
            $table->integer('is_active')->default(1); // trạng thái
            $table->string('url')->nullable()->default(null); // link url tùy chỉnh
            $table->text('summary')->collation('utf8mb4_unicode_ci')->nullable(); // thông tin tóm tắt
            $table->text('description')->collation('utf8mb4_unicode_ci')->nullable(); // chi tiết tin tức
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
        Schema::dropIfExists('news');
    }
}
