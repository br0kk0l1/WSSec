<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace,XmlAttribute,SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/10/xml-exc-c14n#",prefix="ec")
 */
class InclusiveNamespaces{
    /**
     * @XmlAttribute
     * @SerializedName("PrefixList")
     */
    private $prefixList;
    
    public function __construct($prefixList = "S12"){
        $this->prefixList = $prefixList;
        return $this;
    }

    public function setPrefixList($prefixList){
        $this->prefixList = $prefixList;
        return $this;
    }

    public function getPrefixList(){
        return $this->prefixList;
    }
}