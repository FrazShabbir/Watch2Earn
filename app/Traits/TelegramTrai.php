<?php

namespace App\Traits;

use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

trait TelegramTrait
{
    /*
     * We have 3 Telegram bots
     * mybot - for all first bot used for every default messages
     * lead_bot - for all lead related messages
     * notification_bot - for all notification related messages
     *
     */

    private function prepareMessage($message)
    {
        $message = str_replace(array('+'), '\+', $message);
        $message = str_replace(array('-'), '\-', $message);
        $message = str_replace(array('.'), '\.', $message);
        $message = str_replace(array('_'), '\_', $message);
        // $message = str_replace(array('*'), '\*', $message);
        $message = str_replace(array('`'), '\`', $message);
        $message = str_replace(array('['), '\[', $message);
        $message = str_replace(array(']'), '\]', $message);
        $message = str_replace(array('('), '\(', $message);
        $message = str_replace(array(')'), '\)', $message);
        $message = str_replace(array('~'), '\~', $message);
        $message = str_replace(array('>'), '\>', $message);
        $message = str_replace(array('#'), '\#', $message);
        $message = str_replace(array('='), '\=', $message);
        return $message;
    }
    public function sendTelegramMessage($message, $chatIds, $bot = 'notification_bot')
    {
        $telegram = Telegram::bot($bot);
        $telegram->setTimeOut(30);
        if (count($chatIds) > 0) {
            $message = $this->prepareMessage($message);
            foreach ($chatIds as $value) {
                if ($value != '') {
                    try {
                        $telegram->sendMessage([
                            // 'chat_id' => '-1001742014326',
                            'chat_id' => $value,
                            'text' => $message,
                            'parse_mode' => 'MarkdownV2',
                        ]);
                        // $messageId = $response->getMessageId();
                    } catch (\Exception $e) {
                        \Log::info('Telegram error log: ' . $e->getMessage() . " chat_id is: " . $value . " message is: " . $message);
                        continue;
                    }
                }
            }
        }

    }
    public function sendTelegramMessageHtml($message, $chatIds, $url = null, $button_title = 'Update Lead', $bot = 'notification_bot',$disable_web_app = false)
    {
        if (count($chatIds) > 0) {

            $telegram = Telegram::bot($bot);
            $telegram->setTimeOut(30);
            foreach ($chatIds as $value) {
                if ($value != '') {
                    try {
                        if ($url) {
                            if (env('APP_ENV') === 'local' || $disable_web_app == true) {
                                $telegram->sendMessage([
                                    // 'chat_id' => '-1001742014326',
                                    'chat_id' => $value,
                                    'text' => $message,
                                    'parse_mode' => 'html',
                                    'reply_markup' => json_encode([
                                        'inline_keyboard' => [
                                            [
                                                [
                                                    'text' => $button_title,
                                                    'url' => $url,
                                                ],
                                            ],
                                        ],
                                    ]),
                                    'disable_web_page_preview' => true,
                                ]);
                            } else {
                                $telegram->sendMessage([
                                    // 'chat_id' => '-1001742014326',
                                    'chat_id' => $value,
                                    'text' => $message,
                                    'parse_mode' => 'html',
                                    'reply_markup' => json_encode([
                                        'inline_keyboard' => [
                                            [
                                                [
                                                    'text' => $button_title,
                                                    'web_app' => [
                                                        'url' => $url,
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ]),
                                    'disable_web_page_preview' => true,
                                ]);
                            }

                        } else {
                            $telegram->sendMessage([
                                // 'chat_id' => '-1001742014326',
                                'chat_id' => $value,
                                'text' => $message,
                                'parse_mode' => 'html',
                            ]);
                        }

                        // $messageId = $response->getMessageId();
                    } catch (\Exception $e) {
                        \Log::info('Telegram error log: ' . $e->getMessage() . " chat_id is: " . $value . " message is: " . $message);
                        continue;
                    }
                }
            }
        }

    }

    public function sendTelegramMessageWithAttachment($message, $chatIds, $url, $bot = 'notification_bot')
    {
        if (count($chatIds) > 0) {
            $telegram = Telegram::bot($bot);
            $telegram->setTimeOut(30);
            foreach ($chatIds as $value) {
                if ($value != '') {
                    try {

                        if ($url) {

                            $photoPath = $url;
                            $photo = InputFile::create($photoPath, 'photo.jpg');
                            $telegram->sendPhoto([
                                'chat_id' => $value,
                                'text' => $message,
                                'photo' => $photo,
                                'caption' => $message,
                                'parse_mode' => 'html',
                            ]);
                        } else {

                            $telegram->sendMessage([
                                'chat_id' => $value,
                                'text' => $message,
                                'parse_mode' => 'html',
                            ]);
                        }

                    } catch (\Exception $e) {
                        \Log::info('Telegram error log: ' . $e->getMessage() . " chat_id is: " . $value . " message is: " . $message);
                        continue;
                    }
                }
            }
        }

    }

    public function get()
    {

        $response = Telegram::getMe();

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();
        print_r($response);
    }

    public function sendApkDocument($chatId, $msg){
        $telegram = Telegram::bot('notification_bot');
        $apkPath = public_path('assets/application/AX-Secondary-11.6.apk');
        $apkDocument = InputFile::create($apkPath, 'AX-Secondary-11.6.apk');
        try {
            $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $msg,
                'parse_mode' => 'html',
            ]);

            $telegram->sendDocument([
                'chat_id' => $chatId,
                'document' => $apkDocument,
            ]);

            return true;

        }
        catch (\Exception $e) {
            \Log::info('Telegram error log: ' . $e->getMessage() . " chat_id is: " . $chatId . " message is: " . $msg);
            return false;
        }
    }

    public function sendChat()
    {

        $response = Telegram::sendMessage([
            'chat_id' => '-1001742014326',
            'text' => '`New Lead`
            *name:* khagesh
            *email:* khagesh\.office@gmail\.com
            *mobile:* 1234567890
            *source:* Property finder
            *note:* test note',
            'parse_mode' => 'MarkdownV2',
        ]);
        $messageId = $response->getMessageId();

    }


    /// Multi Bot functions start here
    /*
     * We have 3 Telegram bots
     * mybot - for all first bot used for every default messages
     * lead_bot - for all lead related messages
     * notification_bot - for all notification related messages
     *
     */
    public function sendMessageOnTelegram($bot, $message, $chatIds)
    {

        if (count($chatIds) > 0) {
            $telegram = Telegram::bot($bot);
            $telegram->setTimeOut(30);
            $message = $this->prepareMessage($message);
            foreach ($chatIds as $value) {
                if ($value != '') {
                    try {
                        $telegram->sendMessage([
                            // 'chat_id' => '-1001742014326',
                            'chat_id' => $value,
                            'text' => $message,
                            'parse_mode' => 'MarkdownV2',
                        ]);
                        //   $messageId = $response->getMessageId();
                    } catch (\Exception $e) {
                        \Log::info('Telegram error log: ' . $e->getMessage() . " chat_id is: " . $value . " message is: " . $message);
                        continue;
                    }
                }
            }
        }

    }
}
