Gerador de áudio de números
<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

try {
    $key_path = 'key-file.json';
    // Get the authorization in here: https:\\console.developers.google.com\apis\api\texttospeech.googleapis.com\overview

    $textToSpeechClient = new TextToSpeechClient([
        'credentials' => $key_path
    ]);

    $input = new SynthesisInput();

    // Português
    for ($i = 1; $i <= 90; $i++) {
        $lang = 'pt-BR';
        mkdir($lang);
        $input->setText('Número '.$i);
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode($lang);
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);

        $resp = $textToSpeechClient->synthesizeSpeech($input, $voice, $audioConfig);
        file_put_contents($lang."/".$i.'.mp3', $resp->getAudioContent());
    }

    // English
    for ($i = 1; $i <= 90; $i++) {
        $lang = 'en-US';
        mkdir($lang);
        $input->setText('Number '.$i);
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode($lang);
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);

        $resp = $textToSpeechClient->synthesizeSpeech($input, $voice, $audioConfig);
        file_put_contents($lang."/".$i.'.mp3', $resp->getAudioContent());
    }

    // Español
    for ($i = 1; $i <= 90; $i++) {
        $lang = 'es-ES';
        mkdir($lang);
        $input->setText('Número '.$i);
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode($lang);
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);

        $resp = $textToSpeechClient->synthesizeSpeech($input, $voice, $audioConfig);
        file_put_contents($lang."/".$i.'.mp3', $resp->getAudioContent());
    }

} catch(Exception $e) {
    echo '<script>';
    echo 'console.log('. json_encode( $e->getMessage() ) .')';
    echo '</script>';
}
?>