<?php

class Tools
{

        static $execution_time_start = 0;
        static $execution_time_messages = [];


    static public function toINSQL($tab)
    {
        $in = '';
        foreach ($tab as $v) {
            if ($in != '') {
                $in .= ',';
            }
            $in .= $v;
        }
        return $in;
    }

    static public function formatToSelect($result, $key, $label, $empty_first){
        $res = [];
        if ($empty_first == true) {
            $res[] = "-----";
        }
        if (is_array($result) && !empty($result)) {
            foreach ($result as $r) {

                $res[$r[$key]] = $r[$label];
            }
        }
        return $res;
    }

    static public function displayCustomer($p)
    {
        $c = new Customer($p);
        return $c->firstname . ' ' . $c->lastname;
    }

    static public function createCacheProduct()
    {
        global $product_visibility;
        unset($product_visibility);


        $memory_limit = ini_get('memory_limit');
        ini_set('memory_limit', '-1');


        $sql = 'SELECT p.id_product as id_product , m.*, ml.* FROM `ws_product` p
                      JOIN ws_macaron m ON p.id_macaron = m.id_macaron
                      JOIN ws_macaron_lang ml ON m.id_macaron=ml.id_macaron and ml.id_lang = 1
          WHERE p.`id_macaron` != 0  ';


        $resultat = Db::getInstance()->ExecuteS($sql);
        $list = array();
        if (is_array($resultat)) {

            foreach ($resultat as $product) {

                $macaron = new Macaron($product['id_macaron']);

                $list[$product['id_macaron']] = array(

                    'color' => $product['color'],
                    'name' => $macaron->name,
                    'description' => $product['description'],

                );
            }


        }


        $res0 = '<?php $product_macaron = ' . var_export($list, true) . ';' . "\n";


        $sql = "SELECT *  FROM ws_product_visibility pv WHERE 1 ";
        $resultat = Db::getInstance()->ExecuteS($sql);

        $sql = "SELECT id_product, enable_vae, enable_vad FROM "._DB_PREFIX_."product WHERE 1";
        $productsEnable = Db::getInstance()->ExecuteS($sql);
        $productsEnableMode = [];
        foreach ($productsEnable as $product){
            $productsEnableMode[$product['id_product']] = [
                'enable_vae'=>$product['enable_vae']==='1',
                'enable_vad'=>$product['enable_vad']==='1',
            ];
        }

        $list = array();
        if (is_array($resultat)) {

            foreach ($resultat as $product) {
                if (Product::is_active($product['id_product']) == false) {
                    continue;
                }
                $id_product = $product['id_product'];
                $groups = array_flip(Product::getCustomerGroup($id_product));
                $list[$product['id_product']]['groups'] = $groups;
                $list[$id_product]['enable_vae'] = !!$productsEnableMode[$id_product]['enable_vae'];
                $list[$id_product]['enable_vad'] = !!$productsEnableMode[$id_product]['enable_vad'];
                $list[$id_product]['visibility'][$product['day_number']] = array(
                    'active' => $product['active'],
                    'id_product_visibility' => $product['id_product_visibility'],
                    'time_deb' => $product['time_deb'],
                    'time_end' => $product['time_end'],
                );

            }
        }
        $res = ' $product_visibility = ' . var_export($list, true) . '; ?>';

        file_put_contents(_KERNEL_DATAS_DIR_ . 'product_visibility.php', $res0 . $res);
        ini_set("memory_limit", $memory_limit);
    }

    static public function GetProductVisibility()
    {
        global $product_visibility;

        if ($product_visibility == NULL) {

            if (!file_exists(_KERNEL_DATAS_DIR_ . 'product_visibility.php')) {
                self::createCacheProduct();
            }
            include_once(_KERNEL_DATAS_DIR_ . 'product_visibility.php');

        }

        return $product_visibility;

    }

    static public function getProductMacaron()
    {
        global $product_macaron;

        if ($product_macaron == NULL) {

            if (!file_exists(_KERNEL_DATAS_DIR_ . 'product_visibility.php')) {
                self::createCacheProduct();
            }
            include_once(_KERNEL_DATAS_DIR_ . 'product_visibility.php');

        }

        return $product_macaron;

    }

    static public function formatMailExtraPrice($array)
    {
        $res = [];
        foreach ($array as $e) {
            $tmp = [

                'free' => $e['free'],
                'value' => $e['value'],
                'freeLabel' => $e['freeLabel'],
                'name' => $e['name'],

            ];

            $res[] = $tmp;
        }
        return $res;

    }


    static public function formatMailConsumables($array)
    {
        $res = [];
        foreach ($array as $c) {
            $tmp = [

                'product_quantity' => $c['product_quantity'],
                'name' => $c['name'],


            ];

            $res[] = $tmp;
        }
        return $res;

    }

    static public function formatMailDiscounts($array)
    {
        $res = [];
        foreach ($array as $d) {
            $tmp = [

                'name' => $d['name'],
                'amount' => $d['ammount'],
                'description' => $d['description'],


            ];

            $res[] = $tmp;
        }
        return $res;

    }

    static public function formatMailProduct($array)
    {
        $res = [];
        foreach ($array as $p) {

            $tmp = [
                'product_quantity' => $p['product_quantity'],
                'name' => $p['name'],
                'id_product' => $p['id_product'],

                'id_cart_discount' => $p['id_cart_discount'],
                'total_price' => $p['product_selling_price'] * $p['product_quantity'],
                'product_selling_price' => $p['product_selling_price'],
                'is_menu' => $p['is_menu'],
                'deposit' => $p['deposit'],
                'with_accompagnements' => $p['with_accompagnements'],

            ];
            if (isset($p['vod_code']) && $p['vod_code'] != "") {
                $tmp['vod_code'] = $p['vod_code'];
            }
            if ($p['accompagnements']) {
                $tmp['accompagnements'] = ["key" => "accompagnement", "list" => []];
                foreach ($p['accompagnements'] as $a) {

                    $tmp['accompagnements']["list"][] = [
                        'name' => $a['name'],
                        'product_quantity' => $a['quantity'],
                        'price' => $a['product_selling_price'],

                    ];
                }
            }
            $res[] = $tmp;
        }
        return $res;
    }

    static public function displayCustomerAndEmail($p)
    {
        $c = new Customer($p);
        return $c->firstname . ' ' . $c->lastname . ' :' . $c->email;
    }

    public static function endKey($array)
    {
        end($array);
        return key($array);
    }

    public static function factorizeVisibility($visibility, $activeKey = "display_message", $time_deb = 'time_deb', $time_end = 'time_end')
    {
        //
        // factorise les données de visibilité produit
        //

        // TODO : fix product lié à l’AppV2 qui commence le lundi (voir 3.4.6-fix / 3.4.7)
        //
        // du lundi au dimanche, en commençant par lundi


        $visibility_sort = [
            $visibility[1],
            $visibility[2],
            $visibility[3],
            $visibility[4],
            $visibility[5],
            $visibility[6],
            $visibility[0],
        ];

        if (is_null($visibility)) return 'always';

        $days = [];
        $debs = [];
        $ends = [];
        $actives = [];
        //
        $factorizeDays = count($visibility) == 7;
        //
        foreach ($visibility_sort as $index => $day) {
            //


            $active = $day['active'] == 1;


            $deb = $day[$time_deb] ?? '00:00:00';
            $is_deb_of_day = preg_match("/^00:0[01]:..$/", $deb) == 1;


            $is_deb_of_day = preg_match("/^00:0[01]:..$/", $deb) == 1;
            $end = $day[$time_end] ?? '23:59:59';
            $is_end_of_day = preg_match("/^(23:59:..)|(00:0.:..)$/", $end) == 1;

            $active_allday = $is_deb_of_day && $is_end_of_day;

            $factorizeDays = $factorizeDays && $active && $active_allday;

            // arrondis les débuts et fins de journée
            if ($is_deb_of_day) {
                $deb = '00:00:00';
            }
            if ($is_end_of_day) {
                $end = '23:59:59';
            }

            $debs[$deb] = true;
            $ends[$end] = true;
            $actives[$active ? 1 : 0] = true;
            $days[] = [
                // on force les valeurs début et fin à des valeurs strictes
                // pour éviter des petits bugs à quelques secondes...
                'from' => $deb,
                'to' => $end,
                $activeKey => $active,
                'day' => ($index + 1) % 7,
            ];
        }
        if (!$factorizeDays) {
            if (count($debs) <= 1 && count($ends) <= 1 && count($actives) <= 1) {
                // si une seule configuration horaire identique pour tous les jours, on ne renvoit que celui-ci
                return $days[0];
            } else {
                // si des configurations différentes suivant les jours
                return $days;
            }
        } else {
            // si tout les jours actifs toute la journée, alors "always"
            return 'always';
        }
    }


    static public function memcacheKeyGenerate($key, $data)
    {

        $key = _COUNTRY_CODE_ . '_' . $key;
        foreach ($data as $index => $value) {
            $key .= '_' . $value;

        }

        return $key;
    }

    public static function cmpSushiPriceDiscount($a, $b)
    {
        $a_pos_underscore = strstr($a, '_');

        $a_nbr = (float)str_replace($a_pos_underscore, '', $a);

        $b_pos_underscore = strstr($b, '_');

        $b_nbr = (float)str_replace($a_pos_underscore, '', $b);
        return $a_nbr <= $b_nbr;

    }

    public static function RcmpSushiPriceDiscount($a, $b)
    {
        $a_pos_underscore = strstr($a, '_');
        $a_nbr = (float)str_replace($a_pos_underscore, '', $a);

        $b_pos_underscore = strstr($b, '_');

        $b_nbr = (float)str_replace($a_pos_underscore, '', $b);

        return $a_nbr >= $b_nbr;
    }

    public static function isApi()
    {

        $api = Tools::getValue('api');
        if ($api == 1) {
            return true;
        } else {
            return false;
        }

    }
    public static function isYext()
    {

        $api = Tools::getValue('yext');
        if ($api == 1) {
            return true;
        } else {
            return false;
        }

    }
    public static function isArrayAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    function randomPassword($maxlen = 8)
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < $maxlen; $i++) {
            $n = rand(0, count($alphabet) - 1);
            $pass[$i] = $alphabet[$n];
        }
        return $pass;
    }

    static public function getWidgetPageLink_SMARTY($params)
    {

        $group_key = $params['group'];


        $url = Context::getBaseUrl_SMARTY() . WidgetGroup::getUrlFromName($group_key);
        return $url;
    }

    static public function RetrivevScriptDist($url)
    {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $r = curl_exec($ch);

        $err = curl_error($ch);
        if ($err) {
            curl_close($ch);
            throw new SushiShopException("curl error : $err");
        }
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_status >= 400) {
            throw new SushiShopException("curl response error : $http_status", $http_status, null, $r);
        }

        return $r;


    }

    static public function callWebSocketBack($type, $data = '', $protocol = 'public')
    {
        $sever = _FRONT_LISTE_;
        $frontends = explode(',', _FRONT_LISTE_);

        $bodyMessage = [
            'protocol' => $protocol,
            'type' => $type,
            'data' => $data
        ];

        $json = json_encode($bodyMessage);
        $_WEBSOCKET_PORT_BACK_ = Configuration::get('_WEBSOCKET_PORT_BACK_', '5200');

        foreach ($frontends as $hostname) {

            $url = $hostname . ':' . $_WEBSOCKET_PORT_BACK_;
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
            curl_setopt($ch, CURLOPT_PROXY, '');
            curl_setopt($ch, CURLOPT_VERBOSE, true);


            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",

            ));

            //   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            //  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: ' . $_SERVER['SERVER_NAME']));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            // curl_setopt($ch, CURLOPT_HEADER, 1);
            $r = curl_exec($ch);
            if ($r === false) {
                $err = curl_error($ch);
                throw new SushiShopException($err);
            }

            curl_close($ch);


        }


    }

    static public function callScriptDist($path)
    {
        $sever = _FRONT_LISTE_;
        $list = explode(',', $sever);
        $protocol = 'http';

        if (defined('_USE_LOCAL_SSL_') && _USE_LOCAL_SSL_ == 1) {
            $protocol = 'https';
        }

        foreach ($list as $l) {

            $url = $protocol . '://' . $l . '/' . $path;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
            curl_setopt($ch, CURLOPT_PROXY, '');
            curl_setopt($ch, CURLOPT_VERBOSE, true);

            if (defined('_USE_LOCAL_SSL_UNSECURE_') && _USE_LOCAL_SSL_UNSECURE_ == 1) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            }
            //   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Host: ' . $_SERVER['SERVER_NAME'],
                'SUSHITOKEN: ' . _TOKEN_SITE_,
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            // curl_setopt($ch, CURLOPT_HEADER, 1);
            $r = curl_exec($ch);

            if ($r === false) {
                $err = curl_error($ch);
                throw new SushiShopException($err);
            }

            curl_close($ch);


        }


    }

    static function error_log($str)
    {

    }

    static public function copyFromUrl($url, $ignore_ssl_verify = false)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        if ($ignore_ssl_verify) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        }
        $data = curl_exec($curl);
        if (!$data) {
            $error = curl_error($curl);
        }
        if ($data) {
            $curl_info = curl_getinfo($curl);
            $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
            $body = substr($data, $header_size);
            $http_status_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
            curl_close($curl);

            switch ($http_status_code) {
                case 200:
                    return $body;
                case 301:
                    return self::copyFromUrl($curl_info['redirect_url'], $ignore_ssl_verify);
                default:
                    throw new SushiShopException("Unsupported http status code $http_status_code in copy from URL", 500, null, $curl_info);
            }
        } else if ($error) {
            // affichage des erreurs
            // TODO gérer ça en exception, ça sera mieux.
            curl_close($curl);
            throw new SushiShopException('Unable to copy from URL', 500, null, $error);
        } else {
            curl_close($curl);
            throw new SushiShopException('Error in copy from URL', 500, null);
        }
    }

    public static function nl2br($str)
    {
        return str_replace(array("\r\n", "\r", "\n"), '<br />', $str);
    }

    static public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    Tools::recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {

                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    function get_file_extension($filename)
    {
        /*
             * "." for extension should be available and not be the first character
             * so position should not be false or 0.
             */
        $lastDotPos = strrpos($filename, '.');
        if (!$lastDotPos) return false;
        return substr($filename, $lastDotPos + 1);
    }

    function get_file_name($filename)
    {
        /*
             * "." for extension should be available and not be the first character
             * so position should not be false or 0.
             */
        $lastDotPos = strrpos($filename, '.');
        if (!$lastDotPos) return $filename;
        return substr($filename, 0, $lastDotPos);
    }

    static public function reset_wizzmedia_cache()
    {


    }

    public static function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    public static function isAdminContext()
    {


        global $is_admin;
        if ($is_admin && $is_admin == 1) {
            return true;
        }
        return false;
    }

    public static function usort_position($a, $b)
    {
        $sort = (intval($a['position']) < intval($b['position'])) ? -1 : (intval($a['position']) > intval($b['position']) ? 1 : 0);
        return $sort;
    }

    public static function ApiIncrementeVersion($urlsToPurge)
    {
        $version = Configuration::get('_APISETUPVERSION_', 1);
        $version++;
        Configuration::updateValue('_APISETUPVERSION_', $version);
        $urlsToPurge;
        //todo gestion de varnish

    }

    public static function curlSushi($url)
    {
        $parse_url = parse_url($url);
        // $parse_url['scheme']; // http
        // $parse_url['host']; // qualif.sushishop.fr
        // $parse_url['path']; // /contact
        // $parse_url['query']; // method=displayBarCode&params={"id_customer_neolane:0,"height":0,"width":0}

        // $headers = array(
        // "Host" => $parse_url['host'],
        // );

        echo '<pre>';
        print_r($parse_url);
        echo '</pre>';

        $headers = ["Host: " . $parse_url['host'],];

        // $url = $url_cache.$parse_url['path'];

        $curlHandler = curl_init($url);
        $curlOptionList = [CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_CUSTOMREQUEST     => 'PURGE',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => true,
            CURLOPT_URL => $url,
            CURLOPT_CONNECTTIMEOUT_MS => 2000,
            CURLOPT_VERBOSE => true,
            CURLOPT_HTTPHEADER => $headers];
        curl_setopt_array($curlHandler, $curlOptionList);
        $result = curl_exec($curlHandler);
        curl_close($curlHandler);
        return $result;
    }

    public static function encode_items(&$item, $key)
    {
        $item = utf8_decode($item);
    }

    public static function addLog($str, $filename = 'log.log', $path = false)
    {
        $directory = dirname(__FILE__) . '/../../KERNEL_DATAS/LOGS/' . ($path ? $path . '/' : '');
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $handle = fopen($directory . date('Ym') . '_' . $filename, 'a+');
        fwrite($handle, date('d-m-Y H:i:s') . ' : ' . print_r($str, true) . "\r\n");
        fclose($handle);
    }

    public static function addLogUser($str, $filename = 'log.log')
    {
        $directory = dirname(__FILE__) . '/../../USER/logs/';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $handle = fopen($directory . date('Ym') . '_' . $filename, 'a+');
        fwrite($handle, date('d-m-Y H:i:s') . ' : ' . print_r($str, true) . "\r\n");
        fclose($handle);
    }

    static function isJson($string)
    {
        return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
    }

    /**
     * @return string
     * @deprecated alias of getIp
     */
    static public function getRemoteAddress()
    {
        return self::getIP();
    }

    static public function getRemoteHostname()
    {
        return gethostbyaddr(self::getRemoteAddress()) ?? '';
    }

    static public function getMeridiem($time)
    {
        $hour = substr($time, 0, 2);
        if ($hour > 6 && $hour < 14) {
            return 'am';
        } else {
            return 'pm';
        }
    }

    static public function customer_log_set_cookie($customer = null, $delete = false, $renew = false)
    {
        $_key = _COOKIE_KEY_;
        $_iv = _COOKIE_IV_;
        $domain = str_replace('.', '_', Tools::getDomain());
        $cookie_Name = $domain . '_reminder_logo';
        if ($delete == false) {


            if (!$renew) {
                $sessionManager = new CustomerSession();
                $sessionManager->id_customer = $customer->id;
                $sessionManager->session_token = session_id();
                $sessionManager->save();
            } else {
                $sessionManager = new CustomerSession($renew);
            }
            $cookieManager = new CustomerCookie();
            $cookieManager->id_customer_session = $sessionManager->id;
            $cookieManager->save();

            $end_cookie = time() + Configuration::get('_MAX_DELAY_FOR_KEEP_CONNECTED', 360 * 24 * 60 * 60);
            $data_login = $customer->id . '|' . $end_cookie . '|' . $cookieManager->id;
            $checksum = crc32($_iv . $data_login);
            $data_login .= '|' . $checksum;
            $bf = new Blowfish($_key, $_iv);
            $content = $bf->encrypt($data_login);

            $domain = Tools::getDomain();
            $cookie_Name = str_replace('.', '_', $domain) . '_reminder_logo';
            setcookie($cookie_Name, $content,
                time() + $end_cookie, _COOKIE_PATH_, $domain, 0);


        } else {
            unset($_COOKIE[$cookie_Name]);
        }

    }

    static public function getDomain()
    {

        $r = '!(?:(\w+)://)?(?:(\w+)\:(\w+)@)?([^/:]+)?(?:\:(\d*))?([^#?]+)?(?:\?([^#]+))?(?:#(.+$))?!i';
        preg_match($r, $_SERVER['HTTP_HOST'], $out);
        if (preg_match('/^(((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]{1}[0-9]|[1-9]).)' . '{1}((25[0-5]|2[0-4][0-9]|[1]{1}[0-9]{2}|[1-9]{1}[0-9]|[0-9]).)' . '{2}((25[0-5]|2[0-4][0-9]|[1]{1}[0-9]{2}|[1-9]{1}[0-9]|[0-9]){1}))$/',
            $out[4])) {
            return false;
        }
        if (!strstr($_SERVER['HTTP_HOST'], '.')) {
            return false;
        }
        $domain = $out[4];
        $subDomains = ['bo'];
        if ($subDomains === false) {
            Tools::throwError('Bad SubDomain SQL query!');
        }
        foreach ($subDomains AS $subDomain) {
            $subDomainLength = strlen($subDomain) + 1;
            if (strncmp($subDomain . '.', $domain, $subDomainLength) == 0) {
                $domain = substr($domain, $subDomainLength);
            }
        }
        return $domain;
    }

    static public function FormatArrayTonSqlIn($tab)
    {
        $in = '';
        foreach ($tab as $t) {
            $in .= ($in == '' ? $t : ',' . $t);
        }
        $in = 'IN (' . $in . ')';
        return $in;
    }

    //Récupération des jour de la semaine avec en index le nu
    static public function getDays($id_lang = false)
    {
        if (!$id_lang) {
            global $cookie;
            if (is_object($cookie) && $cookie->id_lang) {
                $id_lang = $cookie->id_lang;
            } else {
                $id_lang = Configuration::get('_ID_LANG_DEFAULT_');
            }
        }

        if ($id_lang == 1) {
            return [1 => 'Lundi',
                2 => 'Mardi',
                3 => 'Mercredi',
                4 => 'Jeudi',
                5 => 'Vendredi',
                6 => 'Samedi',
                0 => 'Dimanche'];
        } else {
            return [1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                0 => 'Sunday'];
        }
    }

    static public function getDayName($day_number)
    {
        if (isset($id_lang)) {
            global $cookie;
            if (is_object($cookie) && $cookie->id_lang) {
                $id_lang = $cookie->id_lang;
            } else {
                $id_lang = Configuration::get('_ID_LANG_DEFAULT_');
            }
        }

        $days = self::getDays($id_lang);
        return $days[$day_number];
    }

    public static function getEmojiFlagFromCountryCode($country_code)
    {
        if ($country_code == 'UK') $country_code = 'GB';
        $country_code = strtoupper($country_code);
        return
            mb_convert_encoding('&#' . (127397 + ord($country_code[0])) . ';', 'UTF-8', 'HTML-ENTITIES') .
            mb_convert_encoding('&#' . (127397 + ord($country_code[1])) . ';', 'UTF-8', 'HTML-ENTITIES');
    }

    public static function remove_accents($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;
    }

    //Transformation des bool en image.
    static public function boolToPicture($bool)
    {
        if ($bool) {
            return '<img src="' . _ADMIN_IMG_URL_ . 'icons/accept.png" alt="Actif" width="16"/>';
        } else {
            return '<img src="' . _ADMIN_IMG_URL_ . 'icons/delete.png" alt="Inactif" width="16"/>';
        }
    }


    static public function displayFloat($float)
    {
        return floatval(number_format($float, Configuration::get('_PRICE_DISPLAY_PRECISION_'), '.', ' '));
    }

    //Transformation des bool en image.
    static public function displayWeight($weight)
    {
        return number_format($weight, Configuration::get('_PRICE_DISPLAY_PRECISION_'), '.', ' ') . ' Kg';
    }


    static public function displayPrice($price, $id_currency = NULL, $id_lang = false, $no_utf8 = false)
    {
        global $gl_context_created;
        if (!$id_lang) {
            $id_lang = Configuration::get('_ID_LANG_DEFAULT_');
        }

        if ($id_currency === NULL || !is_int($id_currency)) {
            $id_currency = _ID_CURRENCY_DEFAULT_;
        }

        //    $currency = new Currency(intval ($id_currency) , $id_lang);
        if ($gl_context_created == true) {
            $currency = new Currency($id_currency);
        } else {
            $currency = Context::getCurrency($id_currency);
        }
        $c_char = ($currency->id ? $currency->sign : '');
        $c_decimals = ($currency->id ? intval($currency->decimals) : Configuration::get('_PRICE_DISPLAY_PRECISION_'));

        $price;
        $hookParams = [
            'price' => &$price,
            'sign' => &$c_char,
            'currency' => $currency
        ];
        Hook::execHook('HookDisplayPrice', $hookParams);

        if (($isNegative = ($price < 0))) {
            $price *= -1;
        }
        $price = round($price, $c_decimals);

        $price_str = number_format($price, $c_decimals, Configuration::get('_DECIMALS_CURRENCY_SEPARATOR_', '.'), '');

        if ($isNegative) {
            $negativePosition = Configuration::get('_NEGATIVE_AMOUNT_CURRENCY_POSITION_', 'before-sign');
            $minus = '-';
            switch ($negativePosition) {
                case 'before-sign':
                    $c_char = $minus . $c_char;
                    break;
                case 'before-currency':
                default :
                    $price_str = $minus . $price_str;
            }
        }

        $signPosition = Configuration::get('_SIGN_CURRENCY_POSITION_');
        switch ($signPosition) {
            case 'left':
            default :
                $price_str = $c_char . ' ' . $price_str;
                break;
            case 'right':
                $price_str = $price_str . ' ' . $c_char;
                break;
            case 'none':
                break;
        }

        return $price_str;
    }

    static public function truncat_string($params)
    {
        $params['string'] = strip_tags($params['string']);
        if (!array_key_exists('max', $params)) {
            $params['max'] = 35;
        }

        if (strlen($params['string']) > $params['max']) {
            return substr($params['string'], 0, $params['max']) . '...';
        } else {
            return $params['string'];
        }

        // echo $params['string'];
        // echo substr($params['string'], 0, $params['max']).'...';
    }

    static public function convertPhoneE164($phone)
    {

        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $NumberProto = $phoneUtil->parse($phone, Configuration::get('_DEFAULT_COUNTRY_PHONE_', 'FR'));
            if ($phoneUtil->isValidNumber($NumberProto)) {
                return $phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::E164);
            }
            //          var_dump($NumberProto);
        } catch (\libphonenumber\NumberParseException $e) {
            //      var_dump($e);
            return false;
        }

        return false;
    }

    static public function displayPriceSmarty($params)
    {
        //
        // TODO cette fonction *displayPriceSmarty* peut être factorisée
        // avec la fonction *displayPrice* (quelques lignes au dessus)
        //
        if (!isset($params['id_lang']) || !$params['id_lang']) {
            $params['id_lang'] = Configuration::get('_ID_LANG_DEFAULT_');
        }
        $id_lang = $params['id_lang'];

        $itemprop = (array_key_exists('itemprop', $params) ? $params['itemprop'] : false);

        if (!array_key_exists('id_currency', $params)) {
            $params['id_currency'] = _ID_CURRENCY_DEFAULT_;
        } elseif ($params['id_currency'] === NULL || !is_int($params['id_currency'])) {
            $params['id_currency'] = _ID_CURRENCY_DEFAULT_;
        }

        $id_currency = $params['id_currency'];

        $currency = new Currency(intval($id_currency), $id_lang);

        $c_char = ($currency->id ? $currency->sign : '');
        $c_decimals = ($currency->id ? intval($currency->decimals) : Configuration::get('_PRICE_DISPLAY_PRECISION_'));
        $c_space = " ";

        $price = $params['price'];
        $hookParams = [
            'price' => &$price,
            'sign' => &$c_char,
            'currency' => $currency
        ];
        Hook::execHook('HookDisplayPrice', $hookParams);


        // fonction qui arrondit l’affichage du prix à l'entier, automatiquement, si la valeur est entière
        $auto_round_decimal = $params['auto_round_decimal'] === true;
        if ($auto_round_decimal && fmod($price, 1) == 0) {
            $c_decimals = 0;
        }

        // fonction qui wrap le symbole monétaire d'un tag sup
        $wrap_sup = $params['wrap_sup'] === true;
        if ($wrap_sup) {
            $c_char = "<sup>$c_char</sup>";
        }

        // ignore l’espace
        $ignore_space = $params['ignore_space'] === true;
        if ($ignore_space) {
            $c_space = "";
        }


        //$c_decimals = _PRICE_DISPLAY_PRECISION_;
        $ret = 0;
        if (($isNegative = ($price < 0))) {
            $price *= -1;
        }
        $price = round($price, $c_decimals);

        $price_str = number_format($price, $c_decimals, Configuration::get('_DECIMALS_CURRENCY_SEPARATOR_', '.'), '');

        if ($isNegative) {
            $negativePosition = Configuration::get('_NEGATIVE_AMOUNT_CURRENCY_POSITION_', 'before-sign');
            $minus = '-';
            switch ($negativePosition) {
                case 'before-sign':
                    $c_char = $minus . $c_char;
                    break;
                case 'before-currency':
                default :
                    $price_str = $minus . $price_str;
            }
        }

        $signPosition = Configuration::get('_SIGN_CURRENCY_POSITION_');
        switch ($signPosition) {
            case 'left':
            default :
                $price_str = $c_char . $c_space . $price_str;
                break;
            case 'right':
                $price_str = $price_str . $c_space . $c_char;
                break;
            case 'none':
                break;
        }

        if ($itemprop) {
            return '<span itemprop="price">' . $price_str . '</span>';
        } else {
            return $price_str;
        }
    }

    static public function displayTime($time)
    {
        if (!$time OR !strtotime($time)) {
            return $time;
        }

        return date('H:i', strtotime($time));
    }

    static public function displayTimeSmarty($params)
    {

        return self::displayTime($params['time']);
    }
    public static function is_url_exist($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }

    static public function getDomainShardingUrl($params)
    {
        $domain = $params['domain'] ?? 'default';
        $configurationName = strtoupper('_DOMAIN_SHARDING_' . $domain . '_');
        $domain_configuration = Configuration::get($configurationName, false);
        $base_url = _BASE_URL_;
        // on ajoute un chemin facultatif
        $path = $params['path'] ?? '';
        //
        if ($domain_configuration) {
            $domain_index = 0;
            $domain_configuration_explode = explode(',', $domain_configuration);
            // répartition non aléatoire mais uniforme entre plusieurs sous-domaine, basé sur le path
            // attention, ce hashage basique est aussi implémenté client-side en JS
            if (count($domain_configuration_explode) > 1) {
                $h = (int)0;
                $l = strlen($path);
                $i = 0;
                if ($l > 0) {
                    while ($i < $l) {
                        // hash basé sur la somme des codes de caractère
                        $o = ord(substr($path, $i, $i + 1));
                        $h += $o;
                        $i++;
                    }
                }
                // module le nombre de sous-domaine
                $domain_index = $h % count($domain_configuration_explode);
            }
            $domain_configuration = $domain_configuration_explode[$domain_index];
            $base_url = _HTTP_MODE_ . '://' . $domain_configuration . '/';
        }

        $base_url .= $path;
        return $base_url;
    }

    /**
     * @param $datetime
     * @param string $format
     * @param string $method
     *
     * @return string
     * @throws \Moment\MomentException
     */
    static public function displayMoment($datetime, $format = 'LL', $method = 'format')
    {
        $m = new \Moment\Moment($datetime);
        \Moment\Moment::setLocale(Configuration::get('_MOMENT_PHP_LOCALE_', 'fr_FR'));
        switch ($method) {
            case 'calendar':
                return $m->calendar();
            case 'calendar_with_time':
                return $m->calendar(true);
            default:
                return $m->format($format, new \Moment\CustomFormats\MomentJs());
        }
    }

    /**
     * @param $params
     *
     * @return string
     * @throws \Moment\MomentException
     */
    static public function displayMomentSmarty($params)
    {
        $datetime = $params['date'];
        $format = $params['format'] ?? 'LL';
        $method = $params['method'] ?? 'calendar';
        return self::displayMoment($datetime, $format, $method);
    }

    //Transformation de bool. les 1 et 0 deviennent des OUI ou des NON et inverssement.
    static public function translateBool($var)
    {
        if ($var === 0 || $var === 1) {
            if ($var == 1) {
                $return = 'OUI';
            } else {
                $return = 'NON';
            }
        } else {
            if ($var == 'OUI') {
                $return = 1;
            } elseif ($var == 'NON') {
                $return = 0;
            } else {
                $return = $var;
            }
        }
        return $return;
    }

    //Retourne les champs dispo dans une table mysql.
    static public function exploreTable($table)
    {
        return Db::getInstance()->getMysqlColumns($table);
    }

    //Création d'un fichier ZIP
    static public function compress($srcName, $dstName)
    {
        $fp = fopen($srcName, "r");
        $data = fread($fp, filesize($srcName));
        fclose($fp);

        $zp = gzopen($dstName, "w9");
        gzwrite($zp, $data);
        gzclose($zp);
    }


    /**
     * URL Validation
     *
     * @param string $url Suspected URL to valid
     * @return bool
     * @author Beeksi Waais
     */
    static public function isValidURL($url)
    {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }

    static public function link_rewrite($str, $utf8_decode = false)
    {
        $purified = '';
        $str = trim($str);
        $length = self::strlen($str);
        $char_exceptions = [
            'æ' => 'ae',
            'Æ' => 'ae',
            'œ' => 'oe',
            'Œ' => 'oe',
            '&' => '-',
            'ß' => 'ss',
            '×' => 'x',
            '−' => '-',
            '/' => '-',
            '\\' => '-',
            ' ' => '-',// no break space
            '–' => '-',// n dash
            '—' => '-',// m dash
            '\'' => '-',// single quote
            '"' => '-',// double quote
            '’' => '-',// right single quote
            '€' => 'eur',// euro
            '£' => 'gbp',// gb pound
            '$' => 'usd',// us dollar
        ];

        if ($utf8_decode) {
            $str = utf8_decode($str);
        }
        for ($i = 0; $i < $length; $i++) {
            $char = self::substr($str, $i, 1);
            if (isset($char_exceptions[$char])) {
                $purified .= $char_exceptions[$char];
            } else if (self::strlen(htmlentities($char)) > 1) {
                $entity = htmlentities($char, ENT_COMPAT, 'UTF-8');
                $e0 = ord($char[0]);
                $purified .= ($e0 === 195 || $e0 === 197) ? $entity[1] : '-';
            } elseif (preg_match('|[[:alpha:]]{1}|u', $char)) {
                $purified .= $char;
            } elseif (preg_match('<[[:digit:]]|-{1}>', $char)) {
                $purified .= $char;
            } elseif ($char == ' ') {
                $purified .= '-';
            }
        }
        $purified = preg_replace('/-+/', '-', $purified);
        $purified = trim($purified, '-');
        return trim(self::strtolower($purified));
    }

    static public function randomString($lenght = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $lenght; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    /**
     * Random password generator
     *
     * @param integer $length Desired length (optional)
     * @return string Password
     */
    static public function passwdGen($length = 8)
    {
        $str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 0, $passwd = ''; $i < $length; $i++)
            $passwd .= Tools::substr($str, mt_rand(0, Tools::strlen($str) - 1), 1);
        return $passwd;
    }

    static public function intGen($min, $max)
    {
        mt_srand((float)microtime() * 1000000);
        //affiche 1 nombre aléatoire entre 1 et 100
        return mt_rand($min, $max);
    }

    /**
     * Redirect user to another page
     *
     * @param string $url Desired URL
     * @param string $baseUri Base URI (optional)
     */
    static public function redirectLast()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    static public function getWeekday($date)
    {
        return date('w', strtotime($date));
    }


    static function array_insert(&$array, $position, $insert)
    {
        if (is_int($position)) {
            array_splice($array, $position, 0, $insert);
        } else {
            $pos = array_search($position, array_keys($array));
            $array = array_merge(
                array_slice($array, 0, $pos),
                $insert,
                array_slice($array, $pos)
            );
        }
    }


    /**
     * Redirect user to another page
     *
     * @param string $url Desired URL
     * @param string $baseUri Base URI (optional)
     */
    static public function redirect($url, $baseUri = _BASE_URL_)
    {
        if (isset($_SERVER['HTTP_REFERER']) AND ($url == $_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: ' . $baseUri . $url);
        }
        exit;
    }

    /**
     * @function redirectAfterAdminLogin
     *
     * Redirect Admin user after login to original URL
     */
    static public function redirectAfterAdminLogin()
    {
        $url = _ADMIN_URL_;
        if (isset($_SESSION['redirect_admin_login']) and !empty($_SESSION['redirect_admin_login'])) {
            $url = $_SESSION['redirect_admin_login'];
            unset($_SESSION['redirect_admin_login']);

        }
        Tools::redirect('', $baseUri = $url);
    }

    static public function setContentType($type)
    {
        header('Content-Type: ' . $type);
    }

    /**
     * Redirect url wich allready PS_BASE_URI
     *
     * @param string $url Desired URL
     */
    static public function redirectLink($url)
    {
        header('Location: ' . $url);
        exit;
    }

    /**
     * Redirect user to another admin page
     *
     * @param string $url Desired URL
     */
    static public function redirectAdmin($url)
    {

        if (isset($_GET['redirect_admin_url_force'])) {
            $url = base64_decode($_GET['redirect_admin_url_force']);
        }
        die('
			<div class="ui-widget message closeable">
				<div class="ui-state-highlight ui-corner-all"> 
					<p style="text-align:center">
						<span class="ui-icon ui-icon-info"></span>
						<strong>Enregistrement des informations, veuillez patienter.</strong>
					</p>
				</div>
			</div>
			<script type="text/javascript">document.location.href="' . $url . '"</script>
		');

        exit;
    }

    function ogone_hash_parameters_in($parameters = array(), $secretkey)
    {
        $str = '';
        $param = array();

        /* On s'assure que toutes les clés sont en majuscules et rangées par ordre alphabétique*/
        if (!empty($parameters)) {
            foreach ($parameters as $i => $j) {
                $param[strtoupper($i)] = $j;
            }
        }

        /* Trier par ordre alphabetique */
        ksort($param);
        if (!empty($param)) {
            foreach ($param as $i => $j) {
                $str .= $i . '=' . $j . $secretkey;
            }
        }

        /* Encoder un utf8 */
        $str = utf8_encode($str);

        return hash("sha256", $str);
    }


    /**
     * Get a value from $_POST / $_GET
     * if unavailable, take a default value
     *
     * @param string $key Value key
     * @param mixed $defaultValue (optional)
     * $cookie->id_lang = $id_lang;
     * @return mixed Value
     */
    public static function getValue($key, $default_value = false)
    {
        if (!isset($key) || empty($key) || !is_string($key)) {
            return false;
        }

        $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

        if (is_string($ret)) {
            return stripslashes(urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret))));
        }

        return $ret;
    }

    public static function getPostValues($source = false)
    {
        if (!$source) {
            $source = $_POST;
        }
        foreach ($source as $key => $value) {
            if ($value == 'true')
                $source[$key] = true;
            if ($value == 'false')
                $source[$key] = false;
            if (is_numeric($value)) {
                if (is_int($value))
                    $source[$key] = (int)$value;
                else if (is_float($value))
                    $source[$key] = (float)$value;
                else
                    $source[$key] = (double)$value;
            }

        }
        return $source;
    }

    static public function getRequestHeader($name, $default = '')
    {
        $headers = apache_request_headers();
        return $headers[$name] ?? $default;
    }

    static public function displayPagination_SMARTY($array)
    {
        $url = $array['url'];
        $page = $array['page'];
        $key_page = $array['key_page'];
        return "$url&$key_page=$page";
    }


    public static function getParamsValue($key, $array, $default_value = false)
    {
        if (!isset($array) || empty($array) || !is_array($array))
            return $default_value;

        if (!isset($array[$key]) || empty($array[$key]))
            return $default_value;
        else
            return $array[$key];
    }


    static public function getIsset($key)
    {
        if (!isset($key) OR empty($key) OR !is_string($key)) {
            return false;
        }
        return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
    }

    /**
     * Change language in cookie while clicking on a flag
     */
    static public function setCookieLanguage(&$cookie)
    {
        if (isset($_SESSION['iso' . $cookie->id_lang]))
        {
            $iso = $_SESSION['iso' . $cookie->id_lang];
        }else{
            $iso = Language::getIsoById($cookie->id_lang);
            $_SESSION['iso' . $cookie->id_lang] = $iso;
        }

        $cookie->isoLang = $iso;


        return $iso;
    }

    public static function getDefaultLanguage()
    {
        if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
            return self::parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
        } else {
            return self::parseDefaultLanguage(null);
        }
    }

    public static function parseDefaultLanguage($http_accept, $deflang = "en")
    {
        if (isset($http_accept) && strlen($http_accept) > 1) {

            # Split possible languages into array
            $x = explode(",", $http_accept);
            foreach ($x as $val) {
                #check for q-value and create associative array. No q-value means 1 by rule
                if (preg_match("/(.*);q=([0-1]{0,1}.\d{0,4})/i", $val, $matches)) {
                    $lang[$matches[1]] = (float)$matches[2];
                } else {
                    $lang[$val] = 1.0;
                }
            }

            #return default language (highest q-value)
            $qval = 0.0;
            foreach ($lang as $key => $value) {
                if ($value > $qval) {
                    $qval = (float)$value;
                    $deflang = $key;
                }
            }
        }
        return strtolower($deflang);
    }

    static public function switchLanguage(&$cookie)
    {


        if ($id_lang = Tools::getValue('selected_language') AND Validate::isUnsignedId($id_lang)) {


            $cookie->id_lang = $id_lang;

        } else if (!$cookie->__isset('id_lang')) {

            $cookie->id_lang = _ID_LANG_DEFAULT_;
        }

    }


    static public function getVideo_Smarty($params)
    {
        $name = '';
        $type = '';
        $format = '';
        $extension = '';


        extract($params);

        $path = _USER_VIDEO_DIR_ . $name . '.' . $type . '.' . $format . '.' . $extension;

        $url = _USER_VIDEO_URL_ . $name . '.' . $type . '.' . $format . '.' . $extension;
        if (file_exists($path)) {
            return $url;
        } else if (preg_match("/https?:\/\/(.*)/", $name)) {
            // rétro-compatibilité https://
            // si le nom est une URL complète
            return $name;
        } else {
            return '';
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //// DISPLAY Erros, Informations, Success, Debug et Trace. (Trace permet de faire un débug plus propre si le backoffice est déjà livré....
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Print_r de $in
    static public function debug($in, $display = false)
    {
        echo '
		<div style="' . ($display ? 'color:#000;background:#cdcdcd' : 'display:none;') . '">
			<pre>';
        print_r($in);
        echo '</pre>
		</div>';
    }

    /**
     * Display an error according to an error code
     *
     * @param integer $code Error code
     * @deprecated
     */
    static public function displayError($string = 'Erreur pendant l\'action', $die = true)
    {

        try {
            self::throwError($string);
        } catch (SushiShopException $err) {
            $message = $err->getMessage();

            echo "<div class=\"ui-widget message closeable\">
                        <div class=\"ui-state-error ui-corner-all\"> 
                            <p>
                                <span class=\"ui-icon ui-icon-alert\"></span> 
                                <strong>Erreur possible :</strong> <span class=\"error-detail\">$message</span>
                            </p>
                        </div>
                    </div>";
        }
        //
        //
    }

    static public function throwError($string = 'Erreur pendant l\'action', $die = true)
    {

        $params = [];
        $params['value'] = $string;
        $params['context'] = "error";
        $params['format'] = [];

        $string = Language::t($params);
        //
        throw new SushiShopException($string);
        //
        //
    }

    static public function trace($string)
    {
        if (!array_key_exists('trace', $_SESSION)) {
            $_SESSION['trace'] = [];
        }

        if (array_key_exists('trace', $_SESSION)) {
            $_SESSION['trace'][] = $string;
        }
    }

    static public function displaySuccess($string = 'Action correctement effectuée', $direct_return = false)
    {
        $params = [];
        $params['value'] = $string;
        $params['context'] = "ToolsSuccess";
        $params['format'] = [];

        $string = Language::t($params);

        if ($direct_return) {
            echo '
			<div class="ui-widget message closeable">
				<div class="ui-state-success ui-corner-all"> 
					<p>
						<span class="ui-icon ui-icon-circle-check"></span>
						<strong>' . $string . '</strong>
					</p>
				</div>
			</div>';
            return;
        }

        if (!array_key_exists('informations', $_SESSION)) {
            $_SESSION['informations'] = [];
        }

        if (array_key_exists('informations', $_SESSION)) {
            $_SESSION['informations'][] = $string;
        }
    }

    static public function displayInformations()
    {
        global $_SESSION;
        if (array_key_exists('informations', $_SESSION) && count($_SESSION['informations']) > 0) {
            echo '
				<div class="ui-widget message closeable">
					<div class="ui-state-success ui-corner-all"> 
						<p>
							<span class="ui-icon ui-icon-circle-check"></span>
							<strong>' . implode('<br/>', $_SESSION['informations']) . '</strong>
						</p>
					</div>
				</div>';
            unset($_SESSION['informations']);
        }

        if (array_key_exists('trace', $_SESSION) && count($_SESSION['trace']) > 0) {
            echo '
				<div class="ui-widget message closeable">
					<div class="ui-state-highlight ui-corner-all"> 
						<p>
							<span class="ui-icon ui-icon-info"></span>
							<strong>' . implode('<br/>', $_SESSION['trace']) . '</strong>
						</p>
					</div>
				</div>';
            unset($_SESSION['trace']);
        }
    }

    static public function displayWarning($string = 'Attention', $returnHtml = false)
    {
        $message = '
			<div class="ui-widget message closeable">
				<div class="ui-state-highlight ui-corner-all"> 
					<p>
						<span class="ui-icon ui-icon-info"></span>
						<strong>' . $string . '</strong>
					</p>
				</div>
			</div>';
        if ($returnHtml) {
            return $message;
        } else {
            echo $message;
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //// DATE
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Display date regarding to language preferences
     *
     * @param array $params Date, format...
     * @param object $smarty Smarty object for language preferences
     * @return string Date
     */
    static public function dateFormat($params, &$smarty)
    {
        return Tools::displayDate($params['date'], $params['full']);
    }

    static public function implode($params, &$smarty)
    {
        if ($params['key']) {
            $array = [];
            foreach ($params['array'] as $a) $array[] = $a[$params['key']];
        } else {
            $array = $params['array'];
        }

        if (!isset($params['glue'])) {
            $params['glue'] = ', ';
        }
        return implode($params['glue'], $array);
    }

    public static function getTimestamp($dateTime, $full = true)
    {
        list($date, $time) = explode(' ', $dateTime);
        list($year, $month, $day) = explode('-', $date);

        if ($full) {
            list($hour, $minute, $second) = explode(':', $time);
        } else {
            $hour = 0;
            $minute = 0;
            $second = 0;
        }

        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
        return $timestamp;
    }


    /**
     * Display date regarding to language preferences
     *
     * @param string $date Date to display format UNIX
     * @param integer $id_lang Language id
     * @param boolean $full With time or not (optional)
     * @return string Date
     * @deprecated
     */
    static public function displayDate($date, $full = false, $separator = '-', $separator_display = '-')
    {
        if (!$date == '0000-00-00' || $date == '0000-00-00 00:00:00') {
            return '<i>non renseignée</i>';
        }
        $date = str_replace('.000Z', '', $date);

        if (!$date OR !strtotime($date)) {

            return $date;
        }
        if (!Validate::isDate($date) OR !Validate::isBool($full)) {
            Tools::throwError('Invalid date');
        }
        $tmpTab = explode($separator, substr($date, 0, 10));
        $hour = ' ' . substr($date, -8);
        return ($tmpTab[2] . $separator_display . $tmpTab[1] . $separator_display . $tmpTab[0] . ($full ? ' à ' . self::displayTime(substr($hour, 0, 6)) : ''));
    }

    static public function displayDateSmarty($params)
    {
        return self::displayDate($params['date'], isset($params['full']), isset($params['separator']) ? $params['separator'] : '-');
    }

    static public function displayDate_v3($date, $format = false)
    {

        if (!$date == '0000-00-00' || $date == '0000-00-00 00:00:00') {
            return '<i>non renseignée</i>';
        }
        try {
            $date = new DateTime (str_replace('.000Z', '', $date));
            return $date->format($format);

        } catch (Exception $e) {
            return '<i>non renseignée</i>';
        }

    }

    static public function displayDateSmarty_v3($params)
    {

        return self::displayDate_v3($params['date'], $params['format']);
    }

    static public function displayDateFull($date, $separator = '-')
    {
        if (!$date == '0000-00-00' || $date == '0000-00-00 00:00:00') {
            return '<i>non renseignée</i>';
        }

        if (!$date OR !strtotime($date)) {
            return $date;
        }
        if (!Validate::isDate($date)) {
            Tools::throwError('Invalid date');
        }
        $tmpTab = explode($separator, substr($date, 0, 10));
        $hour = ' ' . substr($date, -8);

        return $tmpTab[2] . '-' . $tmpTab[1] . '-' . $tmpTab[0] . substr($hour, 0, 6);
    }

    // static public function displayTime($date,$separator='-')
    // {
    // if (!$date OR !strtotime($date))
    // return $date;
    // if (!Validate::isDate($date))
    // die (Tools::displayError('Invalid date'));

    // $hour = ' '.substr($date, -8);
    // return substr($hour,0,6);
    // }

    public function formatInterval($interval)
    {
        return ($interval->y * 365 * 24 * 60 * 60) + ($interval->m * 30 * 24 * 60 * 60) + ($interval->d * 24 * 60 * 60) + ($interval->h * 60 * 60) + ($interval->i * 60) + $interval->s;
    }

    /**
     * params (date = String Date, relative_until [year or month])
     *
     */
    public static function displayRelativeDateTime($params)
    {

        $blocks = [['year', (3600 * 24 * 365)],
            ['month', (3600 * 24 * 30)],
            ['week', (3600 * 24 * 7)],
            ['day', (3600 * 24)],
            ['hour', (3600)],
            ['min', (60)],
            ['sec', (1)]];

        $argtime = strtotime($params['date']);
        $nowtime = time();

        $diff = $nowtime - $argtime;

        $res = [];


        for ($i = 0; $i < count($blocks); $i++) {
            $title = $blocks[$i][0];
            $calc = $blocks[$i][1];
            $units = floor($diff / $calc);
            if ($units > 0) {
                $res[$title] = $units;
            } else {
                if (abs($units + 1) > 0 && $units != 0) {
                    $res[$title] = abs($units + 1);
                    $res['reverted'] = true;
                }
            }
        }

        if (@$res['year'] == 1 && @$res['month'] == 1 && @$res['week'] == 1 && @$res['day'] == 1 && @$res['hour'] == 1 && @$res['min'] == 1 && @$res['sec']) {
            return "À l'instant";
        }


        if (isset($res['year']) && $res['year'] > 0 && @$res['reverted'] == false) {
            if (@$params['relative_until'] == "year") {
                return Tools::displayDateTime("l d F Y");
            }

            if (isset($res['month']) && $res['month'] > 0 && $res['month'] < 12) {
                $format = "Il y a %s %s et %s %s";
                $year_label = $res['year'] > 1 ? 'années' : 'année';
                $month_label = 'mois';
                return sprintf($format, $res['year'], $year_label, $res['month'], $month_label);
            } else {
                $format = "Il y a %s %s";
                $year_label = $res['year'] > 1 ? 'années' : 'année';
                return sprintf($format, $res['year'], $year_label);
            }
        } else {
            if ($res['reverted'] == true && isset($res['year']) && $res['year'] > 0) {
                if (@$params['relative_until'] == "year") {
                    return Tools::displayDateTime("l d F Y");
                }

                if (isset($res['month']) && $res['month'] > 0 && $res['month'] < 12) {
                    $format = "Dans %s %s";
                    $year_label = $res['year'] > 1 ? 'années' : 'année';
                    $month_label = 'mois';
                    return sprintf($format, $res['year'], $year_label);
                } else {
                    $format = "Dans %s %s";
                    $year_label = $res['year'] > 1 ? 'years' : 'year';
                    return sprintf($format, $res['year'], $year_label);
                }
            }
        }

        if (isset($res['month']) && $res['month'] > 0 && @$res['reverted'] == false) {
            if (@$params['relative_until'] == "month") {
                return Tools::displayDateTime("l d F Y");
            }

            if (isset($res['day']) && $res['day'] > 0 && $res['day'] < 31) {
                $format = "Il y a %s %s et %s %s";
                $month_label = 'mois';
                $day_label = $res['day'] > 1 ? 'jours' : 'jour';
                return sprintf($format, $res['month'], $month_label, $res['day'], $day_label);
            } else {
                $format = "Il y a %s %s";
                $month_label = 'mois';
                return sprintf($format, $res['month'], $month_label);
            }
        } else {
            if ($res['reverted'] == true && isset($res['month']) && $res['month'] > 0) {
                if (@$params['relative_until'] == "month") {
                    return Tools::displayDateTime("l d F Y");
                }

                if (isset($res['day']) && $res['day'] > 0 && $res['day'] < 31) {
                    $format = "Dans %s %s";
                    $month_label = 'mois';
                    $day_label = $res['day'] > 1 ? 'jours' : 'jour';
                    return sprintf($format, $res['day'], $day_label);
                } else {
                    $format = "Dans %s %s";
                    $month_label = 'mois';
                    return sprintf($format, $res['month'], $month_label);
                }
            }
        }

        if (isset($res['day']) && $res['day'] > 0 && @$res['reverted'] == false) {
            if ($res['day'] == 1) {
                return sprintf("Hier à %s", Tools::displayDateTime('H:i', $argtime));
            }
            if ($res['day'] <= 7) {
                return Tools::displayDateTime("l " . '\\d\\e\\r\\n\\i\\e\\r \\à' . " H:i", $argtime);
            }
            if ($res['day'] <= 31) {
                return Tools::displayDateTime("l d F", $argtime);
            }
        } else {
            if ($res['reverted'] == true && isset($res['day']) && $res['day'] > 0) {
                if ($res['day'] == 1) {
                    return sprintf("Aujourd'hui");
                }
                if ($res['day'] == 2) {
                    return sprintf("Demain");
                }
                if ($res['day'] <= 7) {
                    return Tools::displayDateTime("l d F", $argtime);
                }
                if ($res['day'] <= 31) {
                    return Tools::displayDateTime("l d F", $argtime);
                }
            }
        }

        if (isset($res['hour']) && $res['hour'] > 0 && @$res['reverted'] == false) {
            if ($res['hour'] > 1) {
                return sprintf("Il y a %s heures", $res['hour']);
            } else {
                return "Il y a environ 1 heure";
            }
        } else {
            if ($res['reverted'] == true && isset($res['hour']) && $res['hour'] > 0) {
                if ($res['hour'] > 1) {
                    return sprintf("%s heures restantes", $res['hour']);
                } else {
                    return "1 heure restante";
                }
            }
        }

        if (isset($res['min']) && $res['min'] > 0 && @$res['reverted'] == false) {
            if ($res['min'] == 1) {
                return "Il y a environ 1 minute";
            } else {
                return sprintf("Il y a %s minutes", $res['min']);
            }
        } else {
            if ($res['reverted'] == true && isset($res['min']) && $res['min'] > 0) {
                if ($res['min'] == 1) {
                    return "1 minute restante";
                } else {
                    return sprintf("%s minutes restantes", $res['min']);
                }
            }
        }

        if (isset($res['sec']) && $res['sec'] > 0 && @$res['reverted'] == false) {
            if ($res['sec'] == 1) {
                return "Il y a une seconde";
            } else {
                return sprintf("Il y a %s secondes", $res['sec']);
            }
        } else {
            if ($res['reverted'] == true && isset($res['sec']) && $res['sec'] > 0) {
                if ($res['sec'] == 1) {
                    return "1 seconde restante";
                } else {
                    return sprintf("%s secondes restantes", $res['min']);
                }
            }
        }
    }


    public static function displayDateTime($format, $timestamp = null)
    {
        $param_D = ['', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
        $param_l = ['', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $param_F = ['',
            'Janvier',
            'F&eacute;vrier',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Ao&ucirc;t',
            'Septembre',
            'Octobre',
            'Novembre',
            'D&eacute;cembre'];
        $param_M = ['',
            'Jan',
            'F&eacute;v',
            'Mar',
            'Avr',
            'Mai',
            'Jun',
            'Jul',
            'Ao&ucirc;',
            'Sep',
            'Oct',
            'Nov',
            'D&eacute;c'];

        $return = '';
        if (is_null($timestamp)) {
            $timestamp = mktime();
        }
        for ($i = 0, $len = strlen($format); $i < $len; $i++) {
            switch ($format[$i]) {
                case '\\' : // double.slashes
                    $i++;
                    $return .= isset($format[$i]) ? $format[$i] : '';
                    break;
                case 'D' :
                    $return .= $param_D[date('N', $timestamp)];
                    break;
                case 'l' :
                    $return .= $param_l[date('N', $timestamp)];
                    break;
                case 'F' :
                    $return .= $param_F[date('n', $timestamp)];
                    break;
                case 'M' :
                    $return .= $param_M[date('n', $timestamp)];
                    break;
                default :
                    $return .= date($format[$i], $timestamp);
                    break;
            }
        }
        return $return;
    }

    public static function getDateInterval($date_deb, $date_end, $full = true, $formatInterval = true)
    {
        $d1 = new DateTime($date_deb);
        if ($date_end == '0000-00-00 00:00:00') {
            $date_end = date('Y-m-d H:i:s');
        }
        $d2 = new DateTime($date_end);

        $interval = $d1->diff($d2);

        if (!$formatInterval) {
            return $interval;
        }

        $int = [];

        if ($interval->y) {
            $int[] = $interval->y . ' année(s)';
        }
        if ($interval->m) {
            $int[] = $interval->m . ' mois';
        }
        if ($interval->d) {
            $int[] = $interval->d . ' jour(s)';
        }
        if ($interval->h) {
            $int[] = $interval->h . ' heure(s)';
        }
        if ($interval->i) {
            $int[] = $interval->i . ' minute(s)';
        }
        if ($full && $interval->s) {
            $int[] = $interval->s . ' seconde(s)';
        }

        return implode(' ', $int);
    }

    public static function isPerimedDateTime($date_deb, $minutes_to_remove = 60)
    {
        $d1 = new DateTime($date_deb);

        $date_end = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' -' . intval($minutes_to_remove) . ' MINUTES'));
        $d2 = new DateTime($date_end);

        $interval = $d2->diff($d1);
        return $interval->invert;
    }

    public static function isPassedDateTime($date_deb, $add_minutes = false)
    {
        $d1 = new DateTime($date_deb);
        if ($add_minutes) {
            $date_end = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +' . intval($add_minutes) . ' MINUTES'));
        } else {
            $date_end = date('Y-m-d H:i:s');
        }

        $d2 = new DateTime($date_end);

        $interval = $d2->diff($d1);
        return $interval->invert;
    }

    public static function isPassedTime($time_deb, $add_end_minutes = false)
    {
        $date_deb = date('Y-m-d') . ' ' . $time_deb;

        $d1 = new DateTime($date_deb);
        $date_end = date('Y-m-d H:i:s');
        // if($add_minutes) $date_end = date('Y-m-d H:i:s', strtotime($date_end.' +'.intval($add_end_minutes).' MINUTES'));
        $d2 = new DateTime($date_end);
        $interval = $d2->diff($d1);
        return $interval->invert;
    }

    /**
     * Sanitize a string
     *
     * @param string $string String to sanitize
     * @param boolean $full String contains HTML or not (optional)
     * @return string Sanitized string
     */
    static public function safeOutput($string, $html = false)
    {
        if (!$html) {
            $string = strip_tags($string);
        }
        return @Tools::htmlentitiesUTF8($string, ENT_QUOTES);
    }

    static public function htmlentitiesUTF8($string, $type = ENT_QUOTES)
    {
        if (is_array($string)) {
            return array_map(['Tools', 'htmlentitiesUTF8'], $string);
        }
        return htmlentities($string, $type, 'utf-8');
    }

    static public function htmlentitiesDecodeUTF8($string)
    {
        if (is_array($string)) {
            return array_map(['Tools', 'htmlentitiesDecodeUTF8'], $string);
        }
        return html_entity_decode($string, ENT_QUOTES, 'utf-8');
    }

    static public function safePostVars()
    {
        $_POST = array_map(['Tools', 'htmlentitiesUTF8'], $_POST);
    }

    /**
     * Delete directory and subdirectories
     *
     * @param string $dirname Directory name
     */
    static public function deleteDirectory($dirname)
    {
        $files = scandir($dirname);
        foreach ($files as $file) if ($file != '.' AND $file != '..') {
            if (is_dir($file)) {
                self::deleteDirectory($file);
            } elseif (file_exists($file)) {
                unlink($file);
            } else {
                echo 'Unable to delete ' . $file;
            }
        }
        rmdir($dirname);
    }


    /**
     * Display an error with detailed object
     *
     * @param object $object Object to display
     */
    static public function dieObject($object, $kill = true)
    {
        echo '<pre style="text-align: left; clear:both; position:absolute; right:0; z-index:999; color:red; background: white; opacity:0.75;">';
        print_r($object);
        echo '</pre><br />';
        if ($kill) {
            die('END');
        }
    }

    /**
     * ALIAS OF dieObject() - Display an error with detailed object
     *
     * @param object $object Object to display
     */
    static public function d($object, $kill = true)
    {
        self::dieObject($object, $kill = true);
    }

    /**
     * ALIAS OF dieObject() - Display an error with detailed object but don't stop the execution
     *
     * @param object $object Object to display
     */
    static public function p($object)
    {
        self::dieObject($object, false);
    }

    /**
     * Check if submit has been posted
     *
     * @param string $submit submit name
     */
    static public function isSubmit($submit)
    {
        return (isset($_POST[$submit]) OR isset($_POST[$submit . '_x']) OR isset($_POST[$submit . '_y']) OR isset($_GET[$submit]) OR isset($_GET[$submit . '_x']) OR isset($_GET[$submit . '_y']));
    }

    /**
     * Encrypt password
     *
     * @param object $object Object to display
     */
    static public function old_encrypt($passwd)
    {

        return md5(env('_COOKIE_KEY_') . $passwd);
    }

    
    public static function encrypt($password)
    {
        $options = [
            'cost' => 11,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }


    /**
     * Get token to prevent CSRF
     *
     * @param string $token token to encrypt
     */
    static public function getToken($page = true)
    {
        $cookie = Context::getContext();
//        global $cookie;
        if ($page === true) {
            return (Tools::encrypt($cookie->id_customer . $cookie->passwd . $_SERVER['SCRIPT_NAME']));
        } else {
            return (Tools::encrypt($cookie->id_customer . $cookie->passwd . $page));
        }
    }

    /**
     * Encrypt password
     *
     * @param object $object Object to display
     */
    static public function getAdminToken($string)
    {
        return !empty($string) ? Tools::encrypt($string) : false;
    }



    /**
     * Truncate strings
     *
     * @param string $str
     * @param integer $maxLen Max length
     * @param string $suffix Suffix optional
     * @return string $str truncated
     */
    /* CAUTION : Use it only on module hookEvents.
        ** For other purposes use the smarty function instead */
    static public function truncate($str, $maxLen, $suffix = '...')
    {
        if (Tools::strlen($str) <= $maxLen) {
            return $str;
        }
        $str = utf8_decode($str);
        return (utf8_encode(substr($str, 0, $maxLen - Tools::strlen($suffix)) . $suffix));
    }

    /**
     * Generate date form
     *
     * @param integer $year Year to select
     * @param integer $month Month to select
     * @param integer $day Day to select
     * @return array $tab html data with 3 cells :['days'], ['months'], ['years']
     *
     */
    static public function dateYears()
    {
        for ($i = date('Y') - 10; $i >= 1900; $i--) $tab[] = $i;
        return $tab;
    }

    static public function dateDays()
    {
        for ($i = 1; $i != 32; $i++) $tab[] = $i;
        return $tab;
    }

    static public function dateMonths()
    {
        for ($i = 1; $i != 13; $i++) $tab[$i] = date('F', mktime(0, 0, 0, $i, date('m'), date('Y')));
        return $tab;
    }

    static public function hourGenerate($hours, $minutes, $seconds)
    {
        return implode(':', [$hours, $minutes, $seconds]);
    }

    static public function dateFrom($date)
    {
        $tab = explode(' ', $date);
        if (!isset($tab[1])) {
            $date .= ' ' . Tools::hourGenerate(0, 0, 0);
        }
        return $date;
    }

    static public function dateTo($date)
    {
        $tab = explode(' ', $date);
        if (!isset($tab[1])) {
            $date .= ' ' . Tools::hourGenerate(23, 59, 59);
        }
        return $date;
    }

    static public function getExactTime()
    {
        return time() + microtime();
    }

    static function strtolower($str)
    {
        if (is_array($str)) {
            return false;
        }
        if (function_exists('mb_strtolower')) {
            return mb_strtolower($str, 'utf-8');
        }
        return strtolower($str);
    }

    static function strlen($str)
    {
        if (is_array($str)) {
            return false;
        }
        if (function_exists('mb_strlen')) {
            return mb_strlen($str, 'utf-8');
        }
        return strlen($str);
    }

    static function stripslashes($string)
    {
        if (_PS_MAGIC_QUOTES_GPC_) {
            $string = stripslashes($string);
        }
        return $string;
    }

    static function strtoupper($str)
    {
        if (is_array($str)) {
            return false;
        }
        if (function_exists('mb_strtoupper')) {
            return mb_strtoupper($str, 'utf-8');
        }
        return strtoupper($str);
    }

    static function substr($str, $start, $length = false, $encoding = 'utf-8')
    {
        if (is_array($str)) {
            return false;
        }
        if (function_exists('mb_substr')) {
            return mb_substr($str, intval($start), ($length === false ? Tools::strlen($str) : intval($length)), $encoding);
        }
        return substr($str, $start, $length);
    }

    static function ucfirst($str)
    {
        return self::strtoupper(Tools::substr($str, 0, 1)) . Tools::substr($str, 1);
    }


    static public function iconv($from, $to, $string)
    {
        if (function_exists('iconv')) {
            return iconv($from, $to . '//TRANSLIT', str_replace('¥', '&yen;', str_replace('£', '&pound;', str_replace('€', '&euro;', $string))));
        }
        return html_entity_decode(htmlentities($string, ENT_NOQUOTES, $from), ENT_NOQUOTES, $to);
    }

    static public function isEmpty($field)
    {
        return $field === '' OR $field === NULL;
    }

    /**
     * DEPRECATED FUNCTION
     * DO NOT USE IT
     **/
    static public function ps_set_magic_quotes_runtime($var)
    {
        if (function_exists('set_magic_quotes_runtime')) {
            @set_magic_quotes_runtime($var);
        }
    }


    static public function in_multidimensional_array($elem, $array)
    {
        $top = count($array) - 1;
        $bottom = 0;
        while ($bottom <= $top) {
            if (is_array($array[$bottom])) {
                if (in_array($elem, ($array[$bottom]))) {
                    return true;
                }
            }

            $bottom++;
        }
        return false;
    }

    static public function trace_perfs($detail)
    {
        echo '<b>' . date('i:s:u') . '</b> => ' . $detail . '<br/>';

    }

    static public function execution_time_init($message)
    {
        Tools::$execution_time_start = microtime(true);
        Tools::$execution_time_messages = [];
        Tools::$execution_time_messages[] = ['time' => Tools::$execution_time_start, 'message' => $message];
    }

    static public function execution_time_log($message)
    {
        Tools::$execution_time_messages[] = ['time' => microtime(true), 'message' => $message];
    }

    static public function execution_time_trace()
    {
        echo '<pre class="debug">==== execution_time_trace ====' . "\n";
        foreach (Tools::$execution_time_messages as $message) {
            $time = $message['time'] - Tools::$execution_time_start;
            echo round($time, 5);
            echo "\t: " . $message['message'] . "\n";
        }
        echo '</pre>';
    }


    //TABLEAU//////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////
    static function build_sorter($key)
    {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }

    static public function sortArrayByKey($array, $key)
    {
        usort($array, Tools::build_sorter($key));
        return $array;
    }

    function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = ['Version', $ub, 'other'];
        $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return ['userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern];
    }

    /**
     * Add get parameter to given url
     *
     * @param string $url
     * @param string $parameter
     * @return string url
     */
    public static function addGetParameter($url, $parameter)
    {
        return $url . (parse_url($url, PHP_URL_QUERY) ? '&' : '?') . $parameter;
    }

    /**
     * Remove get parameters (after "?") from string url
     *
     * @param string $url
     * @return string url
     */
    public static function removeGetParameters($url)
    {
        return strtok($url, '?');
    }

    /**
     * Remove get parameters (after "?") from string url
     *
     * @param int id_customer
     */
    public function getNextPerfMD5($id_customer)
    {
        $md5 = '';
        $source_address = Customer::getEmail($id_customer);
        if (trim($source_address)) {
            $processed_address = strtolower($source_address);
            $processed_address = trim($processed_address);
            $processed_address = md5($processed_address);
            $md5 = $processed_address;
        }
        return $md5;
    }


    function sanitize($string = '', $is_filename = FALSE)
    {
        $string = self::remove_accents($string);
        // Replace all weird characters with dashes
        $string = preg_replace('/[^\w\-' . ($is_filename ? '~_\.' : '') . ']+/u', '-', $string);

        // Only allow one dash separator at a time (and make string lowercase)
        return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
    }

    static public function bot_detected()
    {
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    static public function bot_throw_exception()
    {
        if (Tools::bot_detected()){
        	throw new SushiShopException('You are not a robot ? please contact support.',401);
        }
    }

    static public function debug_variable($o)
    {

        var_dump($o);
        die();
    }

    static public function checkToken($page = '', $die = false)
    {
        $token_params = Tools::getValue('token');
        $token_check = Tools::getToken($page);
        if (!$token_params || ($token_params && $token_params != $token_check)) {
            if ($die) {
                die(json_encode(['errors' => Language::t('Erreur : les données ne sont pas valides. Merci de contacter le support.')]));
            }
        }

    }

    static public function getIP(): string
    {
        if (isset($_SERVER['HTTP_X_OXA_REAL_IP']) and !empty($_SERVER['HTTP_X_OXA_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_OXA_REAL_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) and !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            $addr = explode(",", $ip);
            $ip = $addr[sizeof($addr) - 1];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    static public function getIPCountryCode($ip = null): string
    {
        if (is_null($ip)) {
            $ip = Tools::getIP();
        }
        // utilise une base ip2location (disponible en licence commerciale, et en lite gratuitement)
        // il faut mettre à jour cette base avec un cron, et idéalement partager le fichier entre les différents pays
        $dbPath = Configuration::get('_IP2LOCATION_DB_PATH_', '/space/NFS-shared/ip2location/IP-COUNTRY.BIN');
        try {
            switch (Configuration::get('_IP2LOCATION_DB_MODE_')) {
                case 'SHARED_MEMORY':
                    $db_mode = \IP2Location\Database::SHARED_MEMORY;
                    break;
                case 'MEMORY_CACHE':
                    $db_mode = \IP2Location\Database::MEMORY_CACHE;
                    break;
                case 'FILE_IO':
                default:
                    $db_mode = \IP2Location\Database::FILE_IO;
                    break;
            }
            $ip2locationDatabase = new \IP2Location\Database($dbPath, $db_mode);
            $country_code = $ip2locationDatabase->lookup($ip, \IP2Location\Database::COUNTRY_CODE);
        } catch (Exception $err) {
            // valeur par défaut, en cas d'erreur.
            $country_code = '-';
        }
        return $country_code;
    }

    static public function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '-';
    }

    static public function get_object_vars(&$i)
    {
        $a = get_object_vars($i);
        $i = $a;
    }

}


