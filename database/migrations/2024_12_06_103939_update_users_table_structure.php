<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambah kolom 'user_id' dan menjadikannya sebagai primary key
            $table->bigIncrements('user_id')->first();  // Menambahkan kolom 'user_id' sebagai primary key dan auto_increment

            // Menghapus kolom 'id' yang lama
            $table->dropColumn('id');

            // Menghapus kolom yang tidak diperlukan
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');

            // Menambahkan kolom baru
            $table->string('username')->unique();
            $table->integer('role');
            $table->date('tgl_buat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Mengembalikan kolom yang dihapus jika migrasi dibalik
            $table->dropColumn('username');
            $table->dropColumn('role');
            $table->dropColumn('tgl_buat');

            // Menambahkan kembali kolom 'id' dan lainnya
            $table->bigIncrements('id')->first();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }
}

