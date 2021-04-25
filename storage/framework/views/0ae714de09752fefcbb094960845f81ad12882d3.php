<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('recovermdp')->html();
} elseif ($_instance->childHasBeenRendered('213dPCv')) {
    $componentId = $_instance->getRenderedChildComponentId('213dPCv');
    $componentTag = $_instance->getRenderedChildComponentTagName('213dPCv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('213dPCv');
} else {
    $response = \Livewire\Livewire::mount('recovermdp');
    $html = $response->html();
    $_instance->logRenderedChild('213dPCv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/sections/recoverForm.blade.php ENDPATH**/ ?>