<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlNamespace, XmlAttribute, SerializedName};

/**
 * @XmlNamespace(uri="http://www.w3.org/2009/xmlenc11#", prefix="xenc11")
 */
class MGF {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     */
    private $algorithm;

    public function __construct($algorithm){
        $this->algorithm = $algorithm;
        return $this;
    }
} 