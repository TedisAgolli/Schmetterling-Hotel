<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamps();
        });


        Schema::create('room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomnumber');
            $table->integer('capacity');
            $table->string('description');
            $table->timestamps();
        }); 

        Schema::create('room_availability', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('available');
            $table->string('note');
            $table->integer('roomid')->unsigned();  
            $table->timestamps();
            
            $table->foreign('roomid')->references('id')->on('room');
        });       

        Schema::create('price', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('value', 6, 2);
            $table->string('description');
            $table->timestamps();
        });       

        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('checkin');
            $table->dateTime('checkout');
            $table->integer('adults');
            $table->string('note');
            $table->integer('guestid')->unsigned();
            $table->timestamps();

            $table->foreign('guestid')->references('id')->on('guest');
        });       

        Schema::create('payment_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('creditcardtype');
            $table->bigInteger('cardnumber');
            $table->date('expirationdate');
            $table->integer('guestid')->unsigned();
            $table->timestamps();

            $table->foreign('guestid')->references('id')->on('guest');
        });

        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('currentprice', 6, 2);
            $table->dateTime('ordertime');
            $table->string('note');
            $table->integer('reservationid')->unsigned();
            $table->integer('priceid')->unsigned();
            $table->timestamps();

            $table->foreign('priceid')->references('id')->on('price');
            $table->foreign('reservationid')->references('id')->on('reservation');
        });       

        Schema::create('offer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->date('startdate');
            $table->date('enddate');
            $table->timestamps();
        });       

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });       

        Schema::create('room_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomid')->unsigned();
            $table->integer('reservationid')->unsigned();
            $table->timestamps();

            $table->foreign('roomid')->references('id')->on('room');
            $table->foreign('reservationid')->references('id')->on('reservation');
        }); 

        Schema::create('room_price', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomid')->unsigned();
            $table->integer('priceid')->unsigned();
            $table->timestamps();
            
            $table->foreign('roomid')->references('id')->on('room');
            $table->foreign('priceid')->references('id')->on('price');
        }); 

        Schema::create('reservation_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservationid')->unsigned();
            $table->integer('offerid')->unsigned();
            $table->timestamps();

            $table->foreign('offerid')->references('id')->on('offer');
            $table->foreign('reservationid')->references('id')->on('reservation');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guest');
        Schema::drop('room');
        Schema::drop('room_availability');
        Schema::drop('price');
        Schema::drop('reservation');
        Schema::drop('payment_info');
        Schema::drop('order');
        Schema::drop('offer');
        Schema::drop('user');
        Schema::drop('room_reservation');
        Schema::drop('room_price');
        Schema::drop('reservation_offer');
    }
}
