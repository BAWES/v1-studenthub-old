<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', '164f5b8a9c5e47bbaedf912a50ceded6d8d657f03a554434a22b3c5bb89fe7570e9c2ab8cd144a5992ff75f983a500aa030a7140e2164f43b57b35ea21a165315ef6d4d4c96b4022b39d6371cd30567da22426026f8543a4b51dd885aa7f4dff22460e0eff7e4d53bddb3e015fc46f249987de6acf34497da06d405661aa5530');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}
