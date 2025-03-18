<?php

use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table
                ->foreignIdFor(Profile::class, 'selected_profile_id')
                ->nullable()
                ->constrained("selected_profile_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeignIdFor(
                Profile::class,
                'selected_profile_id'
            );
        });
    }
};
