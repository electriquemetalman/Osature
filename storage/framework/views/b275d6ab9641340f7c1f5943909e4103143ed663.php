<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('compte')->html();
} elseif ($_instance->childHasBeenRendered('RK27i96')) {
    $componentId = $_instance->getRenderedChildComponentId('RK27i96');
    $componentTag = $_instance->getRenderedChildComponentTagName('RK27i96');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RK27i96');
} else {
    $response = \Livewire\Livewire::mount('compte');
    $html = $response->html();
    $_instance->logRenderedChild('RK27i96', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyCompte.blade.php ENDPATH**/ ?>