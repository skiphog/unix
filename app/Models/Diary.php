<?php

namespace App\Models;

class Diary
{
    public static function findById(int $id)
    {
        $sql = 'select d.title_di,d.text_di, d.data_di,d.likes,d.dislikes,d.v_count,
          u.id id_user,u.login,u.gender,u.pic1,u.photo_visibility
          from diary d
          join users u on u.id = d.user_di
          where d.id_di = ' . $id . ' 
        and d.deleted = 0 limit 1';

        return db()->query($sql)->fetch(\PDO::FETCH_ASSOC);
    }
}
