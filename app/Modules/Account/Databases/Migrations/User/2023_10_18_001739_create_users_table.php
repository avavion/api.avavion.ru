<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('account.users', static function (Blueprint $table) {
            $table->uuid(column: 'id')->primary()->default(DB::raw(value: 'gen_random_uuid()::uuid'));

            $table->string(column: 'email')->unique();
            $table->string(column: 'password');
            $table->timestamp(column: 'email_verified_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'account.users');
    }
};
