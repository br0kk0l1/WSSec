<?php

namespace PonderSource\WSSec;

use PonderSource\WSSec\Namespaces;
use JMS\Serializer\Annotation\{Type,XmlRoot,XmlNamespace,XmlAttribute,SerializedName,XmlElement};

/**
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlRoot("ds:KeyInfo")
 */
class KeyInfo {
    /**
     * @SerializedName("SecurityTokenReference")
     * @Type("PonderSource\WSSec\SecurityTokenReference")
     * @XmlElement(namespace=Namespaces::WSSE)
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