<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserAccount;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfile;
use App\Models\Profile;
use App\Models\Theme;
use App\Models\User;
use App\Models\Skill;
use App\Notifications\SendGoodbyeEmail;
use App\Traits\CaptureIpTrait;
use File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use jeremykenedy\Uuid\Uuid;
use Validator;
use View;
use Illuminate\Database\Seeder;
//use Illuminate\Faker;
use jeremykenedy\LaravelRoles\Models\Role;

class SearchController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $q = $request->input('q');
        $max_page = 30;
        //Полнотекстовый поиск с пагинацией

        if ($q) {
            $results = $this->search($q, $max_page);
        } else {
            //$results = User::paginate($max_page);
            $results = User::paginate($max_page);
        }



        //return view('profiles.edit')->with($data);

        $request->flash();

        return view('search.index', [
                    'include' => 'search.table',
                    'users' => $results,
                ])->render();
    }

    /**
     * Полнотекстовый поиск.
     *
     * @param string $q Строка содержащая поисковый запрос. Может быть несколько фраз разделенных пробелом.
     * @param integer $count Количество найденных результатов выводимых на одной странице (для пагинации)
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function search($q, $count) {

        // $q = 'pavel';

        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word) {
            $len = mb_strlen($word, 'UTF-8');
            switch (true) {
                case ($len <= 3): {
                        $query[] = $word . "*";
                        break;
                    }
                case ($len > 3 && $len <= 6): {
                        $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 6 && $len <= 9): {
                        $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 9): {
                        $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                        break;
                    }
                default: {
                        break;
                    }
            }
        }

        
        #

        //dd($query);
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $results = User::whereRaw(
                        "MATCH(name,email,first_name,last_name) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
                        $qQeury);
        
        //Поиск скилла
        #$skills = Skill::where('title', 'like', $q . '%')->pluck('id', 'title')->toArray();
        
        $skills = Skill::whereRaw(
                        "MATCH(title) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
                        $qQeury)->pluck('id', 'title')->toArray();
        
        #dd($skills);
        if (count($skills)>0){
            $gluedSkills = implode(',',$skills);            
            $results->orWhereRaw(
                    '(select count(*) from skill_user where skill_user.user_id = users.id and skill_user.skill_id in ('.$gluedSkills.'))>0');
          
        }

        return $results->paginate($count);

        //dd($results);
        return $results;
    }

}
