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
class DistributionInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\Api\Model\DistributionInspect';
    }
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Docker\Api\Model\DistributionInspect';
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
        $object = new \Docker\Api\Model\DistributionInspect();
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\DistributionInspectConstraint());
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Descriptor', $data)) {
            $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\Api\Model\OCIDescriptor', 'json', $context));
        }
        if (\array_key_exists('Platforms', $data)) {
            $values = [];
            foreach ($data['Platforms'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\Api\Model\OCIPlatform', 'json', $context);
            }
            $object->setPlatforms($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        $data['Descriptor'] = ($object->getDescriptor() == null) ? null : new \ArrayObject($this->normalizer->normalize($object->getDescriptor(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        $values = [];
        foreach ($object->getPlatforms() as $value) {
            $values[] = ($value == null) ? null : new \ArrayObject($this->normalizer->normalize($value, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        $data['Platforms'] = $values;
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\DistributionInspectConstraint());
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\Api\Model\DistributionInspect' => false];
    }
}