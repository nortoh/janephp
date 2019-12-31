<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi2\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class XmlNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi2\\Model\\Xml';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi2\Model\Xml;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi2\Model\Xml();
        $data = clone $data;
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
            unset($data->{'name'});
        }
        if (property_exists($data, 'namespace')) {
            $object->setNamespace($data->{'namespace'});
            unset($data->{'namespace'});
        }
        if (property_exists($data, 'prefix')) {
            $object->setPrefix($data->{'prefix'});
            unset($data->{'prefix'});
        }
        if (property_exists($data, 'attribute')) {
            $object->setAttribute($data->{'attribute'});
            unset($data->{'attribute'});
        }
        if (property_exists($data, 'wrapped')) {
            $object->setWrapped($data->{'wrapped'});
            unset($data->{'wrapped'});
        }
        foreach ($data as $key => $value) {
            if (preg_match('/^x-/', $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getNamespace()) {
            $data->{'namespace'} = $object->getNamespace();
        }
        if (null !== $object->getPrefix()) {
            $data->{'prefix'} = $object->getPrefix();
        }
        if (null !== $object->getAttribute()) {
            $data->{'attribute'} = $object->getAttribute();
        }
        if (null !== $object->getWrapped()) {
            $data->{'wrapped'} = $object->getWrapped();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/^x-/', $key)) {
                $data->{$key} = $value;
            }
        }

        return $data;
    }
}
