<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlRoot, XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#", prefix="ds")
 * @XmlRoot("ds:KeyInfo")
 */
class KeyInfo {
    /**
     * @SerializedName("wsse:SecurityTokenReference")
     * @Type("PonderSource\WSSec\SecurityTokenReference")
     */
    private $securityTokenReference;

    /**
     * @SerializedName("Id")
     * @XmlAttribute
     * @Type("string")
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