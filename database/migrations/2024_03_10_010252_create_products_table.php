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
            $table->integer('stock_qty')->nullable();
            $table->integer('brand_id')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->decimal('price', 10,2) ->default(0);
            $table->decimal('offer_price', 10, 2)->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->tinyInteger('product_type')->nullable()->comment('0 = is_top, 1 = is_featured, 2 = is_best');
            $table->string('tags', 1000)->nullable();
            $table->string('manufacturer', 255)->nullable();
            $table->boolean('status')->default(0);
            $table->tinyInteger('is_approved')->default(0);
            $table->boolean('visibility')->default(0);
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
