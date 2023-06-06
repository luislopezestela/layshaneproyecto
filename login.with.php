<?php
require_once('luisincludes/init.php');
$provider = "";
$types = array(
    'Google',
    'Facebook',
    'Twitter',
    'LinkedIn',
    'Vkontakte',
    'Instagram',
    'QQ',
    'WeChat',
    'Discord',
    'Mailru',
    'OkRu',
);
if (!empty($_GET['state']) && $_GET['state'] == 'OkRu' && !empty($_GET['code'])) {
    $_GET['provider'] = 'OkRu';
}
if (isset($_GET['provider']) && in_array($_GET['provider'], $types)) {
    $provider = lui_Secure($_GET['provider']);
}
if (!empty($provider)) {
    if (!empty($_COOKIE['provider'])) {
        $_COOKIE['provider'] = '';
        unset($_COOKIE['provider']);
        setcookie('provider', null, -1);
        setcookie('provider', null, -1, '/');
    }
    setcookie('provider', $provider, time() + (60 * 60), '/');
}
else if(!empty($_COOKIE['provider']) && in_array($_COOKIE['provider'], $types)){
    
    $provider = lui_Secure($_COOKIE['provider']);
}
if (!empty($provider) && $provider != 'OkRu') {
    require_once('luisincludes/librerias/social-login/config.php');
    require_once('luisincludes/librerias/social-login/autoload.php');
}
else{
    if (empty($_GET['code'])) {
        header("Location: https://connect.ok.ru/oauth/authorize?client_id=".$wo['config']['OkAppId']."&scope=VALUABLE_ACCESS&response_type=code&redirect_uri=".$wo['config']['site_url']."/login-with.php&layout=w&state=OkRu");
        exit();
    }
    require_once('luisincludes/librerias/odnoklassniki_sdk.php');
}

use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;
if (isset($provider) && in_array($provider, $types)) {
    try {
        if ($provider == 'OkRu') {
            OdnoklassnikiSDK::SetOkInfo();
            if (!is_null(OdnoklassnikiSDK::getCode())){
                if(OdnoklassnikiSDK::changeCodeToToken(OdnoklassnikiSDK::getCode())){
                    $current_user = OdnoklassnikiSDK::makeRequest("users.getCurrentUser", null);
                    if (!empty($current_user)) {
                        $user_profile = ToObject($current_user);
                        $user_profile->identifier = $user_profile->uid;
                        $user_profile->lastName = $user_profile->last_name;
                        if (!empty($user_profile->pic_3)) {
                            $user_profile->photoURL = $user_profile->pic_3;
                        }
                        else if (!empty($user_profile->pic_2)) {
                            $user_profile->photoURL = $user_profile->pic_2;
                        }
                        else if (!empty($user_profile->pic_1)) {
                            $user_profile->photoURL = $user_profile->pic_1;
                        }
                    }
                    else{
                        echo " <b><a href='" . lui_SeoLink('index.php?link1=welcome') . "'>Intentar otra vez<a></b>";
                        exit();
                    }
                }
                else{
                    echo " <b><a href='" . lui_SeoLink('index.php?link1=welcome') . "'>Intentar otra vez<a></b>";
                    exit();
                }
            }
            else{
                echo " <b><a href='" . lui_SeoLink('index.php?link1=welcome') . "'>Intentar otra vez<a></b>";
                exit();
            }
        }
        else{
            $hybridauth = new Hybridauth( $LoginWithConfig );

            $authProvider = $hybridauth->authenticate($provider);
            $tokens = $authProvider->getAccessToken();
            $user_profile = $authProvider->getUserProfile();
        }
            
        if ($user_profile && isset($user_profile->identifier)) {
            $name = $user_profile->firstName;
            if ($provider == 'Google') {
                $notfound_email     = 'go_';
                $notfound_email_com = '@google.com';
            } else if ($provider == 'Facebook') {
                $notfound_email     = 'fa_';
                $notfound_email_com = '@facebook.com';
            } else if ($provider == 'Twitter') {
                $notfound_email     = 'tw_';
                $notfound_email_com = '@twitter.com';
            } else if ($provider == 'LinkedIn') {
                $notfound_email     = 'li_';
                $notfound_email_com = '@linkedIn.com';
            } else if ($provider == 'Vkontakte') {
                $notfound_email     = 'vk_';
                $notfound_email_com = '@vk.com';
            } else if ($provider == 'Instagram') {
                $notfound_email     = 'in_';
                $notfound_email_com = '@instagram.com';
                $name = $user_profile->displayName;
            } else if ($provider == 'QQ') {
                $notfound_email     = 'qq_';
                $notfound_email_com = '@qq.com';
                $name = $user_profile->displayName;
            } else if ($provider == 'WeChat') {
                $notfound_email     = 'wechat_';
                $notfound_email_com = '@wechat.com';
                $name = $user_profile->displayName;
            } else if ($provider == 'Discord') {
                $notfound_email     = 'discord_';
                $notfound_email_com = '@discord.com';
                $name = $user_profile->displayName;
            } else if ($provider == 'Mailru') {
                $notfound_email     = 'mailru_';
                $notfound_email_com = '@mailru.com';
                $name = $user_profile->displayName;
            } else if ($provider == 'OkRu') {
                $notfound_email     = 'okru_';
                $notfound_email_com = '@okru.com';
                $name = $user_profile->first_name;
            }
            $user_name  = $notfound_email . $user_profile->identifier;
            $user_email = $user_name . $notfound_email_com;
            if (!empty($user_profile->email)) {
                $user_email = $user_profile->email;
                if(empty($user_profile->emailVerified) && $provider == 'Discord') {
                    exit("Your E-mail is not verfied on Discord.");
                }
            }
            if (lui_EmailExists($user_email) === true) {
                lui_SetLoginWithSession($user_email);
                header("Location: " . $config['site_url']);
                exit();
            } else {
                $str          = md5(microtime());
                $id           = substr($str, 0, 9);
                $user_uniq_id = (lui_UserExists($id) === false) ? $id : 'u_' . $id;
                $social_url   = substr($user_profile->profileURL, strrpos($user_profile->profileURL, '/') + 1);
                $imported_image = lui_ImportImageFromLogin($user_profile->photoURL, 1);
                if (empty($imported_image)) {
                    $imported_image = $wo['userDefaultAvatar'];
                }
                $password = rand(1111, 9999);
                $re_data      = array(
                    'username' => lui_Secure($user_uniq_id, 0),
                    'email' => lui_Secure($user_email, 0),
                    'password' => lui_Secure(md5($password), 0),
                    'email_code' => lui_Secure(md5(rand(1111, 9999) . time()), 0),
                    'first_name' => lui_Secure($name),
                    'last_name' => lui_Secure($user_profile->lastName),
                    'avatar' => lui_Secure($imported_image),
                    'src' => lui_Secure($provider),
                    'startup_image' => 1,
                    'lastseen' => time(),
                    'social_login' => 1,
                    'active' => '1'
                );
                if ($provider == 'Google') {
                    $re_data['about']  = lui_Secure($user_profile->description);
                    $re_data['google'] = lui_Secure($social_url);
                }
                if ($provider == 'Facebook') {
                    $fa_social_url       = @explode('/', $user_profile->profileURL);
                    $re_data['facebook'] = lui_Secure($fa_social_url[4]);
                    $re_data['gender'] = 'male';
                    if (!empty($user_profile->gender)) {
                        if ($user_profile->gender == 'male') {
                            $re_data['gender'] = 'male';
                        } else if ($user_profile->gender == 'female') {
                            $re_data['gender'] = 'female';
                        }
                    }
                }
                if ($provider == 'Twitter') {
                    $re_data['twitter'] = lui_Secure($social_url);
                }
                if ($provider == 'LinkedIn') {
                    $re_data['about']    = lui_Secure($user_profile->description);
                    $re_data['linkedIn'] = lui_Secure($social_url);
                }
                if ($provider == 'Vkontakte') {
                    $re_data['about'] = lui_Secure($user_profile->description);
                    $re_data['vk']    = lui_Secure($social_url);
                }
                if ($provider == 'Instagram') {
                    $re_data['instagram']   = lui_Secure($user_profile->username);
                }
                if ($provider == 'QQ') {
                    $re_data['qq']   = lui_Secure($social_url);
                }
                if ($provider == 'WeChat') {
                    $re_data['wechat']   = lui_Secure($social_url);
                }
                if ($provider == 'Discord') {
                    $re_data['discord']   = lui_Secure($social_url);
                }
                if ($provider == 'Mailru') {
                    $re_data['mailru']   = lui_Secure($social_url);
                }
                if ($provider == 'OkRu') {
                    $re_data['okru']   = lui_Secure($user_profile->uid);
                }
                if (!empty($_SESSION['ref']) && $wo['config']['affiliate_type'] == 0) {
                    $ref_user_id = lui_UserIdFromUsername($_SESSION['ref']);
                    if (!empty($ref_user_id) && is_numeric($ref_user_id)) {
                        $re_data['referrer'] = lui_Secure($ref_user_id);
                        $re_data['src']      = lui_Secure('Referrer');
                        if ($wo['config']['affiliate_level'] < 2) {
                            $update_balance      = lui_UpdateBalance($ref_user_id, $wo['config']['amount_ref']);
                        }
                        unset($_SESSION['ref']);
                    }
                }
                if (lui_RegisterUser($re_data) === true) {
                    lui_SetLoginWithSession($user_email);
                    $user_id = lui_UserIdFromEmail($user_email);
                    if (!empty($re_data['referrer']) && is_numeric($wo['config']['affiliate_level']) && $wo['config']['affiliate_level'] > 1) {
                        AddNewRef($re_data['referrer'],$user_id,$wo['config']['amount_ref']);
                    }
                    if (!empty($wo['config']['auto_friend_users'])) {
                        $autoFollow = lui_AutoFollow($user_id);
                    }
                    if (!empty($wo['config']['auto_page_like'])) {
                        lui_AutoPageLike($user_id);
                    }
                    if (!empty($wo['config']['auto_group_join'])) {
                        lui_AutoGroupJoin($user_id);
                    }
                    if (!empty($user_profile->photoURL) && $imported_image != $wo['userDefaultAvatar'] && $imported_image != $wo['userDefaultFAvatar']) {
                        $explode2  = @end(explode('.', $imported_image));
                        $explode3  = @explode('.', $imported_image);
                        $last_file = $explode3[0] . '_full.' . $explode2;
                        $compress = lui_CompressImage($imported_image, $last_file, 50);
                        if ($compress) {
                            $upload_s3 = lui_UploadToS3($last_file);
                            $query = mysqli_query($sqlConnect, "INSERT INTO " . T_POSTS . " (`user_id`, `postFile`, `time`, `postType`, `postPrivacy`) VALUES ('$user_id', '" . lui_Secure($last_file) . "', '" . lui_Secure(time()) . "', 'profile_picture_deleted', '0')");
                            $sql_id = mysqli_insert_id($sqlConnect);
                            $sql_id = lui_Secure($sql_id);
                            $update_query = mysqli_query($sqlConnect, "UPDATE " . T_POSTS . " SET `post_id` = '$sql_id' WHERE `id` = '$sql_id'");
                            lui_Resize_Crop_Image($wo['profile_picture_width_crop'], $wo['profile_picture_height_crop'], $imported_image, $imported_image, $wo['profile_picture_image_quality']);
                            $upload_s3 = lui_UploadToS3($imported_image);
                        }
                    }
                    $wo['user'] = $re_data;
                    $wo['pass'] = $password;
                    $body       = lui_LoadPage('emails/login-with');
                    $headers    = "From: " . $config['siteName'] . " <" . $config['siteEmail'] . ">\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    @mail($re_data['email'], 'Gracias por su registro.', $body, $headers);
                    header("Location: " . lui_SeoLink('index.php?link1=start-up'));
                    exit();
                }
            }
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
        echo " <b><a href='" . lui_SeoLink('index.php?link1=welcome') . "'>Try again<a></b>";
    }
} else {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}