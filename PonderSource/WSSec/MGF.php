<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2009/xmlenc11#", prefix="xenc11")
 */
class MGF {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private $algorithm;

    public function __construct($algorithm){
        $this->algorithm = $algorithm;
        return $this;
    }
} 