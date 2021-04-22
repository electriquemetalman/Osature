<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('connexion')->html();
} elseif ($_instance->childHasBeenRendered('qu7AAnD')) {
    $componentId = $_instance->getRenderedChildComponentId('qu7AAnD');
    $componentTag = $_instance->getRenderedChildComponentTagName('qu7AAnD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qu7AAnD');
} else {
    $response = \Livewire\Livewire::mount('connexion');
    $html = $response->html();
    $_instance->logRenderedChild('qu7AAnD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/sections/connectionForm.blade.php ENDPATH**/ ?>