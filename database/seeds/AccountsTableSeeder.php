<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        //getting all existing User ids into a $users array
        $users = User::all()->pluck('id')->toArray();
       
       //generate 10 records for the accounts table
        foreach (range(1,10) as $index) {
        DB::table('accounts')->insert([
        'userid' =>$faker->randomElement($users),
        'accountno'=>$faker->numberBetween(100000,999999),
        'type'=>$faker->randomElement($array=array
       ('saving','current')),
        'balance'=>$faker->randomFloat(2,0,999999),
        'interest'=>$faker->randomFloat(2,0,0.1)
        ]);
    }
}
}
