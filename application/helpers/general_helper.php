<?php

function get_country($ip)
{
    $CI = &get_instance();
    $CI->load->model('curl_function');
    $url = "http://api.wipmania.com/" . $ip . "?" . base_url();
    $result = $CI->curl_function->get($url);
    return $result;
}

function admin_url($url = '')
{
    $CI = &get_instance();
    return $CI->config->config['admin_url'] . $url;
}
function base_url_index($url = '')
{
    $CI = &get_instance();
    return $CI->config->config['base_url_index'] . $url;
}

function client_url($url = '')
{
    $CI = &get_instance();
    return $CI->config->config['client_url'] . $url;
}


function get_project_name()
{
    $CI = &get_instance();
    return $CI->config->config['project_name'];
}

function get_skip($page_no = 1, $per_page = 24)
{
    return (($page_no - 1) * $per_page);
}

function upload_single_image($file, $name, $path, $thumb = FALSE)
{
    $CI = &get_instance();

    $return['error'] = '';
    $image_name = $name . '_' . time();

    $CI->load->helper('form');
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|JPG';
    $config['file_name'] = $image_name;

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);

    $CI->upload->set_allowed_types('gif|jpg|png|jpeg|JPEG|PNG|JPG|GIF');

    if (!$CI->upload->do_upload(key($file))) {
        $return['error'] = $CI->upload->display_errors();
    } else {
        $result = $CI->upload->data();
        $return['data'] = $result;
    }

    if ($thumb == TRUE && $return['error'] == '') {
        $CI->load->library('Mylibrary');
        $thumb_array = array(
            array('width' => '100', 'height' => '100', 'image_type' => 'SMALL'),
            array('width' => '250', 'height' => '250', 'image_type' => 'MEDIUM'));
        for ($i = 0; $i < count($thumb_array); $i++) {
            $imageinfo = getimagesize($result['full_path']);
            $thumbSize = $CI->mylibrary->calculateResizeImage($imageinfo[0], $imageinfo[1], $thumb_array[$i]['width'], $thumb_array[$i]['height']);

            $CI->load->library('image_lib');
            $conf['image_library'] = 'gd2';
            $conf['source_image'] = $path . $result['orig_name'];
            $conf['create_thumb'] = TRUE;
            $conf['maintain_ratio'] = TRUE;
            $conf['new_image'] = $result['orig_name'];
            $conf['thumb_marker'] = "_" . $thumb_array[$i]['image_type'];
            $conf['width'] = $thumbSize['width'];
            $conf['height'] = $thumbSize['height'];
            $CI->image_lib->clear();
            $CI->image_lib->initialize($conf);
            if (!$CI->image_lib->resize()) {
                $return['error'] = 'Thumb Not Created';
            }
        }
    }

    return $return;
}

function delete_single_image($fullPath, $fileName)
{
    unlink($fullPath . '/' . $fileName);
}

function delete_image($array, $path)
{
    $CI = &get_instance();
    $img = $CI->db->select($array['field'])->where('int_glcode', $array['id'])->get($array['table'])->row_array();
    $mainImg = $img[$array['field']];
    $expImg = explode('.', $mainImg);
    $imgdelete = $path . $mainImg;
    if (file_exists($imgdelete)) {
        unlink($imgdelete);
    }
    return TRUE;
}

function apply_lang($string, $delimiter = ' ')
{
    $CI = &get_instance();
    $str_array = explode($delimiter, $string);
    $return_string = '';

    for ($i = 0; $i < count($str_array); $i++) {
        $return_string .= $CI->lang->line($str_array[$i]);
        if ($i < count($str_array)) {
            $return_string .= $delimiter;
        }
    }
    if ($return_string == '') {
        return $CI->lang->line($string);
    }
    return $return_string;
}

function sorttextlen($text, $limit)
{
    if (strlen($text) < $limit) {
        $sort_text = mb_substr($text, 0, $limit);
    } else if (strlen($text) > $limit) {
        $sort_text = mb_substr($text, 0, $limit) . '...';
    }

    return $sort_text;
}


function date_formate($date)
{
    $date = date('M', strtotime($date)) . ' ' . date('j', strtotime($date)) . "'" . date('y', strtotime($date)) . ' at' . ' ' . date('h:i', strtotime($date));
    return $date;
}

function str_replace_first($from, $to, $subject)
{
    $from = '/' . preg_quote($from, '/') . '/';

    return preg_replace($from, $to, $subject, 1);
}

/* ----   Start Function to get the client IP address ----- */

function get_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('HTTP_X_FORWARDED')) {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    } else if (getenv('HTTP_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    } else if (getenv('HTTP_FORWARDED')) {
        $ipaddress = getenv('HTTP_FORWARDED');
    } else if (getenv('REMOTE_ADDR')) {
        $ipaddress = getenv('REMOTE_ADDR');
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}

/* ---- End Function to get the client IP address ----- */

function getLoginUserData()
{
    $CI = &get_instance();
    if ($CI->session->userdata['valid_user']) {
        $result = $CI->session->userdata['valid_user'];
    } elseif ($CI->session->userdata['valid_dealer']) {
        $result = $CI->session->userdata['valid_dealer'];
    } elseif ($CI->session->userdata['valid_admin']) {
        $result = $CI->session->userdata['valid_admin'];
    }
    return $result;
}

function get_img($path, $image, $multiple_img = FALSE)
{
    $path = trim($path);
    $image = trim($image);
    if ($multiple_img == TRUE) {
        if (!empty($image)) {
            $img = explode(',', $image);
            if (file_exists($path . $img[0])) {
                $data = base_url() . $path . $img[0];
            } else {
                $data = base_url() . NO_IMAGE;
            }
        } else {
            $data = base_url() . NO_IMAGE;
        }
    } else {
        if (!empty($image) && !empty($path)) {
            if (file_exists($path . $image)) {
                $data = base_url() . $path . $image;
            } else {
                $data = base_url() . NO_IMAGE;
            }
        } else {
            $data = base_url() . NO_IMAGE;
        }
    }
    return $data;
}

function getLoginUserType($userData)
{
    $CI = &get_instance();
    if ($CI->session->userdata['valid_dealer'] && $CI->uri->segment(1) == 'dealer') {
        $result = $CI->session->userdata['valid_dealer'];
    } elseif ($CI->session->userdata['valid_user'] && $CI->uri->segment(1) == 'user') {
        $result = $CI->session->userdata['valid_user'];
    } elseif ($CI->session->userdata['valid_admin'] && $CI->uri->segment(1) == 'admin') {
        $result = $CI->session->userdata['valid_admin'];
    }
    return $result['user_type'];
}

function getbaseURL($url = '')
{
    $CI = &get_instance();
    if ($CI->session->userdata['valid_dealer'] && $CI->uri->segment(1) == 'dealer') {
        return dealer_url($url);
    } elseif ($CI->session->userdata['valid_user'] && $CI->uri->segment(1) == 'user') {
        return user_url($url);
    } elseif ($CI->session->userdata['valid_admin'] && $CI->uri->segment(1) == 'admin') {
        return admin_url($url);
    } else {
        return base_url($url);
    }
}

function tz_date($date, $formate = 'Y-m-d H:i:s', $zone = null)
{
    return date($formate, strtotime($date));
}

function timezone_offset_string($offset)
{
    return sprintf("%s%02d:%02d", ($offset >= 0) ? '+' : '-', abs($offset / 3600), abs($offset % 3600));
}

function getTimezoneOfset($timeZone, $isString = FALSE)
{
    $offset = timezone_offset_get(new DateTimeZone($timeZone), new DateTime());
    if ($isString === TRUE) {
        $offset = timezone_offset_string($offset);
    }
    return $offset;
}

function getTimeZone()
{
    $CI = &get_instance();
    $settings = $CI->authlibrary->getStoreSetting();
    $settings = $settings[0];
    return ($settings['var_time_zone']) ? $settings['var_time_zone'] : "UTC";
}

function date_tz($format = 'Y-m-d H:i:s')
{
    return convert_date_from_utc(date('Y-m-d H:i:s'), getTimeZone(), $format);
}

function array_insert($array, $index, $val)
{
    $size = count($array); //because I am going to use this more than one time
    if (!is_int($index) || $index < 0 || $index > $size) {
        return -1;
    } else {
        $temp = array_slice($array, 0, $index);
        $temp[] = $val;
        return array_merge($temp, array_slice($array, $index, $size));
    }
}

function escapeJavaScriptText($string)
{
    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
}

function addForeignKey($sourceTable, $sourceField, $targetTable, $targetField = 'id', $onDelete = 'RESTRICT', $onUpdate = 'RESTRICT')
{
    $CI = &get_instance();
    $dbName = $CI->db->database;

    $CI->db->query('ALTER TABLE ' . $dbName . '.`ps_' . $sourceTable . '` ADD INDEX `ps_' . $sourceTable . '_' . $sourceField . '` (`' . $sourceField . '`);');
    $CI->db->query('ALTER TABLE `ps_' . $sourceTable . '` ADD CONSTRAINT `ps_' . $sourceTable . '_' . $sourceField . '` FOREIGN KEY (`' . $sourceField . '`) REFERENCES ' . $dbName . '.`ps_' . $targetTable . '`(`' . $targetField . '`) ON DELETE ' . $onDelete . ' ON UPDATE ' . $onUpdate . '; ');
}

function dropForeignKey($sourceTable, $sourceField, $targetTable, $targetField = 'id')
{
    $CI = &get_instance();
    $CI->db->query('ALTER TABLE ps_' . $sourceTable . ' DROP FOREIGN KEY ps_' . $sourceTable . '_' . $sourceField . ';');
    $CI->db->query('ALTER TABLE ps_' . $sourceTable . ' DROP INDEX ps_' . $sourceTable . '_' . $sourceField . ';');
}

//ALTER TABLE ps_news DROP FOREIGN KEY ps_news_fk_category;

function convertNumber($number)
{
    return preg_replace('/[^\\d.]+/', '', $number);
}

function time_ago_new($datetime) {

    $date2 = date("Y-m-d h:i:s");
    $date1 = $datetime;
    $diff = abs(strtotime($date2) - strtotime($date1));

    $min = 60;
    $hour = 60 * 60;
    $day = 60 * 60 * 24;
    $month = $day * 30;

    if ($diff < 60) { //Under a min
        $timeago = $diff . " seconds";
    } elseif ($diff < $hour) { //Under an hour
        $timeago = round($diff / $min) . " mins";
    } elseif ($diff < $day) { //Under a day
        $timeago = round($diff / $hour) . " hours";
    } elseif ($diff < $month) { //Under a day
        $timeago = round($diff / $day) . " days";
    } else {
        $timeago = round($diff / $month) . " months";
    }
    return $timeago;
}

function age_diff($fromdate, $todate)
{
    if (trim($fromdate) != '0000-00-00' && trim($todate) != '0000-00-00' && date('Y-m-d', strtotime($fromdate)) <= date('Y-m-d', strtotime($todate))) {
        $datediff = (new DateTime(date('Y-m-d', strtotime($todate))))->diff((new DateTime(date('Y-m-d', strtotime($fromdate)))));

        if ($datediff->y == 0 && $datediff->m == 0) {
            if ($datediff->d > 1) {
                $result = $datediff->d . ' days';
            } else if ($datediff->d == 1 || $datediff->d == 0) {
                $result = '1 day';
            }
        } else if ($datediff->y == 0 && $datediff->m > 0) {
            if ($datediff->m > 1) {
                $result = $datediff->m . ' months';
            } else if ($datediff->m == 1 || $datediff->m == 0) {
                $result = '1 month';
            }
        } else {
            if ($datediff->y > 1) {
                $result = $datediff->y . ' years ';
            } else {
                $result = $datediff->y . ' year';
            }
        }
    } else {
        $result = '-';
    }
    return $result;
}

function time_ago($datetime, $todate, $seconds = FALSE)
{
    if (is_numeric($datetime)) {
        $timestamp = $datetime;
    } else {
        $timestamp = strtotime($datetime);
    }
    if (is_numeric($todate)) {
        $to_timestamp = $todate;
    } else {
        $to_timestamp = strtotime($todate);
    }
    $diff = $to_timestamp - $timestamp;

    $min = 60;
    $hour = 60 * 60;
    $day = 60 * 60 * 24;
    $month = $day * 30;
    $year = $month * 12;
    $timeago = '';

    if ($diff < 60) { //Under a min
        if ($seconds) {
            $timeago .= $diff . " seconds";
        }
    } elseif ($diff < $hour) { //Under an hour
        $timeago .= round($diff / $min) . " mins";
    } elseif ($diff < $day) { //Under a day
        $timeago .= round($diff / $hour) . " hours";
    } elseif ($diff < $month) { //Under a day
        $timeago .= round($diff / $day) . " days";
    } elseif ($diff < $year) { //Under a day
        $timeago .= round($diff / $month) . " months";
    } else {
        if (round($diff / $year) > 1) {
            $timeago .= round($diff / $year) . " years";
        } else {
            $timeago .= round($diff / $year) . " year";
        }
    }

    return $timeago;
}

function dateDifference($date_1, $date_2, $days = FALSE)
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    $differenceFormat = '';
    $interval = date_diff($datetime1, $datetime2);

    if ($interval->y > 0) {
        if ($interval->y > 1) {
            $differenceFormat .= '%y years';
        } else {
            $differenceFormat .= '1 year';
        }
    }

    if ($interval->m > 0) {
        if ($interval->m > 1) {
            if ($interval->y > 0) {
                $differenceFormat .= ' and %m months';
            } else {
                $differenceFormat .= '%m months';
            }
        } else {
            $differenceFormat .= '1 month';
        }
    }
    if ($days) {
        if ($interval->d > 0) {
            if ($interval->d > 1) {
                if ($interval->m > 0) {
                    $differenceFormat .= ' and %d days';
                } else {
                    $differenceFormat .= '%d days';
                }
            } else {
                $differenceFormat .= '1 day';
            }
        }
    }

    return $interval->format($differenceFormat);
}

function getPastYears($startFromYear = FALSE, $cnt = 50)
{
    if ($startFromYear) {
        $cur_year = $startFromYear;
    } else {
        $cur_year = date('Y');
    }
    for ($i = 0; $i <= $cnt; $i++) {
        $years[] = $cur_year--;
    }
    return $years;
}

function getMonths($full = FALSE)
{

    $months = array(
        '01' => ($full) ? 'January' : 'Jan',
        '02' => ($full) ? 'February' : 'Feb',
        '03' => ($full) ? 'March' : 'Mar',
        '04' => ($full) ? 'April' : 'Apr',
        '05' => ($full) ? 'May' : 'May',
        '06' => ($full) ? 'June' : 'Jun',
        '07' => ($full) ? 'July' : 'Jul',
        '08' => ($full) ? 'August' : 'Aug',
        '09' => ($full) ? 'September' : 'Sep',
        '10' => ($full) ? 'Octomber' : 'Oct',
        '11' => ($full) ? 'November' : 'Nov',
        '12' => ($full) ? 'December' : 'Dec');

    return $months;
}

function sortMultiArray($arr, $k, $sort)
{
    $tmp = Array();
    foreach ($arr as &$ma)
        $tmp[] = &$ma[$k];
    $tmp = array_map('strtolower', $tmp);      // to sort case-insensitive
    array_multisort($tmp, $sort, $arr);
    return $arr;
}


function convert_date($datetime, $sourceTimeZone, $targetTimezone, $format = 'Y-m-d H:i:s')
{
//    echo "$datetime, $sourceTimeZone, $targetTimezone,";exit;
    if(empty($targetTimezone)){
        $targetTimezone="UTC";
    }
    $date = new \DateTime($datetime, new \DateTimeZone($sourceTimeZone));
    $date->setTimezone(new \DateTimeZone($targetTimezone));
    return $date->format($format);
}

function getTimeZoneChoice($selectedzone)
{
    $all = timezone_identifiers_list();

    $html = '';
    for ($i = 0; $i < count($all); $i++) {
        $html .= '<option ' . (($selectedzone == $all[$i]) ? 'selected="selected "' : '') . ' value="' . $all[$i] . '">' . $all[$i] . '</option>';
    }
    return $html;

    $i = 0;
    foreach ($all AS $zone) {
        $zone = explode('/', $zone);
        $zonen[$i]['continent'] = isset($zone[0]) ? $zone[0] : '';
        $zonen[$i]['city'] = isset($zone[1]) ? $zone[1] : '';
        $zonen[$i]['subcity'] = isset($zone[2]) ? $zone[2] : '';
        $i++;
    }

    asort($zonen);

    $structure = '';
    foreach ($zonen AS $zone) {
        extract($zone);
        if ($continent == 'Africa' || $continent == 'America' || $continent == 'Antarctica' || $continent == 'Arctic' || $continent == 'Asia' || $continent == 'Atlantic' || $continent == 'Australia' || $continent == 'Europe' || $continent == 'Indian' || $continent == 'Pacific') {
            if (!isset($selectcontinent)) {
                $structure .= '<optgroup label="' . $continent . '">'; // continent
            } elseif ($selectcontinent != $continent) {
                $structure .= '</optgroup><optgroup label="' . $continent . '">'; // continent
            }

            if (isset($city) != '') {
                if (!empty($subcity) != '') {
                    $city = $city . '/' . $subcity;
                }
                $structure .= "<option " . ((($continent . '/' . $city) == $selectedzone) ? 'selected="selected "' : '') . " value=\"" . ($continent . '/' . $city) . "\">" . str_replace('_', ' ', $city) . "</option>"; //Timezone
            } else {
                if (!empty($subcity) != '') {
                    $city = $city . '/' . $subcity;
                }
                $structure .= "<option " . (($continent == $selectedzone) ? 'selected="selected "' : '') . " value=\"" . $continent . "\">" . $continent . "</option>"; //Timezone
            }

            $selectcontinent = $continent;
        }
    }
    $structure .= '</optgroup>';
    return $structure;
}

function getTimeZoneList()
{
    return timezone_identifiers_list();
}

function getExpertTimeZone($id)
{
    $CI = &get_instance();
    return $CI->db->get_where('experts', array('id' => $id))->row_array()['var_timezone'];
}

function getClientTimeZone($id)
{
    $CI = &get_instance();
    return $CI->db->get_where('client', array('id' => $id))->row_array()['var_timezone'];
}

function formatNumber($number)
{
    if ($number != '') {
        return sprintf("%s %s %s %s",
            substr($number, 0, 3),
            substr($number, 3, 3),
            substr($number, 6, 3),
            substr($number, 9));
    } else {
        return $number;
    }
}

function isFileExist($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // $retcode >= 400 -> not found, $retcode = 200, found.
    curl_close($ch);
    if ($responseCode == 200) {
        return true;
    } else {
        return false;
    }

}