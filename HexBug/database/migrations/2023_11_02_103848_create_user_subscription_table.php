<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    // $table->id();
    //         $table->unsignedBigInteger('post_id')->nullable();
    //         $table->unsignedBigInteger('tags_id')->nullable();
    //         $table->timestamps();
    //     });
    
    //     // Define Foreign key Relation 
    //     Schema::table('post_tag', function (Blueprint $table) {
    //         $table->foreign('post_id')->references('id')->on('posts');
    //         $table->foreign('tags_id')->references('id')->on('tags');
    //     });
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_subscription', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->timestamp('purchase_date')->nullable();
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });

        // Define Foreign key Relation 
        Schema::table('user_subscription', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subscription_id')->references('id')->on('subscription');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscription');
    }
};
