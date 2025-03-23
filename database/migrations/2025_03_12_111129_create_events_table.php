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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(User::class)
                ->constrained("users")
                ->cascadeOnDelete();

            $table->string("name");
            $table->string("slug")->unique();
            $table->string("description_short")->nullable();
            $table->text("description")->nullable();

            $table->dateTime("start_date"); 
            $table->dateTime("end_date");

            $table->string("location");
            $table->string("city");
            $table->string("state");
            $table->string("zip_code");

            $table->string("image")->nullable();
            $table->string("url")->nullable();

            $table
                ->enum("status", ["draft", "published", "cancelled"])
                ->default("draft");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
