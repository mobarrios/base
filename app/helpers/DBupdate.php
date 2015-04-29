<?php

class DBupdate 
{
	public static function update()
	{	
		/*
		Schema::table('items',function($table)
		{
			$table->string('provider_code',200);
		});
		
		*/

		
		

	}	


	public static function create()
	{
	

		Schema::create('caja', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('date');
			$table->string('description','200');
			$table->double('in', 10,2);
			$table->double('out',  10,2);
			$table->integer('type');
		});


		Schema::create('company', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','200');
			$table->string('razon_social','200');
			$table->string('logo','200');
			$table->string('web','200');
			$table->string('phone','200');
			$table->string('mail','200');
			$table->string('iva_condition','200');
			$table->string('address','200');
		});

		Schema::create('categories', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
		});

		Schema::create('clients', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('last_name','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('company_name','50');
			$table->string('cuit','50');
			$table->string('address','200');
		});

		Schema::create('doctors', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('last_name','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('license','50');
			$table->string('address','200');
		});

		Schema::create('providers', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('last_name','50');
			$table->string('dni','20');
			$table->string('email','100');
			$table->string('phone','50');
			$table->string('cell_phone','50');
			$table->string('company_name','50');
			$table->string('cuit','50');
			$table->string('address','200');
		});

		Schema::create('brands', function($table)
		{	
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name',100);
			$table->string('image','250')->nullable();		
		});

		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('code','200')->unique();
			$table->string('name','50');
			$table->text('description');
			$table->double('cost_price', 10,2);
			$table->double('sell_price',10,2);
			$table->double('rent_price_15_days', 10,2);
			$table->double('rent_price_45_days', 10,2);			
			$table->date('expiration_date');
			$table->integer('stock');
			$table->string('um',20);
			$table->string('image','250')->nullable();
			$table->double('total_weight', 10,2);
			$table->double('maximun_weight', 10,2);
			$table->string('color', '50');
			$table->string('size', '50');
			$table->string('dimensions', '50');
			$table->string('presentation', '50');
			$table->string('bodega','200');
			$table->string('provincia','200');
			$table->string('observaciones','200');
			$table->string('provider_code','200');

			//relations
			$table->integer('providers_id')->unsigned()->nullable();
			$table->foreign('providers_id')->references('id')->on('providers');

			$table->integer('brands_id')->unsigned()->nullable();
			$table->foreign('brands_id')->references('id')->on('brands');
		});
		
		Schema::create('items_categories', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			//relations
			$table->integer('items_id')->unsigned()->nullable();
			$table->integer('categories_id')->unsigned()->nullable();

			$table->foreign('items_id')->references('id')->on('items');
			$table->foreign('categories_id')->references('id')->on('categories');
			
		});

		Schema::create('modules', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50')->unique();
			$table->boolean('available');
		});

		Schema::create('menus', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','50');
			$table->string('icon','50');
			$table->string('routes','50');

			$table->boolean('available');
			$table->integer('main');
			$table->string('action','20');

			$table->integer('modules_id')->unsigned()->nullable();
			$table->foreign('modules_id')->references('id')->on('modules');

		});

		Schema::create('obras_sociales', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','200');
			$table->string('address','50');
			$table->string('city','50');
			$table->string('province','50');
			$table->string('zip_code','50');
			$table->string('telephone','50');
			$table->string('fax','50');
			$table->string('email','50');
			$table->string('cuit','50');
			$table->string('iva_conditions','50');
			$table->string('observations','200');
		});
		
		Schema::create('profiles', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('profile','50');
		});

		Schema::create('permissions', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->boolean('read');
			$table->boolean('edit');
			$table->boolean('delete');
			$table->boolean('add');

			//relations
			$table->integer('modules_id')->unsigned()->nullable();
			$table->integer('profiles_id')->unsigned()->nullable();

			$table->foreign('modules_id')->references('id')->on('modules');
			$table->foreign('profiles_id')->references('id')->on('profiles');
		});

		Schema::create('purchases', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('purchases_date');
			$table->double('amount', 10,2);

			//relations
			$table->integer('providers_id')->unsigned()->nullable();
			$table->foreign('providers_id')->references('id')->on('providers');
		});

	
		Schema::create('purchases_items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->integer('quantity');
			$table->double('discount', 10,2);
			$table->double('price_per_unit', 10,2);
			$table->string('observations',200);

			//relations
			$table->integer('purchases_id')->unsigned()->nullable();
			$table->foreign('purchases_id')->references('id')->on('purchases');

			$table->integer('items_id')->unsigned()->nullable();
			$table->foreign('items_id')->references('id')->on('items');		
		});

		Schema::create('sales', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->double('amount', 10,2);
			$table->date('sales_date');

			//relations
			$table->integer('clients_id')->unsigned()->nullable();
			$table->foreign('clients_id')->references('id')->on('clients');
		});

		

		Schema::create('sales_items', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->integer('quantity');
			$table->double('discount', 10,2);
			$table->double('price_per_unit', 10,2);
			$table->string('observations','200');

			//relations
			$table->integer('sales_id')->unsigned()->nullable();
			$table->foreign('sales_id')->references('id')->on('sales');

			
			$table->integer('items_id')->unsigned()->nullable();
			$table->foreign('items_id')->references('id')->on('items');		
		});

		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('name','200');
			$table->string('last_name','200');
			$table->string('email','200');
			$table->string('password','200');
			$table->string('remember_token','200');

			//relations
			$table->integer('profiles_id')->unsigned()->nullable();
			$table->foreign('profiles_id')->references('id')->on('profiles');	
		});
		

		Schema::create('clients_payment',function($table)
		{	
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->date('date');
			$table->string('detail','200');
			$table->double('amount',10,2);
			$table->integer('payment_method');

			//relations
			$table->integer('clients_id')->unsigned();
			$table->foreign('clients_id')->references('id')->on('clients');

			$table->integer('sales_id')->unsigned();
			$table->foreign('sales_id')->references('id')->on('sales');

		});
		Schema::create('items_providers',function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->double('cost_price', 10,2);

			//relations
			$table->integer('items_id')->unsigned()->nullable();
			$table->integer('providers_id')->unsigned()->nullable();

			$table->foreign('items_id')->references('id')->on('items');
			$table->foreign('providers_id')->references('id')->on('providers');

		});
		
		Schema::create('items_images',function($table)
		{
			$table->increments('id');
			$table->softDeletes();
			$table->timestamps();

			$table->string('image','250')->nullable();	

			//relations
			$table->integer('items_id')->unsigned()->nullable();
			$table->foreign('items_id')->references('id')->on('items');

		});
	
		
		self::createModules();
		self::createAdminUser();
		self::createMenus();
		self::createAdminPermissions();
		self::createCompany();


	}

	// create profile administrator , user admin
	public static function createCompany()
	{
		$company 				= new Company();
		$company->id 			= 1;
		$company->save();
	}


	// create profile administrator , user admin
	public static function createAdminUser()
	{
		$profiles 			= new Profiles();
		$profiles->id 		= 1;
		$profiles->profile = 'administrator';
		$profiles->save();

		$user 				= new User();
		$user->id 			= 1;
		$user->email 		= 'admin';
		$user->profiles_id	= $profiles->id;
		$user->password 	= Hash::make('cholita');
		$user->save();
	}


	//create admin permissions
	public static function createAdminPermissions()
	{
		$modules = Modules::all();

		foreach($modules as $module)
		{
			$permissions 				= new Permissions();
			$permissions->read 			= 1;
			$permissions->edit 			= 1;
			$permissions->delete 		= 1;
			$permissions->add 			= 1;
			$permissions->modules_id 	= $module->id;
			$permissions->profiles_id 	= 1;
			$permissions->save();
		}

	}

	// create modules
	public static function createModules()
	{
		$modules =  [
						['id'=>'1','name'=>'items'],
						['id'=>'2','name'=>'categories'],
						['id'=>'3','name'=>'users'],
						['id'=>'4','name'=>'profiles'],
						['id'=>'5','name'=>'providers'],
						['id'=>'6','name'=>'clients'],
						['id'=>'7','name'=>'sales'],
						['id'=>'8','name'=>'purchases'],
						['id'=>'9','name'=>'doctors'],
						['id'=>'10','name'=>'obras'],
						['id'=>'11','name'=>'cajas'],
						['id'=>'12','name'=>'brands']
					];

		foreach($modules as $list => $key  )
		{
			$modules 			= new Modules();
			$modules->id   		= $key['id'];
			$modules->name 		= $key['name'];
			$modules->available = 1;
			$modules->save();
		}
	}

	
	public static function createMenus()
	{	
		$menus = self::menu();	

		foreach($menus as $menu => $key)
		{
			$menu 				= new Menus();
			$menu->id 			= $key['id'];
			$menu->name 		= $key['name'];
			$menu->icon 		= $key['icon'];
			$menu->modules_id	= $key['modules_id'];
			$menu->routes 		= $key['routes'];
			$menu->main 		= $key['main'];
			$menu->action 		= $key['action'];
			$menu->available 	= 1;
			$menu->save();
		}	
	}

	
	public static function menu()
	{

		$menu = [	[ 
					'id'		=> '1',
					'name' 		=> 'Articulos',
					'icon' 		=> '',
					'modules_id'=> '1',
					'routes'	=> '',
					'available'	=> '',
					'main'		=> '',
					'action'	=> ''
					],
						[ 
						'id'		=> '10',
						'name' 		=> 'Lista de Articulos',
						'icon' 		=> '',
						'modules_id'=> '1',
						'routes'	=> 'items',
						'available'	=> '',
						'main'		=> '1',
						'action'	=> 'read'
						],
						[ 
						'id'		=> '11',
						'name' 		=> 'Categorias',
						'icon' 		=> '',
						'modules_id'=> '2',
						'routes'	=> 'categories',
						'available'	=> '',
						'main'		=> '1',
						'action'	=> 'read'
						],
						[ 
						'id'		=> '12',
						'name' 		=> 'Marcas',
						'icon' 		=> '',
						'modules_id'=> '12',
						'routes'	=> 'brands',
						'available'	=> '',
						'main'		=> '1',
						'action'	=> 'read'
						],
					[ 
					'id'		=> '2',
					'name' 		=> 'Compras',
					'icon' 		=> '',
					'modules_id'=> '8',
					'routes'	=> '',
					'available'	=> '',
					'main'		=> '',
					'action'	=> ''
					],
						[ 
						'id'		=> '20',
						'name' 		=> 'Nueva Compra',
						'icon' 		=> '',
						'modules_id'=> '8',
						'routes'	=> 'purchases',
						'available'	=> '',
						'main'		=> '2',
						'action'	=> 'add'
						],
						[ 
						'id'		=> '21',
						'name' 		=> 'Lista de Compras',
						'icon' 		=> '',
						'modules_id'=> '8',
						'routes'	=> 'purchases_list',
						'available'	=> '',
						'main'		=> '2',
						'action'	=> 'read'
						],
						[ 
						'id'		=> '22',
						'name' 		=> 'Proveedores',
						'icon' 		=> '',
						'modules_id'=> '5',
						'routes'	=> 'providers',
						'available'	=> '',
						'main'		=> '2',
						'action'	=> 'read'
						],
					[ 
					'id'		=> '3',
					'name' 		=> 'Ventas',
					'icon' 		=> '',
					'modules_id'=> '7',
					'routes'	=> '',
					'available'	=> '',
					'main'		=> '',
					'action'	=> ''
					],
						[ 
						'id'		=> '30',
						'name' 		=> 'Nueva Venta',
						'icon' 		=> '',
						'modules_id'=> '7',
						'routes'	=> 'sales',
						'available'	=> '',
						'main'		=> '3',
						'action'	=> 'add'
						],
						[ 
						'id'		=> '31',
						'name' 		=> 'Lista de Ventas',
						'icon' 		=> '',
						'modules_id'=> '7',
						'routes'	=> 'sales_list',
						'available'	=> '',
						'main'		=> '3',
						'action'	=> 'read'
						],
						[ 
						'id'		=> '32',
						'name' 		=> 'Clientes',
						'icon' 		=> '',
						'modules_id'=> '6',
						'routes'	=> 'clients',
						'available'	=> '',
						'main'		=> '3',
						'action'	=> 'read'
						],

					[ 
					'id'		=> '4',
					'name' 		=> 'Doctores',
					'icon' 		=> '',
					'modules_id'=> '9',
					'routes'	=> 'doctors',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
					[ 
					'id'		=> '5',
					'name' 		=> 'Obras Sociales',
					'icon' 		=> '',
					'modules_id'=> '10',
					'routes'	=> 'obras',
					'available'	=> '',
					'main'		=> '',
					'action'	=> 'read'
					],
					[ 
					'id'		=> '6',
					'name' 		=> 'Movimientos',
					'icon' 		=> '',
					'modules_id'=> '11',
					'routes'	=> '',
					'available'	=> '',
					'main'		=> '',
					'action'	=> ''
					],
						[ 
						'id'		=> '60',
						'name' 		=> 'Caja Diaria',
						'icon' 		=> '',
						'modules_id'=> '11',
						'routes'	=> 'caja',
						'available'	=> '',
						'main'		=> '6',
						'action'	=> 'read'
						],

				];


	return $menu;

	}
}

?>