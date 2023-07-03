<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Assignment 18


## Task 1:

To create a new migration file for the "categories" table with the specified columns, you can use the following command:

php artisan make:migration create_categories_table --create=categories


Open the generated migration file and use the up() method to define the table structure:

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

Once you have defined the migration file, you can run the migration using the following command:

php artisan migrate



## Task 2:

To create a new model named "Category" associated with the "categories" table, you can follow these steps in a Laravel application:

1. Generate the Category model by running the following command in the terminal:

php artisan make:model Category


2. Open the generated "Category.php" file and define the necessary properties and relationships. Here's an example:


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}


In this example, we assume there's a "Product" model and a relationship where a Category has many Products.

a. The $fillable property is used to specify which attributes can be mass-assigned when creating or updating a Category instance. In this case, we allow the "name" attribute to be mass-assigned.

b. The products() method defines a one-to-many relationship between the Category and Product models. It indicates that a Category can have multiple products, assuming there's a "products" table and a "category_id" foreign key column in the products table.









## Task 3:

To add a foreign key constraint to the "posts" table, referencing the "categories" table on the "category_id" column, you can create a new migration file. Here's an example of a migration file in Laravel's migration syntax:


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}


To create this migration file, you can run the following command in the terminal:


php artisan make:migration add_category_id_to_posts_table --table=posts

Once the migration file is created, you can run the migrations using the following command:

php artisan migrate



## Task 4:

To create a relationship between the "Post" and "Category" models in Laravel, you can define the appropriate methods in each model. Based on your requirement, a post belongs to a category, and a category can have multiple posts. Here's an example:

In the "Post" model (app/Post.php), define a category() method to establish the relationship:


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


In the "Category" model (app/Category.php), define a posts() method to establish the inverse relationship:


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}






In this example, we assume that the "Post" model has a foreign key column named "category_id" that references the "id" column of the "categories" table. By defining the category() method using belongsTo() in the "Post" model, Laravel understands that a post belongs to a category.

Similarly, by defining the posts() method using hasMany() in the "Category" model, Laravel understands that a category can have multiple posts.

With these relationships defined, you can now access the related models using Eloquent's dynamic properties. For example, to retrieve the category of a post:




$post = Post::find(1);
$category = $post->category;


Or to retrieve the posts belonging to a category:


$category = Category::find(1);
$posts = $category->posts;




## Task 5:

