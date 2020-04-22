<?php

declare(strict_types=1);

namespace modules;

require_once 'SongManager.php';

class Resolver
{
    public static string $INDEX_PAGE = 'index';
    private static int $SONG_PART_COUNT = 3;
    private static int $SONG_ID_INDEX = 2;
    private static int $ITEMS_COUNT = 2;

    public static function resolve($query, &$values): string
    {
        $values['links'] = [
            '/index' => 'Главная',
            '/technics' => 'Приёмы игры',
            '/tuning' => 'Настройка гитары',
            '/add' => 'Добавить подбор'
        ];
        $requestParts = explode('/', $query);
        $request = $requestParts[0];
        $values['request'] = '/' . $request;
        $songManager = SongManager::getInstance();
        $values['newSongs'] = $songManager->getNewSongs(self::$ITEMS_COUNT);
        switch ($request) {
            case 'index':
            case '':
            {
                $values['songs'] = $songManager->getPopularSongs(self::$ITEMS_COUNT);
                $values['authors'] = $songManager->getPopularAuthors(self::$ITEMS_COUNT);
                return 'index';
            }
            case 'technics':
            case 'add':
            case 'tuning':
                return $request;
        }
        if (count($requestParts) == self::$SONG_PART_COUNT &&
            is_numeric($requestParts[self::$SONG_ID_INDEX])) {
            $songID = (int)$requestParts[self::$SONG_ID_INDEX];
            $song = $songManager->getSong($songID);
            if ($song) {
                $values['title'] = $song['author'] . ' &ndash; ' . $song['name'];
                $values['text'] = $song['text'];
                return 'song';
            }
        }
        return 'notFound';
    }
}
