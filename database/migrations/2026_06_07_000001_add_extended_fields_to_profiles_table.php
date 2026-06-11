<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->json('education')->nullable()->after('skills');
            $table->json('experience')->nullable()->after('education');
            $table->json('organizations')->nullable()->after('experience');
            $table->string('photo_url')->nullable()->after('organizations');
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['education', 'experience', 'organizations', 'photo_url']);
        });
    }
};
