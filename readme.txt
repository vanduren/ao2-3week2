Based on laracasts laravel8 from scratch
laravel new
composer require laravel/breeze
php artisan breeze:install
npm run install && npm run dev
php artisan make:model Product -mfcr
php artisan make:model Category -mfcr

Category migration:
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

Product migration:
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->double('price');
            $table->timestamps();
        });

Category model:
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

Product model:
    protected $fillable = ['name', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

Category factory:
        return [
            'name' => $this->faker->colorName(),
        ];

Product factory:
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2,0,200),
            // if every product woyld have a different category
            // 'category_id' => Category::factory()->create()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];

Database seeder:
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(500)->create();
    }


php artisan migrate --seed
