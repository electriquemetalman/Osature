<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('compte')->html();
} elseif ($_instance->childHasBeenRendered('wwp7513')) {
    $componentId = $_instance->getRenderedChildComponentId('wwp7513');
    $componentTag = $_instance->getRenderedChildComponentTagName('wwp7513');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wwp7513');
} else {
    $response = \Livewire\Livewire::mount('compte');
    $html = $response->html();
    $_instance->logRenderedChild('wwp7513', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyCompte.blade.php ENDPATH**/ ?>