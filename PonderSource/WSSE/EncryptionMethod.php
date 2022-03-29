<?php

namespace PonderSource\WSSE;
/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#")
 * @SerializedName("EncryptionMethod")
 */
class EncryptionMethod {
    private $algorithm;
    private $digestMethod;
    private $mgf;

}