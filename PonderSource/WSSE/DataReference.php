<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class DataReference {
    /**
     * @XmlAttribute
     * @SerializedName("URI")
     */
    private $uri;

    public function __construct($uri){
        $this->uri = $uri;
        return $this;
    }
}