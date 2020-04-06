<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum("role",['dkm','jemaah']);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            ['nama'=>'DKM','alamat'=>'Masjid Agung Cimahi','email' => 'dkm@masjid.com', 'password' => Hash::make('masjidagungcimahi'), 'role' => 'dkm']
        );

        DB::table('users')->insert(
            ['nama'=>'Rais','alamat'=>'Masjid Agung Cimahi','email' => 'rais@masjid.com', 'password' => Hash::make('123456'), 'role' => 'dkm']
        );

        DB::table('users')->insert(
            ['nama'=>'JEMAAH','alamat'=>' Pinggir Masjid Agung Cimahi','email' => 'jemaah@masjid.com', 'password' => Hash::make('jemaahmasjidagungcimahi'), 'role' => 'jemaah']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
