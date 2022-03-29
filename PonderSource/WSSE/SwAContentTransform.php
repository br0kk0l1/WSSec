<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlAttribute,SerializedName};

class SwAContentTransform implements Transform {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     */
    private $uri = "http://docs.oasis-open.org/wss/oasis-wss-SwAProfile-1.1#Attachment-Content-Signature-Transform";

    public function getUri() {
        return SwAContentTransform::$uri;
    }
    public function transform($value) {
        return $value;
    }
}