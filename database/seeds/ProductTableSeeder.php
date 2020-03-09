<?php

use Illuminate\Database\Seeder;
use App\User;
use App\KioskList;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();

    		User::create([
    			'company_id' => 1,
    			'is_pos' => 0,
	            'user_no' => 'OWNER1',
	            'lastname' => $faker->lastName,
	            'firstname' => $faker->firstName,
	            'username' => 'OWNER1',
	            'email' => $faker->email,
	            'password' => bcrypt('12password34'),
	            'remember_token' => null,
    		]);

    		User::create([
    			'company_id' => 1,
    			'is_pos' => 0,
	            'user_no' => 'MANAGER1',
	            'lastname' => $faker->lastName,
	            'firstname' => $faker->firstName,
	            'username' => 'MANAGER2',
	            'email' => $faker->email,
	            'password' => bcrypt('12password34'),
	            'remember_token' => null,
    		]);

    		KioskList::insert([
    			'user_id' => 3,
    			'kiosk_id' => 1,
    		]);

    		KioskList::insert([
    			'user_id' => 3,
    			'kiosk_id' => 2,
    		]);

    		KioskList::insert([
    			'user_id' => 4,
    			'kiosk_id' => 1,
    		]);

    		KioskList::insert([
    			'user_id' => 5,
    			'kiosk_id' => 1,
    		]);

    	for ($i = 1; $i < 3; $i++) {
    		$username_and_no = $faker->unique()->randomNumber($nbDigits = 8, $strict = true);
    		User::create([
    			'company_id' => 1,
	            'user_no' => $username_and_no,
	            'lastname' => $faker->lastName,
	            'firstname' => $faker->firstName,
	            'username' => $username_and_no,
	            'email' => $faker->email,
	            'password' => bcrypt('12password34'),
	            'remember_token' => null,
    		]);
    	}
    	
    	// USER DUMMY DATA
		// $users = [
		// 	[
	 //    		'lastname' => 'Sanchez',
	 //    		'firstname' => 'Rick',
	 //            'username' => 'owner_1',
	 //    		'email' => 'rick@dynaquest.com',
	 //    		'password' => bcrypt('pass1234'),
	 //    		'remember_token' => Str::random(60),
		// 	],
		// 	[
	 //    		'lastname' => 'Smith',
	 //    		'firstname' => 'Beth',
	 //            'username' => 'manager_1',
	 //    		'email' => 'beth@dynaquest.com',
	 //    		'password' => bcrypt('pass1234'),
	 //    		'remember_token' => Str::random(60),
		// 	],
		// 	[
	 //    		'lastname' => 'Smith',
	 //    		'firstname' => 'Summer',
	 //            'username' => 'cashier_1',
	 //    		'email' => 'summer@dynaquest.com',
	 //    		'password' => bcrypt('pass1234'),
	 //    		'remember_token' => Str::random(60),
		// 	],
		// 	[
	 //    		'lastname' => 'Smith',
	 //    		'firstname' => 'Morty',
	 //            'username' => 'cashier_2',
	 //    		'email' => 'morty@dynaquest.com',
	 //    		'password' => bcrypt('pass1234'),
	 //    		'remember_token' => Str::random(60),
		// 	],
  //     	];
		// foreach ($users as $user) {
		//     \App\User::create($user);
		// }

    	// DUMMY DATA
		$companies = [
			[
				'company_no' => 'CPY1',
				'name' => 'DYNAQUEST',

			],
      	];
		foreach ($companies as $company) {
		    \App\Company::create($company);
		}
		$kiosks = [
			[
				'company_id' => 1,
				'kiosk_no' => 'KIO-1-1',
				'branch' => 'Manila',
			],
			[
				'company_id' => 1,
				'kiosk_no' => 'KIO-1-2',
				'branch' => 'Paranaque',
			],
      	];
		foreach ($kiosks as $kiosk) {
		    \App\Kiosk::create($kiosk);
		}

		$payment_types = [
			[
				'title' => 'Cash',
			],
			[
				'title' => 'Card: Debit Card',
			],
			[
				'title' => 'Card: Credit Card',
			],
			[
				'title' => 'E-Wallet: PayMaya',
			],
			[
				'title' => 'E-Wallet: GCash',
			],
			[
				'title' => 'E-Wallet: Coins PH',
			],
      	];
		foreach ($payment_types as $payment_type) {
		    \App\PaymentType::create($payment_type);
		}

    	// PRODUCT CATEGORIES
		$categories = [
			[
				'name' => 'Processor',
			],
			[
				'name' => 'Motherboard',
			],
			[
				'name' => 'Graphics Card',
			],
			[
				'name' => 'Memory',
			],
			[
				'name' => 'Power Supply',
			],
			[
				'name' => 'Gaming Chairs',
			],
      	];
		foreach ($categories as $category) {
		    \App\ProductCategory::create($category);
		}

    	// VARIATION TYPES
		$types = [
			[
				'name' => 'Color',
			],
			[
				'name' => 'Size',
			],
      	];
		foreach ($types as $type) {
		    \App\VariationType::create($type);
		}


    	// PRODUCTS
		$products = [
			[
				'product_category_id' => 1,
				'brand' => 'AMD',
				'name' => 'AMD RYZEN 7 3800X 8-CORE 16-THREAD 3.9-4.5 GHZ 32MB 105W',
			],
			[
				'product_category_id' => 1,
				'brand' => 'AMD',
				'name' => 'AMD RYZEN 5 3500X 6-CORE 6-THREAD 3.6-4.1 GHZ 32MB 65W',
			],
			[
				'product_category_id' => 1,
				'brand' => 'AMD',
				'name' => 'AMD RYZEN 9 3900X 12-CORE 24-THREAD 3.8-4.6 GHZ 70MB 105W',
			],
			[
				'product_category_id' => 1,
				'brand' => 'AMD',
				'name' => 'AMD RYZEN 3 3200G 4-CORE 4-THREAD 3.5-3.7 GHZ 4MB 65W',
			],
			[
				'product_category_id' => 4,
				'brand' => 'KINGSTON',
				'name' => 'KINGSTON HYPERX FURY RGB 8GB SINGLE DDR4 3200MHZ CL16 HX432C16FB3A/8',
			],
			[
				'product_category_id' => 4,
				'brand' => 'KINGSTON',
				'name' => 'KINGSTON HYPERX FURY RGB 8GB SINGLE DDR4 2666MHZ CL16 HX426C16FB3A/8',
			],
			[
				'product_category_id' => 4,
				'brand' => 'CORSAIR',
				'name' => 'CORSAIR VENGEANCE RGB PRO 16GB 2X8G 3600MHZ CL18 (CMW16GX4M2Z3600C18)',
			],
			[
				'product_category_id' => 6,
				'brand' => 'GAMDIAS',
				'name' => 'GAMDIAS ACHILLES E1 L (RGB ILLUMINATED GAMING CHAIR)',
				'with_variation' => 1,
			],
			[
				'product_category_id' => 6,
				'brand' => 'HAVIT',
				'name' => 'HAVIT HV-GC916 GAMING CHAIR',
				'with_variation' => 1,
			],
      	];
		foreach ($products as $product) {
		    \App\Product::create($product);
		}

    	// VARIATION
		$variations = [
			[
				'variation_id' => 1,
				'variation_type_id' => 1,
				'name' => 'Black',
			],
			[
				'variation_id' => 2,
				'variation_type_id' => 1,
				'name' => 'Red',
			],
			[
				'variation_id' => 3,
				'variation_type_id' => 1,
				'name' => 'Blue',
			],
			[
				'variation_id' => 4,
				'variation_type_id' => 1,
				'name' => 'Black/White',
			],

			//BLACK LARGE 5
			[
				'variation_id' => 5,
				'variation_type_id' => 1,
				'name' => 'Black',
			],
			[
				'variation_id' => 5,
				'variation_type_id' => 2,
				'name' => 'Large',
			],
			//BLACK MEDIUM 6
			[
				'variation_id' => 6,
				'variation_type_id' => 1,
				'name' => 'Black',
			],
			[
				'variation_id' => 6,
				'variation_type_id' => 2,
				'name' => 'Medium',
			],
			//RED LARGE 7
			[
				'variation_id' => 7,
				'variation_type_id' => 1,
				'name' => 'Red',
			],
			[
				'variation_id' => 7,
				'variation_type_id' => 2,
				'name' => 'Large',
			],
			//BLACK MEDIUM 8
			[
				'variation_id' => 8,
				'variation_type_id' => 1,
				'name' => 'Red',
			],
			[
				'variation_id' => 8,
				'variation_type_id' => 2,
				'name' => 'Medium',
			],
			//BLUE LARGE 9
			[
				'variation_id' => 9,
				'variation_type_id' => 1,
				'name' => 'Blue',
			],
			[
				'variation_id' => 9,
				'variation_type_id' => 2,
				'name' => 'Large',
			],
			//BLUE MEDIUM 10
			[
				'variation_id' => 10,
				'variation_type_id' => 1,
				'name' => 'Blue',
			],
			[
				'variation_id' => 10,
				'variation_type_id' => 2,
				'name' => 'Medium',
			],
      	];
		foreach ($variations as $variation) {
		    \App\Variation::create($variation);
		}

    	// VARIATION
		$stocks = [
			[
				'kiosk_id' => 1,
				'product_id' => 1,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 5,
				'price' => 20260.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 2,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 12,
				'price' => 7750.00,
			],
			[
				'product_id' => 3,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 2,
				'price' => 26740.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 4,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 18,
				'price' => 5000.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 5,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 34,
				'price' => 2800.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 6,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 19,
				'price' => 2570.00,
			],
			[
				'product_id' => 7,
				'variation_id' => null,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 25,
				'price' => 6200.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 8,
				'variation_id' => 1,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 5,
				'price' => 8450.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 8,
				'variation_id' => 2,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 6,
				'price' => 8450.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 8,
				'variation_id' => 3,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 6,
				'price' => 8450.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 8,
				'variation_id' => 4,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 2,
				'price' => 8650.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 9,
				'variation_id' => 5,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 8,
				'price' => 7550.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 9,
				'variation_id' => 6,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 7,
				'price' => 6550.00,
			],
			[
				'product_id' => 9,
				'variation_id' => 7,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 7,
				'price' => 7550.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 9,
				'variation_id' => 8,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 8,
				'price' => 6550.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 9,
				'variation_id' => 9,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 4,
				'price' => 7550.00,
			],
			[
				'kiosk_id' => 1,
				'product_id' => 9,
				'variation_id' => 10,
				'sku_upc' => $faker->unique()->ean13,
				'qty' => 6,
				'price' => 6550.00,
			],
      	];
		foreach ($stocks as $stock) {
		    \App\Stock::create($stock);
		}

		$processings = [
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'temp_order_no' => '0846',
				'stock_id' => 1,
				'qty' => 1,
				'price' => 20260.00,
				'total' => 20260.00,
			],
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'temp_order_no' => '0846',
				'stock_id' => 5,
				'qty' => 2,
				'price' => 2800.00,
				'total' => 5600,
			],
		];

		foreach ($processings as $processing) {
		    \App\OrderProcessing::create($processing);
		}

		$orders = [
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'order_no' => '0841',
			],
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'order_no' => '0842',
			],
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'order_no' => '0843',
			],
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'order_no' => '0844',
			],
			[
				'kiosk_id' => 1,
				'user_id' => 1,
				'order_no' => '0845',
			],
		];

		foreach ($orders as $order) {
		    \App\Order::create($order);
		}

		$orderlines = [
			[
				'order_id' => 1,
				'stock_id' => 1,
				'qty' => 1,
				'price' => 20260.00,
				'total' => 20260.00,
			],
			[
				'order_id' => 1,
				'stock_id' => 5,
				'qty' => 2,
				'price' => 2800.00,
				'total' => 5600,
			],
		];

		foreach ($orderlines as $orderline) {
		    \App\OrderLine::create($orderline);
		}

    }
}
