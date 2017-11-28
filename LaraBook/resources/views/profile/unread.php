<?php
$test1 = DB::table('conversation')
->where('status',1) // unread Messages
->where('user_one',Auth::user()->id) // if this user is sender
->count();

$test2 = DB::table('conversation')
->where('status',1) // unread Messages
->where('user_two',Auth::user()->id) // if this user is sender
->count();

echo $test1 + $test2;
//return array_merge($test1->toArray(), $test2->toArray());
?>
