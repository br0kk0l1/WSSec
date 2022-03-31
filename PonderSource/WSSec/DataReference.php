<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 */
class DataReference {
    /**
     * @XmlAttribute
     * @SerializedName("URI")
     * @Type("string")
     */
    private $uri;

    public function __construct($uri){
        $this->uri = $uri;
        return $this;
    }
}