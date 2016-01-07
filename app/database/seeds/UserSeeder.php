<?php
class UserSeeder extends Seeder{
    public function run(){
        $user = new User;
        $user->email = "Joel@gmail.com";
        $user->password = "123";
        $user->fullname = "Joel Field";
        $user->dob = "10 September 1992";
        $user->save();
        
        $user = new User;
        $user->email = "shaun@gmail.com";
        $user->password = "333";
        $user->fullname = "Shaun Field";
        $user->dob = "10 September 1996";
        $user->save();
        
        $user = new User;
        $user->email = "meg@gmail.com";
        $user->password = "333";
        $user->fullname = "Meg dan";
        $user->dob = "10 September 1996";
        $user->save();
        
         $user = new User;
        $user->email = "dan@gmail.com";
        $user->password = "333";
        $user->fullname = "Dan Field";
        $user->dob = "10 September 1986";
        $user->save();
        
         $user = new User;
        $user->email = "Chris@gmail.com";
        $user->password = "333";
        $user->fullname = "Chris Field";
        $user->dob = "10 September 1976";
        $user->save();
        
         $user = new User;
        $user->email = "Pj@gmail.com";
        $user->password = "333";
        $user->fullname = "Peter Jenkins";
        $user->dob = "10 September 1976";
        $user->save();
        
         $user = new User;
        $user->email = "Lewiss@gmail.com";
        $user->password = "333";
        $user->fullname = "Lewiss Field";
        $user->dob = "10 September 1986";
        $user->save();
        
         $user = new User;
        $user->email = "DC@gmail.com";
        $user->password = "333";
        $user->fullname = "Daniel Field";
        $user->dob = "10 September 1996";
        $user->save();
        
         $user = new User;
        $user->email = "Mickey@gmail.com";
        $user->password = "333";
        $user->fullname = "Michael Field";
        $user->dob = "10 September 1966";
        $user->save();
        
         $user = new User;
        $user->email = "Kim@gmail.com";
        $user->password = "333";
        $user->fullname = "Kim Field";
        $user->dob = "10 September 1976";
        $user->save();
    
        
    }
}
        