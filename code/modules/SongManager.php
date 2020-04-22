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
Вступление: <b>Am</b> | <b>C</b> | <b>G</b> | <b>F</b>

<b>Am</b>                           <b>C</b>
Песен, еще не написанных, сколько?
<b>G</b> <b>Dm</b>
Скажи, кукушка,
<b>Am</b>
Пропой.
<b>Am</b>                            
В городе мне жить или на выселках?
<b>C</b>
Камнем лежать
<b>G</b> <b>Dm</b>
Или гореть звездой?
<b>Am</b>
Звездой...

Припев:
<b>G</b>          <b>F</b>               <b>Am</b>
Солнце мое, взгляни на меня:
<b>G</b>       <b>F</b>                     <b>Am</b>
Моя ладонь превратилась в кулак.
<b>G</b>             <b>F</b>            <b>Am</b> <b>G</b> <b>F</b>
И если есть порох, дай огня.
<b>Am</b>
Вот так.

Проигрыш: <b>Am</b> | <b>C</b> | <b>G</b> | <b>F</b>

<b>Am</b>              
Кто пойдет по следу одинокому?
<b>C</b>                                  <b>G</b> <b>Dm</b>
Сильные да смелые головы сложили в поле,
<b>Am</b>              
В бою.
<b>Am</b>              
Мало кто остался в светлой памяти,
<b>C</b>                                     <b>G</b> <b>Dm</b>
В трезвом уме да с твердой рукой в строю.
<b>Am</b>              
В строю.

Припев:
<b>G</b>          <b>F</b>               <b>Am</b>
Солнце мое, взгляни на меня:
<b>G</b>       <b>F</b>                     <b>Am</b>
Моя ладонь превратилась в кулак.
<b>G</b>             <b>F</b>            <b>Am</b> <b>G</b> <b>F</b>
И если есть порох, дай огня.
<b>Am</b>
Вот так.

<b>Am</b>                  
Где же ты теперь, воля вольная,
<b>C</b>                                        <b>G</b>  <b>Dm</b>
С кем же ты сейчас ласковый рассвет встречаешь?
<b>Am</b>              
Ответь!
<b>Am</b>                 
Хорошо с тобой да плохо без тебя.
<b>C</b>                              <b>G</b>  <b>Dm</b>
Голову да плечи терпеливые под плеть.
<b>Am</b>              
Под плеть.

Припев: 
<b>G</b>          <b>F</b>               <b>Am</b>
Солнце мое, взгляни на меня:
<b>G</b>       <b>F</b>                     <b>Am</b>
Моя ладонь превратилась в кулак.
<b>G</b>             <b>F</b>            <b>Am</b> <b>G</b> <b>F</b>
И если есть порох, дай огня.
<b>Am</b>
Вот так.
<b>G</b>          <b>F</b>               <b>Am</b>
Солнце мое, взгляни на меня:
<b>G</b>       <b>F</b>                     <b>Am</b>
Моя ладонь превратилась в кулак.
<b>G</b>             <b>F</b>            <b>Am</b> <b>G</b> <b>F</b>
И если есть порох, дай огня.
<b>Am</b>
Вот так.
END
                ],
                [
                    'authorID' => 1,
                    'visits' => 7,
                    'name' => 'Там, где клён шумит',
                    'text' =>
                        <<<'END'
Вступление: <b>Am</b> | <b>Am/G</b> | <b>Am/F#</b> | <b>Am/F</b> <b>Am/E</b>

      <b>Am</b>               <b>F</b>
 Там, где клён шумит над речной волной, 
<b>Am</b>           <b>F</b>
 Говорили мы о любви с тобой, 
 <b>Dm</b>              <b>G</b>            <b>C</b>
 Отшумел тот клён, в поле бродит мгла, 
 <b>Dm</b>               <b>Am</b>        <b>E7</b>   <b>Am</b>
 А любовь, как сон, стороной прошла. 
          <b>D</b>        <b>G</b>        <b>C</b>
 А любовь, как сон, а любовь, как сон, 
<b>Am</b>        <b>B7</b>      <b>F</b>      <b>E7</b> <b>Am</b>
 А любовь, как сон, стороной прошла. 
 
      <b>Am</b>               <b>F</b>
 Сердцу очень жаль, что случилось так, 
      <b>Am</b>               <b>F</b>
 Гонит осень вдаль журавлей косяк. 
 <b>Dm</b>              <b>G</b>            <b>C</b>
 Четырём ветрам грусть-печаль раздам, 
 <b>Dm</b>               <b>Am</b>        <b>E7</b>  <b>Am</b>
 Не вернётся вновь это лето к нам.
          <b>D</b>        <b>G</b>         <b>C</b> 
 Не вернётся вновь, не вернётся вновь, 
<b>Am</b>        <b>B7</b>      <b>F</b>      <b>E7</b> <b>Am</b>
 Не вернётся вновь это лето к нам. 
 
      <b>Am</b>               <b>F</b>
 Ни к чему теперь за тобой ходить, 
      <b>Am</b>               <b>F</b>
 Ни к чему теперь мне цветы дарить, 
 <b>Dm</b>              <b>G</b>            <b>C</b>
 Ты любви моей не смогла сберечь, 
 <b>Dm</b>               <b>Am</b>        <b>E7</b> <b>Am</b>
 Поросло травой место наших встреч.
          <b>D</b>        <b>G</b>     <b>C</b>
 Поросло травой, поросло травой, 
<b>Am</b>        <b>B7</b>      <b>F</b>     <b>E7</b> <b>Am</b>
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