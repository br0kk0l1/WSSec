<?php

namespace PonderSource\WSSE;

/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#", prefix="xenc")
 */
class EncryptedData {
    private $encryptionMethod;
    private $keyInfo;
    private $cipherData;
}