<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXQTwPxE\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXQTwPxE/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXQTwPxE.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXQTwPxE\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerXQTwPxE\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'XQTwPxE',
    'container.build_id' => '444fc8ff',
    'container.build_time' => 1564575730,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXQTwPxE');
