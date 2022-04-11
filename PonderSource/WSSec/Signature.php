<?php

namespace PonderSource\WSSec;

use PonderSource\WSSec\Namespaces;
use JMS\Serializer\Annotation\{XmlRoot,XmlElement,Type,XmlNamespace,SerializedName};
use JMS\Serializer\SerializerBuilder;

/**
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlRoot("ds:Signature")
 */
class Signature {
    /**
     * @SerializedName("SignedInfo") 
     * @Type("PonderSource\WSSec\SignedInfo")
     * @XmlElement(namespace=Namespaces::DS)
     */
    private $signedInfo;

    /**
     * @SerializedName("SignatureValue")
     * @XmlElement(cdata=false, namespace=Namespaces::DS)
     * @Type("string")
     */
    private $signatureValue;

    /**
     * @SerializedName("KeyInfo")
     * @Type("PonderSource\WSSec\KeyInfo")
     * @XmlElement(namespace=Namespaces::DS)
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
        $xml = $serializer->serialize($this->signedInfo, 'xml');
        $xml = $this->signedInfo->getCanonicalizationMethod()->applyAlgorithm($xml);
        $signature = $this->signedInfo->getSignatureMethod()->sign($pkey,$xml);
        $this->signatureValue = $signature;
        return $this;
    }

}