<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('slug');

            $table->text('description');
            $table->text('specification');

            $table->float('price');
            $table->float('offer');

            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->integer('quantity')->nullable();

            //1 borrador, 2 publicado
            $table->enum('status',[Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);

            //1 normal, 2 oferta
            $table->enum('inOffer',[Product::NORMAL, Product::OFERTA])->default(Product::NORMAL);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
