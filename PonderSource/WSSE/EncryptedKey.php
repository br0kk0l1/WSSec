<?php

namespace PonderSource\WSSE;
/**
 * @XmlNamespace(uri="http://www.w3.org/2001/04/xmlenc#", prefix="xenc")
 * @SerializedName("xenc:EncryptedKey")
 */
class EncryptedKey {
    /**
     * @XmlAttribute
     * @SerializedName("Id")
     */
    private $id;

    /**
     * @SerializedName("EncryptionMethod") 
     */
    private $encryptionMethod;

    /**
     * @SerializedName("KeyInfo")
     */
    private $keyInfo;

    /**
     * @SerializedName("CipherData")
     */
    private $cipherData;

    /**
     * @SerializedName("ReferenceList")
     */
    private $referenceList = [];

    public function __construct(){}

    public function setId($id){}
    public function getId(){}
    public function setEncryptionMethod($encryptionMethod){}
    public function getEncryptionMethod(){}
    public function setKeyInfo($keyInfo){}
    public function getKeyInfo(){}
    public function setCipherData($cipherData){}
    public function getCipherData(){}
    public function setReferenceList($referenceList){}
    public function getReferenceList(){}
    public function addReference($reference){}
    public function removeReference($reference){}

}