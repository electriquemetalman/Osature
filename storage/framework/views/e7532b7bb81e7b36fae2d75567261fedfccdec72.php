<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('changemdp')->html();
} elseif ($_instance->childHasBeenRendered('ITn0T77')) {
    $componentId = $_instance->getRenderedChildComponentId('ITn0T77');
    $componentTag = $_instance->getRenderedChildComponentTagName('ITn0T77');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ITn0T77');
} else {
    $response = \Livewire\Livewire::mount('changemdp');
    $html = $response->html();
    $_instance->logRenderedChild('ITn0T77', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/sections/changepw.blade.php ENDPATH**/ ?>