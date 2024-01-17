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
class JoinTokensNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\Api\Model\JoinTokens';
    }
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Docker\Api\Model\JoinTokens';
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
        $object = new \Docker\Api\Model\JoinTokens();
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\JoinTokensConstraint());
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Worker', $data)) {
            $object->setWorker($data['Worker']);
        }
        if (\array_key_exists('Manager', $data)) {
            $object->setManager($data['Manager']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        if ($object->isInitialized('worker') && null !== $object->getWorker()) {
            $data['Worker'] = $object->getWorker();
        }
        if ($object->isInitialized('manager') && null !== $object->getManager()) {
            $data['Manager'] = $object->getManager();
        }
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\JoinTokensConstraint());
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\Api\Model\JoinTokens' => false];
    }
}