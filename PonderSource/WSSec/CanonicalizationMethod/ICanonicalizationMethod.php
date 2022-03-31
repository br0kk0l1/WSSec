<?php

namespace PonderSource\WSSec\CanonicalizationMethod;

interface ICanonicalizationMethod {
    public function getAlgorithmUri();
    public function getChildElements();
    public function applyAlgorithm($value);
}