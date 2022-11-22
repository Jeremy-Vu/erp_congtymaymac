<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UdateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            $table->text('HinhAnh');
            $table->timestamp('ThoiGianTao')->useCurrent();
            $table->timestamp('ThoiGianCapNhat')->useCurrent()->useCurrentOnUpdate();
            // $table->dropColumn('SoLuong');
            // $table->dropColumn('DonViTinh');
            $table->dropColumn('Gia');
            DB::statement('ALTER TABLE sanpham ALTER SoLuong SET DEFAULT 0;');
            DB::statement("ALTER TABLE sanpham ALTER DonViTinh SET DEFAULT 'chiếc';");
        });
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
