<?php

/**
 * Interface MediaPlayer
 * 普通媒体播放器接口
 */
interface MediaPlayer
{
    public function play($audioType, $fileName);
}

/**
 * Interface AdvanceMediaPlayer
 * 高级媒体播放器接口
 */
interface AdvanceMediaPlayer
{
    public function playVlc($fileName);
    public function playMp4($fileName);
}

/**
 * Class VlcPlayer
 * 高级播放器VLC
 */
class VlcPlayer implements AdvanceMediaPlayer
{
    public function playMp4($fileName)
    {
        return "";
    }

    public function playVlc($fileName)
    {
        echo "Playing VLC file. Name: " . $fileName . "<br/>";
    }
}

/**
 * Class MP4Player
 * 高级播放器MP4
 */
class MP4Player implements AdvanceMediaPlayer
{
    public function playMp4($fileName)
    {
        echo "Playing MP4 file. Name: " . $fileName . "<br/>";
    }

    public function playVlc($fileName)
    {
        return "";
    }
}

/**
 * Class MediaAdapter
 * 媒体适配器
 */
class MediaAdapter implements MediaPlayer
{
    public $player;
    public $audioType;

    public function __construct($audioType)
    {
        if ($audioType == "VLC") {
            $this->player = new VlcPlayer();
        } else if ($audioType == "MP4") {
            $this->player = new MP4Player();
        }
    }

    public function play($audioType, $fileName)
    {
        if ($audioType == "VLC") {
            $this->player->playVlc($fileName);
        } else if ($audioType == "MP4") {
            $this->player->playMp4($fileName);
        }
    }
}

/**
 * Class AudioPlayer
 * 媒体播放器
 */
class AudioPlayer implements MediaPlayer
{
    public $adapter;

    public function play($audioType, $fileName)
    {
        if ($audioType == "MP3") {
            echo "Playing MP3 file. Name: " . $fileName . "<br/>";
        } else if ($audioType == "MP4" || $audioType == "VLC") {
            $this->adapter = new MediaAdapter($audioType);
            $this->adapter->play($audioType, $fileName);
        } else {
            echo "Invalid media. " . $audioType . " format not supported.";
        }
    }
}

$audioPlayer = new AudioPlayer();
$audioPlayer->play('MP4', "《Breathless》 - Shayne Ward");
$audioPlayer->play('VLC', "《Beautiful Times》 - Owl City");
$audioPlayer->play('MP3', "《成都》 - 赵雷");
$audioPlayer->play('AVI', "《体面》 - 于文文");