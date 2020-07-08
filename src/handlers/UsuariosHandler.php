<?php
namespace src\handlers;

use \src\models\Usuarios;

class UsuariosHandler {

    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $data = Usuarios::select()->where('token', $token)->one();
            if(count($data) > 0) {
                $loggedUser = new Usuarios;
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->avatar = $data['avatar'];
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = Usuarios::select()->where('email', $email)->one();
        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0, 9999).time());
                Usuarios::update()->set('token', $token)->where('email', $email)->execute();
                return $token;
            }
        }
        return false;
    }

    public function idExists($id) {
        $user = Usuarios::select()->where('id', $id)->one();
        return $user ? true : false;
    }

    public function emailExists($email) {
        $user = Usuarios::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public function getUser($id, $full = false) {
        $data = Usuarios::select()->where('id', $id)->one();

        if($data) { 
            $user = new Usuarios;
            $user->id = $data['id'];
            $user->name = $data['name'];
            $user->birthdate = $data['birthdate'];
            $user->city = $data['city'];
            $user->work = $data['work'];
            $user->avatar = $data['avatar'];
            $user->cover = $data['cover'];

            if($full) {
                $user->followers = [];
                $user->following = [];
                $user->photos = [];

                //followers
                $followers = UserRelation::select()->where('user_to', $id)->get();
                foreach($followers as $follower) {
                    $userData = Usuarios::select()->where('user_from', $follower['user_from'])->one();
                    $newUser = new Usuarios();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];

                    $user->followers[] = $newUser;
                }

                //following
                $following = UserRelation::select()->where('user_from', $id)->get();
                foreach($following as $follower) {
                    $userData = Usuarios::select()->where('user_from', $follower['user_to'])->one();
                    $newUser = new Usuarios();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];

                    $user->following[] = $newUser;
                }

                //photos
                $user->photos = PostHandler::getPhotosFrom($id);
            }

            return $user;
        }

        return false;
    }

    public function addUser($name, $email, $password, $birthdate) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999).time());
        Usuarios::insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'birthdate' => $birthdate,
            'token' => $token
        ])->execute();
        return $token;
    }

}