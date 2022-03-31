<?php

namespace PonderSource\WSSec\Transform;

interface ITransform {
    public function getUri();
    public function transform($value);
}