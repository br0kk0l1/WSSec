<?php

namespace PonderSource\WSSec\EncryptionMethod;

use JMS\Serializer\Annotation\{Type, Inline,XmlNamespace,XmlAttribute,SerializedName};
use phpseclib3\Crypt\{AES,Random};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class RsaOeap implements IEncryptionMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private string $algorithm = "http://www.w3.org/2009/xmlenc11#rsa-oaep";

    /**
     * @SerializedName("ds:DigestMethod")
     * @Type("PonderSource\WSSec\DigestMethod\IDigestMethod")
     */
    private $digestMethod;

    /**
     * @SerializedName("xenc11:MGF")
     * @Type("PonderSource\WSSec\MGF")
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