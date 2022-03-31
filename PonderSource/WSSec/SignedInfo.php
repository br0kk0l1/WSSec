<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{XmlNamespace,Type,SerializedName,XmlList};

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#")
 */
class SignedInfo {
    /**
     * @SerializedName("ds:CanonicalizationMethod")
     * @Type("PonderSource\WSSec\CanonicalizationMethod\ICanonicalizationMethod")
     */
    private $canonicalizationMethod;

    /**
     * @SerializedName("ds:SignatureMethod")
     * @Type("PonderSource\WSSec\SignatureMethod\ISignatureMethod")
     */
    private $signatureMethod;

    /**
     * @XmlList(inline=true, entry="ds:Reference")
     * @Type("array")
     */
    private $references = [];

    public function __construct($signatureMethod, $canonicalizationMethod=null){
        $this->signatureMethod = $signatureMethod;
        if(is_null($canonicalizationMethod)){
            $this->canonicalizationMethod = new CanonicalizationMethod\C14NExcCanonicalizationMethod();
        } else {
            $this->canonicalizationMethod = $canonicalizationMethod;
        }
        return $this;
    }

    public function addReference($reference){
        array_push($this->references, $reference);
        return $this;
    }

    public function removeReference($reference){
        array_filter($this->references, function($r) { return $r != $reference; });
    }

    public function getReferences(){
        return $this->references;
    }

    public function getCanonicalizationMethod(){
        return $this->canonicalizationMethod;
    }

    public function getSignatureMethod(){
        return $this->signatureMethod;
    }
}