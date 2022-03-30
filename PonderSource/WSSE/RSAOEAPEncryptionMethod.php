<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{Inline,XmlNamespace,XmlAttribute,SerializedName};
use phpseclib3\Crypt\{AES,Random};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class RSAOEAPEncryptionMethod implements EncryptionMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     */
    private string $algorithm = "http://www.w3.org/2009/xmlenc11#rsa-oaep";

    /**
     * @SerializedName("ds:DigestMethod")
     */
    private $digestMethod;

    /**
     * @SerializedName("xenc11:MGF")
     */
    private $mgf;

    public function __construct($digestMethod, $mgf){
        $this->digestMethod = $digestMethod;
        $this->mgf = $mgf;
        return $this;
    }

    public function getUri(){
        return $this->algorithm;
    }

    public function encrypt(string $data, $key){
        return base64_encode($key->encrypt($data));
    }

    public function decrypt(string $data, $key){
        return $key->decrypt(base64_decode($data));
    }
}