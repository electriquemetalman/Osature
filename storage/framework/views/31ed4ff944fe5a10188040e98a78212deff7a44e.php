<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('creer-compte')->html();
} elseif ($_instance->childHasBeenRendered('CgaVocH')) {
    $componentId = $_instance->getRenderedChildComponentId('CgaVocH');
    $componentTag = $_instance->getRenderedChildComponentTagName('CgaVocH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CgaVocH');
} else {
    $response = \Livewire\Livewire::mount('creer-compte');
    $html = $response->html();
    $_instance->logRenderedChild('CgaVocH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/sections/createCompteForm.blade.php ENDPATH**/ ?>