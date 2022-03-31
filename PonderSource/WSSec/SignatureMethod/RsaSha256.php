<?php

namespace PonderSource\WSSec\SignatureMethod;

use phpseclib3\Crypt\RSA;
use JMS\Serializer\Annotation\{XmlAttribute,Type,SerializedName,XmlNamespace};

/**
 * @XmlNamespace("http://www.w3.org/2000/09/xmldsig#")
 */
class RsaSha256 implements ISignatureMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private $uri = "http://www.w3.org/2001/04/xmldsig-more#rsa-sha256";

    public function __construct(){
        return $this;
    }

    public function  getUri() {
        return RsaSha256::$uri;
    }

    public function sign($pkey, $value){
        $pkey = $pkey->withPadding(RSA::SIGNATURE_PKCS1);
        $signature = $pkey->sign($value);
        return \base64_encode($signature);
    }
}