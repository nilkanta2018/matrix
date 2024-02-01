<?php
namespace App\Gate;


class AdminGate{
    
    public function check_admin($user){
        if($user->role_id===3){
            return true;
        } else {
            return false;
        }
   }

   public function check_regular_user($user){
        if($user->role_id===1){
            return true;
        } else {
            return false;
        }

    }

    public function check_moderator_user($user){
        if($user->role_id===2){
            return true;
        } else {
            return false;
        }
    }

}
