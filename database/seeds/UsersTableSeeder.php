<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = app(Generator::class);
    
        $avatars = [
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/070a883430a87b3fe05bebb3ca09e9c6.jpg',
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/41126cee32b475bd650dbb61dabd9b72.jpg',
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/44416a64a6c67a29698bb81b3449249d.jpg',
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/4e578df0fb45611137f54c4461f4c3e4.jpg',
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/791b05615d2a56f71023662b4ac04940.jpg',
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/b4e9e404b4adccbd359a6f58d2845d32.jpg',
            'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/e4b01c990c0e8afc6360ba31215c0624.jpg'
        ];
    
        $factory = factory(User::class)
            ->times(15)
            ->make()
            ->each(function ($user, $index) use ($faker, $avatars) {
                // 从头像数组中随机取出一个值，并赋值给用户头像属性上。
                $user->avatar = $faker->randomElement($avatars);
            });
    
        // 让隐藏字段可见，并将数据集合转换为数组。
        $array = $factory->makeVisible(['password', 'remember_token'])->toArray();
        
        // 将数据插入到用户数据表中。
        User::insert($array);
    
        $user = User::find(1);
        $user->name = 'Laravel Framework';
        $user->email = 'laravel@gmail.com';
        $user->avatar = 'http://pcnu7fo5y.bkt.clouddn.com/image/jpg/ecb2fe5baff0a9e0674a9e7c353fed7f.jpg';
        $user->save();
        
    }
}
