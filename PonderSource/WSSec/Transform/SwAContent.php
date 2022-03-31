<?php

namespace PonderSource\WSSec\Transform;

use JMS\Serializer\Annotation\{Type, XmlAttribute,SerializedName};

class SwAContent implements ITransform {
    /**
     * @XmlAttribute
     * @SerializedName("Algorithm")
     * @Type("string")
     */
    private $uri = "http://docs.oasis-open.org/wss/oasis-wss-SwAProfile-1.1#Attachment-Content-Signature-Transform";

    public function getUri() {
        return SwAContent::$uri;
    }
    public function transform($value) {
        return $value;
    }
}