<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use App\Reservation;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		User::create([
			'name' => 'Yohann',
			'email' => 'dreamlike.swarm@gmail.com',
			'role' => 'admin',
			'password' => bcrypt('admin'),
			'phone' => '0125654520',
		]);
		
		Post::create([
			'titre' => 'Exemple actu',
			'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet congue nisi, eu egestas velit. Donec tincidunt nisi nec efficitur pretium. Aliquam arcu nisi, tristique in ex eget, ultricies accumsan erat. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vitae massa ligula. Aenean fermentum tellus ut dapibus scelerisque. Morbi vel finibus nisl.

Integer feugiat dui nisl. Morbi sit amet massa eu libero lacinia volutpat ac in nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent facilisis magna eu ante venenatis commodo. Fusce auctor elit venenatis ipsum finibus viverra. Sed imperdiet molestie dui, eget dignissim massa gravida sit amet. In maximus est lectus, vitae consequat nibh imperdiet in. Maecenas maximus id dui sit amet hendrerit. Morbi a tellus vel magna ultricies egestas id ut mi. Duis sed dolor sit amet ipsum ullamcorper laoreet in id purus. Fusce vehicula orci et venenatis tristique.

Morbi nec cursus erat. Ut suscipit molestie nisi maximus cursus. Praesent quis luctus est. Nullam finibus metus dolor, a posuere est pretium id. Nullam ornare in purus sed efficitur. Vivamus id ipsum ut dui blandit dictum. Aenean ante elit, condimentum non libero vitae, blandit efficitur eros. Nullam rutrum tortor non orci congue, id auctor lacus hendrerit.

Phasellus fringilla sem placerat erat mollis mollis ut rhoncus nunc. Etiam ornare pretium tempus. Nunc felis metus, viverra eget hendrerit et, blandit nec purus. Aliquam ut lectus non nibh sodales mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris congue pellentesque nunc, in volutpat leo mattis sit amet. Etiam porta, turpis eu pharetra scelerisque, tortor tortor iaculis nisl, a fermentum sem felis vitae est. Pellentesque tristique, ex a fringilla sollicitudin, mi tellus gravida orci, vitae scelerisque nisi leo eu lectus.',
			'chapo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet congue nisi, eu egestas velit. Donec tincidunt nisi nec efficitur pretium. Aliquam arcu nisi, tristique in ex eget, ultricies accumsan erat. Aliquam erat volutpat.',
			'slug' => 'exemple-actu'
		]);
		
		Reservation::create([
			
			'user_id' => 1,
			'demijournee' => '1436179508-m',
			'velo_id' => 1,
			'valide'=>false
			
		]);
		
		Reservation::create([
			
			'user_id' => 1,
			'demijournee' => '1436465508-a',
			'velo_id' => 4,
			'valide'=>false
			
		]);
	}

}
