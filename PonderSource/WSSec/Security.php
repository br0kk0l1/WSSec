<?php

namespace PonderSource\WSSec;

use JMS\Serializer\Annotation\{Type, XmlNamespace,XmlRoot,SerializedName,XmlAttributeMap};

/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd", prefix="wsse");
 * @XmlNamespace(uri="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd", prefix="wsu")
 * @XmlRoot("wsse:Security");
 */
class Security {
    /**
     * @XmlAttributeMap
     * @Type("array<string,string>")
     */
    private $attributes;

    /**
     * @SerializedName("wsse:BinarySecurityToken")
     * @Type("PonderSource\WSSec\BinarySecurityToken")
     */
    private $encryptionSecurityToken;

    /**
     * @SerializedName("xenc:EncryptedKey")
     * @Type("PonderSource\WSSec\EncryptedKey")
     */
    private $encryptedKey;

    /**
     * @SerializedName("xenc:EncryptedData")
     * @Type("PonderSource\WSSec\EncryptedData")
     */
    private $encryptedData;

    /**
     * @SerializedName("wsse:BinarySecurityToken")
     * @Type("PonderSource\WSSec\BinarySecurityToken")
     */
    private $signatureSecurityToken;

    /**
     * @SerializedName("ds:Signature")
     * @Type("PonderSource\WSSec\Signature")
     */
    private $signature;

    public function __construct($soap1_2NamespacePrefix = 'S12'){
        $this->attributes[$soap1_2NamespacePrefix . ':MustUnderstand'] = 'true';
        return $this;
    }

    public function generateSignature($privateKey, $certificate, $references, $canonicaliztionMethod, $signatureMethod){
        $signedInfo = new SignedInfo($signatureMethod, $canonicaliztionMethod);
        foreach($references as $ref){
            $signedInfo->addReference($references);
        }
        $keyInfoId = uniqid("KI-");
        $securityTokenId = uniqid("STR-");
        $securityTokenReference = uniqid("X509-");
        $keyInfo = new KeyInfo(
            new SecurityTokenReference(
                new WSSecReference('#' . $securityTokenReference, 
                    'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3'
                ),
                ['Id' => $securityTokenId]
            ),
            $keyInfoId);
        $signature = new Signature($signedInfo, $keyInfo);
        $signature->sign($privateKey);
        $this->signatureSecurityToken = new BinarySecurityToken($securityTokenReference, $certificate);
        $this->signature = $signature;
    }

    public function encryptData($encryptionKey, $certificate, $cid, $data){
        $dataId = uniqid('ED-');
        $keyId = uniqid('EK-');
        $tokenId = uniqid('X509-');

        $encryptedKey = new EncryptedKey();
        $encryptedKey->setId($keyId);
        $encryptedKey->setEncryptionMethod(
            new EncryptionMethod\RsaOeap(
                new DigestMethod\SHA256(), 
                new MGF('http://www.w3.org/2001/04/xmlenc11#mgf1sha256')));
        $encryptedKey->setKeyInfo(
            new KeyInfo(
                new WSSecReference(
                    '#' . $tokenId, 
                    'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3')));
        $encryptedKey->setCipherData(
            new CipherData(
                $encryptedKey->getEncryptionMethod()->encrypt($encryptionKey, $certificate->getPublicKey())));
        $encryptedKey->setReferenceList([new DataReference('#' . $dataId)]);

        $encryptedData = new EncryptedData(
            $id=$dataId,
            $mimeType='application/gzip',
            $dataType='http://docs.oasis-open.org/wss/oasis-wss-SwAProfile-1.1#Attachment-Content-Only',
            $encryptionMethod=new EncryptionMethod\AES128GCM(),
            $keyInfo=new KeyInfo(
                new WSSecReference(
                    '#' . $keyId,
                    'http://docs.oasis-open.org/wss/oasis-wss-soap-message-security-1.1#EncryptedKey')),
            $cipherData=new CipherData(
                new CipherReference($cid, [new Transform\SwAContent()])));
        $this->encryptionSecurityToken = new BinarySecurityToken($tokenId, $certificate);
        $this->encryptedKey = $encryptedKey;
        $this->encryptedData = $encryptedData;
        return $encryptedData->getEncryptionMethod()->encrypt($data, $encryptionKey);
    }
}