<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlRoot, XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#", prefix="ds")
 * @XmlRoot("ds:KeyInfo")
 */
class KeyInfo {
    /**
     * @SerializedName("wsse:SecurityTokenReference")
     */
    private $securityTokenReference;

    /**
     * @SerializedName("Id")
     * @XmlAttribute
     */
    private $id;
   
    public function __construct($securityTokenReference, $id=null){
        $this->securityTokenReference = $securityTokenReference;
        $this->id = $id;
        return $this;
    }

    public function setSecurityTokenReference($securityTokenReference){
        $this->securityTokenReference = $securityTokenReference;
        return $this;
    }
    
    public function getSecurityTokenReference(){
        return $this->securityTokenReference;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }
}