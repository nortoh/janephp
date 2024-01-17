<?php

namespace Docker\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\Api\Runtime\Normalizer\CheckArray;
use Docker\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ServiceEndpointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\Api\Model\ServiceEndpoint';
    }
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Docker\Api\Model\ServiceEndpoint';
    }
    /**
     * @return mixed
     */
    public function denormalize(mixed $data, string $class, string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\Api\Model\ServiceEndpoint();
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\ServiceEndpointConstraint());
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Spec', $data)) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\Api\Model\EndpointSpec', 'json', $context));
        }
        if (\array_key_exists('Ports', $data)) {
            $values = [];
            foreach ($data['Ports'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\Api\Model\EndpointPortConfig', 'json', $context);
            }
            $object->setPorts($values);
        }
        if (\array_key_exists('VirtualIPs', $data)) {
            $values_1 = [];
            foreach ($data['VirtualIPs'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\Api\Model\ServiceEndpointVirtualIPsItem', 'json', $context);
            }
            $object->setVirtualIPs($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        if ($object->isInitialized('spec') && null !== $object->getSpec()) {
            $data['Spec'] = ($object->getSpec() == null) ? null : new \ArrayObject($this->normalizer->normalize($object->getSpec(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('ports') && null !== $object->getPorts()) {
            $values = [];
            foreach ($object->getPorts() as $value) {
                $values[] = ($value == null) ? null : new \ArrayObject($this->normalizer->normalize($value, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['Ports'] = $values;
        }
        if ($object->isInitialized('virtualIPs') && null !== $object->getVirtualIPs()) {
            $values_1 = [];
            foreach ($object->getVirtualIPs() as $value_1) {
                $values_1[] = ($value_1 == null) ? null : new \ArrayObject($this->normalizer->normalize($value_1, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['VirtualIPs'] = $values_1;
        }
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\ServiceEndpointConstraint());
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\Api\Model\ServiceEndpoint' => false];
    }
}