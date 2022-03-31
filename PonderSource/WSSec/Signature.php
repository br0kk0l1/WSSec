<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlNamespace,SerializedName,XmlElement};
use JMS\Serializer\SerializerBuilder;

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#", prefix="ds")
 */
class Signature {
    /**
     * @SerializedName("ds:SignedInfo") 
     * @Type("PonderSource\WSSec\SignedInfo")
     */
    private $signedInfo;

    /**
     * @SerializedName("ds:SignatureValue")
     * @XmlElement(cdata=false)
     * @Type("string")
     */
    private $signatureValue;

    /**
     * @SerializedName("ds:KeyInfo")
     * @Type("PonderSource\WSSec\KeyInfo")
     */
    private $keyInfo;

    public function __construct($signedInfo, $keyInfo){
        $this->signedInfo = $signedInfo;
        $this->keyInfo = $keyInfo;
        return $this;
    }

    public function setSignedInfo($signedInfo){
        $this->signedInfo = $signedInfo;
        return $this;
    }

    public function getSignedInfo(){
        return $this->signedInfo;
    }

    public function setKeyInfo($keyInfo){
        $this->keyInfo = $keyInfo;
        return $this;
    }

    public function getKeyInfo(){
        return $this->keyInfo;
    }

    public function sign($pkey){
        $serializer = SerializerBuilder::create()->build();
        $xml = $serializer->serialize($this, 'xml');
        $xml = $this->signedInfo->getCanonicalizationMethod()->applyAlgorithm($xml);
        $signature = $this->signedInfo->getSignatureMethod()->sign($pkey,$xml);
        $this->signatureValue = $signature;
        return $this;
    }

}