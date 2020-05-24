<?php

namespace modules;

class SongManager
{
    private static $instance = null;
    private array $songs = [];
    private array $authors = [];

    private function __construct()
    {
        $this->authors =
            [
                [
                    'name' => 'Виктор Цой',
                    'visits' => 10
                ],
                [
                    'name' => 'Синяя птица',
                    'visits' => 7
                ]
            ];
        $this->songs =
            [
                [
                    'authorID' => 0,
                    'visits' => 10,
                    'name' => 'Кукушка',
                    'text' =>
                        <<<'END'
Вступление: <b class="chord">Am</b> | <b class="chord">C</b> | <b class="chord">G</b> | <b class="chord">F</b>

<b class="chord">Am</b>                           <b class="chord">C</b>
Песен, еще не написанных, сколько?
<b class="chord">G</b> <b class="chord">Dm</b>
Скажи, кукушка,
<b class="chord">Am</b>
Пропой.
<b class="chord">Am</b>                            
В городе мне жить или на выселках?
<b class="chord">C</b>
Камнем лежать
<b class="chord">G</b> <b class="chord">Dm</b>
Или гореть звездой?
<b class="chord">Am</b>
Звездой...

Припев:
<b class="chord">G</b>          <b class="chord">F</b>               <b class="chord">Am</b>
Солнце мое, взгляни на меня:
<b class="chord">G</b>       <b class="chord">F</b>                     <b class="chord">Am</b>
Моя ладонь превратилась в кулак.
<b class="chord">G</b>             <b class="chord">F</b>            <b class="chord">Am</b> <b class="chord">G</b> <b class="chord">F</b>
И если есть порох, дай огня.
<b class="chord">Am</b>
Вот так.

Проигрыш: <b class="chord">Am</b> | <b class="chord">C</b> | <b class="chord">G</b> | <b class="chord">F</b>

<b class="chord">Am</b>              
Кто пойдет по следу одинокому?
<b class="chord">C</b>                                  <b class="chord">G</b> <b class="chord">Dm</b>
Сильные да смелые головы сложили в поле,
<b class="chord">Am</b>              
В бою.
<b class="chord">Am</b>              
Мало кто остался в светлой памяти,
<b class="chord">C</b>                                     <b class="chord">G</b> <b class="chord">Dm</b>
В трезвом уме да с твердой рукой в строю.
<b class="chord">Am</b>              
В строю.

Припев:
<b class="chord">G</b>          <b class="chord">F</b>               <b class="chord">Am</b>
Солнце мое, взгляни на меня:
<b class="chord">G</b>       <b class="chord">F</b>                     <b class="chord">Am</b>
Моя ладонь превратилась в кулак.
<b class="chord">G</b>             <b class="chord">F</b>            <b class="chord">Am</b> <b class="chord">G</b> <b class="chord">F</b>
И если есть порох, дай огня.
<b class="chord">Am</b>
Вот так.

<b class="chord">Am</b>                  
Где же ты теперь, воля вольная,
<b class="chord">C</b>                                        <b class="chord">G</b>  <b class="chord">Dm</b>
С кем же ты сейчас ласковый рассвет встречаешь?
<b class="chord">Am</b>              
Ответь!
<b class="chord">Am</b>                 
Хорошо с тобой да плохо без тебя.
<b class="chord">C</b>                              <b class="chord">G</b>  <b class="chord">Dm</b>
Голову да плечи терпеливые под плеть.
<b class="chord">Am</b>              
Под плеть.

Припев: 
<b class="chord">G</b>          <b class="chord">F</b>               <b class="chord">Am</b>
Солнце мое, взгляни на меня:
<b class="chord">G</b>       <b class="chord">F</b>                     <b class="chord">Am</b>
Моя ладонь превратилась в кулак.
<b class="chord">G</b>             <b class="chord">F</b>            <b class="chord">Am</b> <b class="chord">G</b> <b class="chord">F</b>
И если есть порох, дай огня.
<b class="chord">Am</b>
Вот так.
<b class="chord">G</b>          <b class="chord">F</b>               <b class="chord">Am</b>
Солнце мое, взгляни на меня:
<b class="chord">G</b>       <b class="chord">F</b>                     <b class="chord">Am</b>
Моя ладонь превратилась в кулак.
<b class="chord">G</b>             <b class="chord">F</b>            <b class="chord">Am</b> <b class="chord">G</b> <b class="chord">F</b>
И если есть порох, дай огня.
<b class="chord">Am</b>
Вот так.
END
                ],
                [
                    'authorID' => 1,
                    'visits' => 7,
                    'name' => 'Там, где клён шумит',
                    'text' =>
                        <<<'END'
Вступление: <b class="chord">Am</b> | <b class="chord">Am/G</b> | <b class="chord">Am/F#</b> | <b class="chord">Am/F</b> <b class="chord">Am/E</b>

      <b class="chord">Am</b>               <b class="chord">F</b>
 Там, где клён шумит над речной волной, 
<b class="chord">Am</b>           <b class="chord">F</b>
 Говорили мы о любви с тобой, 
 <b class="chord">Dm</b>              <b class="chord">G</b>            <b class="chord">C</b>
 Отшумел тот клён, в поле бродит мгла, 
 <b class="chord">Dm</b>               <b class="chord">Am</b>        <b class="chord">E7</b>   <b class="chord">Am</b>
 А любовь, как сон, стороной прошла. 
          <b class="chord">D</b>        <b class="chord">G</b>        <b class="chord">C</b>
 А любовь, как сон, а любовь, как сон, 
<b class="chord">Am</b>        <b class="chord">B7</b>      <b class="chord">F</b>      <b class="chord">E7</b> <b class="chord">Am</b>
 А любовь, как сон, стороной прошла. 
 
      <b class="chord">Am</b>               <b class="chord">F</b>
 Сердцу очень жаль, что случилось так, 
      <b class="chord">Am</b>               <b class="chord">F</b>
 Гонит осень вдаль журавлей косяк. 
 <b class="chord">Dm</b>              <b class="chord">G</b>            <b class="chord">C</b>
 Четырём ветрам грусть-печаль раздам, 
 <b class="chord">Dm</b>               <b class="chord">Am</b>        <b class="chord">E7</b>  <b class="chord">Am</b>
 Не вернётся вновь это лето к нам.
          <b class="chord">D</b>        <b class="chord">G</b>         <b class="chord">C</b> 
 Не вернётся вновь, не вернётся вновь, 
<b class="chord">Am</b>        <b class="chord">B7</b>      <b class="chord">F</b>      <b class="chord">E7</b> <b class="chord">Am</b>
 Не вернётся вновь это лето к нам. 
 
      <b class="chord">Am</b>               <b class="chord">F</b>
 Ни к чему теперь за тобой ходить, 
      <b class="chord">Am</b>               <b class="chord">F</b>
 Ни к чему теперь мне цветы дарить, 
 <b class="chord">Dm</b>              <b class="chord">G</b>            <b class="chord">C</b>
 Ты любви моей не смогла сберечь, 
 <b class="chord">Dm</b>               <b class="chord">Am</b>        <b class="chord">E7</b> <b class="chord">Am</b>
 Поросло травой место наших встреч.
          <b class="chord">D</b>        <b class="chord">G</b>     <b class="chord">C</b>
 Поросло травой, поросло травой, 
<b class="chord">Am</b>        <b class="chord">B7</b>      <b class="chord">F</b>     <b class="chord">E7</b> <b class="chord">Am</b>
 Поросло травой место наших встреч.
END
                ]
            ];
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new SongManager();
        }
        return self::$instance;
    }

    public function getSong(int $songID)
    {
        $songInfo = $this->songs[$songID];
        if ($songInfo) {
            $song['author'] = $this->authors[$songInfo['authorID']]['name'];
            $song['name'] = $songInfo['name'];
            $song['text'] = $songInfo['text'];
            return $song;
        }
        return NULL;
    }

    public function getPopularAuthors($count)
    {
        /*                DEBUG                */
        $indexes = array_rand($this->authors, $count);
        foreach ($indexes as $index) {
            $authors[] = $this->authors[$index]['name'];
        }
        return $authors;
    }

    public function getNewSongs($count)
    {
        /*                DEBUG                */
        return $this->getPopularSongs($count);
    }

    public function getPopularSongs($count)
    {
        /*                DEBUG                */
        $indexes = array_rand($this->songs, $count);
        foreach ($indexes as $index) {
            $song = $this->songs[$index];
            $author = $this->authors[$song['authorID']]['name'];
            $name = $song['name'];
            $link = '/' . $author . '/' . $name . '/' . $index;
            $text = $author . ' &ndash; ' . $name;
            $songs[$link] = $text;
        }
        return $songs;
    }
}