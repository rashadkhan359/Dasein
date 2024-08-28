<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1024);
            $table->string('slug')->nullable()->unique();
            $table->string('image')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->tinyInteger('product_type')->nullable()->comment('0 = is_top, 1 = is_featured, 2 = is_best');
            $table->string('tags', 1000)->nullable();
            $table->string('manufacturer', 255)->nullable();
            $table->boolean('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('is_custom')->default(0)->comment('0 = is custom, 1 = is not custom');
            $table->tinyInteger('is_approved')->default(0)->comment('0 = unapproved, 1 = approved');
            $table->boolean('visibility')->default(0)->comment('0 = invisible, 1 = visible');
            $table->boolean('allow_backorder')->default(0);
            $table->dateTime('publish_date')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
