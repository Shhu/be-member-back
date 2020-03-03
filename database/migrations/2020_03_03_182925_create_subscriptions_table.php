<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_at');
            $table->date('end_at');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
}
