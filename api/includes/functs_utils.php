<?php

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

function data_security($data_client, $data_infos)
{
    foreach ($data_infos as $data_info) {
        $variable_name = $data_info[0];
        $max_length = $data_info[1];
        if (isset($data_info[2])) {
            $min_length = $data_info[2];
        } else {
            $min_length = 3;
        }
        if (isset($data_client[$variable_name])) {
            if (strlen($data_client[$variable_name]) <= $max_length) {
                if (strlen($data_client[$variable_name]) >= $min_length) {
                    $return_data[$variable_name] = htmlspecialchars($data_client[$variable_name]);
                } else {
                    $return_error["type"] = "error";
                    $return_error["message"] = "Below the minimum length.";
                    $return_error["variable_name"] = $variable_name;
                    $return_error["min_length"] = $min_length;
                    return $return_error;
                }
            } else {
                $return_error["type"] = "error";
                $return_error["message"] = "Reached the maximum length.";
                $return_error["variable_name"] = $variable_name;
                $return_error["max_length"] = $max_length;
                return $return_error;
            }
        } else {
            $return_error["type"] = "error";
            $return_error["message"] = "Isset failed.";
            $return_error["variable_name"] = $variable_name;
            return $return_error;
        }
    }

    return $return_data;
}

// https://stackoverflow.com/questions/13646690/how-to-get-real-ip-from-visitor#answer-13646735
function getUserIP()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}
