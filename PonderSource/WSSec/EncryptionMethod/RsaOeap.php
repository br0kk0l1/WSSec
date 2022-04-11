<?php

namespace PonderSource\WSSec\EncryptionMethod;

use PonderSource\WSSec\Namespaces;
use JMS\Serializer\Annotation\{XmlElement,XmlRoot,Type,Inline,XmlNamespace,XmlAttribute,SerializedName};
use phpseclib3\Crypt\{AES,Random};

/**
 * @XmlNamespace(uri=Namespaces::XENC, prefix="xenc")
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlRoot("xenc:EncryptionMethod")
 */
class RsaOeap implements IEncryptionMethod {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private string $algorithm = "http://www.w3.org/2009/xmlenc11#rsa-oaep";

    /**
     * @SerializedName("DigestMethod")
     * @Type("PonderSource\WSSec\DigestMethod\SHA256")
     * @XmlElement(namespace=Namespaces::DS)
     */
    private $digestMethod;

    /**
     * @SerializedName("MGF")
     * @Type("PonderSource\WSSec\MGF")
     * @XmlElement(namespace=Namespaces::DS)
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