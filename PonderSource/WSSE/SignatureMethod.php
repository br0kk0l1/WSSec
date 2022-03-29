<?php

namespace PonderSource\WSSE;

use JMS\Serializer\Annotation\{XmlAttribute,Type,SerializedName,XmlNamespace};

/**
 * @XmlNamespace("http://www.w3.org/2000/09/xmldsig#")
 */
interface SignatureMethod {
    public function getUri();
    public function sign($pkey, $value);
}