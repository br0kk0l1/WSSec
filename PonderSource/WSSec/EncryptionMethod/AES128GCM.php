<?php

namespace PonderSource\WSSec\EncryptionMethod;

use JMS\Serializer\Annotation\{Type, XmlNamespace,XmlAttribute,SerializedName};
use phpseclib3\Crypt\{AES,Random};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class AES128GCM implements IEncryptionMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private string $algorithm = "http://www.w3.org/2009/xmlenc11#aes128-gcm";

    public function __construct(){
        return $this;
    }

    public function getUri(){
        return $this->algorithm;
    }

    public function encrypt(string $data, $key){
        $cipher = new AES('gcm');
        $nonce = Random::string(96);
        $cipher->setNonce($nonce);
        $cipher->setKey($key);
        $encrypted = $cipher->encrypt($data);
        $tag = $cipher->getTag();
        return $nonce . $encrypted . $tag;
    }

    public function decrypt(string $data, $key){
        $nonce = substr($data, 0, 12);
        $tag = substr($data, -16);
        $data = substr($data, 12, -16);
        $cipher = new AES('gcm');
        $cipher->setNonce($nonce);
        $cipher->setKey($key);
        $cipher->setTag($tag);
        $decrypted = $cipher->decrypt($data);
        return $decrypted;
    }
}