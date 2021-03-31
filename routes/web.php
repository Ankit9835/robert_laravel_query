<?php

use App\User;
use App\Comment;
use App\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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

   // $users = DB::table('users')->get();
   // $users = DB::table('users')->pluck('email');
   // $users = DB::table('users')->where('name','Enola Daniel Jr.')->first();
   // $users = DB::table('users')->where('name','Enola Daniel Jr.')->value('email');

   // $comments = DB::table('comments')->select('content as comment_content')->get();

   // $comments = DB::table('comments')->select('user_id')->distinct()->get();

   // $comments = DB::table('comments')->count();

   // $comments = DB::table('comments')->max('user_id');
   // $comments = DB::table('comments')->sum('user_id');

   // $comments = DB::table('comments')->where('content','content')->exists();

   // $comments = DB::table('comments')->where('content','content')->doesntExist();

   // $rooms = DB::table('rooms')->get();

   // $rooms = DB::table('rooms')->where('room_price', '<', 200)->get();

   // $rooms = DB::table('rooms')->where([

   //    ['room_size', '2'],
   //    ['room_price','<',400],


   // ])->get();

   // $rooms = DB::table('rooms')->where('room_price','<',400)->orWhere('room_size','2')->get();

   // $rooms = DB::table('rooms')->where('room_price','<',400)->
   //          orWhere(function($query){
   //            $query->where('room_size','>','1')
   //            ->where('room_size','<','4');
   //          })->get();

   //  $rooms = DB::table('rooms')->whereBetween('room_size',[1,3])->get(); //whereNotBetween

   //  $rooms = DB::table('rooms')->whereNotIn('id', [1,2,3])->get(); //whereIn

   //  // whereNull('column') whereNotNull
   //  // whereDate('created_at', 2020-05-12)

   //  $result = DB::table('users')
   //            ->whereExists(function($query){
   //              $query->select('id')
   //                    ->from('reservations')
   //                    ->whereRaw('reservations.user_id','users.id')
   //                    ->where('check_in', '=', '2021-02-07')
   //                    ->limit(1);
   //            })->get();

   // $result = DB::statement('ALTER TABLE comments ADD FULLTEXT fulltext_index(content)'); // MySQL >= 5.6

   // $result = DB::table('comments')
   //       ->whereRaw("MATCH(content) AGAINST(? IN BOOLEAN MODE)", ['+praesentium -Doloremque'])
   //       ->get();

  // $result = DB::table('comments')
  //   ->where("content", 'like', '%inventore%')
  //   ->get();

  //   $users = DB::table('users')->orderBy('id','desc')->get();
  //   $users = DB::table('users')->latest()->get();
  //   $users = DB::table('users')->inRandomOrder()->first();

  //   $comments = DB::table('comments')
  //               ->selectRaw('count(id) as number_of_5_star_comments, rating')
  //               ->groupBy('rating')
  //               ->where('rating', '=', 5)
  //               ->get();

    // $comments = DB::table('comments')->skip(5)->take(5)->get();

  //   $comments = DB::table('comments')->offset(5)->limit(5)->get();

    // $comments =  DB::table('comments')->orderBy('id')->chunk(2, function($comments){
    //   foreach($comments as $comment){
    //     if($comment->id == 5) return false;
    //   }
    // });

    // $comments =  DB::table('comments')->orderBy('id')->chunkById(5, function($comments){
    //   foreach($comments as $comment){
    //     DB::table('comments')->where('id', $comment->id)
    //     ->update([
    //       'rating' => 4
    //     ]);
    //   }
    // });

    // $result = DB::table('reservations')
    //         ->join('rooms','reservations.room_id', '=', 'rooms.id')
    //         ->join('users','reservations.user_id', '=', 'users.id')
    //         ->where('rooms.id', '>', 3)
    //         ->where('users.id', '>', 1)
    //         ->get();

  // $result = DB::table('reservations')
  //           ->join('rooms', function($join) {
  //               $join->on('reservations.room_id', '=', 'rooms.id')
  //               ->where('rooms.id', '>', 3);
  //           })
  //           ->join('users', function($join) {
  //               $join->on('reservations.user_id', '=', 'users.id')
  //               ->where('users.id', '>', 1);
  //           })
  //           ->get();

  // $result = DB::table('rooms')
  //           ->leftJoin('reservations','rooms.id', '=', 'reservations.room_id')
  //           ->selectRaw('room_size, count(reservations.id) as reservations_count')
  //           ->groupBy('room_size')
  //           ->orderByRaw('count(reservations.id) DESC')
  //           ->get();

  // $result = DB::table('rooms')
  //           ->leftJoin('reservations','rooms.id', '=', 'reservations.room_id')
  //           ->selectRaw('room_size, room_price, count(reservations.id) as reservations_count')
  //           ->groupBy('room_size','room_price')
  //           ->get();

  // $result = DB::table('rooms')
  //           ->leftJoin('reservations', 'rooms.id', '=', 'reservations.room_id')
  //           ->leftJoin('cities', 'reservations.city_id', '=', 'cities.id')
  //           ->selectRaw('room_size, count(reservations.id) as reservations_count, cities.name')
  //           ->groupBy('room_size','cities.name')
  //           ->orderByRaw('count(reservations.id) DESC')
  //           ->get();

  // $users = DB::table('users')->select('name');

  // $cities = DB::table('cities')->select('name')->union($users)->get();

  // $comments = DB::table('comments')
  //             ->select('rating as rating_or_room_id', 'id', DB::raw('"comments"  as type_of_activity'))->where('user_id', 2);

  // $result = DB::table('reservations')
  //           ->select('room_id as rating_or_room_id', 'id', DB::raw('"reservation" as type_of_activity'))
  //           ->union($comments)
  //           ->where('user_id',2)
  //           ->get();

    // DB::table('rooms')->insert([

    //     [
    //       'room_number' => 1,
    //       'room_size' => 1,
    //       'room_price' => 1999,
    //       'description' => 'Test'
    //     ]

    // ]);

    // Last Insert ID

    // $id = DB::table('rooms')->insertGetId(

    //     [
    //       'room_number' => 1,
    //       'room_size' => 1,
    //       'room_price' => 2999,
    //       'description' => 'Test'
    //     ]

    // );

    // dd($id);

    // $increment = DB::table('rooms')->increment('room_price', 20);

    // //dd($increment);

    // $decrement = DB::table('rooms')->decrement('room_price', 20, ['description' => 'Another Test']);
    // dd($decrement);

   //  DB::statement('SET FOREIGN_KEY_CHECKS=0;');

   //  DB::table('rooms')->truncate();

   //  DB::statement('SET FOREIGN_KEY_CHECKS=1');

   // dump($result);

  // Elequont ORM BASIC

    // $user = User::select('name','email')
    // ->addSelect([
    //   'worst_rating' => Comment::select('rating')
    //   ->whereColumn('user_id', 'users.id')
    //   ->orderBy('rating', 'asc')
    //   ->limit(1)
    // ])->get();

    // $result = Reservation::chunk(2, function ($reservations) {
    //     foreach ($reservations as $reservation) {
    //         echo $reservation->id;
    //     }
    // }); // uses less memory than get() and cursor() but takes longer than get() and cursor(), the bigger chunk set is the less time a query takes but memory usage increases

    // foreach (Room::cursor() as $reservation) {
    //     echo $reservation->id;
    // } // takes faster than get() and chunk() but uses more memory than chunk() (not as much as get() method)
  //   $result = Comment::all();
  //   $result = Comment::withoutGlobalScope('rating')->get();
  // $result = Comment::rating(4);
  //    dump($result);

    // $comments = Comment::all();

    // $result = $comments->reject(function($comment){
    //   return $comment->rating < 3;
    // });

    // // $result = $comments->map(function($comment){
    // //   return $comment->content;
    // // })->toArray();

    // $result = $comments->diff($result);

   // $result = Comment::destroy([1,2,3]);

   // $result = Comment::where('rating', '>', 2)->delete();

   // $result = Comment::withTrashed()->get(); // onlyTrashed()

   // $result = Comment::withTrashed()->restore(); // onlyTrashed()

   // $result = Comment::where('rating', 4)->forceDelete();

   // $result = Comment::all();

   $comment = Comment::find(6);
   $comment->rating = 4;
   $comment->save();

   // $result = $comment->rating;

   // Comment::where('id', 6)->update(['rating' => $result]);


    // dump($comment->who_what);

    return view('welcome');
});

