<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

     /*try {
         $dbc = new PDO('mysql:host='.env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'));
         $charset = config('database.connections.mysql.charset');
         $collation = config('database.connections.mysql.collation');
         $query = "CREATE DATABASE IF NOT EXISTS ". env('DB_DATABASE') . " CHARACTER SET $charset COLLATE $collation;";
        $dbc->exec($query);
     } catch (PDOException $e) {
         echo $e->getMessage();
     }*/
    
     /*$users = DB::connection('sqlite')->select('select * from users');
    $user = DB::select('select * from users where id = ?', [1]);*/

   /* dump("sqlite:", $users);
    dump("mysql:", $user);*/
   /* $result = DB::table('users')->select()->get();*/
   /* dump($result);*/

  /* DB::transaction(function(){
        try{
            DB::table('users')->delete();
            $result = DB::table('users')->where('id', 4)->update(['email' => 'none']);
            if(!$result){
                throw new \Exception;
            }
        } catch(\Exception $e) {
            DB::rollBack();
        }
   }, 5);

   dump($result);*/

   // $user = DB::table('users')->get();
   // $comment = DB::table('comments')->get();

   // dump($user);
   // dump($comment);

   // dump(factory(App\Comment::class,3)->create());

   $users = DB::table('users')->get();
   $users = DB::table('users')->pluck('email');
   $users = DB::table('users')->where('name','Enola Daniel Jr.')->first();
   $users = DB::table('users')->where('name','Enola Daniel Jr.')->value('email');

   $comments = DB::table('comments')->select('content as comment_content')->get();

   $comments = DB::table('comments')->select('user_id')->distinct()->get();

   $comments = DB::table('comments')->count();

   $comments = DB::table('comments')->max('user_id');
   $comments = DB::table('comments')->sum('user_id');

   $comments = DB::table('comments')->where('content','content')->exists();

   $comments = DB::table('comments')->where('content','content')->doesntExist();

   $rooms = DB::table('rooms')->get();

   $rooms = DB::table('rooms')->where('room_price', '<', 200)->get();

   $rooms = DB::table('rooms')->where([

      ['room_size', '2'],
      ['room_price','<',400],


   ])->get();

   $rooms = DB::table('rooms')->where('room_price','<',400)->orWhere('room_size','2')->get();

   $rooms = DB::table('rooms')->where('room_price','<',400)->
            orWhere(function($query){
              $query->where('room_size','>','1')
              ->where('room_size','<','4');
            })->get();

    $rooms = DB::table('rooms')->whereBetween('room_size',[1,3])->get(); //whereNotBetween

    $rooms = DB::table('rooms')->whereNotIn('id', [1,2,3])->get(); //whereIn

    // whereNull('column') whereNotNull
    // whereDate('created_at', 2020-05-12)

    $result = DB::table('users')
              ->whereExists(function($query){
                $query->select('id')
                      ->from('reservations')
                      ->whereRaw('reservations.user_id','users.id')
                      ->where('check_in', '=', '2021-02-07')
                      ->limit(1);
              })->get();

   // $result = DB::statement('ALTER TABLE comments ADD FULLTEXT fulltext_index(content)'); // MySQL >= 5.6

   // $result = DB::table('comments')
   //       ->whereRaw("MATCH(content) AGAINST(? IN BOOLEAN MODE)", ['+praesentium -Doloremque'])
   //       ->get();

  $result = DB::table('comments')
    ->where("content", 'like', '%inventore%')
    ->get();

    $users = DB::table('users')->orderBy('id','desc')->get();
    $users = DB::table('users')->latest()->get();
    $users = DB::table('users')->inRandomOrder()->first();

    $comments = DB::table('comments')
                ->selectRaw('count(id) as number_of_5_star_comments, rating')
                ->groupBy('rating')
                ->where('rating', '=', 5)
                ->get();

    $comments = DB::table('comments')->skip(5)->take(5)->get();

    $comments = DB::table('comments')->offset(5)->limit(5)->get();

    $comments =  DB::table('comments')->orderBy('id')->chunk(2, function($comments){
      foreach($comments as $comment){
        if($comment->id == 5) return false;
      }
    });

    $comments =  DB::table('comments')->orderBy('id')->chunkById(5, function($comments){
      foreach($comments as $comment){
        DB::table('comments')->where('id', $comment->id)
        ->update([
          'rating' => null
        ]);
      }
    });



   dump($comments);

    return view('welcome');
});

