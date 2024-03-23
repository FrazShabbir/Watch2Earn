<?php
use App\Models\GeneralSetting;
use App\Models\Lead;
use App\Models\Listing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

if (!function_exists('fromSettings')) {
    function fromSettings(string $key, $alternative = null)
    {
        return GeneralSetting::where('key', $key)->first()->value ?? $alternative;
    }
}

if (!function_exists('setSettings')) {
    function setSettings(string $key, string $value)
    {
        GeneralSetting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        return true;
    }
}

if (!function_exists('slugify')) {

    function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }}

if (!function_exists('generateAlphaNumeric')) {

    function generateAlphaNumeric($length = 3)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $random1 = rand(100, 999);

        $alphanumeric = $randomString;
        return $alphanumeric;
    }
}


if (!function_exists('genHash')) {

function genHash($length = 4, $segments = 4, $separator = '-') {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    $charLength = strlen($characters);

    for ($i = 0; $i < $segments; $i++) {
        $segment = '';
        for ($j = 0; $j < $length; $j++) {
            $segment .= $characters[rand(0, $charLength - 1)];
        }
        $code .= $segment;
        if ($i < $segments - 1) {
            $code .= $separator;
        }
    }

    return $code;
}
}


if (!function_exists('generateAlpha')) {

    function generateAlpha($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // $random1 = rand(100, 999);
        // $random2 = rand(100, 999);

        $alphanumeric = $randomString;
        return $alphanumeric;
    }
}
if (!function_exists('generateNumeric')) {

    function generateNumeric()
    {

        $random1 = rand(100, 999);
        $random2 = rand(100, 999);
        $random3 = rand(100, 999);

        $alphanumeric = $random1 . $random2 . $random3;
        return $alphanumeric;
    }
}
if (!function_exists('generateNumericSix')) {

    function generateNumericSix()
    {

        $random1 = rand(10, 99);
        $random2 = rand(10, 99);
        $random3 = rand(10, 99);

        $alphanumeric = $random1 . $random2 . $random3;
        return $alphanumeric;
    }
}
if (!function_exists('linkShortner')) {

    function linkShortner($length = 3)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $alphanumeric = $randomString;
        return $alphanumeric;
    }

}

if (!function_exists('getRandomString')) {
    function getRandomString($length = 15)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('textFormatter')) {
    function textFormatter($text)
    {

        $text = str_replace('_', ' ', $text);

        // Capitalize the first letter of each word
        $text = ucwords($text);

        return $text;
    }
}

if (!function_exists('getListingStatus')) {

    function getListingStatus()
    {
        return Listing::getStatus();
    }
}

if (!function_exists('getLeadStatus')) {

    function getLeadStatus()
    {
        return Lead::getStatus();
    }
}

if (!function_exists('makeSlug')) {

    function makeSlug($title)
    {
        $slug = slugify($title);
        if (Listing::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . generateAlphaNumeric(4);
        }
        return $slug;
    }
}

if (!function_exists('tagManager')) {

    function tagManager($tags)
    {
        // get the tags in json  and return spans of pill tags
        $tags = json_decode($tags);
        $html = '';
        if ($tags) {
            foreach ($tags as $tag) {
                $html .= '<span class="badge  badge-pill badge-tags">' . $tag . '</span>';
            }
        }
        return $html;

    }
}

if (!function_exists('tagEditor')) {

    function tagEditor($tags)
    {
        $tags = json_decode($tags);
        $html = '';
        // just comma separated tags
        if ($tags) {
            foreach ($tags as $tag) {
                $html .= $tag . ',';
            }
        }
        return $html;

    }
}

if (!function_exists('fileSizeCal')) {

    function fileSizeCal(string $size, string $unit)
    {
        // this size in in bytes return in KB or MB if $unit is KB or MB
        if ($unit == 'KB') {
            return round($size / 1024, 2);
        } else if ($unit == 'MB') {
            return round($size / 1024 / 1024, 2);
        } else {
            return $size;
        }

    }
}

if (!function_exists('getNationalities')) {

    function getNationalities()
    {
        $query = $request->get('q');
        $data = \App\Models\Country::where('nationality', 'like', '%' . $query . '%')
            ->get();
        return response()->json($data);

    }
}

if (!function_exists('getCategories')) {

    function getCategories()
    {
        $data = \App\Models\Category::where('status', true)->where('is_listing_category', true)
            ->orderBy('order', 'asc')
            ->get();
        return $data;

    }
}

if (!function_exists('topFiveLocations')) {

    function topFiveLocations()
    {
        $locations = \App\Models\Location::withCount('listings')->orderBy('listings_count', 'desc')->limit(8)->get();
        return $locations;
    }
}

if (!function_exists('showGreetings')) {

    function showGreetings()
    {
        $hour = date('H');
        if ($hour < 12) {
            return 'Good Morning';
        } else if ($hour < 17) {
            return 'Good Afternoon';
        } else {
            return 'Good Evening';
        }

    }
}

// if (!function_exists('uploadImage__')) {
//     function uploadImage_($image, $folder)
//     {

//         $extension = $image->getClientOriginalExtension();
//         $size = $image->getSize();
//         $filename = time() . '_' . uniqid() . '.' . $extension;
//         $path = 'uploads/' . $folder.'/';
//         $image->move($path, $filename);
//         $originalImage = $path . $filename;
//         return $originalImage;

//     }
// }

if (!function_exists('uploadImage')) {
    function uploadImage($file, string $path = "", int $width = 200, int $height = 200, string $prefix = "", string $disk = "s3"): string
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . date("YmdHis") . "." . $extension;
            if ($width > 0 && $height > 0) {
                $image = Image::make($file->getRealPath())->resize($width, $width)->encode($extension)->stream();
            } else {
                $image = Image::make($file->getRealPath())->encode($extension);
            }
            $imagePath = Storage::disk($disk)->put("Px/" . (!empty($path) ? $path . "/" : "") . $prefix . $fileName, $image->__toString());
            return Storage::disk($disk)->url("Px/" . (!empty($path) ? $path . "/" : "") . $prefix . $fileName);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}

// if (!function_exists('processAndSaveImages')) {
//     function processAndSaveImages($image, string $path = "", int $width = 200, int $height = 200, string $prefix = "", string $disk = "s3")
//     {
//         try {
//             $extension = $image->getClientOriginalExtension();
//             $filename = time() . '_' . uniqid() . '.' . $extension;

//             $originalImage = Image::make($image->getRealPath())->encode($extension);
//             $originalImagePath = Storage::disk($disk)->put("Px/" . (!empty($path) ? $path . "/" : "") . $prefix . $filename, $originalImage->__toString());

//             // Get the public URL of the original image
//             $originalImageUrl = Storage::disk($disk)->url($originalImagePath);

//             // Resize image
//             $resizedImage = $originalImage->resize($width, $height, function ($constraint) {
//                 $constraint->aspectRatio();
//             });

//             // Upload resized image to S3
//             $resizedImagePath = Storage::disk($disk)->put("Px/" . (!empty($path) ? $path . "/" : "") . 'resized_' . $filename, $resizedImage->__toString());

//             // Get the public URL of the resized image
//             $resizedImageUrl = Storage::disk($disk)->url($resizedImagePath);

//             // Create and apply watermark
//             $watermarkedImage = $originalImage->insert(public_path(fromSettings('watermark') ?? '/watermark.png'), 'top-right', 10, 10);

//             // Upload watermarked image to S3
//             $watermarkedImagePath = Storage::disk($disk)->put("Px/" . (!empty($path) ? $path . "/" : "") . 'watermarked_' . $filename, $watermarkedImage->__toString());

//             // Get the public URL of the watermarked image
//             $watermarkedImageUrl = Storage::disk($disk)->url($watermarkedImagePath);

//             return [
//                 'original' => $originalImageUrl,
//                 'resized' => $resizedImageUrl,
//                 'watermarked' => $watermarkedImageUrl,
//             ];
//         } catch (\Throwable $th) {
//             throw $th;
//         }
//     }
// }

if (!function_exists('processAndSaveImages')) {
    function processAndSaveImages(
        $file,
        int $width = 1200,
        int $height = 900,
        string $path = "",
        string $disk = "s3"
    ) {
        try {
            $ewatermark = fromSettings('watermark') ?? '/watermark.png';
            $thumbWidth = ($width / 300) * 75;
            $thumbHeight = ($height / 300) * 75;
            $extension = $file->getClientOriginalExtension();
            $randomString = Str::random(10);
            $fileName = time() . date("YmdHis") . $randomString . "." . $extension;

            // Original
            $original = Image::make($file->getRealPath())->encode($extension)->stream();
            $originalPath = Storage::disk($disk)->put("listings/orginals/" . (!empty($path) ? $path . "/" : "") . "original_" . $fileName, $original->__toString());
            $originalUrl = Storage::disk($disk)->url("listings/orginals/" . (!empty($path) ? $path . "/" : "") . "original_" . $fileName);

            // Thumbnail
            $thumbnail = Image::make($file->getRealPath())->resize($thumbWidth, $thumbHeight)->encode($extension)->stream();
            $thumbnailPath = Storage::disk($disk)->put("listings/thumbnails/" . (!empty($path) ? $path . "/" : "") . "thumb_" . $fileName, $thumbnail->__toString());
            $thumbnailUrl = Storage::disk($disk)->url("listings/thumbnails/" . (!empty($path) ? $path . "/" : "") . "thumb_" . $fileName);

            // Resized
            $resized = Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension)->stream();
            $resizedPath = Storage::disk($disk)->put("listings/resized/" . (!empty($path) ? $path . "/" : "") . "resized_" . $fileName, $resized->__toString());
            $resizedUrl = Storage::disk($disk)->url("listings/resized/" . (!empty($path) ? $path . "/" : "") . "resized_" . $fileName);

            // Watermarked
            if (!empty($ewatermark)) {
                $watermarked = Image::make($resized)->insert(public_path($ewatermark), "top-right", 40, 40)->encode($extension)->stream();
                $watermarkedPath = Storage::disk($disk)->put("listings/watermarked/" . (!empty($path) ? $path . "/" : "") . "watermarked_" . $fileName, $watermarked->__toString());
                $watermarkedUrl = Storage::disk($disk)->url("listings/watermarked/" . (!empty($path) ? $path . "/" : "") . "watermarked_" . $fileName);
            } else {
                $watermarkedPath = $resizedPath;
                $watermarkedUrl = $resizedUrl;
            }

            return [
                "original" => $originalUrl,
                "thumbnail" => $thumbnailUrl,
                "resized" => $resizedUrl,
                "watermarked" => $watermarkedUrl,
            ];
        } catch (\Exception $exception) {
            print_r($exception->getMessage());
            die();
        }
    }
}

if (!function_exists('processAndSaveImagesWithOutWatermark')) {
    function processAndSaveImagesWithOutWatermark(
        $file,
        int $width = 1200,
        int $height = 900,
        string $path = "",
        string $disk = "s3"
    ) {
        try {
            $thumbWidth = ($width / 300) * 75;
            $thumbHeight = ($height / 300) * 75;
            $extension = $file->getClientOriginalExtension();
            $randomString = Str::random(10);
            $fileName = time() . date("YmdHis") . $randomString . "." . $extension;

            // Original
            $original = Image::make($file->getRealPath())->encode($extension)->stream();
            $originalPath = Storage::disk($disk)->put("leads/originals/" . (!empty($path) ? $path . "/" : "") . "original_" . $fileName, $original->__toString());
            $originalUrl = Storage::disk($disk)->url("leads/originals/" . (!empty($path) ? $path . "/" : "") . "original_" . $fileName);

            // Thumbnail
            $thumbnail = Image::make($file->getRealPath())->resize($thumbWidth, $thumbHeight)->encode($extension)->stream();
            $thumbnailPath = Storage::disk($disk)->put("leads/thumbnails/" . (!empty($path) ? $path . "/" : "") . "thumb_" . $fileName, $thumbnail->__toString());
            $thumbnailUrl = Storage::disk($disk)->url("leads/thumbnails/" . (!empty($path) ? $path . "/" : "") . "thumb_" . $fileName);

            // Resized
            $resized = Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension)->stream();
            $resizedPath = Storage::disk($disk)->put("leads/resized/" . (!empty($path) ? $path . "/" : "") . "resized_" . $fileName, $resized->__toString());
            $resizedUrl = Storage::disk($disk)->url("leads/resized/" . (!empty($path) ? $path . "/" : "") . "resized_" . $fileName);

            return [
                "original" => $originalUrl,
                "thumbnail" => $thumbnailUrl,
                "resized" => $resizedUrl,
            ];
        } catch (\Exception $exception) {
            print_r($exception->getMessage());
            die();
        }
    }
}

if (!function_exists('getModel')) {
    function getModel($string)
    {
        // remove all the letter from the string if there is a ? and just keep before the ?
        $string = explode('?', $string)[0];

        if ($string == 'listings') {
            return 'App\Models\Listing';
        } else if ($string == 'leads') {
            return 'App\Models\Lead';
        } else if ($string == 'datapools') {
            return 'App\Models\DataPool';
        } else if ($string == 'users') {
            return 'App\Models\User';
        } else if ($string == 'categories') {
            return 'App\Models\Category';
        } else if ($string == 'locations') {
            return 'App\Models\Location';
        } else if ($string == 'owners') {
            return 'App\Models\Owner';
        } else if ($string == 'countries') {
            return 'App\Models\Country';
        } else if ($string == 'roles') {
            return 'Spatie\Permission\Models\Role';
        } else if ($string == 'permissions') {
            return 'Spatie\Permission\Models\Permission';
        } else if ($string == 'amenities') {
            return 'App\Models\Amenity';
        }if ($string == 'types') {
            return 'App\Models\Type';
        }if ($string == 'sources') {
            return 'App\Models\Source';
        }if ($string == 'developers') {
            return 'App\Models\Developer';
        }if ($string == 'mediums') {
            return 'App\Models\Medium';
        } else {
            return null;
        }

    }
}

if (!function_exists('validatePhoneNumber')) {

    function validatePhoneNumber($number)
    {
        if (strpos($number, '+') === 0) {
            $number = substr($number, 1);
        }

        // Remove leading '00'
        if (strpos($number, '00') === 0) {
            $number = substr($number, 2);
        }

        // Remove leading '0' if any
        if (strpos($number, '0') === 0) {
            $number = substr($number, 1);
        }

        // Format the number
        $number = preg_replace('/[^0-9+]/', '', $number);

        // Add country code if necessary
        if (strlen($number) >= 8 && strlen($number) <= 9) {
            $number = '971' . $number;
        }

        // Add '+' if necessary
        if (strpos($number, '+') !== 0) {
            $number = '+' . $number;
        }

        $result = format_and_validate_number($number);

        if ($result['valid']) {
            return $result['formatted_number'];
        } else {
            $number = preg_replace('/[^A-Za-z0-9\-]/', '', $number);
            $number = str_replace('-', '', $number);
            $number = preg_replace('/[^+0-9]/', '', $number);
            if (strpos($number, '+') !== 0) {
                $number = '+' . $number;
            }
            if ($number == '+') {
                return null;
            }

            return $number;
        }

    }

}

if (!function_exists('format_and_validate_number')) {

    function format_and_validate_number($number)
    {
        $phone_number_util = PhoneNumberUtil::getInstance();

        try {
            $phone_number = $phone_number_util->parse($number, null);
            $is_valid = $phone_number_util->isValidNumber($phone_number);
            $formatted_number = $phone_number_util->format($phone_number, PhoneNumberFormat::E164);

            return array(
                'valid' => $is_valid,
                'formatted_number' => $formatted_number,
            );
        } catch (NumberParseException $e) {
            return array(
                'valid' => false,
                'formatted_number' => null,
            );
        }

    }
}
if (!function_exists('checkformat')) {
    function checkformat($number)
    {
        return format_and_validate_number_check($number);

    }
}

if (!function_exists('format_and_validate_number_check')) {

    function format_and_validate_number_check($number)
    {
        $phone_number_util = PhoneNumberUtil::getInstance();

        try {
            $phone_number = $phone_number_util->parse($number, null);
            $is_valid = $phone_number_util->isValidNumber($phone_number);
            $formatted_number = $phone_number_util->format($phone_number, PhoneNumberFormat::E164);
            if ($is_valid) {
                return 'TRUE';
            } else {
                return 'FALSE';
            }
            return $is_valid;
            return array(
                'valid' => $is_valid,
                'formatted_number' => $formatted_number,
            );
        } catch (NumberParseException $e) {
            return 'FALSE';
            return array(
                'valid' => false,
                'formatted_number' => null,
            );
        }

    }
}

if (!function_exists('prepareMessage')) {
    function prepareMessage($message)
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
}

if (!function_exists('sendTelegramMessage')) {
    function sendTelegramMessage($message, $chatIds, $bot = 'notification_bot')
    {
        $telegram = Telegram::bot($bot);
        $telegram->setTimeOut(30);
        if (count($chatIds) > 0) {
            $message = prepareMessage($message);
            foreach ($chatIds as $value) {
                if ($value != '') {
                    try {
                        $telegram->sendMessage([
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
}

if (!function_exists('sendTelegramMessageHtml')) {
    function sendTelegramMessageHtml($message, $chatIds, $url = null, $button_title = 'Update Lead', $bot = 'notification_bot', $disable_web_app = false)
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
}

if (!function_exists('sendTelegramMessageWithAttachment')) {
    function sendTelegramMessageWithAttachment($message, $chatIds, $url, $bot = 'notification_bot')
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

}



if (!function_exists('logActivity')) {
    function logActivity($user_id, $id,$model, $description=null, $old_data = null, $new_data = null)
    {
        if (is_string($old_data) && is_string($new_data)) {
            $old_data = is_numeric($old_data) ? (int)$old_data : $old_data;
            $new_data = is_numeric($new_data) ? (int)$new_data : $new_data;
        }
        $activity = new \App\Models\ActivityLog();
        $activity->user_id = $user_id;
        $activity->parentable_type = $model;
        $activity->parentable_id = $id;
        $activity->description = $description ?? ull;
        $activity->old_data = $old_data;
        $activity->new_data = $new_data;
        $activity->save();
    }
}


if (!function_exists('roundOff')) {
    function roundOff($number)
    {
        return round($number, 4);
    }
}
