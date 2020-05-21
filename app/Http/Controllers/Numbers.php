<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Number;

class Numbers extends Controller
{
    /*
     * Method is created random num
     * and return himself's id in DB
     *
     * */
    public function generate(Request $request)
    {
        $num = new Number;

        $num->NUM = rand();

        $num->save();

        return 'ID созданного числа: '.$num->id.'<br/>'.
            'Чтобы просмотреть запись перейдите по <a href="/api/retrieve/'.$num->id.'">ссылке</a>.<br/>'.
            'Чтобы просмотреть весь список сгенерированных чисел нажмите <a href="/api/retrieve/">здесь</a>.';
    }

    /*
     * 
     * Method return the num by id
     * or return array of number if id is not used
     * */
    public function retrieve($id = null)
    {
        if($id == null) {
            return Number::all();
        } else {
            return Number::find($id);
        }
    }

}
