<?php

use App\Constants\AppConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->enum('status', [AppConstants::CREATED, AppConstants::PENDING, AppConstants::APPROVED, AppConstants::REJECTED])
                  ->default(AppConstants::CREATED);
            $table->unsignedBigInteger('user_id')->references('id')->on('users');

            $table->string('name_receive', 120)->nullable();
            $table->string('address', 300)->nullable();
            $table->string('phone', 30)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
