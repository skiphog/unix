<?php

namespace App\Arrays;

class Arrays
{
    public static $complaints = [
        1 => 'Виртуал / фейк',
        2 => 'Мужчина под видом пары / девушки',
        3 => 'Реклама / Мошенничество',
        4 => 'Грубость / Угрозы',
        5 => 'Чужие фотографии',
        6 => 'Выманивает фото',
        7 => 'Другое',
    ];

    public static $padej = [
        'Был',
        'Был',
        'Была',
        'Были',
        'Был',
    ];

    public static $avatar = [
        0 => 'Для всех',
        2 => 'Для зарегистрированных',
        3 => 'Для реальных',
    ];

    public static $sgender = [
        1 => 'Мужчину',
        2 => 'Женщину',
        3 => 'Пару М+Ж',
        4 => 'Транс',
    ];

    public static $relevance = [
        0 => 'Никого не ищу',
        1 => 'В неспешном поиске',
        2 => 'В активном поиске',
    ];

    public static $photo_visibility = [
        0 => 'Для всех',
        2 => 'Для пользователей с анкетами',
        3 => 'Для владельцев статуса реальности',
    ];
}
