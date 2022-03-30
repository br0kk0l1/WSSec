<?php

namespace PonderSource\WSSE;

interface EncryptionMethod {
    public function getUri();
    public function encrypt(string $data, $key);
    public function decrypt(string $data, $key);
}