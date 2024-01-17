<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Github\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TeamProjectPermissionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Github\Model\TeamProjectPermissions';
    }
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Github\Model\TeamProjectPermissions';
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
        $object = new \Github\Model\TeamProjectPermissions();
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Github\Validator\TeamProjectPermissionsConstraint());
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('read', $data)) {
            $object->setRead($data['read']);
            unset($data['read']);
        }
        if (\array_key_exists('write', $data)) {
            $object->setWrite($data['write']);
            unset($data['write']);
        }
        if (\array_key_exists('admin', $data)) {
            $object->setAdmin($data['admin']);
            unset($data['admin']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        if ($object->isInitialized('read') && null !== $object->getRead()) {
            $data['read'] = $object->getRead();
        }
        if ($object->isInitialized('write') && null !== $object->getWrite()) {
            $data['write'] = $object->getWrite();
        }
        if ($object->isInitialized('admin') && null !== $object->getAdmin()) {
            $data['admin'] = $object->getAdmin();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Github\Validator\TeamProjectPermissionsConstraint());
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return ['Github\Model\TeamProjectPermissions' => false];
    }
}