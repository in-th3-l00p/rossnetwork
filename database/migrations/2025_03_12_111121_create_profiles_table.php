<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table
                ->foreignIdFor(User::class)
                ->constrained("users")
                ->cascadeOnDelete();

            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("nickname")->nullable();
            $table->date("birth_date")->nullable();
            $table->string("gender")->nullable();

            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip_code")->nullable();

            $table->string("avatar")->nullable();
            $table->text("bio")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
